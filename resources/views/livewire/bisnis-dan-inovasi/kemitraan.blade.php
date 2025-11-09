@vite(['resources/js/charts/bisnis-dan-inovasi.js'])
<div class="mx-24 mt-4 mb-20">

    <!-- Breadcrumb -->
    <nav class="flex justify-end" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary transition-all">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('kemitraan') }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary transition-all md:ms-2">
                        Bisnis dan Inovasi
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Kemitraan</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Stat Cards -->
    <div class="flex gap-8 mt-6">
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">45</h1>
            <h2>Total MOU</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">23</h1>
            <h2>Total MOA</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">12</h1>
            <h2>Total IA</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">80</h1>
            <h2>Total Kemitraan</h2>
        </div>
    </div>

    <div x-data="{ menu: 'grafik-statistik', graphicTable: 'per-fakultas', documentTable: 'mou'  }"
        @change-graphic-table.window="graphicTable = $event.detail.chart"
        @change-menu.window="menu = $event.detail.menu"
        class="rounded-t-lg overflow-hidden bg-linear-to-b from-primary to-accent-2 p-6 mt-8">

        <div class="flex space-x-2 bg-white mb-4 rounded-md p-6">
            <button @click="$dispatch('change-menu', { menu: 'grafik-statistik' })"
                class="text-center py-3 flex-1 rounded-md font-semibold"
                :class="menu === 'grafik-statistik' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">Grafik
                Statistik</button>
            <button @click="$dispatch('change-menu', { menu: 'daftar-dokumen-kerja-sama' })"
                class="text-center py-3 flex-1 rounded-md font-semibold"
                :class="menu === 'daftar-dokumen-kerja-sama' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">Daftar
                Dokumen Kerja Sama</button>
        </div>

        <div x-show="menu === 'grafik-statistik'" class="flex flex-col bg-white rounded-md mt-4 p-6"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100">

            <p class="mb-2">Belum sinkron</p>
            <div id="dokumen"></div>

            <div class="flex">
                <button @click="$dispatch('change-graphic-table', { chart: 'per-fakultas' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphicTable === 'per-fakultas' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">Grafik
                    per-Fakultas</button>
                <button @click="$dispatch('change-graphic-table', { chart: 'klasifikasi-mitra' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphicTable === 'klasifikasi-mitra' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">
                    Klasifikasi Mitra</button>
                <button @click="$dispatch('change-graphic-table', { chart: 'kewarganegaraan' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphicTable === 'kewarganegaraan' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">
                    Kewarganegaraan</button>
            </div>

        </div>

        <div x-show="menu === 'daftar-dokumen-kerja-sama'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

        </div>

    </div>

</div>