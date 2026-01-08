<?php

namespace App\Livewire\KepegawaianDanUmum;

use App\Models\Dosen;
use App\Models\Tendik;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Temukan Pegawai')]
class TemukanPegawai extends Component
{
    use WithPagination;
    public $search = '';

    public function updatedSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $results = collect();
        
        if(strlen($this->search) >= 3) {
            $dosen = Dosen::query()
                ->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nip', 'like', '%' . $this->search . '%')
                // ->orWhere('nidn', 'like', '%' . $this->search . '%')
                ->take(20)
                ->get()
                ->map(function($item) {
                    $item->cabang = 'Dosen';
                    $item->nama_lengkap = ($item->gelar_depan ? $item->gelar_depan . ' ' : '') . $item->nama . ($item->gelar_belakang ? ', ' . $item->gelar_belakang : '');
                    $item->nomor_induk = $item->nip;
                    $item->unit_homebase = $item->unit;
                    $item->status_pegawai = $item->status;
                    return $item;
                });

            $tendik = Tendik::query()
                ->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nip', 'like', '%' . $this->search . '%')
                // ->orWhere('nidn', 'like', '%' . $this->search . '%')
                ->take(20)
                ->get()
                ->map(function($item) {
                    $item->cabang = 'Tendik';
                    $item->nama_lengkap = ($item->gelar_depan ? $item->gelar_depan . ' ' : '') . $item->nama . ($item->gelar_belakang ? ', ' . $item->gelar_belakang : '');
                    $item->nomor_induk = $item->nip;
                    $item->unit_homebase = $item->unit_kerja;
                    $status = $item->status_kepegawaian;
                    if($status === 'Pegawai') $item->status_pegawai = 'Tendik PNS';
                    else if($status === 'PPPK_Tendik') $item->status_pegawai = 'Tendik PPPK';
                    else $item->status_pegawai = $status;
                    return $item;
                });

            $results = $dosen->merge($tendik);
        }
        return view('livewire.kepegawaian-umum.temukan-pegawai', [
            // 'results' => $results->paginate(10),
            'pegawai' => $results
        ]);
    }
}
