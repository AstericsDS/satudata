<div class="mx-24 mt-4 mb-20">
    @vite(['resources/js/charts/tracer-study-partisipasi.js', 'resources/js/charts/tracer-study-status.js'])
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
                    <span class="ms-1 text-sm font-medium text-primary md:ms-2">Tracer Study</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex gap-4 mt-6">

        <!-- Information Cards -->
        <div class="flex flex-col space-y-4">

            <div
                class="flex flex-col w-sm py-10 space-y-4 bg-linear-to-tr from-primary/70 to-accent-1/70 rounded-md shadow-lg border border-[#1B1B1B]/20">
                <div class="flex space-x-8 justify-center items-center">
                    <img src="{{ asset('assets/tracer_study/total.svg') }}" alt="Total Akun Alumni">
                    <h1 class="text-white text-4xl font-semibold">8,945</h1>
                </div>

                <p class="text-center text-white font-semibold text-lg">Total Akun Alumni</p>

                <div class="flex space-x-2 justify-center">
                    <span class="bg-[#9DC88D] rounded-md px-1 text-white">+4%</span>
                    <p class="text-[#1B1B1B]/50">Dari tahun sebelumnya</p>
                </div>
            </div>

            <div
                class="flex flex-col w-sm py-10 space-y-4 bg-linear-to-tr from-primary/70 to-accent-1/70 rounded-md shadow-lg border border-[#1B1B1B]/20">
                <div class="flex space-x-8 justify-center items-center">
                    <img src="{{ asset('assets/tracer_study/survey.svg') }}" alt="Alumni Mengisi Survey">
                    <h1 class="text-white text-4xl font-semibold">8,945</h1>
                </div>

                <p class="text-center text-white font-semibold text-lg">Alumni Mengisi Survey</p>

                <div class="flex space-x-2 justify-center">
                    <span class="bg-[#9DC88D] rounded-md px-1 text-white">+4%</span>
                    <p class="text-[#1B1B1B]/50">Dari tahun sebelumnya</p>
                </div>
            </div>

            <div
                class="flex flex-col w-sm py-10 space-y-4 bg-linear-to-tr from-primary/70 to-accent-1/70 rounded-md shadow-lg border border-[#1B1B1B]/20">
                <div class="flex space-x-8 justify-center items-center">
                    <img src="{{ asset('assets/tracer_study/total.svg') }}" alt="Total Akun Alumni">
                    <h1 class="text-white text-4xl font-semibold">8,945</h1>
                </div>

                <p class="text-center text-white font-semibold text-lg">Tingkat Partisipasi</p>

                <div class="flex space-x-2 justify-center">
                    <span class="bg-[#FF383C] rounded-md px-1 text-white">-7%</span>
                    <p class="text-[#1B1B1B]/50">Dari tahun sebelumnya</p>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-4 bg-linear-to-b from-primary to-accent-2 from-20% to-100% shadow-lg p-6">
            <h1 class="font-semibold text-xl text-white">Tracer Study</h1>
            <p class="text-white">Data ini mencakup seluruh mahasiswa aktif, cuti, dan yang berstatus khusus lainnya
                dalam berbagai jenjang pendidikan. Visualisasi data jumlah mahasiswa membantu dalam perencanaan
                kapasitas akademik, alokasi sumber daya, dan pengambilan keputusan strategis institusi pendidikan</p>
            <div class="bg-white rounded-md p-4 flex flex-col gap-2">
                <p class="bg-red-300 text-red-900 px-2 rounded-md w-fit">Data Belum Sinkron</p>
                <div class="bg-primary/10 p-6 rounded-md">
                    <h1 class="text-2xl font-semibold mb-4">Analisis Data</h1>
                    <div class="flex gap-4 py-8">
                        <livewire:charts.tracer-study-partisipasi />
                        <livewire:charts.tracer-study-status />
                    </div>
                    <p>Pada tahun akademik 2024, universitas mencatat total 2,847 mahasiswa dengan pertumbuhan 7.2%
                        dibandingkan tahun sebelumnya. Fakultas Teknik mendominasi dengan 30.1% dari total populasi
                        mahasiswa (856 mahasiswa), diikuti oleh Fakultas FKIP dengan 19.5% (555 mahasiswa). Distribusi
                        yang cukup merata ini menunjukkan diversifikasi program studi yang sehat, dengan trend
                        pertumbuhan positif mengindikasikan daya tarik institusi yang meningkat.</p>
                </div>
            </div>
        </div>

    </div>
</div>