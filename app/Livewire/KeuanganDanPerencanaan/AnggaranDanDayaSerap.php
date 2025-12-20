<?php

namespace App\Livewire\KeuanganDanPerencanaan;

use App\Models\Anggaran;
use App\Models\Synchronize;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Anggaran dan Daya Serap')]
class AnggaranDanDayaSerap extends Component
{
    public $data_pagu_total;
    public $data_pagu_realisasi;
    public $data_pagu_sisa;
    public $daya_serap;
    public $update;

    // chart
    public $chart_pagu_realisasi;
    public $chart_pagu_sisa;

    private function formatNumber($value) {
        $value = floatval($value);

        if($value >= 1000000000000) {
            // Jika triliun (T)
            return round($value / 1000000000000, 1) . 'T';
        } else if($value >= 1000000000) {
            // Jika miliar (M)
            return round($value / 1000000000, 1) . 'M';
        } else if($value >= 1000000) {
            // Jika juta (Jt)
            return round($value / 1000000, 1) . 'Jt';
        }
        return number_format($value);
    }

    public function mount() {
        $this->update = Synchronize::where('name', 'Anggaran dan Daya Serap')->first() ?? null;

        $data = Anggaran::first(); 

        if ($data) {
            $pagu_total = $data->pagu_total;
            $pagu_realisasi = $data->pagu_realisasi;
            $pagu_sisa = $data->pagu_sisa;

            // Cek jika total > 0 untuk menghindari error "Division by Zero"
            if ($pagu_total > 0) {
                $persentase = ($pagu_realisasi / $pagu_total) * 100;
            } else {
                $persentase = 0;
            }

            $this->data_pagu_total = $this->formatNumber($pagu_total);
            $this->data_pagu_realisasi = $this->formatNumber($pagu_realisasi);
            $this->data_pagu_sisa = $this->formatNumber($pagu_sisa);
            $this->daya_serap = number_format($persentase, 1) . '%';

            $this->chart_pagu_realisasi = (float) $pagu_realisasi;
            $this->chart_pagu_sisa = (float) $pagu_sisa;
        }
    }

    public function render()
    {
        return view('livewire.keuangan-dan-perencanaan.anggaran-dan-daya-serap');
    }
}
