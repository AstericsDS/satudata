<div class="mx-24 mb-20 mt-4">
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
                        href="{{ route("snbt") }}"
                    >
                        SNBT
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

    <!-- Info -->
    <div class="bg-primary/10 p-4 py-6 rounded-md mt-6 space-y-2">
        <h1 class="font-semibold text-xl">Seleksi Nasional Berdasarkan Tes (SNBT)</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus, natus. Fuga ex dolorum incidunt itaque molestias quibusdam rem molestiae magni vero hic facilis nulla sint perspiciatis tempora aspernatur neque dolorem ab sed magnam iste, qui doloribus placeat. Possimus, eum placeat dolores illo doloremque voluptatem hic doloribus, neque maiores quis tempore!</p>
    </div>

</div>
