<div class="flex flex-col min-h-screen">
    
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4 overflow-y-auto flex-grow">
        {{-- Card - Start --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 my-4">
            {{-- Total Pejabat - Start --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    200
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    Total Pejabat
                </div>
            </div>
            {{-- Total Pejabat - End --}}
        
            {{-- Agenda Hari Ini - Start --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    12
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    Agenda Hari Ini
                </div>
            </div>
            {{-- Agenda Hari Ini - End --}}
        
            {{-- Rapat Berlangsung - Start --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    10
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    Rapat Berlangsung
                </div>
            </div>
            {{-- Rapat Berlangsung - End --}}
        
            {{-- Total Agenda Minggu Ini - Start --}}
            <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-r from-[#006569] to-[#00C7CF] text-white text-center">
                <div class="text-4xl font-bold">
                    100
                </div>
        
                <div class="text-2xl font-semibold mt-2">
                    Total Agenda Minggu Ini
                </div>
            </div>
            {{-- Total Agenda Minggu Ini - End --}}
        </div>
        {{-- Card - End --}}

        <div class="w-full p-6 rounded-xl shadow-lg bg-gradient-to-br from-[#006569] to-[#95F4F8]">
            {{-- Text - Start --}}
            <div class="text-white">
                <h1 class="font-bold">Agenda Pejabat</h1>
                <p>Data ini mencakup seluruh mahasiswa aktif, cuti, dan yang berstatus khusus lainnya dalam berbagai jenjang pendidikan. Visualisasi data jumlah mahasiswa membantu dalam perencanaan kapasistas akademik, alokasi sumber daya, dan pengambilan keputusan strategis institusi pendidikan.</p>
            </div>
            {{-- Text - End --}}

            {{-- Table - Start --}}
            <div class="relative overflow-x-auto rounded-lg my-4">
                <table class="w-full text-sm text-left rtl:text-right text-gray-800 bg-white rounded-lg">
                    <thead class="text-xs text-gray-800 uppercase">
                        <tr class="border-b-1 border-gray-200">
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pejabat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NIP
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jabatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < 5; $i++)
                            <tr class="bg-white border-b-1 border-gray-200">
                                <td class="px-6 py-4">
                                    {{ $i }}
                                </td>
                                <td class="px-6 py-4">
                                    Prof. Dr. Komarudin, M. Si.
                                </td>
                                <td class="px-6 py-4">
                                    123456789012345
                                </td>
                                <td class="px-6 py-4">
                                    Fakultas Ilmu Sosial dan Hukum
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Ada Ditempat</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" data-modal-target="detail-agenda-pejabat" data-modal-toggle="detail-agenda-pejabat"
                                        class="text-white bg-unj hover:bg-unj/90 active:bg-unj/80 w-[38px] h-[38px] p-0 flex items-center justify-center rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endfor

                        @for ($i = 5; $i < 6; $i++)
                            <tr class="bg-white border-b-1 border-gray-200">
                                <td class="px-6 py-4">
                                    {{ $i }}
                                </td>
                                <td class="px-6 py-4">
                                    Prof. Dr. Komarudin, M. Si.
                                </td>
                                <td class="px-6 py-4">
                                    123456789012345
                                </td>
                                <td class="px-6 py-4">
                                    Fakultas Ilmu Sosial dan Hukum
                                </td>
                                <td class="px-6 py-4">
                                    <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-md">Sedang Rapat</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" data-modal-target="detail-agenda-pejabat" data-modal-toggle="detail-agenda-pejabat"
                                        class="text-white bg-unj hover:bg-unj/90 active:bg-unj/80 w-[38px] h-[38px] p-0 flex items-center justify-center rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            {{-- Table - End --}}

            {{-- Modal - Start --}}
            <div id="detail-agenda-pejabat" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden rounded-lg fixed inset-0 z-50 justify-center items-center w-full h-full backdrop-blur-sm bg-black/20 transition-all duration-300">  
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    {{-- Modal Header - Start --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t-lg border-gray-200 bg-gradient-to-r from-[#00C7CF] to-[#006569]">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Detail Agenda Pejabat
                        </h3>
                        <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="detail-agenda-pejabat">
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
                        <img class="rounded-full w-25 h-25" src="{{ asset('assets/images/hornet.jpg') }}" alt="photo profile">
                        <div class="text-center">
                            <p>Prof Dr. Komarudin, M. Si.</p>
                            <p class="font-bold">Rektor</p>
                        </div>

                        <div class="bg-gray-200 rounded-lg w-full p-4">
                            <p class="text-left font-semibold">Agenda Lengkap Hari Ini</p>

                            {{-- Activity Card 1 --}}
                            <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden my-2">
                                <div class="w-2 bg-green-800"></div>
                                <div class="flex-grow flex items-center justify-between p-4">
                                    <div>
                                        <p class="font-semibold">09.00 - 10.30</p>
                                        <p class="font-semibold">Rapat Pembukaan Seminar Nasional</p>
                                        <p class="font-light">Ruang Rektorat Lt. 3</p>
                                    </div>
                                    <span class="text-sm bg-green-100 text-green-800 px-4 py-2 rounded-xl">
                                        Selesai
                                    </span>
                                </div>
                            </div>

                            {{-- Activity Card 2 --}}
                            <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden my-2">
                                <div class="w-2 bg-yellow-400"></div>
                                <div class="flex-grow flex items-center justify-between p-4">
                                    <div>
                                        <p class="font-semibold">11.00 - 12.00</p>
                                        <p class="font-semibold">Rapat Pembukaan Seminar Nasional</p>
                                        <p class="font-light">Ruang Rektorat Lt. 3</p>
                                    </div>
                                    <span class="text-sm bg-yellow-100 text-yellow-800 px-4 py-2 rounded-xl">
                                        Berjalan
                                    </span>
                                </div>
                            </div>

                            {{-- Activity Card 3 --}}
                            <div class="flex bg-white rounded-2xl shadow-lg overflow-hidden my-2">
                                <div class="w-2 bg-gray-400"></div>
                                <div class="flex-grow flex items-center justify-between p-4">
                                    <div>
                                        <p class="font-semibold">13.00 - 15.00</p>
                                        <p class="font-semibold">Rapat Pembukaan Seminar Nasional</p>
                                        <p class="font-light">Ruang Rektorat Lt. 3</p>
                                    </div>
                                    <span class="text-sm bg-gray-100 text-gray-800 px-4 py-2 rounded-xl">
                                        Terjadwal
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- Modal Body - End --}}
                </div>
            </div>
            {{-- Modal - End --}}
        </div>
    </div>
    
</div>
