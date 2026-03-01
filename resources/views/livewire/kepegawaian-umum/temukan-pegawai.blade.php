@vite(['resources/js/charts/profil-kepakaran-dosen.js'])
@vite(['resources/js/charts/jumlah-publikasi.js'])

<div class="flex min-h-screen mb-8">
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

            {{-- Table --}}
            <div class="relative rounded-lg my-4 bg-white p-5">
                <livewire:kepegawaian-dan-umum.tables.temukan-pegawai-table />
            </div>
        </div>
        {{-- Main Container - End --}}
    </div>
</div>

