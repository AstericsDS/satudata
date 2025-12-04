<?php

namespace App\Livewire\BisnisDanInovasi;

use App\Models\Kerjasama;
use App\Models\Synchronize;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Cache;

#[Title('Kemitraan')]
class Kemitraan extends Component
{
    public $data;
    public $year;
    public $update;
    public function mount()
    {
        $this->year = now()->year;
        $this->data = Cache::remember('kemitraan', 3600, function () {
            $MoA = [];
            $MoU = [];
            $IA = [];

            for ($i = $this->year - 4; $i <= $this->year; $i++) {
                $MoA[$i] = Kerjasama::where('tahun', $i)->where('jenis_dokumen', 'Memorandum of Agreement (MoA)')->count();
                $MoU[$i] = Kerjasama::where('tahun', $i)->where('jenis_dokumen', 'Memorandum of Understanding (MoU)')->count();
                $IA[$i] = Kerjasama::where('tahun', $i)->where('jenis_dokumen', 'Implementation Arrangement (IA)')->count();
            }

            return [
                'statistik' => [
                    'Total' => Kerjasama::count(),
                    'MoU' => Kerjasama::where('jenis_dokumen', 'Memorandum of Understanding (MoU)')->count(),
                    'MoA' => Kerjasama::where('jenis_dokumen', 'Memorandum of Agreement (MoA)')->count(),
                    'IA' => Kerjasama::where('jenis_dokumen', 'Implementation Arrangement (IA)')->count(),
                ],
                'MoU' => $MoU,
                'MoA' => $MoA,
                'IA' => $IA,
            ];
        });
        $this->update = Synchronize::where('name', 'Kemitraan')->first();
    }
    public function render()
    {
        return view('livewire.bisnis-dan-inovasi.kemitraan');
    }
}
