<div class="mx-24 mt-4 mb-8">
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
                    <h1 class="text-white text-4xl font-semibold">{{ $data['statistik']['current'] }}</h1>
                </div>

                <p class="text-center text-white font-semibold text-lg">Total Akun Alumni</p>

                <div class="flex space-x-2 justify-center">
                    @if ($growth >= 0)
                        <span class="bg-[#9DC88D] rounded-md px-1 text-white">+{{ $growth }}%</span>
                    @else
                        <span class="bg-[#FF383C] rounded-md px-1 text-white">{{ $growth }}%</span>
                    @endif
                    <p class="text-[#1B1B1B]/50">Dari tahun sebelumnya</p>
                </div>
            </div>

            <div
                class="flex flex-col w-sm py-10 space-y-4 bg-linear-to-tr from-primary/70 to-accent-1/70 rounded-md shadow-lg border border-[#1B1B1B]/20">
                <div class="flex space-x-8 justify-center items-center">
                    <img src="{{ asset('assets/tracer_study/survey.svg') }}" alt="Alumni Mengisi Survey">
                    <h1 class="text-white text-4xl font-semibold">-</h1>
                </div>

                <p class="text-center text-white font-semibold text-lg">Alumni Mengisi Survey</p>

                <div class="flex space-x-2 justify-center">
                    <span class="bg-[#9DC88D] rounded-md px-1 text-white">0%</span>
                    <p class="text-[#1B1B1B]/50">Dari tahun sebelumnya</p>
                </div>
            </div>

            <div
                class="flex flex-col w-sm py-10 space-y-4 bg-linear-to-tr from-primary/70 to-accent-1/70 rounded-md shadow-lg border border-[#1B1B1B]/20">
                <div class="flex space-x-8 justify-center items-center">
                    <img src="{{ asset('assets/tracer_study/total.svg') }}" alt="Total Akun Alumni">
                    <h1 class="text-white text-4xl font-semibold">-</h1>
                </div>

                <p class="text-center text-white font-semibold text-lg">Tingkat Partisipasi</p>

                <div class="flex space-x-2 justify-center">
                    <span class="bg-[#9DC88D] rounded-md px-1 text-white">0%</span>
                    <p class="text-[#1B1B1B]/50">Dari tahun sebelumnya</p>
                </div>
            </div>

        </div>

        <div class="flex flex-col gap-4 bg-linear-to-b from-primary to-accent-2 from-20% to-100% shadow-lg p-6">
            <h1 class="font-semibold text-xl text-white">Tracer Study {{ $this->year }}</h1>
            <p class="text-white">Data ini mencakup seluruh mahasiswa aktif, cuti, dan yang berstatus khusus lainnya
                dalam berbagai jenjang pendidikan. Visualisasi data jumlah mahasiswa membantu dalam perencanaan
                kapasitas akademik, alokasi sumber daya, dan pengambilan keputusan strategis institusi pendidikan</p>
            <div class="bg-white rounded-md p-4 flex flex-col gap-2">
                <h1 class="text-2xl font-semibold mb-4">Analisis Data</h1>
                @if($update && $update->status === 'synchronized')
                    <p>Data diperbarui {{ $update->updated_at->locale('id')->diffForHumans() }}</p>
                @else
                    <p class="bg-red-300 text-red-900 px-2 rounded-md w-fit">Data Belum Sinkron</p>
                @endif
                <h2 class="text-[12px] font-semibold text-[#263238]">Sumber: Tracer Study</h2>
                <div class="flex gap-4 py-8">
                    <livewire:charts.tracer-study-partisipasi :data="$data" />
                    <livewire:charts.tracer-study-status :data="$data" />
                </div>
                <div class="bg-primary/10 p-6 rounded-md">
                    <p>Pada tahun akademik {{ $year }}, universitas mencatat total {{ $data['statistik']['current'] }}
                        mahasiswa dengan {{ $growth >= 0 ? "pertumbuhan" : 'penurunan' }} sebesar {{ $growth }}%
                        dibandingkan tahun sebelumnya.</p>
                </div>
            </div>
        </div>

    </div>
</div>