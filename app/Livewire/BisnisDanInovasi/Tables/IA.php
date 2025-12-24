<?php

namespace App\Livewire\BisnisDanInovasi\Tables;

use App\Models\Kerjasama;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class IA extends PowerGridComponent
{
    public string $tableName = 'i-a-wbhsup-table';

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
        return Kerjasama::query()->where('jenis_dokumen', 'Implementation Arrangement (IA)');
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
            ->add('status', function (Kerjasama $row) {
                switch ($row->status) {
                    case 'Aktif':
                        $class = 'bg-green-100 text-green-800';
                        break;
                    case 'Tidak Aktif':
                        $class = 'bg-red-100 text-red-800';
                        break;
                    case 'Kadaluarsa':
                        $class = 'bg-yellow-100 text-yellow-800';
                        break;
                    case 'Dalam Pengajuan':
                        $class = 'bg-blue-100 text-blue-800';
                        break;
                    case 'Dalam Perpanjangan':
                        $class = 'bg-indigo-100 text-indigo-800';
                        break;
                    default:
                        $class = 'bg-gray-100 text-gray-800';
                }
                return "<span class='p-3 inline-flex rounded-lg text-sm {$class}'>{$row->status}</span>";
            });
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

            Column::make('Tanggal awal', 'tanggal_awal_formatted', 'tanggal_awal')
                ->sortable(),

            Column::make('Tanggal akhir', 'tanggal_akhir_formatted', 'tanggal_akhir')
                ->sortable(),

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
