@vite(["resources/js/charts/bisnis-dan-inovasi.js"])
<div class="mx-24 mb-8 mt-4">
    <!-- Breadcrumb -->
    <nav
        class="flex justify-end"
        aria-label="Breadcrumb"
    >
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a
                    class="hover:text-primary inline-flex items-center text-sm font-medium text-gray-700 transition-all"
                    href="{{ route("dashboard") }}"
                >
                    <svg
                        class="me-2.5 h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg
                        class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 9 4-4-4-4"
                        />
                    </svg>
                    <a
                        class="hover:text-primary ms-1 text-sm font-medium text-gray-700 transition-all md:ms-2"
                        href="{{ route("kemitraan") }}"
                    >
                        Bisnis dan Inovasi
                    </a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg
                        class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 9 4-4-4-4"
                        />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Kemitraan</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Stat Cards -->
    <div class="mt-6 flex gap-8">
        <div class="bg-linear-to-tr from-primary/70 to-accent-1/70 flex flex-1 flex-col items-center justify-center gap-3 rounded-md p-8 text-white">
            <h1 class="text-5xl">{{ $data["statistik"]["MoU"] }}</h1>
            <h2>Total MOU</h2>
        </div>
        <div class="bg-linear-to-tr from-primary/70 to-accent-1/70 flex flex-1 flex-col items-center justify-center gap-3 rounded-md p-8 text-white">
            <h1 class="text-5xl">{{ $data["statistik"]["MoA"] }}</h1>
            <h2>Total MOA</h2>
        </div>
        <div class="bg-linear-to-tr from-primary/70 to-accent-1/70 flex flex-1 flex-col items-center justify-center gap-3 rounded-md p-8 text-white">
            <h1 class="text-5xl">{{ $data["statistik"]["IA"] }}</h1>
            <h2>Total IA</h2>
        </div>
        <div class="bg-linear-to-tr from-primary/70 to-accent-1/70 flex flex-1 flex-col items-center justify-center gap-3 rounded-md p-8 text-white">
            <h1 class="text-5xl">{{ $data["statistik"]["Total"] }}</h1>
            <h2>Total Kemitraan</h2>
        </div>
    </div>

    <div
        class="bg-linear-to-b from-primary to-accent-2 mt-8 overflow-hidden rounded-t-lg p-6"
        x-data="{
            menu: 'grafik-statistik',
            graphicTable: 'per-fakultas',
            documentTable: 'mou',
        }"
        @change-menu.window="menu = $event.detail.menu"
        @change-graphic-table.window="graphicTable = $event.detail.chart"
        @change-document-table.window="documentTable = $event.detail.table"
    >
        <div class="mb-4 flex space-x-2 rounded-md bg-white p-6">
            <button
                class="flex-1 rounded-md py-3 text-center font-semibold transition-all"
                @click="$dispatch('change-menu', { menu: 'grafik-statistik' })"
                :class="menu === 'grafik-statistik' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'"
            >
                Grafik Statistik
            </button>
            <button
                class="flex-1 rounded-md py-3 text-center font-semibold transition-all"
                @click="$dispatch('change-menu', { menu: 'daftar-dokumen-kerja-sama' })"
                :class="menu === 'daftar-dokumen-kerja-sama' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'"
            >
                Daftar Dokumen Kerja Sama
            </button>
        </div>

        <!-- GRAFIK STATISTIK -->
        <div
            class="mt-4 flex flex-col rounded-md bg-white p-6"
            x-show="menu === 'grafik-statistik'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            @if ($update && $update->status === "synchronized")
                <p wire:poll.5s>Data diperbarui {{ $update->updated_at->locale("id")->diffForHumans() }}</p>
            @else
                <p
                    class="w-fit rounded-md bg-red-300 px-2 text-red-900"
                    wire:poll.5s
                >
                    Data Belum Sinkron
                </p>
            @endif
            <h2 class="text-[12px] font-semibold text-[#263238]">Sumber: SIKERMA</h2>

            <livewire:charts.kemitraan :data="$data" />

            <div class="flex">
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="$dispatch('change-graphic-table', { chart: 'per-fakultas' })"
                    :class="graphicTable === 'per-fakultas' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Grafik per-Fakultas
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="$dispatch('change-graphic-table', { chart: 'klasifikasi-mitra' })"
                    :class="graphicTable === 'klasifikasi-mitra' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Klasifikasi Mitra
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="$dispatch('change-graphic-table', { chart: 'kewarganegaraan' })"
                    :class="graphicTable === 'kewarganegaraan' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Kewarganegaraan
                </button>
            </div>

            <div
                x-show="graphicTable === 'per-fakultas'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <livewire:bisnis-dan-inovasi.tables.fakultas />
            </div>

            <div
                x-show="graphicTable === 'klasifikasi-mitra'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <livewire:bisnis-dan-inovasi.tables.klasifikasi />
            </div>

            <div
                x-show="graphicTable === 'kewarganegaraan'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <livewire:bisnis-dan-inovasi.tables.kewarganegaraan />
            </div>
        </div>

        <!-- DAFTAR DOKUMEN KERJA SAMA -->
        <div
            class="mt-4 flex flex-col rounded-md bg-white p-6"
            x-show="menu === 'daftar-dokumen-kerja-sama'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <div class="flex">
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="$dispatch('change-document-table', { table: 'mou' })"
                    :class="documentTable === 'mou' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Daftar MoU
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="$dispatch('change-document-table', { table: 'moa' })"
                    :class="documentTable === 'moa' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Daftar MoA
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="$dispatch('change-document-table', { table: 'ia' })"
                    :class="documentTable === 'ia' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Daftar IA
                </button>
            </div>

            <div
                class="mt-4"
                x-show="documentTable === 'mou'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <livewire:bisnis-dan-inovasi.tables.MOU />
            </div>

            <div
                class="mt-4"
                x-show="documentTable === 'moa'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <livewire:bisnis-dan-inovasi.tables.MOA />
            </div>

            <div
                class="mt-4"
                x-show="documentTable === 'ia'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <livewire:bisnis-dan-inovasi.tables.IA />
            </div>
        </div>
    </div>
</div>
