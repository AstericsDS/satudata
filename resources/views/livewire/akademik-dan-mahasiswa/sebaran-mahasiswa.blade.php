<div class="mx-24 mb-8 mt-4">
    <!-- Breadcrumb -->
    <nav
        class="flex justify-end"
        aria-label="Breadcrumb"
    >
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a
                    class="hover:text-primary inline-flex items-center text-sm font-medium text-gray-700 transition-all"
                    href="{{ route("dashboard") }}"
                >
                    <svg
                        class="me-2.5 h-3 w-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg
                        class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 9 4-4-4-4"
                        />
                    </svg>
                    <a
                        class="hover:text-primary ms-1 text-sm font-medium text-gray-700 transition-all md:ms-2"
                        href="{{ route("sebaran-mahasiswa") }}"
                    >
                        Sebaran Mahasiswa
                    </a>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Stat Cards -->
    <div class="mt-6 flex gap-8">
        <div class="bg-linear-to-tr from-primary/70 to-accent-1/70 flex flex-1 flex-col items-center justify-center gap-3 rounded-md p-8 text-white">
            <h1 class="text-5xl">-</h1>
            <h2 class="text-xl font-semibold">Jumlah Seluruh Peminat</h2>
        </div>
        <div class="bg-linear-to-tr from-primary/70 to-accent-1/70 flex flex-1 flex-col items-center justify-center gap-3 rounded-md p-8 text-white">
            <h1 class="text-5xl">-</h1>
            <h2 class="text-xl font-semibold">Jumlah Seluruh Daya Tampung</h2>
        </div>
    </div>

    <!-- Content -->
    <div
        class="bg-linear-to-b from-primary to-accent-2 mt-8 overflow-hidden rounded-t-lg p-6"
        x-data="{
            menu: 'daya-tampung',
            graphicTable: 'per-fakultas',
        }"
        @change-menu.window="menu = $event.detail.menu"
    >
        <div class="mb-4 flex space-x-2 rounded-md bg-white p-6">
            <button
                class="flex-1 rounded-md py-3 text-center font-semibold transition-all"
                @click="$dispatch('change-menu', { menu: 'daya-tampung' })"
                :class="menu === 'daya-tampung' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'"
            >
                Daya Tampung
            </button>
            <button
                class="flex-1 rounded-md py-3 text-center font-semibold transition-all"
                @click="$dispatch('change-menu', { menu: 'jalur-prestasi' })"
                :class="menu === 'jalur-prestasi' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'"
            >
                <div class="flex flex-col space-y-2">
                    <span>Jalur Prestasi</span>
                    <span class="font-normal">Sebaran PENMABA</span>
                </div>
            </button>
            <button
                class="flex-1 rounded-md py-3 text-center font-semibold transition-all"
                @click="$dispatch('change-menu', { menu: 'jalur-rapor' })"
                :class="menu === 'jalur-rapor' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'"
            >
                <div class="flex flex-col space-y-2">
                    <span>Jalur Rapor</span>
                    <span class="font-normal">Sebaran Pendaftar Mahasiswa Baru</span>
                </div>
            </button>
            <button
                class="flex-1 rounded-md py-3 text-center font-semibold transition-all"
                @click="$dispatch('change-menu', { menu: 'jalur-nilai-utbk' })"
                :class="menu === 'jalur-nilai-utbk' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'"
            >
                <div class="flex flex-col space-y-2">
                    <span>Jalur Nilai UTBK</span>
                    <span class="font-normal">Sebaran Pendaftar Mahasiswa Baru</span>
                </div>
            </button>
        </div>

        <!-- Daya Tampung -->
        <div
            class="mt-4 flex flex-col rounded-md bg-white p-6"
            x-data="{ selected: null }"
            x-show="menu === 'daya-tampung'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 1 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 1 ? (selected = 1) : (selected = null)"
                >
                    <span>Fakultas Ilmu Pendidikan</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 1"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 2 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 2 ? (selected = 2) : (selected = null)"
                >
                    <span>Fakultas Bahasa dan Seni</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 2"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 3 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 3 ? (selected = 3) : (selected = null)"
                >
                    <span>Fakultas Matematika dan Ilmu Pengetahuan Alam</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 3"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 4 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 4 ? (selected = 4) : (selected = null)"
                >
                    <span>Fakultas Ilmu Sosial dan Hukum</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 4"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 5 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 5 ? (selected = 5) : (selected = null)"
                >
                    <span>Fakultas Teknik</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 5"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 6 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 6 ? (selected = 6) : (selected = null)"
                >
                    <span>Fakultas Ilmu Keolahragaan dan Kesehatan</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 6"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 7 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 7 ? (selected = 7) : (selected = null)"
                >
                    <span>Fakultas Ekonomi dan Bisnis</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 7"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>

            <div class="mb-4">
                <div
                    class="py-4 px-6 bg-primary/10 font-semibold text-2xl flex justify-between items-center cursor-pointer hover:bg-primary/15 transition-all"
                    :class="selected === 8 ? 'rounded-t-md border-l border-t border-r border-[#1B1B1B]/20' : 'rounded-md border border-[#1B1B1B]/20'"
                    x-on:click="selected !== 8 ? (selected = 8) : (selected = null)"
                >
                    <span>Fakultas Bahasa dan Seni</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="32"
                        height="32"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="#888888"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m9 18l6-6l-6-6"
                        />
                    </svg>
                </div>

                <div
                    class="py-4 px-6 border border-[#1B1B1B]/20 rounded-b-md"
                    x-show="selected === 8"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                ></div>
            </div>
        </div>

        <!-- Jalur Prestasi -->
        <div
            class="mt-4 flex flex-col rounded-md bg-white p-6"
            x-data="{ table: 'jalur-prestasi-lomba' }"
            x-show="menu === 'jalur-prestasi'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <div class="flex">
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'jalur-prestasi-lomba'"
                    :class="table === 'jalur-prestasi-lomba' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Jalur Prestasi Lomba
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'jalur-prestasi-non-lomba'"
                    :class="table === 'jalur-prestasi-non-lomba' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Jalur Prestasi Non-Lomba
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'perbandingan-gender'"
                    :class="table === 'perbandingan-gender' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Perbandingan Gender
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'bidang-prestasi'"
                    :class="table === 'bidang-prestasi' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Bidang Prestasi
                </button>
            </div>

            <div
                class="mt-4"
                x-show="table === 'jalur-prestasi-lomba'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Program studi dengan pendaftar PENMABA jalur prestasi lomba terbanyak</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'jalur-prestasi-non-lomba'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Program studi dengan pendaftar PENMABA jalur prestasi non-lomba terbanyak</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'perbandingan-gender'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Perbandingan pendaftar PENMABA prestasi berdasarkan jenis kelamin per-fakultas</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'bidang-prestasi'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Sebaran pendaftar PENMABA prestasi berdasarkan bidang prestasi</p>
            </div>
        </div>

        <!-- Jalur Rapor -->
        <div
            class="mt-4 flex flex-col rounded-md bg-white p-6"
            x-data="{ table: 'jalur-rapor' }"
            x-show="menu === 'jalur-rapor'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <div class="flex">
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'jalur-rapor'"
                    :class="table === 'jalur-rapor' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Jalur Rapor
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'perbandingan-gender'"
                    :class="table === 'perbandingan-gender' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Perbandingan Gender
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'peta-sebaran-provinsi'"
                    :class="table === 'peta-sebaran-provinsi' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Peta Sebaran Provinsi
                </button>
            </div>

            <div
                class="mt-4"
                x-show="table === 'jalur-rapor'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Program studi dengan pendaftar PENMABA jalur rapor terbanyak</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'perbandingan-gender'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Perbandingan pendaftar PENMABA rapor berdasarkan jenis kelamin per-fakultas</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'peta-sebaran-provinsi'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Sebaran pendaftar PENMABA rapor berdasarkan provinsi</p>
            </div>
        </div>

        <!-- Jalur Nilai UTBK -->
        <div
            class="mt-4 flex flex-col rounded-md bg-white p-6"
            x-data="{ table: 'jalur-nilai-utbk' }"
            x-show="menu === 'jalur-nilai-utbk'"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
        >
            <div class="flex">
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'jalur-nilai-utbk'"
                    :class="table === 'jalur-nilai-utbk' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Jalur Nilai UTBK
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'perbandingan-gender'"
                    :class="table === 'perbandingan-gender' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Perbandingan Gender
                </button>
                <button
                    class="cursor-pointer p-2 transition-all"
                    @click="table = 'peta-sebaran-provinsi'"
                    :class="table === 'peta-sebaran-provinsi' ? 'text-primary bg-primary/10 border-b-[1px] border-primary' : 'text-black hover:text-primary'"
                >
                    Peta Sebaran Provinsi
                </button>
            </div>

            <div
                class="mt-4"
                x-show="table === 'jalur-nilai-utbk'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Program studi dengan pendaftar UTBK terbanyak</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'perbandingan-gender'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Perbandingan pendaftar UTBK berdasarkan jenis kelamin per-fakultas</p>
            </div>

            <div
                class="mt-4"
                x-show="table === 'peta-sebaran-provinsi'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
            >
                <p>Sebaran pendaftar UTBK berdasarkan provinsi</p>
            </div>
        </div>
    </div>
</div>
