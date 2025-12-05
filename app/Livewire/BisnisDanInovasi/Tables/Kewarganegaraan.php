<?php

namespace App\Livewire\BisnisDanInovasi\Tables;

use App\Models\Kerjasama;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class Kewarganegaraan extends PowerGridComponent
{
    public string $tableName = 'kewarganegaraan-bhh5xb-table';

    public function datasource(): Collection
    {
        $data = Kerjasama::all();
        return $data
            ->groupBy('negara')
            ->map(function ($items, $negara) {
                return [
                    'id' => uniqid(),
                    'negara' => $negara,
                    'mou' => $items->where('jenis_dokumen', 'Memorandum of Understanding (MoU)')->count(),
                    'moa' => $items->where('jenis_dokumen', 'Memorandum of Agreement (MoA)')->count(),
                    'ia' => $items->where('jenis_dokumen', 'Implementation Arrangement (IA)')->count(),
                    'total' => $items->count(),
                ];
            })
            ->values();
    }

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('negara')
            ->add('mou')
            ->add('moa')
            ->add('ia')
            ->add('total');
    }

    public function columns(): array
    {
        return [
            Column::make('Negara', 'negara')->searchable()->sortable(),
            Column::make('MOU', 'mou')->searchable()->sortable(),
            Column::make('MOA', 'moa')->searchable()->sortable(),
            Column::make('IA', 'ia')->searchable()->sortable(),
            Column::make('Total', 'total')->searchable()->sortable(),
        ];
    }
}
