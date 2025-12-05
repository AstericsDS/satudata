<?php

namespace App\Livewire\BisnisDanInovasi;

use App\Models\Kerjasama;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class KemitraanTableAll extends PowerGridComponent
{
    public string $tableName = 'kemitraan-table-all-ktbyr5-table';

    public function setUp(): array
    {
        $this->showCheckBox();

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
        return Kerjasama::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('id')
            ->add('tahun')
            ->add('nama_kerjasama')
            ->add('nama_partner')
            ->add('klasifikasi')
            ->add('negara')
            ->add('tanggal_awal_formatted', fn (Kerjasama $model) => Carbon::parse($model->tanggal_awal)->format('d/m/Y'))
            ->add('tanggal_akhir_formatted', fn (Kerjasama $model) => Carbon::parse($model->tanggal_akhir)->format('d/m/Y'))
            ->add('status')
            ->add('jenis_dokumen')
            ->add('unit')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Tahun', 'tahun')
                ->sortable()
                ->searchable(),

            Column::make('Nama kerjasama', 'nama_kerjasama')
                ->sortable()
                ->searchable(),

            Column::make('Nama partner', 'nama_partner')
                ->sortable()
                ->searchable(),

            Column::make('Klasifikasi', 'klasifikasi')
                ->sortable()
                ->searchable(),

            Column::make('Negara', 'negara')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal awal', 'tanggal_awal_formatted', 'tanggal_awal')
                ->sortable(),

            Column::make('Tanggal akhir', 'tanggal_akhir_formatted', 'tanggal_akhir')
                ->sortable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Jenis dokumen', 'jenis_dokumen')
                ->sortable()
                ->searchable(),

            Column::make('Unit', 'unit')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('tanggal_awal'),
            Filter::datepicker('tanggal_akhir'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Kerjasama $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
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
