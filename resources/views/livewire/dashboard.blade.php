@vite(["resources/js/charts/dashboard.js"])
<div
  x-data="{
    active: 0,
    total: {{ $isPrivate ? 9 : 8 }},
    submenu: false,
    auto: false,
    intervalId: null,
    next() {
      this.active = (this.active + 1) % this.total;
      clear();
    },
    prev() {
      this.active = (this.active - 1 + this.total) % this.total;
      clear();
    },
    start() {
      if (this.intervalId) clearInterval(this.intervalId)
      this.intervalId = setInterval(() => {
        this.active = (this.active + 1) % this.total
      }, 10000)
    },
    stop() {
      if (this.intervalId) clearInterval(this.intervalId)
    },
    clear() {
      clearInterval(this.intervalId)
      this.intervalId = setInterval(() => {
        this.active = (this.active + 1) % this.total
      }, 10000)
    },
  }"
  class="mb-20"
>
  {{-- Stat Cards - Start --}}
  <div
    x-show="active >= 0 && active <= 7"
    class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 md:gap-6 my-8 mx-4 md:mx-12 xl:mx-8 2xl:mx-24"
  >
    {{-- Wisudawan --}}
    <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md text-nowrap">
      <div class="flex items-center justify-center gap-8">
        <img
          src="{{ asset("assets/dashboard/wisudawan.svg") }}"
          alt="Wisudawan 2025"
          class="lg:w-14 lg:h-14 w-10 h-10 shrink-0"
        />
        <div class="flex flex-col text-center items-center justify-center gap-2 text-xl">
          <span class="font-bold">{{ $dashboardData["wisuda"] ?? "-" }}</span>
          <span class="font-semibold">Wisudawan {{ $year }}</span>
        </div>
      </div>
      <div class="flex gap-4 justify-center items-center">
        <span class="rounded-lg text-white font-semibold p-[2px] px-[7px] {{ is_numeric($percent_wisuda) && $percent_wisuda < 0 ? "bg-red-700" : "bg-primary" }}">
          @if (is_numeric($percent_wisuda))
            {{ $percent_wisuda > 0 ? "+" . $percent_wisuda . "%" : "-" . $percent_wisuda . "%" }}
          @else
            {{ $percent_wisuda }}
          @endif
        </span>
        <span class="text-gray-600">Dari tahun sebelumnya</span>
      </div>
    </div>

    {{-- Mahasiswa --}}
    <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md text-nowrap">
      <div class="flex items-center justify-center gap-8">
        <img
          src="{{ asset("assets/dashboard/mahasiswa.svg") }}"
          alt="Mahasiswa"
          class="lg:w-14 lg:h-14 w-10 h-10 shrink-0"
        />
        <div class="flex flex-col text-center items-center justify-center gap-2 text-xl">
          <span class="font-bold">{{ $dashboardData["mahasiswa"] ?? "-" }}</span>
          <span class="font-semibold">Mahasiswa</span>
        </div>
      </div>
      <div class="flex gap-4 justify-center items-center">
        <span class="bg-primary rounded-lg text-white font-semibold p-[2px] px-[7px] {{ is_numeric($percent_mahasiswa) && $percent_mahasiswa < 0 ? "bg-red-700" : "bg-primary" }}">
          @if (is_numeric($percent_mahasiswa))
            {{ $percent_mahasiswa > 0 ? "+" . $percent_mahasiswa . "%" : "-" . $percent_mahasiswa . "%" }}
          @else
            {{ $percent_mahasiswa }}
          @endif
        </span>
        <span class="text-gray-600">Dari tahun sebelumnya</span>
      </div>
    </div>

    {{-- Dosen --}}
    <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md text-nowrap">
      <div class="flex items-center justify-center gap-8">
        <img
          src="{{ asset("assets/dashboard/dosen.svg") }}"
          alt="Dosen"
          class="lg:w-14 lg:h-14 w-10 h-10 shrink-0"
        />
        <div class="flex flex-col text-center items-center justify-center gap-2 text-xl">
          <span class="font-bold">{{ $dashboardData["dosen"] ?? "-" }}</span>
          <span class="font-semibold">Dosen</span>
        </div>
      </div>
      <div class="flex gap-4 justify-center items-center">
        <span class="bg-primary rounded-lg text-white font-semibold p-[2px] px-[7px]">
          @if (is_numeric($percent_mahasiswa))
            {{ $percent_s3 . "%" }}
          @else
            {{ $percent_s3 }}
          @endif
        </span>
        <span class="text-gray-600">Kualifikasi S3</span>
      </div>
    </div>

    {{-- Peminat --}}
    <div class="px-4 py-6 xl:px-6 xl:py-8 flex flex-col gap-4 bg-white border border-gray-300 rounded-md shadow-md text-nowrap">
      <div class="flex items-center justify-center gap-8">
        <img
          src="{{ asset("assets/dashboard/peminat.svg") }}"
          alt="Peminat 2025"
          class="lg:w-14 lg:h-14 w-10 h-10 shrink-0"
        />
        <div class="flex flex-col text-center items-center justify-center gap-2 text-xl">
          <span class="font-bold">0</span>
          <span class="font-semibold">Peminat {{ $year }}</span>
        </div>
      </div>
      <div class="flex gap-4 justify-center items-center">
        <span class="bg-primary rounded-lg text-white font-semibold p-[2px] px-[7px]">-</span>
        <span class="text-gray-600">Dari tahun sebelumnya</span>
      </div>
    </div>
  </div>
  {{-- Stat Cards - End --}}

  <!-- Private Data - Absensi -->
  <div
    x-show="active == 8"
    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-6 my-8 mx-4 md:mx-12 lg:mx-24"
  >
    <!-- Total Pegawai Tidak Absen -->
    <div class="relative overflow-hidden bg-red-primary rounded-lg p-5 flex flex-col gap-6">
      <div class="absolute -top-18 -right-12 w-48 h-48 bg-black/10 rounded-full"></div>
      <div class="absolute -bottom-16 -left-12 w-52 h-52 bg-black/10 rounded-full"></div>
      <div class="flex justify-between items-center z-50">
        <div class="bg-white/20 rounded-md text-white p-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 24 24"
          >
            <g
              fill="none"
              stroke="#FFFFFF"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            >
              <circle
                cx="12"
                cy="12"
                r="10"
              />
              <path d="M12 6v6l4 2" />
            </g>
          </svg>
        </div>
        <div class="bg-white/20 rounded-md text-white p-2">
          {{ $this->absensi["date"] ?? "Tanggal tidak tersedia" }}
        </div>
      </div>
      <div class="flex flex-col gap-2 z-50">
        <h2 class="text-white font-semibold">Pegawai Belum Presensi</h2>
        <span class="text-5xl text-white font-semibold">{{ $this->absensi["total_pegawai_tidak_hadir"] ?? 0 }}</span>
      </div>
    </div>

    <!-- Total Pegawai Hadir -->
    <div class="relative overflow-hidden bg-primary rounded-lg p-5 flex flex-col gap-6">
      <div class="absolute -top-18 -right-12 w-48 h-48 bg-white/10 rounded-full"></div>
      <div class="absolute -bottom-16 -left-12 w-52 h-52 bg-white/10 rounded-full"></div>
      <div class="flex justify-between items-center z-50">
        <div class="bg-white/20 rounded-md text-white p-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 24 24"
          >
            <g
              fill="none"
              stroke="#FFFFFF"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            >
              <path d="M21.801 10A10 10 0 1 1 17 3.335" />
              <path d="m9 11l3 3L22 4" />
            </g>
          </svg>
        </div>
        <div class="bg-white/20 rounded-md text-white p-2">
          {{ $this->absensi["date"] ?? "Tanggal tidak tersedia" }}
        </div>
      </div>
      <div class="flex flex-col gap-2 z-50">
        <h2 class="text-white font-semibold">Pegawai Hadir</h2>
        <span class="text-5xl text-white font-semibold">{{ $this->absensi["total_absen_hari_ini"] ?? 0 }}</span>
      </div>
    </div>

    <!-- Total Pegawai WFA -->
    <div class="relative overflow-hidden bg-tertiary rounded-lg p-5 flex flex-col gap-6">
      <div class="absolute -top-18 -right-12 w-48 h-48 bg-white/10 rounded-full"></div>
      <div class="absolute -bottom-16 -left-12 w-52 h-52 bg-white/10 rounded-full"></div>
      <div class="flex justify-between items-center z-50">
        <div class="bg-white/20 rounded-md text-white p-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 24 24"
          >
            <path
              fill="currentColor"
              d="M13.413 11.413Q14 10.825 14 10t-.587-1.412T12 8t-1.412.588T10 10t.588 1.413T12 12t1.413-.587M12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2t5.588 2.225T20 10.2q0 2.5-1.987 5.438T12 22"
            />
          </svg>
        </div>
        <div class="bg-white/20 rounded-md text-white p-2">
          {{ $this->absensi["date"] ?? "Tanggal tidak tersedia" }}
        </div>
      </div>
      <div class="flex flex-col gap-2 z-50">
        <h2 class="text-white font-semibold">Pegawai WFA</h2>
        <span class="text-5xl text-white font-semibold">{{ $this->absensi["total_pegawai_wfa"] ?? 0 }}</span>
      </div>
    </div>

    <!-- Total Pegawai -->
    <div class="relative overflow-hidden bg-[#0162B8]/70 rounded-lg p-5 flex flex-col gap-6">
      <div class="absolute -top-18 -right-12 w-48 h-48 bg-white/10 rounded-full"></div>
      <div class="absolute -bottom-16 -left-12 w-52 h-52 bg-white/10 rounded-full"></div>
      <div class="flex justify-between items-center z-50">
        <div class="bg-white/20 rounded-md text-white p-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="32"
            height="32"
            viewBox="0 0 24 24"
          >
            <path
              fill="currentColor"
              d="M13.413 11.413Q14 10.825 14 10t-.587-1.412T12 8t-1.412.588T10 10t.588 1.413T12 12t1.413-.587M12 22q-4.025-3.425-6.012-6.362T4 10.2q0-3.75 2.413-5.975T12 2t5.588 2.225T20 10.2q0 2.5-1.987 5.438T12 22"
            />
          </svg>
        </div>
        <div class="bg-white/20 rounded-md text-white p-2">
          {{ $this->absensi["date"] ?? "Tanggal tidak tersedia" }}
        </div>
      </div>
      <div class="flex flex-col gap-2 z-50">
        <h2 class="text-white font-semibold">Total Pegawai</h2>
        <span class="text-5xl text-white font-semibold">{{ $this->absensi["total_pegawai_aktif"] ?? 0 }}</span>
      </div>
    </div>
  </div>

  {{-- Graphic - Start --}}
  <div
    x-show="active >= 0 && active <= 7"
    x-effect="auto ? start() : stop()"
  >
    <div class="w-[95%] md:w-[90%] xl:w-[65%] mx-auto flex justify-between sm:justify-end items-center mb-2">
      <div class="flex gap-2 items-center sm:hidden">
        <button
          class="cursor-pointer"
          @click="prev()"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
          >
            <g
              fill="none"
              stroke="#006569"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            >
              <circle
                cx="12"
                cy="12"
                r="10"
              />
              <path d="m14 16l-4-4l4-4" />
            </g>
          </svg>
        </button>
        <button
          class="cursor-pointer"
          @click="next()"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
          >
            <g
              fill="none"
              stroke="#006569"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
            >
              <circle
                cx="12"
                cy="12"
                r="10"
              />
              <path d="m10 8l4 4l-4 4" />
            </g>
          </svg>
        </button>
      </div>
      <label class="inline-flex items-center cursor-pointer">
        <input
          type="checkbox"
          value="true"
          class="sr-only peer"
          checked
          x-model="auto"
        />
        <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
        <span class="ms-3 text-sm font-medium text-gray-800">Ganti Otomatis</span>
      </label>
    </div>

    {{-- Main Chart --}}
    <div
      @change-chart.window="active = $event.detail.id; clear()"
      class="group relative bg-linear-to-b from-primary from-20% to-accent-2 w-[95%] md:w-[90%] xl:w-[65%] mx-auto rounded-md flex flex-col gap-4 px-4 pb-8 justify-center"
    >
      {{-- Previous Button --}}
      <button
        class="hidden md:block absolute top-[50%] -left-14 text-primary hover:text-primary/70 opacity-0 group-hover:opacity-100 transition-all cursor-pointer"
        @click="prev();"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="M11.8 13H15q.425 0 .713-.288T16 12t-.288-.712T15 11h-3.2l.9-.9q.275-.275.275-.7t-.275-.7t-.7-.275t-.7.275l-2.6 2.6q-.3.3-.3.7t.3.7l2.6 2.6q.275.275.7.275t.7-.275t.275-.7t-.275-.7zm.2 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"
          />
        </svg>
      </button>

      {{-- Next Button --}}
      <button
        class="hidden md:block absolute top-[50%] -right-14 text-primary hover:text-primary/70 opacity-0 group-hover:opacity-100 transition-all cursor-pointer"
        @click="next();"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="m12.2 13l-.9.9q-.275.275-.275.7t.275.7t.7.275t.7-.275l2.6-2.6q.3-.3.3-.7t-.3-.7l-2.6-2.6q-.275-.275-.7-.275t-.7.275t-.275.7t.275.7l.9.9H9q-.425 0-.712.288T8 12t.288.713T9 13zm-.2 9q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"
          />
        </svg>
      </button>

      {{-- Mahasiswa Angkatan --}}
      <div
        x-show="active === 0"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>

          @if (optional($syncMahasiswa)->updated_at)
            <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="mahasiswa-angkatan"
          class="text-black bg-white w-[95%] mx-auto rounded-lg"
        ></div>
      </div>

      {{-- Mahasiswa Fakultas --}}
      <div
        x-show="active === 1"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Fakultas</h1>

          @if (optional($syncMahasiswa)->updated_at)
            <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="mahasiswa-fakultas"
          class="text-black bg-white w-[95%] mx-auto rounded-lg"
        ></div>
      </div>

      {{-- Mahasiswa Jenjang --}}
      <div
        x-show="active === 2"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Jumlah Mahasiswa Berdasarkan Jenjang</h1>

          @if (optional($syncMahasiswa)->updated_at)
            <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="mahasiswa-jenjang"
          class="text-black bg-white w-[95%] mx-auto rounded-lg"
        ></div>
      </div>

      {{-- Peminat --}}
      <div
        x-show="active === 3"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Jumlah Peminat per-Tahun</h1>

          @if (optional($syncMahasiswa)->updated_at)
            <h2>Data diperbarui {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="peminat"
          class="text-black bg-white w-[95%] mx-auto rounded-lg"
        ></div>
      </div>

      {{-- Dosen Berdasarkan Pendidikan --}}
      <div
        x-show="active === 4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Dosen Berdasarkan Pendidikan</h1>

          @if (optional($syncDosen)->updated_at)
            <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="dosen-pendidikan"
          class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center"
        ></div>
      </div>

      {{-- Dosen Berdasarkan Jabatan Fungsional --}}
      <div
        x-show="active === 5"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Dosen Berdasarkan Jabatan Fungsional</h1>

          @if (optional($syncDosen)->updated_at)
            <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="dosen-jabatan"
          class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center"
        ></div>
      </div>

      {{-- Dosen Berdasarkan Fakultas --}}
      <div
        x-show="active === 6"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Dosen Berdasarkan Fakultas</h1>

          @if (optional($syncDosen)->updated_at)
            <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="dosen-fakultas"
          class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center"
        ></div>
      </div>

      {{-- Dosen Berdasarkan Status Kepegawaian --}}
      <div
        x-show="active === 7"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        {{-- Header --}}
        <div class="p-4 text-white text-center">
          <h1 class="font-semibold">Dosen Berdasarkan Status Kepegawaian</h1>

          @if (optional($syncDosen)->updated_at)
            <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
          @else
            <h2>Belum Sinkron</h2>
          @endif
        </div>

        {{-- Chart --}}
        <div
          id="dosen-kepegawaian"
          class="text-black bg-white w-[95%] mx-auto rounded-lg flex items-center"
        ></div>
      </div>
    </div>

    {{-- Menu Chart --}}
    <div
      :class="submenu ? 'p-6' : 'p-0'"
      class="hidden sm:block relative border border-primary rounded-md w-[95%] mx-auto my-8 transition-all"
    >
      <button
        @click="submenu = !submenu"
        class="group absolute left-1/2 -translate-x-1/2 -top-4 rounded-full p-1 border-primary border-2 bg-white cursor-pointer transition-all"
      >
        <svg
          :class="submenu ? 'rotate-180' : ''"
          class="transition-all"
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          viewBox="0 0 24 24"
        >
          <!-- Icon from Lucide by Lucide Contributors - https://github.com/lucide-icons/lucide/blob/main/LICENSE -->
          <path
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m6 9l6 6l6-6"
          />
        </svg>
      </button>
      <div
        x-show="submenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="flex gap-2 justify-center mb-4"
      >
        <button
          :class="active >= 0 && active <= 3 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
          class="px-2 py-1 rounded-md transition-all cursor-pointer"
          @click="active = 0"
        >
          Data Mahasiswa
        </button>
        <button
          :class="active >= 4 && active <= 7 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
          class="px-2 py-1 rounded-md transition-all cursor-pointer"
          @click="active = 4"
        >
          Data Dosen
        </button>
        @if ($isPrivate)
          <button
            :class="active == 8 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
            class="px-2 py-1 rounded-md transition-all cursor-pointer"
            @click="active = 8"
          >
            Data Absensi
          </button>
        @endif
      </div>

      {{-- Submenu Chart --}}
      <div
        x-data
        x-show="submenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
      >
        <!-- Menu Mahasiswa -->
        <div
          x-show="active >= 0 && active <= 3"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
        >
          <div
            @click="$dispatch('change-chart', { id: 0 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Jumlah Mahasiswa Berdasarkan Tahun Angkatan</h1>
              <h2 class="text-sm">
                @if (optional($syncMahasiswa)->updated_at)
                  <h2>
                    Data diperbarui
                    {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}
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

          <div
            @click="$dispatch('change-chart', { id: 1 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Jumlah Mahasiswa Berdasarkan Fakultas</h1>
              <h2 class="text-sm">
                @if (optional($syncMahasiswa)->updated_at)
                  <h2>
                    Data diperbarui
                    {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}
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

          <div
            @click="$dispatch('change-chart', { id: 2 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Jumlah Mahasiswa Berdasarkan Jenjang</h1>
              <h2 class="text-sm">
                @if (optional($syncMahasiswa)->updated_at)
                  <h2>
                    Data diperbarui
                    {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}
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

          <div
            @click="$dispatch('change-chart', { id: 3 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Jumlah Peminat per-Tahun</h1>
              <h2 class="text-sm">
                @if (optional($syncMahasiswa)->updated_at)
                  <h2>
                    Data diperbarui
                    {{ optional($syncMahasiswa->updated_at)->locale("id")->diffForHumans() }}
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
        <div
          x-show="active >= 4 && active <= 7"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
        >
          <div
            @click="$dispatch('change-chart', { id: 4 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Dosen Berdasarkan Pendidikan</h1>
              <h2 class="text-sm">
                @if (optional($syncDosen)->updated_at)
                  <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
                @else
                  <h2>Belum Sinkron</h2>
                @endif
              </h2>
            </div>
            <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
              <div id="dosen-pendidikan-small"></div>
            </div>
          </div>

          <div
            @click="$dispatch('change-chart', { id: 5 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Dosen Berdasarkan Jabatan Fungsional</h1>
              <h2 class="text-sm">
                @if (optional($syncDosen)->updated_at)
                  <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
                @else
                  <h2>Belum Sinkron</h2>
                @endif
              </h2>
            </div>
            <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
              <div id="dosen-jabatan-small"></div>
            </div>
          </div>

          <div
            @click="$dispatch('change-chart', { id: 6 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Dosen Berdasarkan Fakultas</h1>
              <h2 class="text-sm">
                @if (optional($syncDosen)->updated_at)
                  <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
                @else
                  <h2>Belum Sinkron</h2>
                @endif
              </h2>
            </div>
            <div class="bg-white m-4 mt-0 rounded-lg p-4 h-full flex-1">
              <div id="dosen-fakultas-small"></div>
            </div>
          </div>

          <div
            @click="$dispatch('change-chart', { id: 7 })"
            class="bg-gradient-to-b from-primary from-20% to-accent-2 rounded-md flex flex-col relative hover:-translate-y-3 transition-all cursor-pointer hover:opacity-90 active:opacity-80 active:transition-none"
          >
            <div class="p-4 text-white text-center">
              <h1 class="font-semibold text-sm">Dosen Berdasarkan Status Kepegawaian</h1>
              <h2 class="text-sm">
                @if (optional($syncDosen)->updated_at)
                  <h2>Data diperbarui {{ optional($syncDosen->updated_at)->locale("id")->diffForHumans() }}</h2>
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

        <div></div>
      </div>
    </div>

    <!-- Mobile Menu Select -->
    <div class="sm:hidden flex gap-2 justify-center mt-6">
      <button
        :class="active >= 0 && active <= 3 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
        class="px-2 py-1 rounded-md transition-all cursor-pointer"
        @click="active = 0"
      >
        Data Mahasiswa
      </button>
      <button
        :class="active >= 4 && active <= 7 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
        class="px-2 py-1 rounded-md transition-all cursor-pointer"
        @click="active = 4"
      >
        Data Dosen
      </button>
      @if ($isPrivate)
        <button
          :class="active == 8 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
          class="px-2 py-1 rounded-md transition-all cursor-pointer"
          @click="active = 8"
        >
          Data Absensi
        </button>
      @endif
    </div>
  </div>
  {{-- Graphic - End --}}

  <!-- Absensi -->
  @if ($isPrivate)
    <div
      x-show="active == 8"
      class="bg-primary p-6 rounded-md mx-4 md:mx-12 lg:mx-24"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
    >
      <div class="p-4 bg-white rounded-md">
        <livewire:kepegawaian-dan-umum.tables.absensi />
      </div>
    </div>
    <div
      x-show="active === 8"
      class="flex gap-2 justify-center mt-6"
    >
      <button
        :class="active >= 0 && active <= 3 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
        class="px-2 py-1 rounded-md transition-all cursor-pointer"
        @click="active = 0"
      >
        Data Mahasiswa
      </button>
      <button
        :class="active >= 4 && active <= 7 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
        class="px-2 py-1 rounded-md transition-all cursor-pointer"
        @click="active = 4"
      >
        Data Dosen
      </button>
      @if ($isPrivate)
        <button
          :class="active == 8 ? 'bg-primary text-white' : 'text-primary hover:text-primary/80'"
          class="px-2 py-1 rounded-md transition-all cursor-pointer"
          @click="active = 8"
        >
          Data Absensi
        </button>
      @endif
    </div>
  @endif
</div>

<script>
  window.chartData = {
    jumlah_mahasiswa: @json($dashboardData["mahasiswa_tahun_angkatan"]),
    jumlah_mahasiswa_diterima: @json($dashboardData["mahasiswa_diterima_tahun_angkatan"]),
    jumlah_mahasiswa_fakultas: @json($dashboardData["mahasiswa_fakultas"]),

    jumlah_mahasiswa_s1: @json($dashboardData["mahasiswa_s1"]),
    jumlah_mahasiswa_s2: @json($dashboardData["mahasiswa_s2"]),
    jumlah_mahasiswa_s3: @json($dashboardData["mahasiswa_s3"]),

    dosen_pendidikan: @json($dashboardData["dosen_pendidikan"]),
    dosen_jabatan: @json($dashboardData["dosen_jabatan"]),
    dosen_fakultas: @json($dashboardData["dosen_fakultas"]),
    dosen_status: @json($dashboardData["dosen_status"]),
  };
</script>
