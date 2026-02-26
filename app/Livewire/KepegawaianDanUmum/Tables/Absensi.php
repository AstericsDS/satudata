<?php

namespace App\Livewire\KepegawaianDanUmum\Tables;

use App\Models\Absensi as AbsensiModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class Absensi extends PowerGridComponent
{
    public string $tableName = 'absensi';

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

    public function datasource(): Builder
    {
        return AbsensiModel::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nama')
            ->add('unit_kerja')
            ->add('cabang', function(AbsensiModel $row) {
                if($row->cabang === 'PPPK_Tendik') {
                    return 'PPPK Tendik';
                } else {
                    return $row->cabang;
                }
            })
            ->add('checktime', function(AbsensiModel $row) {
                return Carbon::parse($row->checktime)->format('H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::make('No', 'id'),
            Column::make('Nama Pegawai', 'nama')
                ->sortable()
                ->searchable(),

            Column::make('Unit kerja', 'unit_kerja')
                ->sortable()
                ->searchable(),

            Column::make('Cabang', 'cabang')
                ->sortable()
                ->searchable(),

            Column::make('Jam Masuk', 'checktime')
                ->sortable()
                ->searchable(),
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }
}
