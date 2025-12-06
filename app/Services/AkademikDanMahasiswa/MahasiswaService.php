<?php

namespace App\Services\AkademikDanMahasiswa;

use App\Models\Synchronize;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MahasiswaService
{
    private $sync;
    public function __construct()
    {
        $this->sync = Synchronize::where('name', 'Mahasiswa dan Alumni')->first();
    }
    public function mapFakultas()
    {
        $response = Http::get(
            config('api.siakad_base_url') . '/programStudi/All'
        );

        if ($response->failed()) {
            Log::error('Failed to fetch from SIAKAD API', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            return;
        }
        ;

        $data = $response->json();

        if (!isset($data['isi']) || !is_array($data['isi'])) {
            Log::warning('Unexpected response format', [
                'body' => $data
            ]);
        }

        $mapFakultas = [];

        foreach ($data['isi'] as $item) {


            $mapFakultas[$item['namaProdi']] = [
                'fakultas' => $item['namaFakultas'],
                'jenjang' => $item['jenjangProdi']
            ];

            if ($item['namaProdi'] == 'Pendidikan Kependudukan dan Lingkungan Hidup') {
                $mapFakultas['Pend Kependudukan Dan Lingkungan Hidup'] = [
                    'fakultas' => $item['namaFakultas'],
                    'jenjang' => $item['jenjangProdi']
                ];
                continue;
            }

        }

        return $mapFakultas;
    }

    public function synchronize()
    {
        try {
            $mapFakultas = $this->mapFakultas();

            $month = now()->month;
            $year = $month >= 10 ? now()->year : now()->year - 1;

            $pddikti = app(PDDIKTIService::class);

            $pddikti->checkToken();

            for ($i = $year - 7; $i <= $year; $i++) {

                $response = Http::post(
                    config('api.pddikti_url'),
                    [
                        "act" => "GetListMahasiswa",
                        "token" => Cache::get('token'),
                        "filter" => "nama_periode_masuk LIKE '%" . $i . "/" . ($i + 1) . "%' AND nipd IS NOT NULL AND nama_program_studi != 'Profesi Pendidikan Profesi Guru'",
                        "order" => "",
                        "limit" => "",
                        "offset" => 0
                    ]
                );

                $data = $response->json();


                if (isset($data['data']) && is_array($data['data'])) {
                    $rows = [];
                    foreach ($data['data'] as $item) {

                        $namaProdi = '';

                        $item['fakultas'] = 'Tidak Ditemukan';

                        switch ($item['nama_program_studi']) {
                            case 'D3 Usaha Jasa Pariwisata':
                                $namaProdi = 'Perjalanan Wisata';
                                break;
                            case 'D3 Sekretari':
                                $namaProdi = 'Administrasi Perkantoran';
                                break;
                            case 'S1 Ilmu Agama Islam':
                                $namaProdi = 'Pendidikan Agama Islam';
                                break;
                            case 'S1 Pendidikan Tata Niaga':
                                $namaProdi = 'Pendidikan Bisnis';
                                break;
                            case 'S2 Pendidikan Olahraga':
                                $namaProdi = 'Pendidikan Jasmani';
                                break;
                            case 'S3 Pendidikan Olahraga':
                                $namaProdi = 'Pendidikan Jasmani';
                                break;
                            default:
                                $namaProdi = substr($item['nama_program_studi'], 3) ?? '';
                        }

                        foreach ($mapFakultas as $prodiKey => $detail) {
                            if (stripos($namaProdi, $prodiKey) !== false) {
                                $item['fakultas'] = $detail['fakultas'];
                                $item['jenjang'] = $detail['jenjang'];
                                break;
                            }
                        }

                        $tanggalKeluar = $item['tanggal_keluar'];

                        if (!is_null($tanggalKeluar)) {
                            $tanggalKeluar = \Carbon\Carbon::createFromFormat('m-d-Y', $tanggalKeluar)->format('Y-m-d');
                        } else {
                            $tanggalKeluar = null;
                        }

                        $rows[] = [
                            'nama' => $item['nama_mahasiswa'] ?? '',
                            'nipd' => $item['nipd'],
                            'id_prodi' => $item['id_prodi'] ?? '',
                            'status' => ucwords(strtolower($item['nama_status_mahasiswa'] ?? '')),
                            'program_studi' => $namaProdi ?? '',
                            'jenjang' => $item['jenjang'] ?? '',
                            'fakultas' => $item['fakultas'] ?? '',
                            'periode_masuk' => $item['nama_periode_masuk'] ?? '',
                            'tanggal_keluar' => $tanggalKeluar,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }

                    $chunks = array_chunk($rows, 200);
                    foreach ($chunks as $chunk) {
                        DB::table('mahasiswa')->upsert(
                            $chunk,
                            ['nipd', 'id_prodi'],
                            ['nama', 'status', 'program_studi', 'jenjang', 'fakultas', 'periode_masuk', 'tanggal_keluar', 'updated_at']
                        );
                    }

                    unset($item);
                }
            }
            $this->sync->update(['status' => 'synchronized']);
        } catch (Exception $err) {
            $this->sync->update(['status' => 'error']);
            Log::error("Failed request on Tracer Study", ['error' => $err->getMessage()]);
        }
    }
}