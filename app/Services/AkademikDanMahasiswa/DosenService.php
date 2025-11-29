<?php

namespace App\Services\AkademikDanMahasiswa;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Services\AkademikDanMahasiswa\PDDIKTIService;


class DosenService
{

    public function getJabatan()
    {
        $pddikti = new PDDIKTIService();
        $pddikti->checkToken();
        $response = Http::post(
            config('api.pddikti_url'),
            [
                "act" => "GetRiwayatFungsionalDosen",
                "token" => Cache::get('token'),
                "filter" => "",
                "order" => "",
                "limit" => "",
                "offset" => "0"
            ]
        );

        $data = $response->json();
        $result = [];
        foreach ($data['data'] as $item) {
            $result[] = [
                'nama' => $item['nama_dosen'],
                'jabatan' => $item['nama_jabatan_fungsional'],
            ];
        }
        return $result;
    }

    public function synchronize()
    {
        $response = Http::withToken(config('api.sipeg_token'))->get(config('api.sipeg_base_url') . '/api/pegawai');
        $jabatan = $this->getJabatan();
        $data = $response->json();
        $rows = [];
        foreach ($data['pegawais'] as $item) {
            if ($item['cabang'] === 'Dosen' || $item['cabang'] === 'Dosen Tetap' || $item['cabang'] === 'Dosen Tidak Tetap' || $item['cabang'] === 'PPPK_Dosen') {
                
                $jabatanArray = [];
                $fullGelar = $item['gelar_depan'] . '' . $item['gelar_belakang'];

                if (empty($fullGelar)) {
                    $fullGelar = $item['nama'];
                }

                $gelar = '';
                foreach ($jabatan as $key => $value) {
                    if (stripos($item['nama'], $value['nama']) !== false && !in_array($value['jabatan'], $jabatanArray)) {
                        $jabatanArray[] = $value['jabatan'];
                    }
                }
                if (stripos($fullGelar, 'Ph') !== false || stripos($fullGelar, 'Dr.') !== false || stripos($fullGelar, 'Dipl') !== false) {
                    $gelar = 'Dr.';
                } elseif (stripos($fullGelar, 'M.') !== false || stripos($fullGelar, 'M')) {
                    $gelar = 'Magister';
                } elseif (stripos($fullGelar, 'S.') !== false) {
                    $gelar = 'Sarjana';
                }

                $jenjang = substr($item['prodi'],0,2) ?? '';
                $prodi = substr($item['prodi'], 5) ?? '';
                $nidn = '';

                if(!is_null($item['nidn'])) {
                    $nidn = $item['nidn'];
                }

                $rows[] = [
                    'nama' => $item['nama'],
                    'nip' => $item['nip_baru'],
                    'nidn' => $nidn,
                    'gelar' => $gelar,
                    'gelar_depan' => $item['gelar_depan'],
                    'gelar_belakang' => $item['gelar_belakang'],
                    'jenjang' => $jenjang,
                    'unit' => $item['unit_kerja'] ?? $item['homebase'],
                    'prodi' => $prodi,
                    'status' => $item['cabang'],
                    'jabatan' => !empty($jabatanArray) ? json_encode($jabatanArray) : null,
                    'updated_at' => now(),
                    'created_at' => now(),
                ];
            }
        }
        $chunks = array_chunk($rows, 200);
        foreach ($chunks as $chunk) {
            DB::table('dosens')->upsert(
                $chunk,
                ['nama', 'nip'],
                ['nama', 'nip', 'gelar', 'gelar_depan', 'gelar_belakang', 'unit', 'status', 'jabatan']
            );
        }
    }
}