<?php

namespace App\Livewire\BisnisDanInovasi\Tables;

use App\Models\Kerjasama;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class Fakultas extends PowerGridComponent
{
    public string $tableName = 'kemitraan-table-nj7f5s-table';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showRecordCount('full')
                ->showRecordCount(),
        ];
    }

    public function datasource(): Collection
    {
        $data = Kerjasama::where('unit', 'LIKE', '%Fakultas%')->get();
        return $data->groupBy('unit')
            ->map(function ($items, $unit) {
                return [
                    'unit' => $unit,
                    'mou' => $items->where('jenis_dokumen', 'Memorandum of Understanding (MoU)')->count(),
                    'moa' => $items->where('jenis_dokumen', 'Memorandum of Agreement (MoA)')->count(),
                    'ia' => $items->where('jenis_dokumen', 'Implementation Arrangement (IA)')->count(),
                    'total' => $items->count(),
                ];
            })
            ->values();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
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
            // Column::make('ID', 'id')
            //     ->searchable()
            //     ->sortable(),

            // Column::make('Name', 'name')
            //     ->searchable()
            //     ->sortable(),

            // Column::make('Created at', 'created_at')
            //     ->hidden(),

            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->searchable(),

            // Column::action('Action')
        ];
    }
}
