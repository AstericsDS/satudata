<div>
    
    <div class="mx-auto px-4 sm:px-6 lg:px-8 py-4">
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
                        <tr class="bg-white border-b-1 border-gray-200">
                            <td class="px-6 py-4">
                                1
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
                                <button type="button" class="text-white bg-unj hover:bg-unj/90 active:bg-unj/80 w-[38px] h-[38px] p-0 flex items-center justify-center rounded-[10px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>

                        <tr class="bg-white border-b-1 border-gray-200">
                            <td class="px-6 py-4">
                                2
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
                                <button type="button"
                                    class="text-white bg-unj hover:bg-unj/90 active:bg-unj/80 w-[38px] h-[38px] p-0 flex items-center justify-center rounded-[10px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- Table - End --}}
        </div>
    </div>
    
</div>
