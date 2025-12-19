<?php

namespace App\Services\KeuanganDanPerencanaan;

use Exception;
use App\Models\Synchronize;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class AnggaranService {
    private $sync;

    public function __construct()
    {
        $this->sync = Synchronize::where('name', 'Anggaran dan Daya Serap')->first();
    }

    public function synchronize() {
        if($this->sync) {
            $this->sync->update(['status' => 'synchronizing']);
        }

        try {
            $response = Http::withToken(env('SAKU_TOKEN'))->get(env('SAKU_BASE_URL') . '/statistik/realisasi-pagu?thang=2025&kd_satker=999');
            $data = $response->json();

            if(!isset($data['data']) || (isset($data['code']) && $data['code'] !== 0)) {
                throw new Exception('Invalid API Response: '. json_encode($data));
            }
            $this->sync->update(['status' => 'synchronized']);

            $item = $data['data'];
            $rows = [];

            $rows = [
                'cakupan' => $item['ur_satker'],
                'tahun' => $item['thang'],
                'pagu_total' => $item['pagu_total'],
                'pagu_realisasi' => $item['pagu_realisasi'],
                'pagu_sisa' => $item['pagu_sisa'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('anggaran')->upsert(
                $rows,
                ['tahun', 'cakupan'],
                ['pagu_total', 'pagu_realisasi', 'pagu_sisa']
            );

            $this->sync->update(['status' => 'synchronized']);

        } catch(Exception $err) {
            $this->sync->update(['status' => 'error']);
            Log::error('Failed request on Anggaran dan Daya Serap (SAKU)', ['error' => $err->getMessage()]);
        }
    }
}