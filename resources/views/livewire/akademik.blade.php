<div class="p-16">
    {{-- <div id="chart" class="w-lg">

    </div> --}}
    {{-- <div>
        <div class="p-2">
            <div class="flex border-r-2">
                <div class="flex flex-col justify-between">
                    <h1 class="text-2xl font-medium">MAHASISWA S1 DITERIMA</h1>
                    <h1 class="text-5xl">106</h1>
                    <h1 class="text-xs">0.00% Dari semester sebelumnya</h1>
                </div>
                <div id="donut"></div>
            </div>
        </div>
    </div> --}}

    <div class="flex gap-4 p-4">

        <div class="p-2 flex-1 shadow-xl">
            <div class="flex flex-col gap-2">
                <p class="text-gray-400 font-semibold">Dosen</p>
                <p class="font-semibold">1429</p>
                <div>
                    <span>41%</span>
                    <span>Kualitas S3</span>
                </div>
            </div>
        </div>

        <div class="p-2 flex-1 shadow-xl">
            <div class="flex flex-col gap-2">
                <p class="text-gray-400 font-semibold">Mahasiswa</p>
                <p class="font-semibold">44272</p>
                <div>
                    <span>41%</span>
                    <span>Kualitas S3</span>
                </div>
            </div>
        </div>

        <div class="p-2 flex-1 shadow-xl">
            <div class="flex flex-col gap-2">
                <p class="text-gray-400 font-semibold">Wisuda 2025</p>
                <p class="font-semibold">2283</p>
                <div>
                    <span>41%</span>
                    <span>Kualitas S3</span>
                </div>
            </div>
        </div>

        <div class="p-2 flex-1 shadow-xl">
            <div class="flex flex-col gap-2">
                <p class="text-gray-400 font-semibold">Peminat 2025</p>
                <p class="font-semibold">-</p>
                <div>
                    <span>41%</span>
                    <span>Kualitas S3</span>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-2 gap-x-14 gap-y-4 mt-8">
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
                <div class="text-black mt-4"></div>
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
                <div class="text-black mt-4"></div>
            </div>
        </div>
    </div>
</div>
