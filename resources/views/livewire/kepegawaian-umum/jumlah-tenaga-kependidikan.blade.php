@vite(['resources/js/charts/jumlah-tenaga-kependidikan.js'])

<div class="flex flex-col min-h-screen mb-20">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Jumlah Tenaga Kependidikan</span>
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
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            {{-- Text - End --}}

            {{-- Content - Start --}}
            <div x-data="{ menu: 'grafik-tenaga-kependidikan' }" @change-menu.window="menu = $event.detail.menu" class="mt-2">
                {{-- Menu Button --}}
                <div class="flex space-x-2 bg-white mb-4 rounded-md p-6">
                    {{-- Grafik Tenaga Kependidikan --}}
                    <button @click="$dispatch('change-menu', { menu: 'grafik-tenaga-kependidikan' })" class="text-center py-3 flex-1 rounded-md font-semibold" :class="menu === 'grafik-tenaga-kependidikan' ? 'bg-linear-to-l from-primary to to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                        Grafik Tenaga Kependidikan
                    </button>

                    {{-- Daftar Tenaga Kependidikan per Unit --}}
                    <button @click="$dispatch('change-menu', { menu: 'daftar-tendik' })" class="text-center py-3 flex-1 rounded-md font-semibold" :class="menu === 'daftar-tendik' ? 'bg-linear-to-l from-primary to to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                        Daftar Tenaga Kependidikan per Unit
                    </button>
                </div>

                {{-- Grafik Tenaga Kependidikan --}}
                <div x-show="menu === 'grafik-tenaga-kependidikan'" class="bg-white rounded-md mt-4 p-6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <p class="font-light text-gray-500 mb-3">Data diperbarui 10 jam yang lalu</p>
                    <div class="flex items-center gap-4 mb-4 justify-center w-full">
                        <p class="text-[16px] font-semibold text-center">Jumlah Tenaga Kependidikan Berdasarkan</p>
                        <select name="" id="" class="w-[200px] px-3 py-1.5 bg-neutral border border-gray-400 rounded-lg focus:ring-primary focus:border-primary shadow-xs">
                            <option value="scopus" selected>Unit</option>
                            <option value="gscholar">Golongan</option>
                            <option value="garuda">Status Kepegawaian</option>
                        </select>
                    </div>
                    <div id="chart-tendik"></div>
                    <p>Sumber: SIPEG</p>
                </div>

                {{-- Daftar Tenaga Kependidikan per Unit --}}
                <div x-show="menu === 'daftar-tendik'" class="flex flex-col bg-white rounded-md mt-4 p-6" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    {{-- Table --}}
                    <div class="relative overflow-x-auto rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right rounded-lg">
                            <thead class="text-base bg-primary text-white sticky top-0 z-10 uppercase">
                                <tr class="border-b-1 border-gray-200">
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NIP
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Unit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jabatan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @for ($i = 1; $i < 11; $i++)
                                    <tr>
                                        <td class="px-6 py-3">
                                            {{ $i }}
                                        </td>
                                        <td data-modal-target="detail-tendik" data-modal-toggle="detail-tendik" class="px-6 py-3 hover:underline cursor-pointer">
                                            Abcde, S. Kom.
                                        </td>
                                        <td class="px-6 py-3"">
                                            1234567890
                                        </td>
                                        <td class="px-6 py-3">
                                            Direktur Keuangan dan Perencanaan
                                        </td>
                                        <td class="px-6 py-3">
                                            Pranata Komputer
                                        </td>
                                        <td class="px-6 py-3">
                                            PNS
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Content - End --}}
        </div>
        {{-- Main Container - End --}}

        {{-- Modal - Start --}}
        <div id="detail-tendik" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden rounded-lg fixed inset-0 z-50 justify-center items-center w-full h-full backdrop-blur-sm bg-black/20 transition-all duration-300">
            <div class="relative p-4 w-full max-w-[768px] max-h-full">
                {{-- Modal Header --}}
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg border-gray-200 bg-gradient-to-r from-[#00C7CF] to-[#006569]">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Profil Abcde, S. Kom.
                    </h3>
                    <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-tendik">
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
                        <div class="flex shrink-0">
                            <div class="w-full h-full rounded-full flex items-center justify-center mt-2">
                                <img class="rounded-full w-25 h-25 object-cover" src="{{ asset('assets/images/unj.png') }}" alt="photo profile">
                            </div>
                        </div>

                        {{-- Detail Informasi --}}
                        <div class="flex-grow space-y-4 py-2">
                            <p class="text-lg font-bold text-black mb-4">Abcde, S. Kom.</p>

                            <div class="grid grid-cols-[200px_20px_1fr] gap-y-3 text-sm md:text-base text-black">
                                {{-- NIP --}}
                                <p class="font-semibold">NIP</p>
                                <p>:</p>
                                <p>1234567890</p>

                                {{-- Unit --}}
                                <p class="font-semibold">Unit</p>
                                <p>:</p>
                                <p>Direktur Keuangan dan Perencanaan</p>

                                {{-- Jabatan --}}
                                <p class="font-semibold">Jabatan</p>
                                <p>:</p>
                                <p>Pranata Komputer</p>

                                {{-- Status --}}
                                <p class="font-semibold">Status</p>
                                <p>:</p>
                                <p>PNS</p>

                                {{-- Pangkat --}}
                                <p class="font-semibold">Pangkat</p>
                                <p>:</p>
                                <p>Penata Muda</p>

                                {{-- Golongan --}}
                                <p class="font-semibold">Golongan</p>
                                <p>:</p>
                                <p>III/b</p>

                                {{-- Pendidikan Terakhir --}}
                                <p class="font-semibold white">Pendidikan Terakhir</p>
                                <p>:</p>
                                <p>S1 - Ilmu Komputer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal - End --}}
    </div>
</div>
