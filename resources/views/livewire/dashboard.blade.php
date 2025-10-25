@vite(['resources/js/dashboardChart.js'])
@vite(['resources/css/dashboardChart.css'])

<div class="mb-20">
    <p class="italic text-center">Sementara, sebagian data bukan data sebenarnya</p>
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

    <div x-data="{
        active: 0,
        total: 8,
        auto: true,
        intervalId: null,
    
        start() {
            if (this.intervalId) clearInterval(this.intervalId);
            this.intervalId = setInterval(() => {
                this.active = (this.active + 1) % this.total;
            }, 10000);
        },
        stop() {
            if (this.intervalId) clearInterval(this.intervalId);
        }
    }" x-effect="auto ? start() : stop()">

        <div class="w-[65%] mx-auto text-end">
            <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" value="true" class="sr-only peer" checked x-model="auto">
                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-unj"></div>
                <span class="ms-3 text-sm font-medium text-gray-800">Ganti Otomatis</span>
            </label>
        </div>
        
        {{-- Main Chart --}}
        <div @change-chart.window="active = $event.detail.id" class="group relative bg-linear-to-b from-unj from-20% to-[#95F4F8] w-[65%] mx-auto rounded-md flex flex-col gap-4 px-4 pb-8 justify-center">

            {{-- Change Button --}}
            <button @click="active = (active >= 0 && active <= 3) ? 4 : 0" class="absolute top-[50%] -left-14 text-unj opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M11.8 13H15q.425 0 .713-.288T16 12t-.288-.712T15 11h-3.2l.9-.9q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275l-2.6 2.6q-.3.3-.3.7t.3.7l2.6 2.6q.275.275.7.275t.7-.275t.275-.7t-.275-.7zm.2 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
            </button>

            {{-- Change Button --}}
            <button @click="active = (active >= 0 && active <= 3) ? 4 : 0" class="absolute top-[50%] -right-14 text-unj opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="m12.2 13l-.9.9q-.275.275-.275.7t.275.7t.7.275t.7-.275l2.6-2.6q.3-.3.3-.7t-.3-.7l-2.6-2.6q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7l.9.9H9q-.425 0-.712.288T8 12t.288.713T9 13zm-.2 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/></svg>
            </button>

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

            {{-- Dosen Berdasarkan Pendidikan --}}
            <div x-show="active === 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Pendidikan</h1>
                    <h2>Data diperbarui 10 jam yang lalu</h1>
                </div>

                {{-- Chart --}}
                <div id="dosen-pendidikan" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Dosen Berdasarkan Jabatan Fungsional --}}
            <div x-show="active === 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Jabatan Fungsional</h1>
                    <h2>Data diperbarui 10 jam yang lalu</h1>
                </div>

                {{-- Chart --}}
                <div id="dosen-jabatan" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Dosen Berdasarkan Fakultas --}}
            <div x-show="active === 6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Fakultas</h1>
                    <h2>Data diperbarui 10 jam yang lalu</h1>
                </div>

                {{-- Chart --}}
                <div id="dosen-fakultas" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Dosen Berdasarkan Status Kepegawaian --}}
            <div x-show="active === 7" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Status Kepegawaian</h1>
                    <h2>Data diperbarui 10 jam yang lalu</h1>
                </div>

                {{-- Chart --}}
                <div id="dosen-kepegawaian" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

        </div>

        {{-- Menu Chart --}}
        <div class="border border-unj rounded-md w-[95%] mx-auto my-8 p-6">

            <h1 class="text-center font-semibold mb-8">DATA MAHASISWA</h1>

            {{-- Submenu Chart --}}
            <div x-data>

                <div x-show="active >= 0 && active <= 3" class="grid grid-cols-4 gap-6">
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

                <div x-show="active >= 4 && active <= 7" class="grid grid-cols-4 gap-6">

                    <div @click="$dispatch('change-chart', { id: 4 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold">Dosen Berdasarkan Pendidikan</h1>
                            <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full">
                            <div id="dosen-pendidikan-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 5 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold">Dosen Berdasarkan Jabatan Fungsional</h1>
                            <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full">
                            <div id="dosen-jabatan-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 6 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold">Dosen Berdasarkan Fakultas</h1>
                            <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full">
                            <div id="dosen-fakultas-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 7 })" class="bg-gradient-to-b from-unj from-20% to-[#95F4F8] rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold">Dosen Berdasarkan Status Kepegawaian</h1>
                            <h2 class="">Data diperbarui 10 jam yang lalu</h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full">
                            <div id="dosen-kepegawaian-small"></div>
                        </div>
                    </div>
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
