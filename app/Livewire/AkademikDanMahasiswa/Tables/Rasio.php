<?php

namespace App\Livewire\AkademikDanMahasiswa\Tables;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport; 
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable;

final class Rasio extends PowerGridComponent
{
    use WithExport; 
    public string $tableName = 'rasio-sy8fkb-table';
    private $yearRange;
    public function __construct()
    {
        $month = now()->month;
        $year = $month >= 10 ? now()->year : now()->year - 1;
        for ($i = $year - 7; $i <= $year; $i++) {
            $this->yearRange[] = "{$i}/" . ($i + 1) . "%";
        }
    }
    private function gcd(int $a, int $b): int
    {
        while ($b !== 0) {
            [$a, $b] = [$b, $a % $b];
        }
        return $a;
    }

    public function datasource(): Collection
    {
        $program_studi = Mahasiswa::distinct()
            ->pluck('program_studi')
            ->intersect(
                Dosen::distinct()->pluck('prodi')
            )
            ->values();

        $dosen = Dosen::select('prodi', 'unit')
            ->selectRaw('COUNT(*) as jumlah_dosen')
            ->groupBy('prodi', 'unit')
            ->get()
            ->keyBy('prodi');

        $mahasiswa = Mahasiswa::select('program_studi', 'jenjang')
            ->where(function ($q) {
                foreach ($this->yearRange as $range) {
                    $q->orWhere('periode_masuk', 'LIKE', $range);
                }
            })
            ->selectRaw('COUNT(*) as jumlah_mahasiswa')
            ->groupBy('program_studi', 'jenjang')
            ->get()
            ->keyBy('program_studi');

        return $program_studi->map(function ($prodi) use ($dosen, $mahasiswa) {
            $jumlahDosen = $dosen[$prodi]->jumlah_dosen ?? 0;
            $jumlahMahasiswa = $mahasiswa[$prodi]->jumlah_mahasiswa ?? 0;
            $rasio = null;
            if ($jumlahDosen > 0 && $jumlahMahasiswa > 0) {
                $gcd = $this->gcd($jumlahDosen, $jumlahMahasiswa);
                $rasio = ($jumlahDosen / $gcd) . ' : ' . ($jumlahMahasiswa / $gcd);
            }
            return [
                'id' => uniqid(),
                'program_studi' => $prodi,
                'fakultas' => $dosen[$prodi]->unit ?? null,
                'jenjang' => $mahasiswa[$prodi]->jenjang ?? null,
                'jumlah_dosen' => $jumlahDosen,
                'jumlah_mahasiswa' => $jumlahMahasiswa,
                'rasio' => $rasio,
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
            PowerGrid::exportable(fileName: 'Satu Data - Rasio Dosen dan Mahasiswa') 
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('program_studi')
            ->add('fakultas')
            ->add('jenjang')
            ->add('jumlah_dosen')
            ->add('jumlah_mahasiswa')
            ->add('rasio');
    }

    public function columns(): array
    {
        return [
            Column::make('Fakultas', 'fakultas')->searchable()->sortable(),
            Column::make('Program Studi', 'program_studi')->searchable()->sortable(),
            Column::make('Jenjang', 'jenjang')->searchable()->sortable(),
            Column::make('Jumlah Dosen', 'jumlah_dosen')->searchable()->sortable(),
            Column::make('Jumlah Mahasiswa', 'jumlah_mahasiswa')->searchable()->sortable(),
            Column::make('Rasio Dosen : Mahasiswa', 'rasio'),
        ];
    }
}
