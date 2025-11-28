@vite(['resources/js/charts/jumlah-publikasi.js'])

<div class="flex flex-col min-h-screen mb-20">
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4 flex-grow">

        {{-- Breadcrumb - Start --}}
        <nav class="flex justify-end mr-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li>
                    <div class="flex items-center">
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
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-primary to-[#00C7CF] text-white text-center">
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
                                    <th class="text-center pb-4 text-teal-600 font-bold text-base">Google Scholar</th>
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

        {{-- Publikasi - Start --}}
        <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-b from-primary to-[#95F4F8]">

            {{-- Grafik dan Daftar Publikasi - Start --}}
            <div x-data="{ graphic: 'artikel' }" @change-graphic.window="graphic = $event.detail.chart" class="w-full p-6 bg-white rounded-lg mb-5 overflow-hidden">
                {{-- Menu Button --}}
                <div class="flex border-b border-gray-300 gap-4 font-semibold">
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
            {{-- Grafik dan Daftar Publikasi - End --}}

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
                        <thead class="text-sm uppercase sticky top-0 z-10 bg-primary text-white">
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
                                <td data-modal-target="detail-penulis" data-modal-toggle="detail-penulis" class="px-6 py-4 hover:underline cursor-pointer">
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
        {{-- Publikasi - End --}}

        {{-- Modal Penulis - Start --}}
        <div id="detail-penulis" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden rounded-lg fixed inset-0 z-50 justify-center items-center w-full h-full backdrop-blur-sm bg-black/20 transition-all duration-300">  
                <div class="relative p-4 w-full max-w-[1080px] max-h-full">
                    {{-- Modal Header - Start --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg border-gray-200 bg-gradient-to-r from-[#00C7CF] to-[#006569]">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Profil Prof. Dr. Komarudin, M. Si.
                        </h3>
                        <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-penulis">
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
        {{-- Modal Penulis - End --}}
</div>
