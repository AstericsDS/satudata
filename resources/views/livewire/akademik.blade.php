{{-- Wrapper --}}
<div>
    {{-- All Container --}}
    <div class="p-16 pt-0 mt-[50px]">

        {{-- Status - Start --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 mb-6">

            {{-- Dosen - Start --}}
            <div class="p-2 flex-1 shadow-xl">
                <div class="flex flex-col gap-2 ml-1">
                    <p class="text-gray-400 font-semibold">Dosen</p>
                    <p class="font-semibold text-2xl">{{ $data->unj_dalam_angka['jumlah_dosen'] ?? '0' }}</p>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-lime-800 text-white  font-semibold rounded-md text-xs">32%</span>
                        <span class="text-gray-500">Kualitas S3</span>
                    </div>
                </div>
            </div>
            {{-- Dosen - End --}}

            {{-- Mahasiswa - Start --}}
            <div class="p-2 flex-1 shadow-xl">
                <div class="flex flex-col gap-2 ml-1">
                    <p class="text-gray-400 font-semibold">Mahasiswa</p>
                    <p class="font-semibold text-2xl">{{ $data->unj_dalam_angka['jumlah_mahasiswa'] ?? '0' }}</p>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-lime-800 text-white  font-semibold rounded-md text-xs">+8%</span>
                        <span class="text-gray-500">Dari tahun sebelumnya</span>
                    </div>
                </div>
            </div>

            {{-- Wisuda - Start --}}
            <div class="p-2 flex-1 shadow-xl">
                <div class="flex flex-col gap-2 ml-1">
                    <p class="text-gray-400 font-semibold">Wisuda 2025</p>
                    <p class="font-semibold text-2xl">{{ $data->unj_dalam_angka['wisuda_2025'] ?? '0' }}</p>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-red-500 text-white  font-semibold rounded-md text-xs">-15%</span>
                        <span class="text-gray-500">Dari tahun sebelumnya</span>
                    </div>
                </div>
            </div>
            {{-- Wisuda - End --}}

            {{-- Peminat - Start --}}
            <div class="p-2 flex-1 shadow-xl">
                <div class="flex flex-col gap-2 ml-1">
                    <p class="text-gray-400 font-semibold">Peminat 2025</p>
                    <p class="font-semibold text-2xl text-red-500">47652</p>
                    <div class="flex items-center gap-2">
                        <span class="px-2 py-1 bg-red-500 text-white  font-semibold rounded-md text-xs">-11%</span>
                        <span class="text-gray-500">Dari tahun sebelumnya</span>
                    </div>
                </div>
            </div>
            {{-- Peminat - End --}}

        </div>
        {{-- Status - End --}}

        {{-- Data Mahasiswa - Start --}}
        <div class="p-8 border-2 rounded-md border-gray-200">

            {{-- Header - Start --}}
            <h1 class="text-3xl">Data Mahasiswa</h1>
            <hr class="mt-4 text-gray-300 rounded-xl">
            {{-- Header - End --}}

            {{-- Main Container Mahasiswa - Start --}}
            <div class="grid grid-cols-2 gap-x-14 gap-y-8 mt-8">

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</p>
                    </div>
                    <div>
                        <div id="angkatan" class="text-black mt-4"></div>
                    </div>
                </div>

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Mahasiswa Berdasarkan Fakultas</p>
                    </div>
                    <div>
                        <div id="fakultas" class="text-black mt-4 h-full"></div>
                    </div>
                </div>

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Mahasiswa Berdasarkan Jenjang</p>
                    </div>
                    <div>
                        <div id="jenjang" class="text-black mt-4"></div>
                    </div>
                </div>

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Peminat per-Tahun</p>
                    </div>
                    <div>
                        <div id="peminat" class="text-black mt-4"></div>
                    </div>
                </div>

            </div>
            {{-- Main Container Mahasiswa - End --}}

        </div>
        {{-- Data Mahasiswa - End --}}

        {{-- Data Dosen - Start --}}
        <div class="p-8 border-2 rounded-md border-gray-200 mt-8">

            {{-- Header - Start --}}
            <h1 class="text-3xl">Data Dosen</h1>
            <hr class="mt-4 text-gray-300 rounded-xl">
            {{-- Header - End --}}

            {{-- Main Container Dosen - Start --}}
            <div class="grid grid-cols-2 gap-x-14 gap-y-8 mt-8">

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Dosen Berdasarkan Jenjang Pendidikan Tertinggi</p>
                    </div>
                    <div>
                        <div id="dosen-gelar" class="text-black mt-4"></div>
                    </div>
                </div>

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Dosen Berdasarkan Jabatan Fungsional</p>
                    </div>
                    <div>
                        <div id="dosen-jabatan" class="text-black mt-4 h-full"></div>
                    </div>
                </div>

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Dosen Berdasarkan Status Kepegawaian</p>
                    </div>
                    <div>
                        <div id="dosen-pegawai" class="text-black mt-4"></div>
                    </div>
                </div>

                <div class="text-white shadow-xl">
                    <div class="bg-unj rounded-t-md p-4 font-semibold">
                        <p class="text-center">Jumlah Dosen Berdasarkan Fakultas</p>
                    </div>
                    <div>
                        <div id="dosen-fakultas" class="text-black mt-4"></div>
                    </div>
                </div>

            </div>
            {{-- Main Container Dosen - End --}}

        </div>
        {{-- Data Dosen - End --}}

    </div>


    <script>
        window.chartData = {
            jumlah_mahasiswa_diterima: @json($jumlah_mahasiswa_diterima),
            jumlah_mahasiswa: @json($jumlah_mahasiswa),

            jumlah_mahasiswa_d4: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_d4'] ?? 0),
            jumlah_mahasiswa_s1: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s1'] ?? 0),
            jumlah_mahasiswa_s2: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s2'] ?? 0),
            jumlah_mahasiswa_s3: @json($data->mahasiswa_berdasarkan_jenjang_pendidikan['jumlah_mahasiswa_s3'] ?? 0),

            jumlah_dosen_s2: @json($data->dosen_berdasarkan_pendidikan['jumlah_dosen_s2'] ?? 0),
            jumlah_dosen_s3: @json($data->dosen_berdasarkan_pendidikan['jumlah_dosen_s3'] ?? 0),

            jumlah_dosen_plp: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_plp'] ?? 0),
            jumlah_dosen_asisten: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_asisten'] ?? 0),
            jumlah_dosen_lektor: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_lektor'] ?? 0),
            jumlah_dosen_lektor_kepala: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_lektor_kepala'] ?? 0),
            jumlah_dosen_profesor: @json($data->dosen_berdasarkan_jabatan_fungsional['jumlah_dosen_profesor'] ?? 0),

            jumlah_dosen_pns: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_pns'] ?? 0),
            jumlah_dosen_pppk: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_pppk'] ?? 0),
            jumlah_dosen_tetap: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_tetap'] ?? 0),
            jumlah_dosen_tidak_tetap: @json($data->dosen_berdasarkan_status_kepegawaian['jumlah_dosen_tidak_tetap'] ?? 0),

            jumlah_dosen_pascasarjana: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_pascasarjana'] ?? 0),
            jumlah_dosen_fip: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fip'] ?? 0),
            jumlah_dosen_fbs: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fbs'] ?? 0),
            jumlah_dosen_fmipa: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fmipa'] ?? 0),
            jumlah_dosen_fish: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fish'] ?? 0),
            jumlah_dosen_ft: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_ft'] ?? 0),
            jumlah_dosen_fikk: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fikk'] ?? 0),
            jumlah_dosen_feb: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_feb'] ?? 0),
            jumlah_dosen_fpsi: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_fpsi'] ?? 0),
            jumlah_dosen_ppg: @json($data->dosen_berdasarkan_fakultas['jumlah_dosen_ppg'] ?? 0),
        };
    </script>
</div>
