<div class="flex flex-col min-h-screen mb-8">
    @vite(['resources/js/charts/jumlah-tenaga-kependidikan.js'])
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4 flex-grow">

        {{-- Breadcrumbs - Start --}}
        <nav class="flex justify-end mr-2 mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li>
                    <div class="flex items-center">
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-primary transition-all md:ms-2">
                            Kepegawaian dan Administrasi Umum
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
                        <span class="ms-1 text-sm font-medium text-primary">Jumlah Tenaga Kependidikan</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumbs - End --}}

        {{-- Main Container - Start --}}
        <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-b from bg-primary to-[#95F4F8]">
            {{-- Text - Start --}}
            <div class="text-white">
                <h1 class="font-semibold text-2xl">Jumlah Tenaga Kependidikan</h1>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            {{-- Text - End --}}

            {{-- Content - Start --}}
            <div x-data="{ menu: 'grafik-tenaga-kependidikan' }" @change-menu.window="menu = $event.detail.menu"
                class="mt-2">
                {{-- Menu Button --}}
                <div class="flex space-x-2 bg-white mb-4 rounded-md p-6">
                    {{-- Grafik Tenaga Kependidikan --}}
                    <button @click="$dispatch('change-menu', { menu: 'grafik-tenaga-kependidikan' })"
                        class="text-center py-3 flex-1 rounded-md font-semibold"
                        :class="menu === 'grafik-tenaga-kependidikan' ? 'bg-linear-to-l from-primary to to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                        Grafik Tenaga Kependidikan
                    </button>

                    {{-- Daftar Tenaga Kependidikan per Unit --}}
                    <button @click="$dispatch('change-menu', { menu: 'daftar-tendik' })"
                        class="text-center py-3 flex-1 rounded-md font-semibold"
                        :class="menu === 'daftar-tendik' ? 'bg-linear-to-l from-primary to to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                        Daftar Tenaga Kependidikan
                    </button>
                </div>

                {{-- Grafik Tenaga Kependidikan --}}
                <div x-show="menu === 'grafik-tenaga-kependidikan'" class="flex gap-4 bg-white rounded-md mt-4 p-6"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
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
                                    unit_kerja: @entangle('show_unit_kerja'),
                                    golongan: @entangle('show_golongan'),
                                }"
                                @clearFilter.window="
                                    unit_kerja = false;
                                    golongan = false;
                                "
                                class="flex flex-col gap-4 w-[300px]"
                            >
                                {{-- Header --}}
                                <h1 class="text-gray-800 text-2xl">
                                    Kategori Data
                                </h1>

                                {{-- Pilihan Filter --}}
                                <ul class="flex flex-col gap-4">
                                    {{-- Unit Kerja --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="unit_kerja" class="flex gap-2 items-center">
                                            <input
                                                id="unit_kerja" type="checkbox" x-model="unit_kerja"
                                                wire:model.live="show_unit_kerja"
                                            >
                                            Unit Kerja
                                        </label>
                                        <select
                                            wire:model="selected_unit_kerja"
                                            x-show="unit_kerja"
                                            x-transition:enter="transition ease-out duration-300" scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($unit_kerja as $item)
                                                <option value="{{ $item }}">
                                                    {{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </li>

                                    {{-- Golongan --}}
                                    <li class="transition-all flex flex-col gap-3">
                                        <label for="golongan" class="flex gap-2 items-center">
                                            <input
                                                id="golongan" type="checkbox" x-model="golongan"
                                                wire:model.live="show_golongan">
                                            Golongan
                                        </label>
                                        <select
                                            wire:model.live="selected_golongan"
                                            x-show="golongan"
                                            x-transition:enter="transition ease-out duration-300" scale-90"
                                            x-transition:enter-end="opacity-100 scale-100"
                                            x-transition:leave="transition ease-out duration-300"
                                            x-transition:leave-end="opacity-0 scale-90"
                                            class="p-2 border border-gray-300 rounded-md w-full"
                                        >
                                            @foreach ($golongan as $item)
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
                                            <path fill="#ffffff"
                                                d="M4 17q-.425 0-.712-.288T3 16t.288-.712T4 15h12q.425 0 .713.288T17 16t-.288.713T16 17zm2-4q-.425 0-.712-.288T5 12t.288-.712T6 11h12q.425 0 .713.288T19 12t-.288.713T18 13zm2-4q-.425 0-.712-.288T7 8t.288-.712T8 7h12q.425 0 .713.288T21 8t-.288.713T20 9z" />
                                        </svg>
                                        Hapus
                                    </button>

                                    {{-- Simpan --}}
                                    <button
                                        wire:click="applyFilter"
                                        class="rounded-md bg-primary p-3 text-white hover:bg-primary/90 cursor-pointer transition-all flex items-center justify-center gap-2 w-fit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 24 24">
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

                        {{-- Chart Type Toggle --}}
                        <div class="flex items-center gap-2 self-end" x-data="{ chartType: 'bar' }">
                            {{-- Bar Chart Button --}}
                            <button
                                @click="chartType = 'bar'; window._currentChartType = 'bar'; window.renderChartTendik(window._lastChartData || {}, 'bar')"
                                :class="chartType === 'bar'
                                    ? 'bg-primary text-white shadow-md'
                                    : 'bg-white text-gray-500 border border-gray-300 hover:border-primary hover:text-primary'"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-md text-sm font-medium transition-all duration-200 cursor-pointer"
                                title="Column Chart"
                            >
                                {{-- Bar chart icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M3 13h2v7H3zm4-6h2v13H7zm4 3h2v10h-2zm4-6h2v16h-2z"/>
                                </svg>
                                Batang
                            </button>

                            {{-- Pie Chart Button --}}
                            <button
                                @click="chartType = 'pie'; window._currentChartType = 'pie'; window.renderChartTendik(window._lastChartData || {}, 'pie')"
                                :class="chartType === 'pie'
                                    ? 'bg-primary text-white shadow-md'
                                    : 'bg-white text-gray-500 border border-gray-300 hover:border-primary hover:text-primary'"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-md text-sm font-medium transition-all duration-200 cursor-pointer"
                                title="Pie Chart"
                            >
                                {{-- Pie chart icon --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11 2.05v8.95H2.05A9.003 9.003 0 0 1 11 2.05zm2 0A9.003 9.003 0 0 1 21.95 11H13V2.05zM21.95 13A9.003 9.003 0 0 1 3.28 18.78L9.34 13H21.95zm-13 .06L3.28 18.78A9.003 9.003 0 0 1 2.05 13H8.95z"/>
                                </svg>
                                Pie
                            </button>
                        </div>

                        <div id="chart-tendik" wire:ignore></div>
                        <script>
                            document.addEventListener('livewire:init', () => {
                                const chartData = {
                                    tendik_pns: @json($data_tendik_pns),
                                    tendik_tetap: @json($data_tendik_tetap),
                                    tendik_tidak_tetap: @json($data_tendik_tidak_tetap),
                                    tendik_pppk: @json($data_tendik_pppk),
                                };

                                window._lastChartData = chartData;
                                window.renderChartTendik(chartData, 'bar');

                                Livewire.on('update-chart-tendik', (event) => {
                                    const newData = event[0];
                                    const currentType = window._currentChartType || 'bar';
                                    window._lastChartData = newData;
                                    window.renderChartTendik(newData, currentType);
                                });
                            });

                            document.addEventListener('alpine:init', () => {
                                window._currentChartType = 'bar';
                            });
                        </script>
                    </div>
                    {{-- Grafik - End --}}
                </div>

                {{-- Daftar Tenaga Kependidikan per Unit --}}
                <div x-show="menu === 'daftar-tendik'" class="flex flex-col bg-white rounded-md mt-4 p-6"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                    <livewire:kepegawaian-dan-umum.tables.daftar-tendik-table />
                </div>
            </div>
            {{-- Content - End --}}
        </div>
        {{-- Main Container - End --}}

        {{-- Modal - Start --}}
        <div
            x-show="showModal"
            x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center w-full h-full overflow-y-auto overflow-x-hidden"
            x-data="{
                showModal: false,
                detail: {
                    nama: '-',
                    nip: '-',
                    unit: '-',
                    jabatan: '-',
                    status: '-',
                    golongan: '-'
                }
            }"
            @open-modal-detail.window="
                showModal = true;
                detail = $event.detail;
                $nextTick(() => { $el.focus(); });
            "
            aria-modal="true"
        >
            {{-- Backdrop Blur --}}
            <div
                x-show="showModal"
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm"
            ></div>


            {{-- Modal Wrapper --}}
            <div
                x-show="showModal"
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[calc(100vw-2rem)] max-w-[768px] bg-white rounded-lg shadow-lg"
            >
                {{-- Modal Header --}}
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg border-gray-200 bg-gradient-to-r from-[#00C7CF] to-[#006569]">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Profil <span x-text="detail.nama_lengkap"></span>
                    </h3>
                    <button
                        type="button"
                        @click="showModal = false"
                        class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        aria-hidden="true"
                    >
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                {{-- Modal Body --}}
                <div class="p-4 md:p-5 space-y-4 bg-white flex flex-col items-center rounded-b-lg">
                    <div class="w-full bg-[#EDF7F6] rounded-lg p-6 shadow-sm flex flex-col lg:flex-row gap-8 items-start">
                        {{-- Foto Profil --}}
                        {{-- <div class="flex shrink-0">
                            <div class="w-full h-full rounded-full flex items-center justify-center mt-2">
                                <img class="rounded-full w-25 h-25 object-cover" src="{{ asset('assets/images/unj.png') }}" alt="photo profile">
                            </div>
                        </div> --}}

                        {{-- Detail Informasi --}}
                        <div class="flex-grow space-y-4 py-2">
                            <p
                                class="text-lg font-bold text-black mb-4"
                                x-text="detail.nama_lengkap"
                            ></p>

                            <div class="grid grid-cols-[200px_20px_1fr] gap-y-3 text-sm md:text-base text-black">
                                {{-- NIP --}}
                                <p class="font-semibold">NIP</p>
                                <p>:</p>
                                <p x-text="detail.nip"></p>

                                {{-- Unit --}}
                                <p class="font-semibold">Unit</p>
                                <p>:</p>    
                                <p x-text="detail.unit"></p>

                                {{-- Jabatan --}}
                                <p class="font-semibold">Jabatan</p>
                                <p>:</p>
                                <p x-text="detail.jabatan"></p>

                                {{-- Status --}}
                                <p class="font-semibold">Status</p>
                                <p>:</p>
                                <p x-text="detail.status === 'Pegawai' ? 'Tendik PNS' : (detail.status === 'PPPK_Tendik' ? 'Tendik PPPK' : detail.status)"></p>

                                {{-- Pangkat --}}
                                {{-- <p class="font-semibold">Pangkat</p>
                                <p>:</p>
                                <p>Penata Muda</p> --}}

                                {{-- Golongan --}}
                                <p class="font-semibold">Golongan</p>
                                <p>:</p>
                                <p x-text="detail.golongan"></p>

                                {{-- Pendidikan Terakhir --}}
                                {{-- <p class="font-semibold white">Pendidikan Terakhir</p>
                                <p>:</p>
                                <p>S1 - Ilmu Komputer</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal - End --}}
    </div>
</div>