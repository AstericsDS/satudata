{{-- Wrapper - Start --}}
<div>

    {{-- Container Filter - Start --}}
    <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-sm mt-10 ml-8 pb-4">

        {{-- Title - Start --}}
        <div class="flex flex-col justify-center mb-4">
            <h5 class="text-unj font-bold text-center text-lg">Filter</h5>
            <p class="text-unj text-base text-center mt-0.5">Atur data yang akan ditampilkan</p>
            <hr class="h-px bg-unj mt-2 border-0">
        </div>
        {{-- Title - End --}}

        {{-- Filtering Table - Start --}}
        <div class="flow-root">
            <table class="text-sm text-left w-full">
                <tbody>

                    {{-- Jenjang - Start --}}
                    <tr>
                        <th scope="row" class="px-2 py-2">
                            <div class="flex items-center gap-x-2">
                                <input id="checkbox-jenjang" type="checkbox" class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="checkbox-jenjang" class="sr-only">checkbox</label>
                                <span class="text-base font-light text-unj ml-1">Jenjang</span>
                            </div>
                        </th>
                    </tr>
                    {{-- Jenjang - End --}}

                    {{-- Semester - Start --}}
                    <tr>
                        <th scope="row" class="px-2 py-2">
                            <div class="flex items-center gap-x-2">
                                <input id="checkbox-semester" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="checkbox-semester" class="sr-only">checkbox</label>
                                <span class="text-base font-light text-unj ml-1">Semester</span>
                            </div>
                        </th>
                    </tr>
                    {{-- Semester - End --}}

                    {{-- Fakultas - Start --}}
                    <tr>
                        <th scope="row" class="px-2 py-2">
                            <div class="flex items-center gap-x-2">
                                <input id="checkbox-fakultas" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="checkbox-fakultas" class="sr-only">checkbox</label>
                                <span class="text-base font-light text-unj ml-1">Fakultas</span>
                            </div>
                        </th>
                    </tr>
                    {{-- Fakultas - End --}}

                    {{-- Program Studi - Start --}}
                    <tr>
                        <th scope="row" class="px-2 py-2">
                            <div class="flex items-center gap-x-2">
                                <input id="checkbox-prodi" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="checkbox-prodi" class="sr-only">checkbox</label>
                                <span class="text-base font-light text-unj ml-1">Program Studi</span>
                            </div>
                        </th>
                    </tr>
                    {{-- Program Studi - End --}}

                    {{-- Status Keaktifan - Start --}}
                    <tr>
                        <th scope="row" class="px-2 py-2">
                            <div class="flex items-center gap-x-2">
                                <input id="checkbox-keaktifan" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="checkbox-keaktifan" class="sr-only">checkbox</label>
                                <span class="text-base font-light text-unj ml-1">Status Keaktifan</span>
                            </div>
                        </th>
                    </tr>
                    {{-- Status Keaktifan - End --}}

                    {{-- Kewarganegaraan - Start --}}
                    <tr>
                        <th scope="row" class="px-2 py-2">
                            <div class="flex items-center gap-x-2">
                                <input id="checkbox-kewarganegaraan" type="checkbox"
                                    class="w-4 h-4 accent-unj text-white bg-gray-100 border-gray-300 rounded checked:bg-unj checked:border-unj">
                                <label for="checkbox-kewarganegaraan" class="sr-only">checkbox</label>
                                <span class="text-base font-light text-unj ml-1">Kewarganegaraan</span>
                            </div>
                        </th>
                    </tr>
                    {{-- Kewarganegaraan - End --}}

                </tbody>
            </table>
        </div>
        {{-- Filtering Table - End --}}

        {{-- Tipe Grafik Filter - Start --}}
        <div class="mt-6 ml-2">
            <p class="text-base text-unj font-semibold">Tipe Grafik</p>

            {{-- Dropdown Button - Start --}}
            <button id="graphTypeButton" type="button" data-dropdown-toggle="graphType" class="text-unj text-sm rounded-lg bg-white border border-gray-500 text-center inline-flex items-center px-5 py-2.5">
                {{ $selected_graph_type ?? '-- Pilih tipe grafik --' }}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            {{-- Dropdown Button - End --}}

            {{-- Pilihan Tipe Grafik - Start --}}
            <div id="graphType" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
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

</div>
{{-- Wrapper - End --}}