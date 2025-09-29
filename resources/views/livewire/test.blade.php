<div>

    {{-- Header Data --}}
    <div class="flex justify-center gap-8 my-8 mx-24">

        {{-- Wisudawan --}}
        <div class="flex-1 py-5 px-6 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center">
                <img src="{{ asset('assets/dashboard/wisudawan.svg') }}" alt="Wisudawan 2025">
                <div class="flex items-center ml-4 gap-2">
                    <span class="font-bold text-3xl">2222</span>
                    <span class="font-semibold text-lg">Wisudawan 2025</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">+9%</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>

        {{-- Mahasiswa --}}
        <div class="flex-1 py-5 px-6 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center">
                <img src="{{ asset('assets/dashboard/mahasiswa.svg') }}" alt="Mahasiswa">
                <div class="flex items-center ml-4 gap-2">
                    <span class="font-bold text-3xl">2222</span>
                    <span class="font-semibold text-lg">Mahasiswa</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">+4%</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>

        {{-- Dosen --}}
        <div class="flex-1 py-5 px-6 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center">
                <img src="{{ asset('assets/dashboard/dosen.svg') }}" alt="Dosen">
                <div class="flex items-center ml-4 gap-2">
                    <span class="font-bold text-3xl">2222</span>
                    <span class="font-semibold text-lg">Dosen</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">+41%</span>
                <span class="text-gray-600 ml-2">Kualifikasi S3</span>
            </div>
        </div>

        {{-- Peminat --}}
        <div class="flex-1 py-5 px-6 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center">
                <img src="{{ asset('assets/dashboard/peminat.svg') }}" alt="Peminat 2025">
                <div class="flex items-center ml-4 gap-2">
                    <span class="font-bold text-3xl">2222</span>
                    <span class="font-semibold text-lg">Peminat 2025</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">-7%</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>
    </div>

    <div class="bg-linear-to-b from-unj from-20% to-[#95F4F8] w-[65%] mx-auto rounded-md flex flex-col gap-4 px-4 pb-8 justify-center">

        {{-- Header --}}
        <div class="p-4 text-white text-center">
            <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>
            <h2>Data diperbarui 10 jam yang lalu</h1>
        </div>

        {{-- Chart --}}
        <div id="angkatan" class="text-black bg-white w-[95%] mx-auto"></div>

    </div>

    <script>
        window.chartData = {
            jumlah_mahasiswa_diterima: @json($jumlah_mahasiswa_diterima),
            jumlah_mahasiswa: @json($jumlah_mahasiswa),
    
            jumlah_mahasiswa_d4: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_d4'] ?? 0),
            jumlah_mahasiswa_s1: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s1'] ?? 0),
            jumlah_mahasiswa_s2: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s2'] ?? 0),
            jumlah_mahasiswa_s3: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s3'] ?? 0),
    
            jumlah_dosen_s2: @json($data->dosen_berdasarkan_pendidikan['jumlah_dosen_s2'] ?? 0),
            jumlah_dosen_s3: @json($data->dosen_berdasarkan_pendidikan['jumlah_dosen_s3'] ?? 0),
    
            jumlah_dosen_plp: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_plp'] ?? 0),
            jumlah_dosen_asisten: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_asisten'] ?? 0),
            jumlah_dosen_lektor: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_lektor'] ?? 0),
            jumlah_dosen_lektor_kepala: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_lektor_kepala'] ?? 0),
            jumlah_dosen_profesor: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_profesor'] ?? 0),
    
            jumlah_dosen_pns: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_pns'] ?? 0),
            jumlah_dosen_pppk: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_pppk'] ?? 0),
            jumlah_dosen_tetap: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_tetap'] ?? 0),
            jumlah_dosen_tidak_tetap: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_tidak_tetap'] ?? 0),
    
            jumlah_dosen_pascasarjana: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_pascasarjana'] ?? 0),
            jumlah_dosen_fip: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fip'] ?? 0),
            jumlah_dosen_fbs: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fbs'] ?? 0),
            jumlah_dosen_fmipa: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fmipa'] ?? 0),
            jumlah_dosen_fish: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fish'] ?? 0),
            jumlah_dosen_ft: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_ft'] ?? 0),
            jumlah_dosen_fikk: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fikk'] ?? 0),
            jumlah_dosen_feb: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_feb'] ?? 0),
            jumlah_dosen_fpsi: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fpsi'] ?? 0),
            jumlah_dosen_ppg: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_ppg'] ?? 0),
        };
    </script>
</div>
