<?php

namespace App\Livewire\PowerGrid;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use App\Models\Tendik;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class TemukanPegawaiTable extends PowerGridComponent
{
    public string $tableName = 'temukanPegawaiTable';
    public string $primaryKey = 'id_table';

    public function setUp(): array
    {

        return [
            PowerGrid::header()
                ->showSearchInput(),

            // PowerGrid::footer()
            //     ->showPerPage(10, [10, 20, 30, 40, 50])
            //     ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        if (empty($this->search)) {
        return DB::table('tendik')
            ->selectRaw("
                0 as id,
                '' as nama,
                '' as nip,
                '' as unit_kerja,
                '' as cabang,
                '' as status_kepegawaian
            ")
            ->whereRaw('1 = 0');
        }

        $search = '%' . $this->search . '%';

        $tendik = DB::table('tendik')
            ->selectRaw("
                id,
                CONCAT(
                    IFNULL(CONCAT(gelar_depan), ''),
                    nama,
                    IFNULL(CONCAT(gelar_belakang), '')
                ) AS nama,
                nip AS nip,
                unit_kerja AS unit_kerja,
                CASE
                    WHEN status_kepegawaian = 'PPPK_Tendik' THEN 'Tendik PPPK'
                    WHEN status_kepegawaian = 'Pegawai' THEN 'Tendik PNS'
                    ELSE status_kepegawaian
                END AS status_kepegawaian,
                'Tendik' AS cabang
            ")
            ->where(function ($q) use ($search) {
                $q->where('nama', 'like', $search)
                ->orWhere('nip', 'like', $search);
            });


        $dosen = DB::table('dosen')
            ->selectRaw("
                id,
                CONCAT(
                    IFNULL(CONCAT(gelar_depan, ' '), ''),
                    nama,
                    IFNULL(CONCAT(gelar_belakang), '')
                ) AS nama,
                nip AS nip,
                unit AS unit_kerja,
                CASE
                    WHEN status = 'Dosen' THEN 'Dosen PNS'
                    WHEN status = 'PPPK_Dosen' THEN 'Dosen PPPK'
                    ELSE status
                END AS status_kepegawaian,
                'Dosen' AS cabang
            ")
            ->where(function ($q) use ($search) {
                $q->where('nama', 'like', $search)
                ->orWhere('nip', 'like', $search);
            });

        return $tendik->unionAll($dosen);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nama')
            ->add('nip')
            ->add('unit_kerja')
            ->add('cabang')
            ->add('status_kepegawaian');
    }

    public function columns(): array
    {
        return [
            Column::make('No', 'id')
                ->index(),

            Column::make('Nama', 'nama')
                ->searchable()
                ->sortable(),

            Column::make('NIP', 'nip')
                ->searchable()
                ->sortable(),

             Column::make('Unit Kerja', 'unit_kerja')
                ->sortable(),

            Column::make('Cabang', 'cabang')
                ->sortable(),

            Column::make('Status', 'status_kepegawaian')
                ->sortable(),
        ];
    }

    public function noDataLabel(): string|View
    {
        $text = !empty($this->search)
            ? 'Data pegawai tidak ditemukan.'
            : 'Silakan ketik Nama atau NIP di kolom pencarian untuk menampilkan data.';

        // Kembalikan sebagai Blade Render agar bisa diberi style 'text-center'
        return \Illuminate\Support\Facades\Blade::render('
            <div class="w-full text-center items-center mt-1.5">
                <span class="font-semibold text-gray-600">
                    {{ $text }}
                </span>
            </div>
        ', ['text' => $text]);
    }

    // public function filters(): array
    // {
    //     return [
    //         Filter::inputText('name'),
    //         Filter::datepicker('created_at_formatted', 'created_at'),
    //     ];
    // }

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
