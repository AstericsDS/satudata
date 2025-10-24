@vite(['resources/js/dashboardChart.js'])

<div class="mb-20">

    {{-- Header Data --}}
    <div class="flex justify-center gap-8 my-8 mx-44">

        {{-- Wisudawan --}}
        <div class="flex-1 px-6 py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/wisudawan.svg') }}" alt="Wisudawan 2025" class="w-10">
                <div class="flex items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">2222</span>
                    <span class="font-semibold ">Wisudawan 2025</span>
                </div>
            </div>
            <div class="w-fit mx-auto">`
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">+9%</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>

        {{-- Mahasiswa --}}
        <div class="flex-1 px-6 py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/mahasiswa.svg') }}" alt="Mahasiswa" class="w-10">
                <div class="flex items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">2222</span>
                    <span class="font-semibold ">Mahasiswa</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">+4%</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>

        {{-- Dosen --}}
        <div class="flex-1 px-6 py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/dosen.svg') }}" alt="Dosen" class="w-10">
                <div class="flex items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">2222</span>
                    <span class="font-semibold ">Dosen</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">+41%</span>
                <span class="text-gray-600 ml-2">Kualifikasi S3</span>
            </div>
        </div>

        {{-- Peminat --}}
        <div class="flex-1 px-6 py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/peminat.svg') }}" alt="Peminat 2025" class="w-10">
                <div class="flex items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">2222</span>
                    <span class="font-semibold ">Peminat 2025</span>
                </div>
            </div>
            <div class="w-fit mx-auto">
                <span class="bg-unj rounded-lg text-white font-semibold p-[2px] px-[7px]">-7%</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>
    </div>

    {{-- Main Chart --}}
    <div x-data="{ active: 0, total: 4 }" x-init="active = 0; setInterval(() => active = (active + 1) % total, 10000)" @change-chart.window="active = $event.detail.id" class="bg-linear-to-b from-unj from-20% to-[#95F4F8] w-[65%] mx-auto rounded-md flex flex-col gap-4 px-4 pb-8 justify-center">

        {{-- Mahasiswa Angkatan --}}
        <div x-show="active === 0" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            {{-- Header --}}
            <div class="p-4 text-white text-center">
                <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>
                <h2>Data diperbarui 10 jam yang lalu</h1>
            </div>

            {{-- Chart --}}
            <div id="mahasiswa-angkatan" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
        </div>

        {{-- Mahasiswa Fakultas --}}
        <div x-show="active === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            {{-- Header --}}
            <div class="p-4 text-white text-center">
                <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Fakultas</h1>
                <h2>Data diperbarui 10 jam yang lalu</h1>
            </div>

            {{-- Chart --}}
            <div id="mahasiswa-fakultas" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
        </div>

        {{-- Mahasiswa Jenjang --}}
        <div x-show="active === 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            {{-- Header --}}
            <div class="p-4 text-white text-center">
                <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Jenjang</h1>
                <h2>Data diperbarui 10 jam yang lalu</h1>
            </div>
        
            {{-- Chart --}}
            <div id="mahasiswa-jenjang" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
        </div>

        {{-- Peminat --}}
        <div x-show="active === 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            {{-- Header --}}
            <div class="p-4 text-white text-center">
                <h1 class="font-semibold">Jumlah Peminat per-Tahun</h1>
                <h2>Data diperbarui 10 jam yang lalu</h1>
            </div>
        
            {{-- Chart --}}
            <div id="peminat" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
        </div>

    </div>

    {{-- Menu Chart --}}
    <div class="border border-unj rounded-md w-[95%] mx-auto my-8 p-6">

        <h1 class="text-center font-semibold mb-8">DATA MAHASISWA</h1>

        {{-- Submenu Chart --}}
        <div x-data class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

            <div @click="$dispatch('change-chart', { id: 0 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>
                    <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                </div>
                <div class="bg-white m-4 mt-0 rounded-lg p-4">
                    <div id="mahasiswa-angkatan-small"></div>
                </div>
            </div>

            <div @click="$dispatch('change-chart', { id: 1 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Fakultas</h1>
                    <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                </div>
                <div class="bg-white m-4 mt-0 rounded-lg p-4">
                    <div id="mahasiswa-fakultas-small"></div>
                </div>
            </div>

            <div @click="$dispatch('change-chart', { id: 2 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Jenjang</h1>
                    <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                </div>
                <div class="bg-white m-4 mt-0 rounded-lg p-4">
                    <div id="mahasiswa-jenjang-small"></div>
                </div>
            </div>

            <div @click="$dispatch('change-chart', { id: 3 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Peminat per-Tahun</h1>
                    <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                </div>
                <div class="bg-white m-4 mt-0 rounded-lg p-4">
                    <div id="peminat-small"></div>
                </div>
            </div>

        </div>
    </div>

</div>

<script>
    window.chartData = {
        jumlah_mahasiswa_diterima: @json($jumlah_mahasiswa_diterima),
        jumlah_mahasiswa: @json($jumlah_mahasiswa),

        jumlah_mahasiswa_s1: @json($jumlah_mahasiswa_s1 ?? 0),
        jumlah_mahasiswa_s2: @json($jumlah_mahasiswa_s2 ?? 0),
        jumlah_mahasiswa_s3: @json($jumlah_mahasiswa_s3 ?? 0),
        jumlah_mahasiswa_d4: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_d4'] ?? 0),

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
