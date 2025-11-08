@vite(['resources/js/charts/keuangan-dan-perencanaan.js'])
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
                    <a href="{{ route('anggaran-dan-daya-serap') }}"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary transition-all md:ms-2">Keuangan
                        dan
                        Perencanaan
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
                    <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Anggaran dan Daya
                        Serap</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Stat Cards -->
    <div class="flex gap-8 mt-6">
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">25.5M</h1>
            <h2>Total Anggaran</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">18.2M</h1>
            <h2>Realisasi</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">7.3M</h1>
            <h2>Sisa Anggaran</h2>
        </div>
        <div
            class="flex-1 flex flex-col items-center gap-3 justify-center bg-linear-to-tr from-primary/70 to-accent-1/70 text-white p-8 rounded-md">
            <h1 class="text-5xl">71.4%</h1>
            <h2>Daya Serap</h2>
        </div>
    </div>

    <!-- Chart -->
    <div x-data="{ active: 'daya-serap-universitas' }" @change-chart.window="active = $event.detail.chart"
        class="rounded-t-lg overflow-hidden bg-linear-to-b from-primary to-accent-2 p-6 mt-4">

        <div class="bg-white rounded-md p-4">

            <div class="flex">
                <button @click="$dispatch('change-chart', { chart: 'daya-serap-universitas' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="active === 'daya-serap-universitas' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">Grafik
                    Daya Serap Universitas</button>
                <button @click="$dispatch('change-chart', { chart: 'anggaran-per-akun-belanja' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="active === 'anggaran-per-akun-belanja' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">Anggaran
                    per-Akun Belanja</button>
                <button @click="$dispatch('change-chart', { chart: 'anggaran-per-output' })"
                    class="p-2 cursor-pointer transition-all"
                    :class="active === 'anggaran-per-output' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">Anggaran
                    per-Output</button>
            </div>

            <template x-if="active === 'daya-serap-universitas'">
                <div x-effect="if (active === 'daya-serap-universitas') $nextTick(() => window.renderChart1())">
                    <div id="daya-serap-universitas" class="flex justify-center items-center py-4"></div>
                    <div class="flex gap-4">
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp 18.2M</h1>
                            <h2>Realisasi</h2>
                        </div>
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp 7.3M</h1>
                            <h2>Sisa Anggaran</h2>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="active === 'anggaran-per-akun-belanja'">
                <div x-effect="if (active === 'anggaran-per-akun-belanja') $nextTick(() => window.renderChart2())">
                    <div id="anggaran-per-akun-belanja" class="flex justify-center items-center py-4"></div>

                    <div class="flex gap-4">
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp 7.8M</h1>
                            <h2>Lorem 1</h2>
                        </div>
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp 11.3M</h1>
                            <h2>Lorem 2</h2>
                        </div>
                    </div>
                </div>
            </template>

            <template x-if="active === 'anggaran-per-output'">
                <div x-effect="if (active === 'anggaran-per-output') $nextTick(() => window.renderChart3())">
                    <div id="anggaran-per-output" class="flex justify-center items-center py-4"></div>

                    <div class="flex gap-4">
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp 3.5M</h1>
                            <h2>Lorem 1</h2>
                        </div>
                        <div class="bg-primary/10 flex-1 p-4 rounded-md text-center">
                            <h1 class="font-semibold text-3xl mb-4">Rp 23.75M</h1>
                            <h2>Lorem 2</h2>
                        </div>
                    </div>
                </div>
            </template>

        </div>

    </div>

</div>