<?php

namespace App\Services;

use App\Models\Data;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\isNull;

class MahasiswaService
{
    // public function import()
    // {
    //     $limit = 1000;
    //     $offset = 0;

    //     do {
    //         $response = Http::withHeaders([
    //             'Content-Type' => 'application/json',
    //         ])->post(env('PDDIKTI_URL'), [
    //                     "act" => "GetListMahasiswa",
    //                     "token" => env('PDDIKTI_TOKEN'),
    //                     "filter" => "nama_status_mahasiswa = 'AKTIF' AND status_sync = 'sudah sync'",
    //                     "order" => "",
    //                     "limit" => $limit,
    //                     "offset" => $offset
    //                 ]);

    //         $chunk = $response->json();
    //         // Optional: safely access nested keys if needed
    //         $mahasiswaList = $chunk['data'] ?? $chunk; // adjust based on API structure
    //         $this->insertInChunks($mahasiswaList);
    //         $offset += $limit;
    //     } while (count($mahasiswaList) > 0);
    // }

    // function insertInChunks(array $list)
    // {
    //     foreach (array_chunk($list, 100) as $chunk) {
    //         foreach ($chunk as $item) {
    //             Mahasiswa::firstOrCreate(
    //                 [
    //                     'nama_mahasiswa' => $item['nama_mahasiswa'],
    //                 ],
    //                 [
    //                     'tanggal_lahir' => $item['tanggal_lahir'],
    //                     'nama_program_studi' => $item['nama_program_studi'],
    //                     'nama_status_mahasiswa' => $item['nama_status_mahasiswa'],
    //                     'nama_periode_masuk' => $item['nama_periode_masuk'],
    //                     'created_at' => now(),
    //                     'updated_at' => now(),
    //                 ]
    //             );

    //         }


    //     }
    // }

    // public function mhsCount()
    // {
    //     $model = Data::first();
    //     $data = $model->unj_dalam_angka;
    //     $response = Http::withHeaders([
    //         'Content-Type' => 'application/json',
    //     ])->post(env('PDDIKTI_URL'), [
    //                 "act" => "GetListMahasiswa",
    //                 "token" => env('PDDIKTI_TOKEN'),
    //                 "filter" => "nama_status_mahasiswa = 'AKTIF' AND status_sync = 'sudah sync'",
    //                 "order" => "",
    //                 "limit" => '',
    //                 "offset" => 0,
    //             ]);

    //     $data['jumlah_mahasiswa'] = $response->json()['jumlah'];
    //     $model->unj_dalam_angka = $data;
    //     $model->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Jumlah mahasiswa updated successfully',
    //         'jumlah_mahasiswa' => $model['jumlah_mahasiswa']
    //     ]);
    // }

    // function lulusCount()
    // {
    //     $response = Http::withHeaders([
    //         'Content-Type' => 'application/json',
    //     ])->post(env('PDDIKTI_URL'), [
    //                 "act" => "GetListMahasiswaLulusDO",
    //                 "token" => env('PDDIKTI_TOKEN'),
    //                 "filter" => "nama_jenis_keluar = 'Lulus' AND tanggal_keluar LIKE '%2025'",
    //                 "order" => "",
    //                 "limit" => "",
    //                 "offset" => "0"
    //             ]);
    //     return count($response['data']);
    // }

    // public function synchronizePendidikanMahasiswa()
    // {
    //     $token = Cache::get('token');
    //     $model = Data::first();
    //     $data = $model->mahasiswa_berdasarkan_jenjang_pendidikan ?? [];

    //     $list_jenjang_pendidikan = ['D4', 'S1', 'S2', 'S3'];
    //     $counts = [];

    //     foreach ($list_jenjang_pendidikan as $jenjang_pendidikan) {
    //         $response = Http::withHeaders([
    //             'Content-Type' => 'application/json'
    //         ])->post(env('PDDIKTI_URL'), [
    //                     "act" => "GetListMahasiswa",
    //                     "token" => $token,
    //                     "filter" => "nama_status_mahasiswa = 'AKTIF' AND status_sync = 'sudah sync' AND nama_program_studi != 'Profesi Pendidikan Profesi Guru' and nama_program_studi like '%{$jenjang_pendidikan} %'",
    //                     "order" => "",
    //                     "limit" => "",
    //                     "offset" => 0
    //                 ]);

    //         if ($response->successful() && isset($response->json()['jumlah'])) {
    //             $count = (int) $response->json()['jumlah'];
    //             $key = 'jumlah_mahasiswa_' . strtolower($jenjang_pendidikan);
    //             $counts[$key] = $count;
    //         }

    //     }

    //     $mahasiswa = array_merge($data, $counts);
    //     $model->mahasiswa_berdasarkan_jenjang_pendidikan = $mahasiswa;
    //     $model->save();
    // }

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
        };

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

                    $namaProdi = $item['nama_program_studi'] ?? '';
                    $item['fakultas'] = 'Tidak Ditemukan';

                    switch ($namaProdi) {
                        case 'D3 Usaha Jasa Pariwisata':
                            $namaProdi = 'D3 Perjalanan Wisata';
                            break;
                        case 'D3 Sekretari':
                            $namaProdi = 'D3 Administrasi Perkantoran';
                            break;
                        case 'S1 Ilmu Agama Islam':
                            $namaProdi = 'S1 Pendidikan Agama Islam';
                            break;
                        case 'S1 Pendidikan Tata Niaga':
                            $namaProdi = 'S1 Pendidikan Bisnis';
                            break;
                        case 'S2 Pendidikan Olahraga':
                            $namaProdi = 'S2 Pendidikan Jasmani';
                            break;
                        default:
                            $namaProdi = $item['nama_program_studi'] ?? '';
                    }

                    foreach ($mapFakultas as $prodiKey => $detail) {
                        if (stripos($namaProdi, $prodiKey) !== false) {
                            $item['fakultas'] = $detail['fakultas'];
                            $item['jenjang'] = $detail['jenjang'];
                            break;
                        }
                    }

                    $tanggalKeluar = $item['tanggal_keluar'];
                    logger($tanggalKeluar);
                    if(!is_null($tanggalKeluar)) {
                        $tanggalKeluar = \Carbon\Carbon::createFromFormat('m-d-Y', $tanggalKeluar)->format('Y-m-d');
                    } else {
                        $tanggalKeluar = null;
                    }

                    $rows[] = [
                        'nama' => $item['nama_mahasiswa'] ?? '',
                        'nipd' => $item['nipd'],
                        'id_prodi' => $item['id_prodi'] ?? '',
                        'status' => $item['nama_status_mahasiswa'] ?? '',
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
                    DB::table('mahasiswas')->upsert(
                        $chunk,
                        ['nipd', 'id_prodi'],
                        ['nama', 'status', 'program_studi', 'jenjang', 'fakultas', 'periode_masuk', 'tanggal_keluar', 'updated_at']
                    );
                }

                unset($item);
            }
        }
    }
}