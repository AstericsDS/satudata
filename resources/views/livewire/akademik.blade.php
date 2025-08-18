{{-- Wrapper --}}
<div>
    {{-- All Container --}}
    <div class="p-16 pt-0 mt-[50px]">

        {{-- Status - Start --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6 mb-6">

            {{-- Dosen - Start --}}
            <div class="p-2 flex-1 shadow-xl">
                <div class="flex flex-col gap-2 ml-2">
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
                <div class="flex flex-col gap-2 ml-2">
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
                <div class="flex flex-col gap-2 ml-2">
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
                <div class="flex flex-col gap-2 ml-2">
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
            jumlah_dosen_s2: @json($data->dosen_berdasarkan_pendidikan['jumlah_dosen_s2']),
            jumlah_dosen_s3: @json($data->dosen_berdasarkan_pendidikan['jumlah_dosen_s3'])
        };

        // document.addEventListener('livewire:init', () => {
        //     Livewire.on('updateDosenChart', (event) => {
        //         if (window.chart5) {
        //             window.chart5.updateSeries(event.series);
        //         }
        //     });
        // });
    </script>
</div>
