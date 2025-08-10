<?php

namespace App\Livewire;

use Livewire\Component;

class JumlahMahasiswa extends Component
{
    public $selected_graph_type = null;
    
    public function selectGraphType($graph_type) {
        $this->selected_graph_type = $graph_type;
        
    }
    
    public function render()
    {
        return view('livewire.jumlah-mahasiswa');
    }
}