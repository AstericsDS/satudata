<div class="flex flex-col min-h-screen mb-20">
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
                        Daftar Tenaga Kependidikan per Unit
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
                        <div id="chart-tendik" wire:ignore></div>
                        <script>
                            document.addEventListener('livewire:init', () => {
                                const chartData = {
                                    tendik_pns: @json($data_tendik_pns),
                                    tendik_tetap: @json($data_tendik_tetap),
                                    tendik_tidak_tetap: @json($data_tendik_tidak_tetap),
                                    tendik_pppk: @json($data_tendik_pppk),
                                };

                                window.renderChartTendik(chartData);

                                Livewire.on('update-chart-tendik', (event) => {
                                    const newData = event[0];
                                    // console.log(newData)
                                    window.renderChartTendik(newData);
                                });
                            })
                        </script>
                    </div>
                    {{-- Grafik - End --}}
                </div>

                {{-- Daftar Tenaga Kependidikan per Unit --}}
                <div x-show="menu === 'daftar-tendik'" class="flex flex-col bg-white rounded-md mt-4 p-6"
                    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                    <livewire:power-grid.daftar-tendik-table />
                </div>
            </div>
            {{-- Content - End --}}
        </div>
        {{-- Main Container - End --}}
    </div>
</div>