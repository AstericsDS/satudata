<div class="flex flex-col min-h-screen mb-20">
    @vite(['resources/js/charts/profil-kepakaran-dosen.js'])
    @vite(['resources/js/charts/jumlah-publikasi.js'])

    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4 flex-grow">

        {{-- Breadcrumbs - Start --}}
        <nav class="flex justify-end mr-2 mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li>
                    <div class="flex items-center">
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary transition-all md:ms-2">
                            Kepegawaian & Administrasi Umum
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-primary">Profil & Kepakaran Dosen</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumbs - End --}}

        {{-- Main Container - Start --}}
        <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-b from-primary to-[#95F4F8]">
            {{-- Text - Start --}}
            <div class="text-white">
                <h1 class="font-semibold text-2xl">Jumlah Dosen</h1>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            {{-- Text- End --}}

            {{-- Content - Start --}}
            <div x-data="{ menu: 'grafik-dosen' }" @change-menu.window="menu = $event.detail.menu" class="mt-2">
                {{-- Menu Button --}}
                <div class="flex space-x-2 bg-white mb-4 rounded-md p-6">
                    {{-- Jumlah Dosen --}}
                    <button @click="$dispatch('change-menu', { menu: 'grafik-dosen' })" class="text-center py-3 flex-1 rounded-md font-semibold" :class="menu === 'grafik-dosen' ? 'bg-linear-to-l from-primary to to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                        Grafik Dosen
                    </button>

                    {{-- Daftar Dosen per Fakultas --}}
                    <button @click="$dispatch('change-menu', { menu: 'daftar-dosen' })" class="text-center py-3 flex-1 rounded-md font-semibold" :class="menu === 'daftar-dosen' ? 'bg-linear-to-l from-primary to to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                        Daftar Dosen per Fakultas
                    </button>
                </div>

                {{-- Grafik Dosen --}}
                <div x-show="menu === 'grafik-dosen'" class="flex gap-4 bg-white rounded-md mt-4 p-6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

                    {{-- Filter - Start --}}
                    <div class="border-1 border-[#1B1B1B]/20 p-8 rounded-md bg-white shadow-xl">
                        <div class="flex flex-col gap-6">
                            {{-- Title --}}
                            <div>
                                <div class="flex gap2 items-center mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                                        <path fill="#006569"
                                            d="M11 20q-.425 0-.712-.288T10 19v-6L4.2 5.6q-.375-.5-.112-1.05T5 4h14q.65 0 .913.55T19.8 5.6L14 13v6q0 .425-.288.713T13 20z" />
                                    </svg>
                                    <h1 class="text-primary text-2xl">
                                        Filter Data
                                    </h1>
                                </div>
                                <p class="text-gray-700">
                                    Atur data yang akan ditampilkan
                                </p>
                            </div>

                            {{-- Menu Filter --}}
                            <div
                                x-data="{
                                    jabatan_fungsional: @entangle('show_jabatan_fungsional'),
                                    pendidikan_terakhir: @entangle('show_pendidikan_terakhir'),
                                    fakultas: @entangle('show_fakultas'),
                                    prodi: @entangle('show_prodi'),
                                    gender: @entangle('show_gender'),
                                    status_kepegawaian: @entangle('show_status_kepegawaian')
                                }"
                                @clearFilter.window="
                                    jabatan_fungsional: false;
                                    pendidikan_terakhir: false;
                                    fakultas: false;
                                    prodi: false;
                                    gender: false;
                                    status_kepegawaian: false;
                                "
                                class="flex flex-col gap-4 w-[300px]"
                            >
                                {{-- Header --}}
                                <h1 class="text-gray-800 text-2xl">
                                    Kategori Data
                                </h1>

                                {{-- Menu Filter --}}
                                <ul class="flex flex-col gap-4">
                                    {{-- Jabatan Fungsional --}}
                                    {{-- <li class="transition-all flex flex-col gap-3">
                                        <label for="jabatan_fungsional" class="flex gap-2 items-center">
                                            <input
                                                id="jabatan_fungsional"
                                                type="checkbox"
                                                x-model="jabatan_fungsional"
                                                wire:model.live="show_jabatan_fungsional"
                                            >
                                            Jabatan Fungsional
                                        </label>
                                        <select
                                            wire:model.live="selected_jabatan_fungsional"
                                            x-show="jabatan_fungsional"
                                            x-transition:enter="transition ease-out duration-300"
                                            scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($jabatan_fungsional as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li> --}}

                                    {{-- Pendidikan Terakhir --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="pendidikan_terakhir" class="flex gap-2 items-center">
                                            <input
                                                id="pendidikan_terakhir"
                                                type="checkbox"
                                                x-model="pendidikan_terakhir"
                                                wire:model.live="show_pendidikan_terakhir"
                                            >
                                            Pendidikan Terakhir
                                        </label>
                                        <select
                                            wire:model.live="selected_pendidikan_terakhir"
                                            x-show="pendidikan_terakhir"
                                            x-transition:enter="transition ease-out duration-300"
                                            scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($pendidikan_terakhir as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>

                                    {{-- Fakultas --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="fakultas" class="flex gap-2 items-center">
                                            <input
                                                id="fakultas"
                                                type="checkbox"
                                                x-model="fakultas"
                                                wire:model.change="show_fakultas"
                                            >
                                            Fakultas
                                        </label>
                                        <select
                                            wire:model.change="selected_fakultas"
                                            x-show="fakultas"
                                            x-transition:enter="transition ease-out duration-300"
                                            scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($fakultas as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>

                                    {{-- Prodi --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="prodi" class="flex gap-2 items-center">
                                            <input
                                                id="prodi"
                                                type="checkbox"
                                                x-model="prodi"
                                                wire:model.change="show_prodi"
                                            >
                                            Prodi
                                        </label>
                                        <select
                                            wire:model.change="selected_prodi"
                                            x-show="prodi"
                                            x-transition:enter="transition ease-out duration-300"
                                            scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($prodi as $item)
                                                <option wire:key="{{ $item }}" value="{{ $item }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>

                                    {{-- Gender --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="gender" class="flex gap-2 items-center">
                                            <input
                                                id="gender"
                                                type="checkbox"
                                                x-model="gender"
                                                wire:model.live="show_gender"
                                            >
                                            Gender
                                        </label>
                                        <select
                                            wire:model.live="selected_gender"
                                            x-show="gender"
                                            x-transition:enter="transition ease-out duration-300"
                                            scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($gender as $item => $label)
                                                <option value="{{ $item }}">
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>

                                    {{-- Status Kepegawaian --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="status_kepegawaian" class="flex gap-2 items-center">
                                            <input
                                                id="status_kepegawaian"
                                                type="checkbox"
                                                x-model="status_kepegawaian"
                                                wire:model.live="show_status_kepegawaian"
                                            >
                                            Status Kepegawaian
                                        </label>
                                        <select
                                            wire:model.live="selected_status_kepegawaian"
                                            x-show="status_kepegawaian"
                                            x-transition:enter="transition ease-out duration-300"
                                            scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($status_kepegawaian as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>
                                </ul>
                                
                                {{-- Button --}}
                                <div class="flex gap-3 justify-end">
                                    {{-- Hapus --}}
                                    <button
                                        wire:click="deleteFilter"
                                        class="rounded-md bg-red-600 p-2 text-white hover:bg-red-700 cursor-pointer transition-all flex items-center justify-center gap-2 w-fit"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                            <path fill="#ffffff"
                                                d="M4 17q-.425 0-.712-.288T3 16t.288-.712T4 15h12q.425 0 .713.288T17 16t-.288.713T16 17zm2-4q-.425 0-.712-.288T5 12t.288-.712T6 11h12q.425 0 .713.288T19 12t-.288.713T18 13zm2-4q-.425 0-.712-.288T7 8t.288-.712T8 7h12q.425 0 .713.288T21 8t-.288.713T20 9z" />
                                        </svg>
                                        Hapus
                                    </button>

                                    {{-- Simpan --}}
                                    <button
                                        wire:click="applyFilter"
                                        class="rounded-md bg-primary p-3 text-white hover:bg-primary/90 cursor-pointer transition-all flex items-center justify-center gap-2 w-fit"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                            <path fill="#ffffff"
                                                d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h11.175q.4 0 .763.15t.637.425l2.85 2.85q.275.275.425.638t.15.762V19q0 .825-.587 1.413T19 21zm7-3q1.25 0 2.125-.875T15 15t-.875-2.125T12 12t-2.125.875T9 15t.875 2.125T12 18m-5-8h7q.425 0 .713-.288T15 9V7q0-.425-.288-.712T14 6H7q-.425 0-.712.288T6 7v2q0 .425.288.713T7 10" />
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Filter - End --}}

                    {{-- Grafik - Start --}}
                    <div class="rounded-md flex flex-col gap-4 p-6 w-full">
                        @if ($update && $update->status === 'synchronized')
                            <p class="font-light text-gray-500">
                                Data diperbarui {{ $update->updated_at->locale('id')->diffForHumans() }}
                            </p>
                        @else
                            <p class="font-light text-red-500">
                                Data Belum Sinkron
                            </p>
                        @endif
                        <div id="chart-dosen" wire:ignore></div>
                        <script>
                            document.addEventListener('livewire:init', () => {
                                const chartData = {
                                    asisten_ahli: @json($data_asisten_ahli),
                                    lektor: @json($data_lektor),
                                    lektor_kepala: @json($data_lektor_kepala),
                                    profesor: @json($data_profesor),

                                };

                                window.renderChartDosen(chartData);

                                Livewire.on('update-chart-dosen', (event) => {
                                    // Event biasanya dikirim dalam array, ambil index 0
                                    const newData = event[0];
                                    
                                    // Panggil ulang fungsi render chart dengan data baru
                                    // Asumsi: renderChartDosen di file JS kamu sudah handle destroy/update chart lama
                                    window.renderChartDosen(newData);
                                });
                            })
                        </script>
                        <div class="bg-[#EDF7F6] rounded-md p-5 text-black">
                            <h1 class="font-bold text-xl">Analisis Data</h1>
                            <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                    {{-- Grafik - End --}}
                </div>

                {{-- Tabel Dosen per Fakultas --}}
                <div x-show="menu === 'daftar-dosen'" class="flex flex-col bg-white rounded-md mt-4 p-6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <livewire:power-grid.daftar-dosen-table />
                </div>
            </div>
            {{-- Content - End --}}

            

        </div>
        {{-- Main Container - End --}}

        {{-- Modal Dosen - Start --}}
        <div id="detail-dosen" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden rounded-lg fixed inset-0 z-50 justify-center items-center w-full h-full backdrop-blur-sm bg-black/20 transition-all duration-300">  
                <div class="relative p-4 w-full max-w-[1080px] max-h-full">
                    {{-- Modal Header - Start --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg border-gray-200 bg-gradient-to-r from-[#00C7CF] to-[#006569]">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Profil Prof. Dr. Komarudin, M. Si.
                        </h3>
                        <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-dosen">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    {{-- Modal Header - End --}}

                    {{-- Modal Body - Start --}}
                    <div class="p-4 md:p-5 space-y-4 bg-white flex flex-col items-center rounded-b-lg">

                        {{-- Informasi Dosen - Start --}}
                        <div class="w-full bg-[#EDF7F6] rounded-lg p-6 shadow-sm flex flex-col lg:flex-row gap-8 items-start">
                            {{-- Foto Profil --}}
                            <div class="flex shrink-0">
                                <div class="w-full h-full rounded-full flex items-center justify-center mt-2">
                                    <img class="rounded-full w-25 h-25 object-cover" src="{{ asset('assets/images/pak-komar.jpg') }}" alt="photo profile">
                                </div>
                            </div>

                            {{-- Detail Informasi Dosen --}}
                            <div class="flex-grow space-y-4 py-2">
                                <p class="text-lg font-bold text-black mb-4">Prof. Dr. Komarudin, M. Si.</p>

                                <div class="grid grid-cols-[140px_20px_1fr] gap-y-3 text-sm md:text-base text-black">
                                    {{-- NIP --}}
                                    <p class="font-semibold">NIP</p>
                                    <p>:</p>
                                    <p>1234567890</p>

                                    {{-- Prodi --}}
                                    <p class="font-semibold">Program Studi</p>
                                    <p>:</p>
                                    <p>Pendidikan Pancasila dan Kewarganegaraan</p>

                                    {{-- Fakultas --}}
                                    <p class="font-semibold">Fakultas</p>
                                    <p>:</p>
                                    <p>Fakultas Ilmu Sosial dan Hukum</p>

                                    {{-- Pendidikan --}}
                                    <p class="font-semibold">Pendidikan</p>
                                    <p>:</p>
                                    <p>S3 - Sosiologi</p>

                                    {{-- Kepakaran --}}
                                    <p class="font-semibold">Kepakaran</p>
                                    <p>:</p>
                                    <p>Pendidikan Pancasila dan Kewarganegaraan
                                        <br>Ilmu Evaluasi Pendidikan
                                    </p>
                                </div>
                            </div>

                            {{-- Statistik SINTA --}}
                            <div class="flex-shrink-0 w-full lg:w-[400px]">
                                <div class="rounded-lg border border-gray-500 overflow-hidden">
                                    {{-- Header --}}
                                    <div class="bg-primary p-6 text-white flex justify-between items-center">
                                        {{-- Sinta Score Overall --}}
                                        <div class="flex items-center gap-3">
                                            <i class="fa-solid fa-user-circle text-4xl"></i>
                                            <div>
                                                <p class="text-sm font-semibold leading-none">299</p>
                                                <p class="text-sm opacity-90">SINTA Score Overall</p>
                                            </div>
                                        </div>

                                        {{-- Sinta Score 3Yr --}}
                                        <div class="flex items-center gap-3">
                                            <i class="fa-solid fa-user-graduate text-4xl"></i>
                                            <div>
                                                <p class="text-sm font-semibold leading-none">190</p>
                                                <p class="text-sm opacity-90">SINTA Score 3Yr</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Statistik Publikasi --}}
                                    <div class="p-6">
                                        <table class="w-full text-sm">
                                            <thead>
                                                <tr class="text-black">
                                                    <th class="text-left pb-2"></th>
                                                    <th class="text-center text-sm pb-2 font-semibold">Scopus H-Index</th>
                                                    <th class="text-center text-sm pb-2 font-semibold">Google Scholar</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-black">
                                                {{-- Article --}}
                                                <tr>
                                                    <td class="py-2 font-medium">Article</td>
                                                    <td class="text-center py-2">17</td>
                                                    <td class="text-center py-2">9</td>
                                                </tr>

                                                {{-- Citation --}}
                                                <tr>
                                                    <td class="py-2 font-medium">Citation</td>
                                                    <td class="text-center py-2">5</td>
                                                    <td class="text-center py-2">66</td>
                                                </tr>

                                                {{-- Cited Document --}}
                                                <tr>
                                                    <td class="py-2 font-medium">Cited Document</td>
                                                    <td class="text-center py-2">2</td>
                                                    <td class="text-center py-2">11</td>
                                                </tr>

                                                {{-- H-Index --}}
                                                <tr>
                                                    <td class="py-2 font-medium">H-Index</td>
                                                    <td class="text-center py-2">1</td>
                                                    <td class="text-center py-2">4</td>
                                                </tr>

                                                {{-- i10 Index --}}
                                                <tr>
                                                    <td class="py-2 font-medium">i10-Index</td>
                                                    <td class="text-center py-2">0</td>
                                                    <td class="text-center py-2">3</td>
                                                </tr>

                                                {{-- G-Index --}}
                                                <tr>
                                                    <td class="py-2 font-medium">G-Index</td>
                                                    <td class="text-center py-2">1</td>
                                                    <td class="text-center py-2">1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Informasi Dosen - End --}}

                        {{-- Data dan Grafik - Start --}}
                        <div x-data="{ graphicModal: 'data-mengajar' }" @change-graphic-modal.window="graphicModal = $event.detail.chart" class="w-full my-5 rounded-lg overflow-hidden">
                            {{-- Menu Button --}}
                            <div class="flex border-b border-gray-300 gap-4 font-semibold">
                                <button
                                @click="$dispatch('change-graphic-modal', { chart: 'data-mengajar'})"
                                class="p-2 cursor-pointer transition-all"
                                :class="graphicModal === 'data-mengajar' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"">
                                    Data Mengajar
                                </button>
                                <button
                                @click="$dispatch('change-graphic-modal', { chart: 'publikasi'})"
                                class="p-2 cursor-pointer transition-all"
                                :class="graphicModal === 'publikasi' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"">
                                    Publikasi
                                </button>
                                <button
                                @click="$dispatch('change-graphic-modal', { chart: 'penelitian'})"
                                class="p-2 cursor-pointer transition-all"
                                :class="graphicModal === 'penelitian' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"">
                                    Penelitian
                                </button>
                                <button
                                @click="$dispatch('change-graphic-modal', { chart: 'pengabdian-masyarakat'})"
                                class="p-2 cursor-pointer transition-all"
                                :class="graphicModal === 'pengabdian-masyarakat' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"">
                                    Pengabdian Masyarakat
                                </button>
                                <button
                                @click="$dispatch('change-graphic-modal', { chart: 'kekayaan-intelektual'})"
                                class="p-2 cursor-pointer transition-all"
                                :class="graphicModal === 'kekayaan-intelektual' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"">
                                    Kekayaan Intelektual
                                </button>
                            </div>

                            {{-- Data Mengajar --}}
                            <template x-if="graphicModal === 'data-mengajar'">
                                <div x-effect="if (graphicModal === 'data-mengajar') $nextTick(() => window.renderChartDataMengajar())">
                                    {{-- Chart --}}
                                    <div class="my-5 w-full p-5 rounded-lg shadow-lg">
                                        <div id="data-mengajar" class=""></div>
                                        <p class="font-light mx-5">Sumber: SINTA</p>
                                    </div>

                                    {{-- Status Bimbingan Akademik Aktif --}}
                                    <div class="mt-5 w-full">
                                        <p class="font-semibold ml-1">Bimbingan Akademik Aktif</p>
                                        <div class="bg-[#EDF7F6] rounded-lg p-5 grid grid-cols-3 gap-4 text-center mt-2">
                                            <div>
                                                <p class=" font-semibold text-primary text-lg">24</p>
                                                <p>Mahasiswa S-1</p>
                                            </div>
                                            <div>
                                                <p class=" font-semibold text-primary text-lg">8</p>
                                                <p>Mahasiswa S-2</p>
                                            </div>
                                            <div>
                                                <p class=" font-semibold text-primary text-lg">3</p>
                                                <p>Mahasiswa S-3</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            {{-- Publikasi --}}
                            <template x-if="graphicModal === 'publikasi'">
                                <div x-effect="if (graphicModal === 'publikasi') $nextTick(() => window.renderChartPublikasi())">
                                    {{-- Filter --}}
                                    <form action="" class="my-5 ml-1">
                                        <select name="" id="" class="block w-[200px] mt-1 px-3 py-2 bg-neutral border border-gray-400 rounded-lg focus:ring-primary focus:border-primary shadow-xs">
                                            <option value="scopus" selected>Scopus</option>
                                            <option value="gscholar">Google Scholar</option>
                                            <option value="garuda">Garuda</option>
                                        </select>
                                    </form>

                                    {{-- Chart --}}
                                    <div class="mb-5 w-full p-5 rounded-lg shadow-lg">              
                                        <div id="publikasi"></div>
                                        <p class="font-light mx-5">Sumber: SINTA</p>
                                    </div>

                                    {{-- 5 Publikasi Terakhir --}}
                                    <div class="mt-5 w-full">
                                        <p class="font-semibold mt-5 ml-1 mb-1">5 Publikasi Terakhir</p>
                                        <div class="w-full p-3 rounded-lg bg-[#EDF7F6]">
                                            {{-- Card --}}
                                            @for ($i = 1; $i < 6; $i++)
                                                <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                                        <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>

                                                        {{-- Detail Publikasi --}}
                                                        <div class="flex-1 pl-3">
                                                            {{-- Judul --}}
                                                            <p class="text-black font-semibold leading-tight mb-2">
                                                                Simple Distribution of Sensitive Values for Multiple Sensitive Attributes in Privacy Preserving Data Publishing to Achieve Anatomy
                                                            </p>

                                                            {{-- Penerbit --}}
                                                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                                <p>International Conference on Innovative and Creative Information Technology (ICITech) - 2021</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </template>

                            {{-- Penelitian --}}
                            <template x-if="graphicModal === 'penelitian'">
                                <div x-effect="if (graphicModal === 'penelitian') $nextTick(() => window.renderChartPenelitian())">
                                    {{-- Chart --}}
                                    <div class="my-5 w-full p-5 rounded-lg shadow-lg">
                                        <div id="penelitian"></div>
                                        <p class="font-light mx-5">Sumber: SINTA</p>
                                    </div>

                                    {{-- 5 Penelitian Terakhir --}}
                                    <div class="mt-5 w-full">
                                        <p class="font-semibold mt-5 ml-1 mb-1">5 Penelitian Terakhir</p>
                                        {{-- List --}}
                                        <div class="w-full p-3 rounded-lg bg-[#EDF7F6]">

                                            {{-- Penelitian 1 --}}
                                            <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>
                                                
                                                 {{-- Detail Penelitian --}}
                                                <div class="flex-1 pl-3">
                                                    {{-- Judul --}}
                                                    <p class="text-black font-semibold leading-tight mb-2">
                                                        Student Career Centers Measurement Scale in Higher Education
                                                    </p>

                                                    {{-- Identitas Penelitian --}}
                                                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                        {{-- Jabatan --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-user text-primary text-xs"></i>
                                                            <span>Ketua</span>
                                                        </div>

                                                        {{-- Tahun --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-calendar-days text-primary text-xs"></i>
                                                            <span>2024</span>
                                                        </div>

                                                        {{-- Modal --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-money-bill text-primary"></i>
                                                            <span>Rp 30.000.000</span>
                                                        </div>

                                                        {{-- Nama Jurnal --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-book text-primary"></i>
                                                            <span>Penelitian Kompetitif Fakultas (FE) (PK-FP)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                    {{-- Badge --}}
                                                    <span class="bg-[#D7EFEA] text-primary dark:bg-green-900 dark:text-green-300 font-medium inline-flex items-center px-3 py-1 text-sm rounded-lg">
                                                        Disetujui
                                                    </span>
                                            </div>

                                            {{-- Penelitian 2 --}}
                                            <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>
                                                
                                                 {{-- Detail Penelitian --}}
                                                <div class="flex-1 pl-3">
                                                    {{-- Judul --}}
                                                    <p class="text-black font-semibold leading-tight mb-2">
                                                        Model Kolaborasi Tri-Pusat Pendidikan Tinggi dalam Mendukung Kewirausahaan Berkelanjutan di Kalangan Wirausaha Muda
                                                    </p>

                                                    {{-- Identitas Penelitian --}}
                                                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                        {{-- Jabatan --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-user text-primary text-xs"></i>
                                                            <span>Anggota</span>
                                                        </div>

                                                        {{-- Tahun --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-calendar-days text-primary text-xs"></i>
                                                            <span>2024</span>
                                                        </div>

                                                        {{-- Modal --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-money-bill text-primary"></i>
                                                            <span>Rp 125.740.000</span>
                                                        </div>

                                                        {{-- Nama Jurnal --}}
                                                        <div class="flex items-center gap-1.5">
                                                            <i class="fa-solid fa-book text-primary"></i>
                                                            <span>Penelitian Kompetitif Nasional (PFR)</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                    {{-- Badge --}}
                                                    <span class="bg-[#D7EFEA] text-primary dark:bg-green-900 dark:text-green-300 font-medium inline-flex items-center px-3 py-1 text-sm rounded-lg">
                                                        Disetujui
                                                    </span>
                                            </div>

                                            {{-- Penelitian 3 --}}
                                            <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>

                                                        {{-- Detail Publikasi --}}
                                                        <div class="flex-1 pl-3">
                                                            {{-- Judul --}}
                                                            <p class="text-black font-semibold leading-tight mb-2">
                                                                Rotenoid Derivatives from Amorpha fruticosa: In vitro and In Silico Studies against Tyrosine Kinase Receptors
                                                            </p>

                                                            {{-- Penerbit --}}
                                                            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                                <p>International Conference on Innovative and Creative Information Technology (ICITech) - 2021</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </template>

                            {{-- Pengabdian Masyarakat --}}
                            <template x-if="graphicModal === 'pengabdian-masyarakat'">
                                <div class="mt-5 w-full">
                                    <div class="w-full p-3 rounded-lg bg-[#EDF7F6]">
                                        {{-- Card --}}
                                        @for ($i = 1; $i < 4; $i++)
                                            <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>

                                                    {{-- Detail Pengabidan Masyarakat --}}
                                                    <div class="flex-1 pl-3">
                                                        {{-- Judul --}}
                                                        <p class="text-black font-semibold leading-tight mb-2">
                                                            Workshop Pengembangan Media Pembelajaran Digital
                                                        </p>

                                                        {{-- Tahun --}}
                                                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                            <p>2023 - Ketua Tim</p>
                                                        </div>
                                                    </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </template>

                            {{-- Kekayaan Intelektual --}}
                            <template x-if="graphicModal === 'kekayaan-intelektual'">
                                <div class="mt-5 w-full">
                                    <div class="w-full p-3 rounded-lg bg-[#EDF7F6]">
                                        {{-- Card --}}
                                        @for ($i = 1; $i < 3; $i++)
                                            <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>

                                                    {{-- Detail Kekayaan Intelektual --}}
                                                    <div class="flex-1 pl-3">
                                                        {{-- Judul --}}
                                                        <p class="text-black font-semibold leading-tight mb-2">
                                                            Metode Pembelajaran Adaptif Berbasis AI
                                                        </p>

                                                        {{-- Detail Paten --}}
                                                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                                            <p>Paten - No: ID0123456 (2021)</p>
                                                        </div>
                                                    </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </template>
                        </div>
                        {{-- Data dan Grafik - End --}}
                        
                    </div>
                    {{-- Modal Body - End --}}
                </div>
            </div>
        </div>
        {{-- Modal Dosen - End --}}

    </div>
</div>
