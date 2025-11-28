<div class="mx-24 mt-4 mb-20">

    <!-- Breadcrumb -->
    <nav class="flex justify-end" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li>
                <div class="flex items-center">
                    <span class="ms-1 text-sm font-medium text-gray-700 transition-all md:ms-2">
                        Akademik dan Mahasiswa
                    </span>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-sm font-medium text-primary md:ms-2">Data Akreditasi</span>
                </div>
            </li>
        </ol>
    </nav>

    <div x-data="{ menu: 'nasional' }" @change-menu.window="menu = $event.detail.menu" class="flex flex-col gap-8 mt-6">

        <div class="bg-primary/10 p-6 rounded-md">
            <h1 class="mb-2 text-2xl font-semibold">Data Akreditasi</h1>
            <p>Data ini mencakup seluruh mahasiswa aktif, cuti, dan yang berstatus khusus lainnya dalam berbagai jenjang
                pendidikan. Visualisasi data jumlah mahasiswa membantu dalam perencanaan kapasitas akademik, alokasi
                sumber daya, dan pengambilan keputusan strategis institusi pendidikan</p>
        </div>

        <div class="flex space-x-2 bg-primary/10 mb-4 rounded-md p-6">
            <button @click="$dispatch('change-menu', { menu: 'nasional' })"
                class="text-center py-3 flex-1 rounded-md font-semibold transition-all"
                :class="menu === 'nasional' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                Akreditasi Nasional
            </button>
            <button @click="$dispatch('change-menu', { menu: 'internasional' })"
                class="text-center py-3 flex-1 rounded-md font-semibold transition-all"
                :class="menu === 'internasional' ? 'bg-linear-to-l from-primary to-accent-1 text-white' : 'text-black hover:text-primary cursor-pointer'">
                Akreditasi Internasional
            </button>
        </div>

        <div x-show="menu === 'nasional'"
            class="bg-gradient-to-b from-primary to-accent-2 from-20% to-100% p-6 rounded-md"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
            <h1 class="text-white text-2xl font-semibold">Akreditasi Nasional (BAN-PT)</h1>
        </div>

        <div
            x-show="menu === 'internasional'"
            class="bg-gradient-to-b from-primary to-accent-2 from-20% to-100% p-6 rounded-md"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
            <h1 class="text-white text-2xl font-semibold">Akreditasi Internasional</h1>
        </div>

    </div>

</div>