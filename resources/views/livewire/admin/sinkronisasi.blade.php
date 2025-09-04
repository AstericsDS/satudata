<div class="p-8">
    <div class="rounded-t-lg overflow-hidden">

        {{-- Title Table - Start --}}
        <div class="bg-unj py-4">
            <h1 class="text-white text-center text-3xl">Sinkronisasi Data</h1>
        </div>
        {{-- Title Table - End --}}


        <div class="relative overflow-x-auto">

            {{-- Table - Start --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                {{-- Table Head - Start --}}
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Menu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sumber
                        </th>
                    </tr>
                </thead>
                {{-- Table Head - End --}}

                {{-- Table Body - Start --}}
                <tbody>

                    @foreach ($menu_list as $menu)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <td class="px-6 py-4">
                                {{ $menu['no'] }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $menu['title'] }}
                            </td>
                            <td class="px-6 py-4">
                                <button wire:loading.attr="disabled" wire:click="{{ $menu['action'] }}"
                                    class="p-2 bg-blue-400 w-fit rounded-md hover:bg-blue-500 cursor-pointer transition-all">

                                    <span wire:loading.remove wire:target="{{ $menu['action'] }}">
                                        <!-- Normal icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="#ffffff" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </span>

                                    <span wire:loading wire:target="{{ $menu['action'] }}">
                                        <!-- Loading spinner -->
                                        <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                @if (isset($data[$menu['statusKey']]['updated_at']))
                                    <div wire:poll>
                                        Data ini disinkronisasi pada:
                                        <span class="font-semibold text-black">
                                            {{ $data[$menu['statusKey']]['updated_at'] }}
                                        </span>
                                    </div>
                                @else
                                    Data belum disinkronisasi
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $menu['source'] }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                {{-- Table Body - End --}}

            </table>
            {{-- Table - End --}}

        </div>

    </div>
</div>