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

            ->add('golongan')

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

            Column::make('Golongan', 'golongan', 'golongan')
                ->sortable(),

            Column::make('Status', 'status_badge', 'status_kepegawaian')
                ->sortable(),

            // Column::action('Aksi'),
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
    //         Button::add('view')
    //             ->slot('
    //                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
    //                     <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
    //                 </svg>')
    //             ->class('bg-primary hover:bg-primary/90 text-white px-2 py-1.5 rounded-md transition duration-200 ease-in-out')
    //             ->dispatch('open-modal-detail', [
    //                 'nama_lengkap' => ($row->gelar_depan ? $row->gelar_depan . ' ' : '') . $row->nama . ($row->gelar_belakang ? ', ' . $row->gelar_belakang : ''),
    //                 'nip' => $row->nip,
    //                 'unit' => filled($row->unit_kerja) ? $row->unit_kerja : $row->homebase,
    //                 // 'jabatan' => $row->jabatan_fungsional ?? '-', // Pastikan kolom ini ada di DB atau sesuaikan
    //                 'status' => $row->status_kepegawaian ?? '-',
    //                 // 'pangkat' => $row->pangkat ?? '-', // Sesuaikan dengan nama kolom di DB
    //                 'golongan' => $row->golongan ?? '-', // Sesuaikan dengan nama kolom di DB
    //                 // 'pendidikan' => $row->pendidikan_terakhir ?? '-', // Sesuaikan dengan nama kolom di DB
    //                 'foto' => asset('assets/images/unj.png'), // Atau $row->foto jika ada upload
    //             ])
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
