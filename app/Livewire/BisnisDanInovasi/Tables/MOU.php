<?php

namespace App\Livewire\BisnisDanInovasi\Tables;

use App\Models\Kerjasama;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MOU extends PowerGridComponent
{
    public string $tableName = 'm-o-u-bohi8f-table';
    public string $filtersPosition = 'header';

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
        return Kerjasama::query()->where('jenis_dokumen', 'Memorandum of Understanding (MoU)');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nama_partner')
            ->add('kategori')
            ->add('tanggal_awal_formatted', fn(Kerjasama $model) => Carbon::parse($model->tanggal_awal)->locale('ID')->translatedFormat('j F Y'))
            ->add('tanggal_akhir_formatted', fn(Kerjasama $model) => Carbon::parse($model->tanggal_akhir)->locale('ID')->translatedFormat('j F Y'))
            ->add('status');
    }

    public function columns(): array
    {
        return [
            Column::make('Nama partner', 'nama_partner')
                ->sortable()
                ->searchable(),

            Column::make('Kategori', 'kategori')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal Awal', 'tanggal_awal_formatted', 'tanggal_awal')
                ->sortable()
                ->searchable(),

            Column::make('Tanggal Akhir', 'tanggal_akhir_formatted', 'tanggal_akhir')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('tanggal_awal')
                ->params([
                    'enableTime' => false,
                    'dateFormat' => 'j F Y',
                ]),
        ];
    }
}
