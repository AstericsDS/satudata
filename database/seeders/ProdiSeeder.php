<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $token = env('SIAKAD_TOKEN');
        $api_url = env('SIAKAD_BASE_URL') . '/programStudi/all';

        $response = Http::withToken($token)->timeout(60000)->get($api_url);
        $list_prodi = $response->json()['isi'];

        foreach($list_prodi as $prodi) {
            $fakultas = Fakultas::firstOrCreate(
                ['kode_fakultas' => $prodi['kodeFakProdi']],
                ['nama_fakultas' => $prodi['namaFakultas'], 'singkatan_fakultas' => '']
            );

            $nama_prodi = ucwords(strtolower($prodi['namaProdi']));
            $jenjang = strtoupper($prodi['jenjangProdi']);
            $nama_prodi_lengkap = $jenjang . ' - ' . $nama_prodi;

            Prodi::updateOrCreate(
                ['kode_prodi' => $prodi['kodeProdi']],
                [
                    'kode_prodi_dikti' => $prodi['prodi_dikti'],
                    // 'nama_prodi' => $prodi['namaProdi'],
                    'nama_prodi' => $nama_prodi,
                    'jenjang_prodi' => $prodi['jenjangProdi'],
                    'nama_prodi_lengkap' => $nama_prodi_lengkap,
                    'fakultas_id' => $fakultas->id
                ]
            );
        }
    }
}