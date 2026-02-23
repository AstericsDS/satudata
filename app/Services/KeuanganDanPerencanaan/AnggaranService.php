<?php

namespace App\Services\KeuanganDanPerencanaan;

use Exception;
use Throwable;
use App\Models\Synchronize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AnggaranService
{
    private $sync;
    // private $year;

    public function __construct()
    {
        $this->sync = Synchronize::where('name', 'Anggaran dan Daya Serap')->first();
        // $this->year = now()->year;
    }
    public function getTotal($year)
    {
        // $current_year = now()->year;
        // $range_year = range($current_year, $current_year - 4);
        // foreach($range_year as $year) {
        //     $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/v2/statistik/realisasi-pagu?thang=' . $year . '&kd_satker=999');
        //     $data = $response->json();

        //     if (!isset($data['data']) || (isset($data['code']) && $data['code'] !== 0)) {
        //         throw new Exception('Invalid API Response: ' . json_encode($data));
        //     }

        //     $item = $data['data'];

        //     $rows = [
        //         'satker' => 'Universitas Negeri Jakarta',
        //         'tahun' => $year,
        //         'data_scope' => 'total',
        //         'nama' => 'Total Anggaran',
        //         'pagu_total' => $item['pagu_total'],
        //         'pagu_realisasi' => $item['pagu_realisasi'],
        //         'pagu_sisa' => $item['pagu_sisa'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];

        //     DB::table('anggaran')->upsert(
        //         $rows,
        //         ['tahun', 'satker', 'nama', 'data_scope'],
        //         ['pagu_total', 'pagu_realisasi', 'pagu_sisa']
        //     );

        // }
        // dd($data);

        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/v2/statistik/realisasi-pagu?thang=' . $year . '&kd_satker=999');
        $data = $response->json();

        // dd($data);

        if (!isset($data['data']) || (isset($data['code']) && $data['code'] !== 0)) {
            throw new Exception('Invalid API Response: ' . json_encode($data));
        }

        $item = $data['data'];

        $rows = [
            'satker' => 'Universitas Negeri Jakarta',
            'tahun' => $year,
            'data_scope' => 'total',
            'nama' => 'Total Anggaran',
            'pagu_total' => $item['pagu_total'],
            'pagu_realisasi' => $item['pagu_realisasi'],
            'pagu_sisa' => $item['pagu_sisa'],
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('anggaran')->upsert(
            $rows,
            ['tahun', 'satker', 'nama', 'data_scope'],
            ['pagu_total', 'pagu_realisasi', 'pagu_sisa']
        );

        // $this->sync->update(['status' => 'synchronized']);

    }

    public function getPerSatker($year) {
        $response_satker = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/referensi/satker');
        $data_satker = $response_satker->json();

        if (!isset($data_satker['data'])) {
            return;
        }

        $satker_list = $data_satker['data'];

        $rows = [];

        foreach ($satker_list as $satker) {
            // $kd_satker = $satker['kd_satker'];

            // $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu?thang=' . $year . '&kd_satker=' . $kd_satker);
            // $data = $response->json();
            try {
                if (empty($satker['kd_satker'])) {
                    continue;
                }

                $kd_satker = $satker['kd_satker'];

                $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu?thang=' . $year . '&kd_satker=' . $kd_satker);
                $data = $response->json();

                if (isset($data['data']) && $data['code'] === 0) {
                    $item = $data['data'];

                    $rows[] = [
                        'satker' => $satker['ur_satker'],
                        'tahun' => $item['thang'],
                        'data_scope' => 'total',
                        'nama' => 'Total Anggaran',
                        'pagu_total' => $item['pagu_total'],
                        'pagu_realisasi' => $item['pagu_realisasi'],
                        'pagu_sisa' => $item['pagu_sisa'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            } catch (Exception $error) {
                Log::warning("Failed to fetch satker {$satker['kd_satker']} for year {$year}: " . $error->getMessage());
                continue;
            }

            // if (isset($data['code']) && $data['code'] === 0) {
            //     dump("BERHASIL: Data ditemukan untuk Satker " . $kd_satker . " (" . $satker['ur_satker'] . ")");
            //     dump($data);
            // } else {
            //     dump("KOSONG: Tidak ada data untuk Satker " . $kd_satker);
            // }
        }

        DB::table('anggaran')->upsert(
            $rows,
            ['tahun', 'satker', 'nama', 'data_scope'],
            ['pagu_total', 'pagu_realisasi', 'pagu_sisa', 'updated_at']
        );        

        // if (!empty($rows)) {
        //     DB::table('anggaran')->upsert(
        //         $rows,
        //         ['tahun', 'satker', 'nama', 'data_scope'],
        //         ['pagu_total', 'pagu_realisasi', 'pagu_sisa', 'updated_at']
        //     );
        // }
    }

    public function getAkun($year)
    {
        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu/per-akun?thang=' . $year . '&kd_satker=999');
        $data = $response->json();

        if (!isset($data['data'])) {
            // throw new Exception('Invalid API Response: ' . json_encode($data));
            throw new Exception('Invalid API Response (Akun) for year ' . $year . ': ' . json_encode($data));
        }

        $items = $data['data'];
        $rows = [];

        foreach ($items as $item) {
            $rows[] = [
                'satker' => 'Universitas Negeri Jakarta',
                'tahun' => $year,
                'data_scope' => 'akun',
                'nama' => $item['ur_akun'],
                'pagu_total' => $item['jumlah'],
                'pagu_realisasi' => $item['realisasi'],
                'pagu_sisa' => $item['sisa'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('anggaran')->upsert(
            $rows,
            ['tahun', 'satker', 'nama', 'data_scope'],
            ['pagu_total', 'pagu_realisasi', 'pagu_sisa']
        );

    }
    public function getOuput($year, $satker_list)
    {
        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu/per-sub-output?thang=' . $year . '&kd_satker=999');
        $data = $response->json();

        if (!isset($data['data'])) {
            // throw new Exception('Invalid API Response: ' . json_encode($data));
            throw new Exception('Invalid API Response (Total) for year ' . $year . ': ' . json_encode($data));
        }

        $items = $data['data']['pagu'];
        $rows = [];

        foreach ($items as $item) {
            $rows[] = [
                'satker' => 'Universitas Negeri Jakarta',
                'tahun' => $year,
                'data_scope' => 'output',
                'nama' => $item['ur_soutput'],
                'pagu_total' => $item['jumlah'],
                'pagu_realisasi' => $item['realisasi'],
                'pagu_sisa' => $item['sisa'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('anggaran')->upsert(
            $rows,
            ['tahun', 'satker', 'nama', 'data_scope'],
            ['pagu_total', 'pagu_realisasi', 'pagu_sisa']
        );

    }

    public function synchronize()
    {
        try {
            $current_year = now()->year;
            $range_year = range($current_year, $current_year - 2);
            // $response_satker = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/referensi/satker');
            // $satker_list = $response_satker->json('data');

            foreach($range_year as $year) {
                // $this->getTotal($year);
                $this->getPerSatker($year);
            //     $this->getAkun($year);
            //     $this->getOuput($year);
            }

            if ($this->sync) {
                $this->sync->update(['status' => 'synchronized']);
            }
        } catch (Exception $err) {
            if ($this->sync) {
                $this->sync->update(['status' => 'error']);
            }
            Log::error("Failed synchronization on Anggaran dan Daya Serap (SAKU)", ['error' => $err->getMessage()]);
        }

    }
}