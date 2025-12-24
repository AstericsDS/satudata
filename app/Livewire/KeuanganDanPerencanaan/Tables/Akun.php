<?php

namespace App\Livewire\KeuanganDanPerencanaan\Tables;

use App\Models\Anggaran;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class Akun extends PowerGridComponent
{
    public string $tableName = 'akunTable';

    public function datasource(): Collection
    {
        $data = Anggaran::where('data_scope', 'akun')->get();
        return $data->map(function($item, $key) {
            return [
                'id' => $item->id,
                'akun_belanja' => $item->nama,
                'total_anggaran' => $item->pagu_total,
                'realisasi' => $item->pagu_realisasi,
                'sisa_anggaran' => $item->pagu_sisa,
                'persentase' => $item-> pagu_total > 0 ? number_format($item->pagu_realisasi / $item->pagu_total * 100, 2) : 0
            ];
        });
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
            ->add('akun_belanja')
            ->add('total_anggaran', function($row) {
                return 'Rp' . number_format($row->total_anggaran, 0, ',', '.');
            })
            ->add('realisasi', function($row) {
                return 'Rp' . number_format($row->realisasi, 0, ',', '.');
            })
            ->add('sisa_anggaran', function($row) {
                return 'Rp' . number_format($row->sisa_anggaran, 0, ',', '.');
            })
            ->add('persentase', function($row) {
                if ($row->persentase <= 60) {
                    $color = 'text-red-700';
                } elseif ($row->persentase > 60 && $row->persentase <= 75) {
                    $color = 'text-primary-2';
                } else {
                    $color = 'text-primary';
                }
                return "<span class='{$color} font-semibold'>{$row->persentase}%</span>";
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Akun Belanja', 'akun_belanja')
                ->searchable()
                ->sortable(),
            Column::make('Total Anggaran', 'total_anggaran')
                ->searchable()
                ->sortable(),
            Column::make('Realisasi', 'realisasi')
                ->searchable()
                ->sortable(),
            Column::make('Sisa Anggaran', 'sisa_anggaran')
                ->searchable()
                ->sortable(),
            Column::make('Persentase', 'persentase')
                ->searchable()
                ->sortable(),
        ];
    }
}
