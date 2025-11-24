<div class="mx-24 mt-4 mb-20">
    @vite(['resources/js/charts/jumlah-wisudawan.js'])
    <!-- Breadcrumb -->
    <nav class="flex justify-end" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <span class="ms-1 text-sm font-medium text-gray-700 transition-all md:ms-2">
                        Akademik dan Mahasiswa
                    </span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-primary md:ms-2">Jumlah Wisudawan</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex gap-4 mt-6">

        <!-- Filter -->
        <div class="border-1 border-[#1B1B1B]/20 p-8 rounded-md bg-white shadow-xl">
            <div class="flex flex-col gap-6">

                <div>
                    <div class="flex gap-2 items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                            <path fill="#006569"
                                d="M11 20q-.425 0-.712-.288T10 19v-6L4.2 5.6q-.375-.5-.112-1.05T5 4h14q.65 0 .913.55T19.8 5.6L14 13v6q0 .425-.288.713T13 20z" />
                        </svg>
                        <h1 class="text-primary text-2xl">Filter Data</h1>
                    </div>
                    <p class="text-gray-700">Atur data yang akan ditampilkan</p>
                </div>

                <div x-data="{ jenjang: @entangle('showJenjang'), fakultas: @entangle('showFakultas'), prodi: @entangle('showProdi') }"
                    @clearFilter.window="jenjang = false; fakultas = false; prodi = false"
                    class="flex flex-col gap-4 w-[300px]">
                    <h1 class="text-gray-800 text-2xl">Kategori Data</h1>

                    <ul class="flex flex-col gap-4">
                        <li class="transition-all flex flex-col gap-3">
                            <label for="jenjang" class="flex gap-2 items-center">
                                <input id="jenjang" type="checkbox" x-model="jenjang" wire:model.change="showJenjang">
                                Jenjang
                            </label>
                            <select wire:model.change="selectedJenjang" x-show="jenjang"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="p-2 border border-gray-300 rounded-md w-full">
                                @foreach($jenjang as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="transition-all flex flex-col gap-3">
                            <label for="fakultas" class="flex gap-2 items-center">
                                <input id="fakultas" type="checkbox" x-model="fakultas"
                                    wire:model.change="showFakultas">
                                Fakultas
                            </label>
                            <select wire:model.change="selectedFakultas" x-show="fakultas"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="p-2 border border-gray-300 rounded-md w-full">
                                @foreach($fakultas as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="transition-all flex flex-col gap-3">
                            <label for="prodi" class="flex gap-2 items-center">
                                <input id="prodi" type="checkbox" x-model="prodi" wire:model.change="showProdi">
                                Program Studi
                            </label>
                            <select wire:model.change="selectedProdi" x-show="prodi"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-90"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-out duration-300"
                                x-transition:leave-end="opacity-0 scale-90"
                                class="p-2 border border-gray-300 rounded-md w-full">
                                @foreach($prodi as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>

                    <div class="flex gap-3 justify-end">
                        <button wire:click="clearFilter"
                            class="rounded-md bg-red-600 p-2 text-white hover:bg-red-700 cursor-pointer transition-all flex items-center justify-center gap-2 w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <path fill="#ffffff"
                                    d="M4 17q-.425 0-.712-.288T3 16t.288-.712T4 15h12q.425 0 .713.288T17 16t-.288.713T16 17zm2-4q-.425 0-.712-.288T5 12t.288-.712T6 11h12q.425 0 .713.288T19 12t-.288.713T18 13zm2-4q-.425 0-.712-.288T7 8t.288-.712T8 7h12q.425 0 .713.288T21 8t-.288.713T20 9z" />
                            </svg>
                            Hapus
                        </button>
                        <button wire:click="applyFilter"
                            class="rounded-md bg-primary p-3 text-white hover:bg-primary/90 cursor-pointer transition-all flex items-center justify-center gap-2 w-fit">
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

        <div class="bg-linear-to-b from-primary to-accent-2 from-20% to-100% rounded-md flex flex-col gap-4 p-6 w-full">
            <h1 class="text-2xl text-white font-semibold">Jumlah Wisudawan</h1>
            <p class="text-white">Data ini mencakup seluruh mahasiswa aktif, cuti, dan yang berstatus khusus lainnya
                dalam berbagai jenjang pendidikan. Visualisasi data jumlah mahasiswa membantu dalam perencanaan
                kapasitas akademik, alokasi sumber daya, dan pengambilan keputusan strategis institusi pendidikan</p>
            <div class="bg-white rounded-md p-4 flex flex-col gap-2 ">
                <p>Data diperbarui {{ $update->locale('id')->diffForHumans() }}</p>
                <div class="bg-primary/10 p-6 rounded-md">
                    <h1 class="text-2xl font-semibold mb-4">Analisis Data</h1>
                    <livewire:charts.jumlah-wisudawan />
                    <p>Pada tahun akademik {{ $lastYear ? $lastYear : '' }}, universitas mencatat total {{ $now }} mahasiswa dengan {{ $percentage > 0 ? 'pertumbuhan' : 'penurunan' }} sebesar {{ $percentage }}% dibandingkan tahun sebelumnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
