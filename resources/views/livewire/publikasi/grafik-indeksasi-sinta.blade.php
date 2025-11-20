@vite(['resources/js/charts/scopus-document-quartile.js'])
@vite(['resources/js/charts/grafik-artikel.js'])

<div class="flex flex-col min-h-screen mb-20">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4 flex-grow">

        {{-- Breadcrumb - Start --}}
        <nav class="flex justify-end" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary transition-all">
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
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-primary transition-all md:ms-2">
                            Publikasi
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Grafik Indeksasi SINTA</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumb - End --}}

        {{-- Status Card - Start --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 my-4">
            {{-- SINTA Score Overall --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    918.586
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    SINTA Score Overall
                </div>
            </div>

            {{-- SINTA Score 3Yr --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    415.046
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    SINTA Score 3Yr
                </div>
            </div>

            {{-- Productivity Score --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    2.355
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    Productivity Score
                </div>
            </div>

            {{-- Productivity 3Yr --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    1.064
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    Productivity 3Yr
                </div>
            </div>
        </div>
        {{-- Status Card - End --}}

        {{-- Middle Card - Start --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 my-5">

            {{-- Table Sitasi --}}
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg border border-gray-300 p-8 relative overflow-hidden">
                <div class="relative z-10">
                    {{-- Text --}}
                    <p class="text-gray-500 text-sm mb-6">Data diperbarui 10 jam yang lalu</p>

                    {{-- Table --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="text-left w-1/3"></th>
                                    <th class="text-center pb-4 text-red-400 font-bold text-base">Scopus H-Index</th>
                                    <th class="text-center pb-4 text-teal-600 font-bold text-base">GScholar</th>
                                    <th class="text-center pb-4 text-red-600 font-bold text-base">Garuda</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="py-4 font-bold text-gray-800 text-base">Documents</td>
                                    <td class="py-4 text-center text-red-400 text-lg">4.990</td>
                                    <td class="py-4 text-center text-teal-600 text-lg">52.642</td>
                                    <td class="py-4 text-center text-red-600 text-lg">15.236</td>
                                </tr>
                                <tr>
                                    <td class="py-4 font-bold text-gray-800 text-base">Citation</td>
                                    <td class="py-4 text-center text-red-400 text-lg">21.946</td>
                                    <td class="py-4 text-center text-teal-600 text-lg">351.756</td>
                                    <td class="py-4 text-center text-red-600 text-lg">156</td>
                                </tr>
                                <tr>
                                    <td class="py-4 font-bold text-gray-800 text-base">Cited Documents</td>
                                    <td class="py-4 text-center text-red-400 text-lg">3.212</td>
                                    <td class="py-4 text-center text-teal-600 text-lg">26.706</td>
                                    <td class="py-4 text-center text-red-600 text-lg">97</td>
                                </tr>
                                <tr>
                                    <td class="py-4 font-bold text-gray-800 text-base">Citation per Documents</td>
                                    <td class="py-4 text-center text-red-400 text-lg">55,00</td>
                                    <td class="py-4 text-center text-teal-600 text-lg">881,59</td>
                                    <td class="py-4 text-center text-red-600 text-lg">0,39</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Authors, Departments, Journals --}}
            <div class="flex flex-col justify-between h-full gap-5">
                {{-- Author --}}
                <div class="bg-[#FF7C7C] hover:bg-[#FF7C7C]/90 rounded-xl p-5 flex items-center justify-between text-white shadow-md hover:shadow-lg transition cursor-pointer group h-28">
                    <div class="flex items-center gap-5">
                        <div class="text-4xl opacity-80">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold">1.223</div>
                            <div class="text-base font-medium">Authors</div>
                        </div>
                    </div>
                    <div class="text-3xl opacity-70">
                        <a href="https://sinta.kemdiktisaintek.go.id/affiliations/authors/435" target="_blank">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Departments --}}
                <div class="bg-primary hover:bg-primary/90 rounded-xl p-5 flex items-center justify-between text-white shadow-md hover:shadow-lg transition cursor-pointer group h-28">
                    <div class="flex items-center gap-5">
                        <div class="text-4xl opacity-80">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold">120</div>
                            <div class="text-base font-medium">Departments</div>
                        </div>
                    </div>
                    <div class="text-3xl opacity-70">
                        <a href="https://sinta.kemdiktisaintek.go.id/affiliations/departments/435/001037" target="_blank">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                {{-- Journals --}}
                <div class="bg-red-700 hover:bg-red-700/90 rounded-xl p-5 flex items-center justify-between text-white shadow-md hover:shadow-lg transition cursor-pointer group h-28">
                    <div class="flex items-center gap-5">
                        <div class="text-4xl opacity-80">
                            <i class="fa-solid fa-book"></i>
                        </div>
                        <div>
                            <div class="text-3xl font-bold">65</div>
                            <div class="text-base font-medium">Journals</div>
                        </div>
                    </div>
                    <div class="text-3xl opacity-70">
                        <a href="https://sinta.kemdiktisaintek.go.id/journals/index/435" target="_blank">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Middle Card - End --}}

        {{-- Container Grafik - Start --}}
        <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-br from-[#006569] to-[#95F4F8]">

            {{-- Publikasi - Start --}}
            <div x-data="{ graphic: 'artikel' }" @change-graphic.window="graphic = $event.detail.chart" class="w-full p-6 bg-white rounded-lg mb-5 overflow-hidden">
                {{-- Menu Button --}}
                <div class="flex border-b border-gray-300 gap-4">
                    <button
                    @click="$dispatch('change-graphic', { chart: 'artikel'})"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphic === 'artikel' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">
                        Artikel
                    </button>
                    <button
                    @click="$dispatch('change-graphic', { chart: 'penelitian'})"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphic === 'penelitian' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">
                        Penelitian
                    </button>
                    <button
                    @click="$dispatch('change-graphic', { chart: 'pengabdian-masyarakat'})"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphic === 'pengabdian-masyarakat' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">
                        Pengabdian Masyarakat
                    </button>
                    <button
                    @click="$dispatch('change-graphic', { chart: 'hak-cipta'})"
                    class="p-2 cursor-pointer transition-all"
                    :class="graphic === 'hak-cipta' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'">
                        Hak Cipta
                    </button>
                </div>

                {{-- Grafik --}}
                <div id="artikel" class="mt-5"></div>

                {{-- Filter Daftar Terbaru --}}
                <form action="" class="mx-3 mt-5">
                    <label for="" class="block font-semibold">Daftar Terbaru</label>
                    <select name="" id="" class="block w-[200px] mt-1 px-3 py-2 bg-neutral border border-gray-400 rounded-lg focus:ring-primary focus:border-primary shadow-xs">
                        <option value="scopus" selected>Scopus</option>
                        <option value="gscholar">Google Scholar</option>
                        <option value="garuda">Garuda</option>
                    </select>
                </form>

                {{-- Daftar Publikasi Terbaru --}}
                <div class="w-full p-3 rounded-lg bg-[#EDF7F6] mt-5">
                    {{-- Card --}}
                    @for ($i = 1; $i < 6; $i++)
                        <div class="flex flex-col md:flex-row px-4 py-2.5 justify-between items-start md:items-center relative bg-white rounded-2xl shadow-lg overflow-hidden my-4 mx-3">
                                <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-primary"></div>

                                {{-- Detail Publikasi --}}
                                <div class="flex-1 pl-3">
                                    {{-- Judul --}}
                                    <p class="text-black font-semibold leading-tight mb-2">
                                        Rotenoid Derivatives from Amorpha fruticosa: In vitro and In Silico Studies against Tyrosine Kinase Receptors
                                    </p>

                                    {{-- Identitas Artikel --}}
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                                        {{-- Penulis --}}
                                        <div class="flex items-center gap-1.5">
                                            <i class="fa-solid fa-user text-primary"></i>
                                            <span>Hermawati E.</span>
                                        </div>

                                        {{-- Tahun --}}
                                        <div class="flex items-center gap-1.5">
                                            <i class="fa-solid fa-calendar-days text-primary"></i>
                                            <span>2026</span>
                                        </div>

                                        {{-- Sitasi --}}
                                        <div class="flex items-center gap-1.5">
                                            <i class="fa-solid fa-message text-primary"></i>
                                            <span>10</span>
                                        </div>

                                        {{-- Nama Jurnal --}}
                                        <div class="flex items-center gap-1.5">
                                            <i class="fa-solid fa-book text-primary"></i>
                                            <span>Advanced Journal of Chemistry Section A</span>
                                        </div>
                                    </div>
                                </div>

                                {{-- Badge --}}
                                <span class="bg-[#FCF5CD] text-[#BA9F0B] dark:bg-yellow-900 dark:text-yellow-300 font-medium inline-flex items-center px-3 py-1 text-sm rounded-lg">
                                    Q2 Journal
                                </span>
                            </div>
                    @endfor
                </div>
            </div>
            {{-- Publikasi - End --}}

            {{-- Daftar Penulis - Start --}}
            <div class="w-full p-6 rounded-lg bg-white">
                {{-- Text --}}
                <div class="text-black">
                    <p class="font-semibold">Daftar Penulis</p>
                    <p>Sepuluh baris teratas menunjukkan penulis terbaik berdasarkan SINTA Score 3Yr</p>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto overflow-y-auto relative max-h-[500px] rounded-lg my-4">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-800 bg-gray-200 rounded-lg">
                        <thead class="text-xs uppercase sticky top-0 z-10 bg-primary text-white">
                             <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Program Studi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fakultas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                SINTA 3Yr
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Scopus - H-Index
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Scopus - Document
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Scopus - Citation
                            </th>
                            <th scope="col" class="px-6 py-3">
                                GS - H-Index
                            </th>
                            <th scope="col" class="px-6 py-3">
                                GS - Document
                            </th>
                            <th scope="col" class="px-6 py-3">
                                GS - Citation
                            </th>
                        </thead>
                        <tbody class="divide-y divide-gray-400">
                        @for ($i = 1; $i < 11; $i++)
                            <tr class="hover:bg-gray-300/90">
                                <td class="px-6 py-4">
                                    {{ $i }}
                                </td>
                                <td class="px-6 py-4">
                                    Prof. Dr. Komarudin, M. Si.
                                </td>
                                <td class="px-6 py-4">
                                    Pendidikan Pancasila dan Kewarganegaraan
                                </td>
                                <td class="px-6 py-4">
                                    Fakultas Ilmu Sosial dan Hukum
                                </td>
                                <td class="px-6 py-4">
                                    4567
                                </td>
                                <td class="px-6 py-4">
                                    28
                                </td>
                                <td class="px-6 py-4">
                                    156
                                </td>
                                <td class="px-6 py-4">
                                    2345
                                </td>
                                <td class="px-6 py-4">
                                    42
                                </td>
                                <td class="px-6 py-4">
                                    234
                                </td>
                                <td class="px-6 py-4">
                                    123
                                </td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                    <p class="ml-1 mt-1">Sumber data: SINTA</p>
                </div>
            </div>
            {{-- Daftar Penulis - End --}}

            {{-- Scopus Document Quartile - Start --}}
            <div class="flex flex-col bg-white rounded-lg p-6 w-full my-5">
                <div id="scopus-chart"></div>
                <p class="ml-1 mt-1">Sumber data: SINTA</p>
            </div>
            {{-- Scopus Document Quartile - End --}}
        </div>
        {{-- Container Grafik - End --}}

    </div>
</div>
