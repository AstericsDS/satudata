<nav class="bg-transparent border-gray-200 sticky top-0 z-50">

    {{-- All Container - Start --}}
    <div class="flex flex-wrap justify-between items-center w-full px-4 sm:px-6 py-2.5">

        {{-- Logo - Start --}}
        <a href="/dashboard" class="flex items-center space-x-3">
            <img src="{{asset('assets/images/unj.png')}}" width="55px" class="h-14 w-auto mt-2 ml-2" alt="UNJ Logo">
            <div class="flex flex-col">
                <h1 class="font-bold text-lg sm:text-2xl text-unj">SATU DATA</h1>
                <h2 class="font-bold text-xs sm:text-base text-unj">UNIVERSITAS NEGERI JAKARTA</h2>
            </div>
        </a>
        {{-- Logo - End --}}

        {{-- Collapse Three-lines Button - Start --}}
        <button data-collapse-toggle="navbar-multi-level" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg xl:hidden focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>

            {{-- Hamburger Icon -  Start --}}
            <svg id="hamburger-icon" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
            {{-- Hamburger Icon - End --}}

            {{-- Close Icon - Start --}}
            <svg id="close-icon" class="hidden w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />>
            </svg>
            {{-- Close Icon - End --}}

        </button>
        {{-- Collapse Three-lines Button - End --}}

        {{-- Menu - Start --}}
        <div class="hidden w-full xl:block xl:w-auto" id="navbar-multi-level">

            {{-- Menu List - Start --}}
            <ul class="flex space-x-4 font-medium text-sm p-4 md:p-0 mt-4 border border-gray-100 rounded-lg xl:flex-row  xl:mt-0 xl:border-0">

                {{-- Home - Start --}}
                <li class="bg-unj rounded-md">
                    <a href="/" class="block py-2 px-3 text-white hover:underline" aria-current="page">
                        Home
                    </a>
                </li>
                {{-- Home - End --}}

                {{-- Akademik & Mahasiswa - Start --}}
                <li class=" {{ request()->route()->getPrefix() === '/akademik-dan-mahasiswa' ? 'bg-unj rounded-md overflow-hidden text-white' : 'text-unj' }}">
                    <button id="akademik-navbar-link" data-dropdown-toggle="akademikNavbar" class="flex items-center justify-between w-full py-2 px-3 hover:underline">
                        Akademik & Mahasiswa
                    </button>
                    {{-- Menu Akademik & Mahasiswa - Start --}}
                    <div id="akademikNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-55">
                        <ul class="text-sm text-unj" aria-labelledby="akademik-large-button">
                            <li>
                                <a href="{{ route('jumlah-mahasiswa') }}" class="block px-4 py-1.5 hover:underline">Jumlah Mahasiswa</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Jumlah Wisudawan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Mahasiswa Berprestasi</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Tracer Study</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Sebaran Mahasiswa Baru</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Monitoring Perkuliahan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Beban Mengajar</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Rasio Dosen/Mahasiswa</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Data Akreditasi</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Beasiswa</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Kurikulum</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Menu Akademik & Mahasiswa - End --}}
                </li>
                {{-- Akademik & Mahasiswa - End --}}

                {{-- Kepegawaian & Umum - Start --}}
                <li class="bg-unj rounded-md overflow-hidden">
                    <button id="kepegawaian-navbar-link" data-dropdown-toggle="kepegawaianNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-white bg-unj">
                        Kepegawaian & Umum
                    </button>
                    {{-- Menu Kepegawaian & Umum - Start --}}
                    <div id="kepegawaianNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-55">
                        <ul class="text-sm text-unj" aria-labelledby="kepegawaian-large-button">
                            <li>
                                <a href="#" class="block px-4 py-1.5">Daftar Pejabat Pimpinan</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Statistik Dosen</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Profil Dosen per-Fakultas</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Daftar Tendik per-Unit</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Daftar Gedung, Ruang, dan Sarana</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Penggunaan Sarana dan Prasarana</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Menu Kepegawaian & Umum - End --}}
                </li>
                {{-- Kepegawaian & Umum - End --}}

                {{-- Keuangan & Perencanaan - Start --}}
                <li class="bg-unj rounded-md overflow-hidden">
                    <button id="keuangan-navbar-link" data-dropdown-toggle="keuanganNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-white bg-unj">
                        Keuangan & Perencanaan
                    </button>
                    {{-- Menu Keuangan & Perencanaan - Start --}}
                    <div id="keuanganNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-55">
                        <ul class="text-sm text-unj" aria-labelledby="keuangan-large-button">
                            <li>
                                <a href="#" class="block px-4 py-1.5">Serapan Anggaran UNJ</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Pagu Anggaran</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Laporan KAP UNJ</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Menu Keuangan & Perencanaan - End --}}
                </li>
                {{-- Keuangan & Perencanaan - End --}}

                {{-- Bisnis & Inovasi - Start --}}
                <li class="bg-unj rounded-md overflow-hidden">
                    <button id="bisnis-navbar-link" data-dropdown-toggle="bisnisNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-white bg-unj">
                        Bisnis & Inovasi
                    </button>
                    {{-- Menu Bisnis & Inovasi - Start --}}
                    <div id="bisnisNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-55">
                        <ul class="text-sm text-unj" aria-labelledby="bisnis-large-button">
                            <li>
                                <a href="#" class="block px-4 py-1.5">Kegiatan Kerja Sama</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Unit Bisnis</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Penelitian</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Pengabdian Masyarakat</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Kegiatan SDG's</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Menu Bisnis & Inovasi - End --}}
                </li>
                {{-- Bisnis & Inovasi - End --}}

                {{-- Publikasi - Start --}}
                <li class="bg-unj rounded-md overflow-hidden">
                    <button id="publikasi-navbar-link" data-dropdown-toggle="publikasiNavbar"
                        class="flex items-center justify-between w-full py-2 px-3 text-white bg-unj">
                        Publikasi
                    </button>
                    {{-- Menu Publikasi - Start --}}
                    <div id="publikasiNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-55">
                        <ul class="text-sm text-unj" aria-labelledby="publikasi-large-button">
                            <li>
                                <a href="#" class="block px-4 py-1.5">Indeksasi SINTA</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Iuran SIPP</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-1.5">Laporan Kinerja Universitas</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Menu Publikasi - End --}}
                </li>
                {{-- Publikasi - End --}}

            </ul>
            {{-- Menu List - End --}}

        </div>
        {{-- Menu - End --}}

    </div>
    {{-- All Container - End --}}
    
</nav>