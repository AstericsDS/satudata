@vite(['resources/js/charts/profil-kepakaran-dosen.js'])
@vite(['resources/js/charts/jumlah-publikasi.js'])

<div class="flex min-h-screen mb-20">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Temukan Pegawai</span>
                    </div>
                </li>
            </ol>
        </nav>
        {{-- Breadcrumbs - End --}}

        {{-- Main Container - Start --}}
        <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-b from-primary to-[#95F4F8]">
            {{-- Text --}}
            <div class="text-white mb-5">
                <h1 class="font-semibold text-2xl">Temukan Pegawai</h1>
                <p class="mt-1 text-base">Pencarian komprehensiff untuk menemukan pegawai berdasarkan nama, NIP, atau unit kerja. Akses profil lengkap dosen dan tenaga kependidikan dengan mudah.</p>
            </div>

            {{-- Search Input --}}
            <form action="" class="w-full bg-white rounded-lg">
                <label for="search" class="font-medium text-sm text-heading sr-only">Cari nama pegawai</label>
                <div class="relative">
                    <input type="search" id="search" class="w-full p-3 border focus:border-primary text-heading text-sm rounded-lg placeholder:text-body" placeholder="Cari nama pegawai, dosen, atau tenaga kependidikan..." required />
                    <button type="button" class="absolute end-1.5 bottom-1.5 text-white bg-primary hover:bg-primary/90 box-border border border-transparent shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
                
            </form>

            {{-- Table --}}
            <div class="relative overflow-x-auto rounded-lg my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-800 bg-white rounded-lg">
                    <thead class="text-xs text-gray-800 uppercase">
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
                                Homebase
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cabang
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 6; $i++)
                            <tr class="bg-white border-b-1 border-gray-200">
                                <td class="px-6 py-4">
                                    {{ $i }}
                                </td>
                                <td data-modal-target="detail-dosen" data-modal-toggle="detail-dosen" class="px-6 py-4 hover:underline cursor-pointer">
                                    Prof. Dr. Komarudin, M. Si.
                                </td>
                                <td class="px-6 py-4">
                                    123456789012345
                                </td>
                                <td class="px-6 py-4">
                                    Fakultas Ilmu Sosial dan Hukum
                                </td>
                                <td class="px-6 py-4">
                                    Dosen
                                </td>
                                <td class="px-6 py-4">
                                    PNS
                                </td>
                            </tr>
                        @endfor

                        @for ($i = 6; $i < 11; $i++)
                            <tr class="bg-white border-b-1 border-gray-200">
                                <td class="px-6 py-4">
                                    {{ $i }}
                                </td>
                                <td data-modal-target="detail-tendik" data-modal-toggle="detail-tendik" class="px-6 py-4 hover:underline cursor-pointer">
                                    Abcde, S. Kom.
                                </td>
                                <td class="px-6 py-4">
                                    123456789012345
                                </td>
                                <td class="px-6 py-4">
                                    Direktur Keuangan dan Perencanaan
                                </td>
                                <td class="px-6 py-4">
                                    Tendik
                                </td>
                                <td class="px-6 py-4">
                                    PNS
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Main Container - End --}}

        {{-- Modal - Start --}}
        
        <div>
            {{-- Modal Dosen --}}
            <div id="detail-dosen" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden rounded-lg fixed inset-0 z-50 justify-center items-center w-full h-full backdrop-blur-sm bg-black/20 transition-all duration-300">  
                <div class="relative p-4 w-full max-w-[1080px] max-h-full">
                    {{-- Modal Header - Start --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg border-gray-200 bg-gradient-to-r from-[#00C7CF] to-[#006569]">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Profil Prof. Dr. Komarudin, M. Si.
                        </h3>
                        <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-dosen">
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

            {{-- Modal Tendik --}}
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
        </div>
        {{-- Modal - End --}}
        
    </div>
</div>
