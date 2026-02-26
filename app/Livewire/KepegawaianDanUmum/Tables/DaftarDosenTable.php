<?php

namespace App\Livewire\KepegawaianDanUmum\Tables;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class DaftarDosenTable extends PowerGridComponent
{
    public int $perPage = 10;
    public string $tableName = 'daftarDosenTable';

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
        return Dosen::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')

            ->add('nama_dosen', function (Dosen $row) {
                $gelarDepan = $row->gelar_depan ? $row->gelar_depan . ' ' : '';
                $gelarBelakang = $row->gelar_belakang;
                return $gelarDepan . $row->nama . $gelarBelakang;
            })

            ->add('nidn')

            ->add('unit')

            ->add('prodi_lengkap', function (Dosen $row) {
                return $row->jenjang . ' - ' . $row->prodi;
            })

            ->add('jabatan_terakhir', function (Dosen $row) {
                $jabatanArray = $row->jabatan;
                if(is_array($jabatanArray) && count($jabatanArray) > 0) {
                    $jabatanTerakhir = end($jabatanArray);
                    return $jabatanTerakhir ? $jabatanTerakhir : 'Dosen';
                }
                return 'Dosen';
            })

            ->add('status_badge', function (Dosen $row) {
                $status = $row->status ?? 'Tidak Diketahui';
                if($status === 'Dosen') {
                    $label = 'Dosen PNS';
                    $color = 'bg-teal-100 text-teal-700';
                } else if($status === 'Dosen Tetap') {
                    $label = 'Dosen Tetap';
                    $color = 'bg-orange-100 text-orange-700';
                } else if($status === 'Dosen Tidak Tetap') {
                    $label = 'Dosen Tidak Tetap';
                    $color = 'bg-yellow-100 text-yellow-700';
                } else if($status === 'PPPK_Dosen') {
                    $label = 'Dosen PPPK';
                    $color = 'bg-blue-100 text-blue-700';
                } else {
                    $label = 'Dosen';
                    $color = 'bg-[#E5E5E5] text-[#808080]';
                }

                return "<span class='inline-flex items-center px-3 py-1 text-sm font-medium rounded-lg {$color}'>{$label}</span>";
            });
    }

    public function columns(): array
    {
        return [
            Column::make('No', 'id')->index(),

            Column::make('Nama Dosen', 'nama_dosen', 'nama')
                ->searchable()
                ->sortable(),

            Column::make('NIDN', 'nidn', 'nidn')
                ->searchable()
                ->sortable(),

            Column::make('Fakultas', 'unit', 'unit')
                ->sortable(),
            
            Column::make('Program Studi', 'prodi_lengkap', 'prodi')
                ->sortable(),

            Column::make('Jabatan', 'jabatan_terakhir', 'jabatan')
                ->sortable(),
            
            Column::make('Status', 'status_badge', 'status')
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        $daftarFakultas = Dosen::query()
            ->select('unit')
            ->distinct()
            ->orderBy('unit', 'asc')
            ->get();

        $daftarJabatan = Dosen::query()
            ->pluck('jabatan')
            ->flatten()
            ->filter()
            ->unique()
            ->sort()
            ->map(function ($jabatan) {
                return ['nama_jabatan' => $jabatan];
            })
            ->values();
            
        return [

            Filter::select('unit', 'unit')
                ->dataSource($daftarFakultas) 
                ->optionLabel('unit')
                ->optionValue('unit'),

            Filter::select('jabatan', 'jabatan')
                ->dataSource($daftarJabatan)
                ->optionLabel('nama_jabatan')
                ->optionValue('nama_jabatan')
                ->builder(function (Builder $query, $value) {
                    return $query->whereJsonContains('jabatan', $value);
                }),

            Filter::select('status')
                ->dataSource([
                    ['id' => 'Dosen', 'name' => 'Dosen PNS'],
                    ['id' => 'Dosen Tetap', 'name' => 'Dosen Tetap'],
                    ['id' => 'Dosen Tidak Tetap', 'name' => 'Dosen Tidak Tetap'],
                    ['id' => 'PPPK_Dosen', 'name' => 'Dosen PPPK'],
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
}
