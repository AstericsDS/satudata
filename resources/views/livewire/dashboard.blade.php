@vite(['resources/js/charts/dashboard.js'])
<div class="mb-20">

    {{-- Stat Cards - Start --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-6 my-8 mx-4 md:mx-12 lg:mx-24">

        {{-- Wisudawan --}}
        <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/wisudawan.svg') }}" alt="Wisudawan 2025" class="w-10 h-10 shrink-0">
                <div class="flex flex-col text-center items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">{{ $dashboardData['wisuda'] ?? '-' }}</span>
                    <span class="font-semibold ">Wisudawan {{ $year }}</span>
                </div>
            </div>
            <div class="w-full text-center mx-auto">
                <span
                    class="rounded-lg text-white font-semibold p-[2px] px-[7px] {{ is_numeric($percent_wisuda) && $percent_wisuda < 0 ? 'bg-red-700' : 'bg-primary' }}">
                    @if (is_numeric($percent_wisuda))
                        {{ $percent_wisuda > 0 ? '+' . $percent_wisuda . '%' : '-' . $percent_wisuda . '%' }}
                    @else
                        {{ $percent_wisuda }}
                    @endif
                </span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>

        {{-- Mahasiswa --}}
        <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/mahasiswa.svg') }}" alt="Mahasiswa" class="w-10 h-10 shrink-0">
                <div class="flex flex-col text-center items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">{{ $dashboardData['mahasiswa'] ?? '-' }}</span>
                    <span class="font-semibold ">Mahasiswa</span>
                </div>
            </div>
            <div class="w-full text-center mx-auto">
                <span
                    class="bg-primary rounded-lg text-white font-semibold p-[2px] px-[7px] {{ is_numeric($percent_mahasiswa) && $percent_mahasiswa < 0 ? 'bg-red-700' : 'bg-primary' }}">
                    @if (is_numeric($percent_mahasiswa))
                        {{ $percent_mahasiswa > 0 ? '+' . $percent_mahasiswa . '%' : '-' . $percent_mahasiswa . '%' }}
                    @else
                        {{ $percent_mahasiswa }}
                    @endif
                </span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>

        {{-- Dosen --}}
        <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/dosen.svg') }}" alt="Dosen" class="w-10 h-10 shrink-0">
                <div class="flex flex-col text-center items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">{{ $dashboardData['dosen'] ?? '-' }}</span>
                    <span class="font-semibold ">Dosen</span>
                </div>
            </div>
            <div class="w-full text-center mx-auto">
                <span class="bg-primary rounded-lg text-white font-semibold p-[2px] px-[7px]">
                    @if (is_numeric($percent_mahasiswa))
                        {{ $percent_s3 . '%' }}
                    @else
                        {{ $percent_s3 }}
                    @endif
                </span>
                <span class="text-gray-600 ml-2">Kualifikasi S3</span>
            </div>
        </div>

        {{-- Peminat --}}
        <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md">
            <div class="flex items-center justify-center">
                <img src="{{ asset('assets/dashboard/peminat.svg') }}" alt="Peminat 2025" class="w-10 h-10 shrink-0">
                <div class="flex flex-col text-center items-center ml-4 gap-2 text-xl">
                    <span class="font-bold">0</span>
                    <span class="font-semibold ">Peminat {{ $year }}</span>
                </div>
            </div>
            <div class="w-full text-center mx-auto">
                <span class="bg-primary rounded-lg text-white font-semibold p-[2px] px-[7px]">-</span>
                <span class="text-gray-600 ml-2">Dari tahun sebelumnya</span>
            </div>
        </div>
    </div>
    {{-- Stat Cards - End --}}

    {{-- Graphic - Start --}}
    <div x-data="{
        active: 0,
        total: 8,
        auto: true,
        intervalId: null,
    
        start() {
            if (this.intervalId) clearInterval(this.intervalId);
            this.intervalId = setInterval(() => {
                this.active = (this.active + 1) % this.total;
            }, 10000);
        },
        stop() {
            if (this.intervalId) clearInterval(this.intervalId);
        },
        clear() {
            clearInterval(this.intervalId);
            this.intervalId = setInterval(() => {
                this.active = (this.active + 1) % this.total;
            }, 10000);
        }

    }" x-effect="auto ? start() : stop()">

        <div class="w-[95%] md:w-[90%] xl:w-[65%] mx-auto text-end">
            <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" value="true" class="sr-only peer" checked x-model="auto">
                <div
                    class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-800">Ganti Otomatis</span>
            </label>
        </div>

        {{-- Main Chart --}}
        <div
            @change-chart.window="active = $event.detail.id; clear()"
            class="group relative bg-linear-to-b from-primary from-20% to-accent-2 w-[95%] md:w-[90%] xl:w-[65%] mx-auto rounded-md flex flex-col gap-4 px-4 pb-8 justify-center"
        >

            {{-- Change Button --}}
            <button 
                class="absolute top-[50%] -left-14 text-primary opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer"
                @click="active = (active >= 0 && active <= 3) ? 4 : 0"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M11.8 13H15q.425 0 .713-.288T16 12t-.288-.712T15 11h-3.2l.9-.9q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275l-2.6 2.6q-.3.3-.3.7t.3.7l2.6 2.6q.275.275.7.275t.7-.275t.275-.7t-.275-.7zm.2 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                </svg>
            </button>

            {{-- Change Button --}}
            <button @click="active = (active >= 0 && active <= 3) ? 4 : 0"
                class="absolute top-[50%] -right-14 text-primary opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m12.2 13l-.9.9q-.275.275-.275.7t.275.7t.7.275t.7-.275l2.6-2.6q.3-.3.3-.7t-.3-.7l-2.6-2.6q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7l.9.9H9q-.425 0-.712.288T8 12t.288.713T9 13zm-.2 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                </svg>
            </button>

            {{-- Mahasiswa Angkatan --}}
            <div x-show="active === 0" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>
                    @if(optional($syncMahasiswa)->updated_at)
                        <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="mahasiswa-angkatan" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Mahasiswa Fakultas --}}
            <div x-show="active === 1" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Fakultas</h1>
                    @if(optional($syncMahasiswa)->updated_at)
                        <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="mahasiswa-fakultas" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Mahasiswa Jenjang --}}
            <div x-show="active === 2" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Jenjang</h1>
                    @if(optional($syncMahasiswa)->updated_at)
                        <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="mahasiswa-jenjang" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Peminat --}}
            <div x-show="active === 3" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Jumlah Peminat per-Tahun</h1>
                    @if(optional($syncMahasiswa)->updated_at)
                        <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="peminat" class="text-black bg-white w-[95%] mx-auto rounded-lg"></div>
            </div>

            {{-- Dosen Berdasarkan Pendidikan --}}
            <div x-show="active === 4" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Pendidikan</h1>
                    @if(optional($syncDosen)->updated_at)
                        <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="dosen-pendidikan" class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center">
                </div>
            </div>

            {{-- Dosen Berdasarkan Jabatan Fungsional --}}
            <div x-show="active === 5" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Jabatan Fungsional</h1>
                    @if(optional($syncDosen)->updated_at)
                        <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="dosen-jabatan" class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center"></div>
            </div>

            {{-- Dosen Berdasarkan Fakultas --}}
            <div x-show="active === 6" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Fakultas</h1>
                    @if(optional($syncDosen)->updated_at)
                        <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="dosen-fakultas" class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center"></div>
            </div>

            {{-- Dosen Berdasarkan Status Kepegawaian --}}
            <div x-show="active === 7" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                {{-- Header --}}
                <div class="p-4 text-white text-center">
                    <h1 class="font-semibold">Dosen Berdasarkan Status Kepegawaian</h1>
                    @if(optional($syncDosen)->updated_at)
                        <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                    @else
                        <h2>Belum Sinkron</h2>
                    @endif
                </div>

                {{-- Chart --}}
                <div id="dosen-kepegawaian" class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center">
                </div>
            </div>

        </div>

        {{-- Menu Chart --}}
        <div class="border border-primary rounded-md w-[95%] mx-auto my-8 p-6">

            <h1 class="text-center font-semibold mb-8 uppercase" x-text="active >= 0 && active <= 3 ? 'Data Mahasiswa' : 'Data Dosen'"></h1>

            {{-- Submenu Chart --}}
            <div x-data>

                <!-- Menu Mahasiswa -->
                <div x-show="active >= 0 && active <= 3" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div @click="$dispatch('change-chart', { id: 0 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>
                            <h2 class="text-sm">
                                @if(optional($syncMahasiswa)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}
                                    </h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg flex-1">
                            <div id="mahasiswa-angkatan-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 1 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Jumlah Mahasiswa Berdasarkan Fakultas</h1>
                            <h2 class="text-sm">
                                @if(optional($syncMahasiswa)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}
                                    </h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg flex-1">
                            <div id="mahasiswa-fakultas-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 2 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Jumlah Mahasiswa Berdasarkan Jenjang</h1>
                            <h2 class="text-sm">
                                @if(optional($syncMahasiswa)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}
                                    </h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg flex-1">
                            <div id="mahasiswa-jenjang-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 3 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Jumlah Peminat per-Tahun</h1>
                            <h2 class="text-sm">
                                @if(optional($syncMahasiswa)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncMahasiswa->updated_at)->locale('id')->diffForHumans() }}
                                    </h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg flex-1">
                            <div id="peminat-small"></div>
                        </div>
                    </div>
                </div>

                <!-- Menu Dosen -->
                <div x-show="active >= 4 && active <= 7" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                    <div @click="$dispatch('change-chart', { id: 4 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Dosen Berdasarkan Pendidikan</h1>
                            <h2 class="text-sm">
                                @if(optional($syncDosen)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
                            <div id="dosen-pendidikan-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 5 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Dosen Berdasarkan Jabatan Fungsional</h1>
                            <h2 class="text-sm">
                                @if(optional($syncDosen)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
                            <div id="dosen-jabatan-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 6 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Dosen Berdasarkan Fakultas</h1>
                            <h2 class="text-sm">
                                @if(optional($syncDosen)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
                            <div id="dosen-fakultas-small"></div>
                        </div>
                    </div>

                    <div @click="$dispatch('change-chart', { id: 7 })"
                        class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none">
                        <div class="p-4 text-white text-center">
                            <h1 class="font-semibold text-sm">Dosen Berdasarkan Status Kepegawaian</h1>
                            <h2 class="text-sm">
                                @if(optional($syncDosen)->updated_at)
                                    <h2>Data diperbarui
                                        {{ optional($syncDosen->updated_at)->locale('id')->diffForHumans() }}</h2>
                                @else
                                    <h2>Belum Sinkron</h2>
                                @endif
                            </h2>
                        </div>
                        <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
                            <div id="dosen-kepegawaian-small"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Graphic - End --}}

</div>

<script>
    window.chartData = {
        jumlah_mahasiswa: @json($dashboardData['mahasiswa_tahun_angkatan']),
        jumlah_mahasiswa_diterima: @json($dashboardData['mahasiswa_diterima_tahun_angkatan']),
        jumlah_mahasiswa_fakultas: @json($dashboardData['mahasiswa_fakultas']),

        jumlah_mahasiswa_s1: @json($dashboardData['mahasiswa_s1']),
        jumlah_mahasiswa_s2: @json($dashboardData['mahasiswa_s2']),
        jumlah_mahasiswa_s3: @json($dashboardData['mahasiswa_s3']),

        dosen_pendidikan: @json($dashboardData['dosen_pendidikan']),
        dosen_jabatan: @json($dashboardData['dosen_jabatan']),
        dosen_fakultas: @json($dashboardData['dosen_fakultas']),
        dosen_status: @json($dashboardData['dosen_status']),
    };
</script>