{{-- Wrapper - Start --}}
<div class="flex flex-col lg:flex-row gap-8">

    {{-- Container Filter - Start --}}
    <div class="w-full max-w-md p-4 bg-white border border-gray-300 rounded-lg shadow-xl mt-10 ml-8 pb-4">

        {{-- Title - Start --}}
        <div class="flex flex-col justify-center mb-4">
            <h5 class="text-unj font-bold text-center text-lg">Filter</h5>
            <p class="text-unj text-base text-center mt-0.5">Atur data yang akan ditampilkan</p>
            <hr class="h-px bg-unj mt-2 border-0">
        </div>
        {{-- Title - End --}}

        {{-- Jenjang Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Jenjang Pendidikan</p>
        
            {{-- Dropdown Button - Start --}}
            <button id="jenjangButton" type="button" data-dropdown-toggle="jenjangFilter"
                class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full">
                -- Pilih jenjang pendidikan --
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}
        
            {{-- Jenjang Menu - Start --}}
            <div id="jenjangFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj ml-2" aria-labelledby="jenjangButton">
        
                    @foreach ($jenjang_pendidikan as $jenjang)
                        <li>
                            <div class="flex items-center p-1 rounded-sm">
                                <input id="{{ $jenjang }}" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="{{ $jenjang }}" class="text-base font-light text-unj ml-3">{{ $jenjang }}</label>
                            </div>
                        </li>
                    @endforeach
        
                </ul>
            </div>
            {{-- Jenjang Menu - End --}}
        
        
        </div>
        {{-- Jenjang Filter - End --}}

        {{-- Semester Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Semester</p>
        
            {{-- Dropdown Button - Start --}}
            <button id="semesterButton" type="button" data-dropdown-toggle="semesterFilter"
                class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full">
                -- Pilih semester --
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}
        
            {{-- Semester Menu - Start --}}
            <div id="semesterFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj ml-2" aria-labelledby="semesterButton">
        
                    @foreach ($semester_list as $semester)
                        <li>
                            <div class="flex items-center p-1 rounded-sm">
                                <input id="{{ $semester }}" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="{{ $semester }}" class="text-base font-light text-unj ml-3">{{ $semester }}</label>
                            </div>
                        </li>
                    @endforeach
        
                </ul>
            </div>
            {{-- Semester Menu - End --}}
        
        </div>
        {{-- Semester Filter - End --}}

        {{-- Fakultas Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Fakultas</p>
        
            {{-- Dropdown Button - Start --}}
            <button id="fakultasButton" type="button" data-dropdown-toggle="fakultasFilter"
                class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full">
                <span>
                    {{ $selected_fakultas ?? '-- Pilih fakultas --' }}
                </span>
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}
        
            {{-- Fakultas Menu - Start --}}
            <div id="fakultasFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj ml-2" aria-labelledby="fakultasButton">
        
                    @foreach ($fakultas_list as $fakultas_key => $fakultas_name)
                        <li>
                            <a href="#" wire:click.prevent="selectFakultas('{{ $fakultas_key }}')" class="block px-4 py-2 hover:bg-gray-100">
                                {{ $fakultas_name }}
                            </a>
                        </li>
                    @endforeach
        
                </ul>
            </div>
            {{-- Fakultas Menu - End --}}
        
        </div>
        {{-- Fakultas Filter - End --}} 
        
        {{-- !!! PRODI STILL BUGGY !!! --}}
        {{-- Prodi Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Program Studi</p>
        
            {{-- Dropdown Button - Start --}}
            <button id="prodiButton" type="button" data-dropdown-toggle="prodiFilter"
                class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full" @if(empty($prodi_fakultas)) disabled @endif>
                @if(empty($prodi_fakultas))
                    --
                @elseif(empty($selected_prodi))
                    -- Pilih program studi --
                @else
                    {{ implode(', ', $selected_prodi) }}
                @endif
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}
        
            {{-- Prodi Menu - Start --}}
            @if (!empty($prodi_fakultas))
            <div id="prodiFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj ml-2" aria-labelledby="prodiButton">
        
                    @foreach ($prodi_fakultas as $prodi)
                        <li>
                            <div class="flex items-center p-1 rounded-sm">
                                <input id="prodi-{{ $prodi }}" value="{{ $prodi }}" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj" wire:click="toggleProdi('{{ $prodi }}')" @checked(in_array($prodi, $selected_prodi))>
                                <label for="{{ $prodi }}" class="text-base font-light text-unj ml-3">{{ $prodi }}</label>
                            </div>
                        </li>
                    @endforeach
        
                </ul>
            </div>
            @endif
            {{-- Prodi Menu - End --}}
        
        </div>
        {{-- Prodi Filter - End --}}

        {{-- Status Keaktifan Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Status Keaktifan</p>
        
            {{-- Dropdown Button - Start --}}
            <button id="keaktifanButton" type="button" data-dropdown-toggle="keaktifanFilter"
                class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full">
                -- Pilih status keaktifan --
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}
        
            {{-- Status keaktifan Menu - Start --}}
            <div id="keaktifanFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj ml-2" aria-labelledby="keaktifanButton">
        
                    @foreach ($status_keaktifan as $keaktifan)
                        <li>
                            <div class="flex items-center p-1 rounded-sm">
                                <input id="{{ $keaktifan }}" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="{{ $keaktifan }}" class="text-base font-light text-unj ml-3">{{ $keaktifan }}</label>
                            </div>
                        </li>
                    @endforeach
        
                </ul>
            </div>
            {{-- Status keaktifan Menu - End --}}
        
        </div>
        {{-- Status Keaktifan Filter - End --}}

        {{-- Kewarganegaraan Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Kewarganegaraan</p>
        
            {{-- Dropdown Button - Start --}}
            <button id="kewarganegaraanButton" type="button" data-dropdown-toggle="kewarganegaraanFilter"
                class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full">
                -- Pilih kewarganegaraan mahasiswa --
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}
        
            {{-- Kewarganegaraan Menu - Start --}}
            <div id="kewarganegaraanFilter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj ml-2" aria-labelledby="kewarganegaraanButton">
        
                    @foreach ($kewarganegaraan as $wn)
                        <li>
                            <div class="flex items-center p-1 rounded-sm">
                                <input id="{{ $wn }}" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="{{ $wn }}" class="text-base font-light text-unj ml-3">{{ $wn }}</label>
                            </div>
                        </li>
                    @endforeach
        
                </ul>
            </div>
            {{-- Kewarganegaraan Menu - End --}}
        
        </div>
        {{-- Kewarganegaraan Filter - End --}}

        {{-- Tipe Grafik Filter - Start --}}
        <div class="mt-3 ml-2">
            <p class="text-base text-unj font-semibold">Tipe Grafik</p>

            {{-- Dropdown Button - Start --}}
            <button id="graphTypeButton" type="button" data-dropdown-toggle="graphType" class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center justify-between px-5 py-2 w-full">
                {{ $selected_graph_type ?? '-- Pilih tipe grafik --' }}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}

            {{-- Pilihan Tipe Grafik - Start --}}
            <div id="graphType" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-100">
                <ul class="py-2 text-sm text-unj" aria-labelledby="graphTypeButton">

                    @foreach (['Column', 'Bar', 'Pie', 'Line'] as $graph_type)
                        <li>
                            <a href="#" wire:click.prevent="selectGraphType('{{ $graph_type }}')" class="block px-4 py-2 hover:bg-gray-100">
                                {{ $graph_type }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
            {{-- Pilihan Tipe Grafik - End --}}


        </div>
        {{-- Tipe Grafik Filter - End --}}

    </div>
    {{-- Container Filter - End --}}

    {{-- Container Graph - Start --}}
    <div class="flex-1 mt-10 mr-8 flex flex-col w-full">
        <div class="text-white shadow-xl">
            <div class="bg-unj rounded-t-md p-4 font-semibold">
                <p class="text-center">Jumlah Mahasiswa Berdasarkan</p>
            </div>
            <div>
                <div id="angkatan" class="text-black mt-4"></div>
            </div>
        </div>
    </div>
    {{-- Container Graph - End --}}

</div>
{{-- Wrapper - End --}}