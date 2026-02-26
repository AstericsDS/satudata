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

    public function __construct()
    {
        $this->sync = Synchronize::where('name', 'Anggaran dan Daya Serap')->first();
    }

    public function getTotal($year)
    {

        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/v2/statistik/realisasi-pagu?thang=' . $year . '&kd_satker=999');
        $data = $response->json();

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

    }

    public function getPerSatker($year) {
        $response_satker = Http::acceptJson()->withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/referensi/satker');
        $data_satker = $response_satker->json();

        if (!isset($data_satker['data'])) {
            return;
        }

        $satker_list = $data_satker['data'];
        $rows = [];

        foreach ($satker_list as $satker) {
            try {
                if (empty($satker['kd_satker'])) {
                    continue;
                }

                $kd_satker = $satker['kd_satker'];

                $response = Http::acceptJson()->withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu?thang=' . $year . '&kd_satker=' . $kd_satker);
                $data = $response->json();

                if (isset($data['data']) && $data['code'] === 0) {
                    $item = $data['data'];

                    $rows[] = [
                        'satker' => $satker['ur_satker'],
                        'tahun' => $year,
                        'data_scope' => 'total',
                        'nama' => 'Total Anggaran',
                        'pagu_total' => $item['pagu_total'],
                        'pagu_realisasi' => $item['pagu_realisasi'],
                        'pagu_sisa' => $item['pagu_sisa'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                } 
                usleep(800000);
            } catch (Exception $error) {
                Log::warning("Failed to fetch satker {$satker['kd_satker']} for year {$year}: " . $error->getMessage());
                continue;
            }
        }

        DB::table('anggaran')->upsert(
            $rows,
            ['tahun', 'satker', 'nama', 'data_scope'],
            ['pagu_total', 'pagu_realisasi', 'pagu_sisa', 'updated_at']
        );        
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
    public function getOuput($year)
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
        set_time_limit(0);
        ini_set('memory_limit', '2048M');
        try {
            if($this->sync) {
                $this->sync->update(['status' => 'synchronizing']);
            }
            $current_year = now()->year;
            $range_year = range($current_year, $current_year - 2);
        
            foreach($range_year as $year) {
                try {
                    $this->getTotal($year);
                    $this->getPerSatker($year);
                    $this->getAkun($year);
                    $this->getOuput($year);
                } catch (Exception $error) {
                    Log::error("Gagal sync data untuk tahun {$year}: " . $error->getMessage());
                    continue;
                }
                
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