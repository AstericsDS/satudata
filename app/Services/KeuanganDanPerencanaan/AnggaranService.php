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
    private $year;

    public function __construct()
    {
        $this->sync = Synchronize::where('name', 'Anggaran dan Daya Serap')->first();
        $this->year = now()->year;
    }
    public function getTotal()
    {
        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/v2/statistik/realisasi-pagu?thang=' . $this->year . '&kd_satker=999');
        $data = $response->json();

        if (!isset($data['data']) || (isset($data['code']) && $data['code'] !== 0)) {
            throw new Exception('Invalid API Response: ' . json_encode($data));
        }

        $item = $data['data'];

        $rows = [
            'satker' => 'Universitas Negeri Jakarta',
            'tahun' => $this->year,
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

        $this->sync->update(['status' => 'synchronized']);

    }
    public function getAkun()
    {
        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu/per-akun?thang=' . $this->year . '&kd_satker=999');
        $data = $response->json();

        if (!isset($data['data'])) {
            throw new Exception('Invalid API Response: ' . json_encode($data));
        }

        $items = $data['data'];
        $rows = [];

        foreach ($items as $item) {
            $rows[] = [
                'satker' => 'Universitas Negeri Jakarta',
                'tahun' => $this->year,
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
    public function getOuput()
    {
        $response = Http::withToken(config('api.saku_token'))->get(config('api.saku_base_url') . '/statistik/realisasi-pagu/per-sub-output?thang=' . $this->year . '&kd_satker=999');
        $data = $response->json();

        if (!isset($data['data'])) {
            throw new Exception('Invalid API Response: ' . json_encode($data));
        }

        $items = $data['data']['pagu'];
        $rows = [];

        foreach ($items as $item) {
            $rows[] = [
                'satker' => 'Universitas Negeri Jakarta',
                'tahun' => $this->year,
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
            $this->getTotal();
            $this->getAkun();
            $this->getOuput();
        } catch (Exception $err) {
            if ($this->sync) {
                $this->sync->update(['status' => 'error']);
            }
            Log::error("Failed synchronization on Anggaran dan Daya Serap (SAKU)", ['error' => $err->getMessage()]);
        }

    }
}