<?php

namespace App\Livewire\PowerGrid;

use App\Models\Tendik;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class DaftarTendikTable extends PowerGridComponent
{
    public int $perPage = 10;
    public string $tableName = 'daftarTendikTable';

    public function setUp(): array
    {
        return [
            PowerGrid::header()
                ->showSearchInput(),

            PowerGrid::footer()
                ->showPerPage(10, [10, 20, 30, 40, 50])
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Tendik::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')

            ->add('nama_tendik', function (Tendik $row) {
                $gelarDepan = $row->gelar_depan ? $row->gelar_depan . ' ' : '';
                $gelarBelakang = $row->gelar_belakang;
                return $gelarDepan . $row->nama . $gelarBelakang;
            })

            ->add('nip')

            ->add('unit_kerja')

            ->add('status_badge', function (Tendik $row) {
                $status = $row->status_kepegawaian ?? 'Tidak Diketahui';
                if($status === 'Pegawai') {
                    $label = 'Tendik PNS';
                    $color = 'bg-teal-100 text-teal-700';
                } else if($status === 'Tendik Tetap') {
                    $label = 'Tendik Tetap';
                    $color = 'bg-orange-100 text-orange-700';
                } else if($status === 'Tendik Tidak Tetap') {
                    $label = 'Tendik Tidak Tetap';
                    $color = 'bg-yellow-100 text-yellow-700';
                } else if($status === 'PPPK_Tendik') {
                    $label = 'Tendik PPPK';
                    $color = 'bg-blue-100 text-blue-700';
                } else {
                    $label = 'Tendik';
                    $color = 'bg-[#E5E5E5] text-[#808080]';
                }

                return "
                    <span class='inline-flex items-center px-3 py-1 text-sm font-medium rounded-lg {$color}'>
                        {$label}
                    </span>
                ";
            });
    }

    public function columns(): array
    {
        return [
            Column::make('No', 'id')->index(),

            Column::make('Nama', 'nama_tendik', 'nama')
                ->searchable()
                ->sortable(),

            Column::make('NIP', 'nip', 'nip')
                ->searchable()
                ->sortable(),

            Column::make('Unit', 'unit_kerja', 'unit_kerja')
                ->sortable(),

            Column::make('Status', 'status_badge', 'status_kepegawaian')
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        $daftar_unit = Tendik::query()->select('unit_kerja')->distinct()->orderBy('unit_kerja', 'asc')->get();

        return [
            Filter::select('unit_kerja', 'unit_kerja')
                ->dataSource($daftar_unit)
                ->optionLabel('unit_kerja')
                ->optionValue('unit_kerja'),
                
            Filter::select('status_kepegawaian')
                ->dataSource([
                    ['id' => 'Pegawai', 'name' => 'Tendik PNS'],
                    ['id' => 'Tendik Tetap', 'name' => 'Tendik Tetap'],
                    ['id' => 'Tendik Tidak Tetap', 'name' => 'Tendik Tidak Tetap'],
                    ['id' => 'PPPK_Tendik', 'name' => 'Tendik PPPK'],
                ])
                ->optionValue('id')
                ->optionLabel('name'),

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    // public function actions(Tendik $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules(Tendik $row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
