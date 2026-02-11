<div class="mx-24 mt-4 mb-20">
    @vite(['resources/js/charts/keuangan-dan-perencanaan.js'])

    {{-- Breadcrumbs - Start --}}
    <nav class="flex justify-end mr-2 mb-2" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <a href="#"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary transition-all md:ms-2">
                        Keuangan dan Perencanaan
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
                    <span class="ms-1 text-sm font-medium text-primary">Anggaran dan Daya Serap</span>
                </div>
            </li>
        </ol>
    </nav>
    {{-- Breadcrumbs - End --}}

    <!-- Stat Cards -->
    <div class="flex gap-8 mt-6">
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">{{ $data_pagu_total }}</h1>
            <h2 class="text-xl">Total Anggaran</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">{{ $data_pagu_realisasi }}</h1>
            <h2 class="text-xl">Realisasi</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">{{ $data_pagu_sisa }}</h1>
            <h2 class="text-xl">Sisa Anggaran</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">{{ $daya_serap }}</h1>
            <h2 class="text-xl">Daya Serap</h2>
        </div>
    </div>

    <!-- Chart -->
    <div x-data="{ active: 'daya-serap-universitas' }" @change-chart.window="active = $event.detail.chart"
        class="rounded-t-lg overflow-hidden bg-linear-to-b from-primary to-accent-2 p-6 mt-4">
        
        <div class="bg-white rounded-md p-4">
            {{-- Tab Buttons --}}
            <div class="flex">
                {{-- Grafik Daya Serap Universitas --}}
                <button
                    @click="$dispatch('change-chart', { chart: 'daya-serap-universitas' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="active === 'daya-serap-universitas' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Grafik Daya Serap Universitas
                </button>

                {{-- Anggaran per Akun Belanja --}}
                {{-- <button
                    @click="$dispatch('change-chart', { chart: 'anggaran-per-akun-belanja' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="active === 'anggaran-per-akun-belanja' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Anggaran per-Akun Belanja
                </button> --}}

                {{-- Anggaran per Output --}}
                {{-- <button
                    @click="$dispatch('change-chart', { chart: 'anggaran-per-output' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="active === 'anggaran-per-output' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Anggaran per-Output
                </button> --}}
            </div>

            {{-- Filter --}}
            <div class="flex justify-between items-center mt-6">
                <div class="w-64">
                    <label 
                        for="satker-filter"
                        class="block mb-2 text-sm font-medium text-gray-800"
                    >
                        Pilih Satuan Kerja
                    </label>
                    <select
                        wire:model.live="selected_satker"
                        id="satker-filter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                    >
                        <option value="Universitas Negeri Jakarta">
                            Universitas Negeri Jakarta
                        </option>
                        @foreach ($satker_list as $satker)
                            <option value="{{ $satker }}">{{ $satker }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            @if ($update && $update->status === 'synchronized')
                <div class="flex flex-col mt-4 gap-2">
                    <p class="font-light text-gray-500">
                        Data diperbarui {{ $update->updated_at->locale('id')->diffForHumans() }}
                    </p>
                    <p class="font-semibold text-gray-800">
                        Sumber: SAKU
                    </p>
                </div>
            @else
                <p class="font-light text-red-500">
                    Data Belum Sinkron
                </p>
            @endif

            <template x-if="active === 'daya-serap-universitas'">
                <div
                    x-effect="
                        if (active === 'daya-serap-universitas') $nextTick(() => window.renderChartDayaSerapUniversitas([{{ $chart_pagu_realisasi }}, {{ $chart_pagu_sisa }} ]))
                    "
                >
                    <div id="daya-serap-universitas" class="flex justify-center items-center py-4" wire:ignore></div>
                    {{-- Status --}}
                    <div class="flex gap-4">
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp {{ $data_pagu_realisasi }}</h1>
                            <h2>Realisasi</h2>
                        </div>
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp {{ $data_pagu_sisa }}</h1>
                            <h2>Sisa Anggaran</h2>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="active === 'anggaran-per-akun-belanja'">
                <div>
                    <livewire:keuangan-dan-perencanaan.tables.akun />
                </div>
            </template>

            <template x-if="active === 'anggaran-per-output'">
                <livewire:keuangan-dan-perencanaan.tables.ouput />
            </template>

        </div>

    </div>

</div>