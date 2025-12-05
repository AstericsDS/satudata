<?php

namespace App\Livewire\BisnisDanInovasi\Tables;

use App\Models\Kerjasama;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class Fakultas extends PowerGridComponent
{
    public string $tableName = 'fakultas-9lcol7-table';

    public function datasource(): Collection
    {
        $data = Kerjasama::where('unit', 'LIKE', '%Fakultas%')->get();
        return $data
            ->groupBy('unit')
            ->map(function ($items, $unit) {
                return [
                    'id'    => uniqid(),
                    'unit' => $unit,
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
            ->add('unit')
            ->add('mou')
            ->add('moa')
            ->add('ia')
            ->add('total');
    }

    public function columns(): array
    {
        return [
            Column::make('Fakultas', 'unit')->searchable()->sortable(),
            Column::make('MOU', 'mou')->sortable(),
            Column::make('MOA', 'moa')->sortable(),
            Column::make('IA', 'ia')->sortable(),
            Column::make('Total', 'total')->sortable(),
        ];
    }
}
