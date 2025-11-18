<div class="p-8">

    <div class="flex gap-4 mb-8">
        <div class="flex-1 bg-[#006569]/10 rounded-md p-4 text-center flex flex-col space-y-2 border-[1px] border-slate-400">
            <h1 class="text-3xl text-primary font-semibold">{{ $sync->count() }}</h1>
            <h2 class="text-xl text-primary">Total Menu</h2>
        </div>
        <div class="flex-1 bg-[#FF5C22]/10 rounded-md p-4 text-center flex flex-col space-y-2 border-[1px] border-slate-400">
            <h1 class="text-3xl text-[#FF5C22] font-semibold">-</h1>
            <h2 class="text-xl text-[#FF5C22]">Total Sub-Menu</h2>
        </div>
        <div wire:poll.5s class="flex-1 bg-[#0162B8]/10 rounded-md p-4 text-center flex flex-col space-y-2 border-[1px] border-slate-400">
            <h1 class="text-3xl text-[#0162B8] font-semibold">{{ $sync->where('status', '=', 'synchronized')->count() }}</h1>
            <h2 class="text-xl text-[#0162B8]">Tersinkron</h2>
        </div>
        <div wire:poll.5s class="flex-1 bg-[#CF1E2E]/10 rounded-md p-4 text-center flex flex-col space-y-2 border-[1px] border-slate-400">
            <h1 class="text-3xl text-[#CF1E2E] font-semibold">{{ $sync->where('status', '!=', 'synchronized')->count() }}</h1>
            <h2 class="text-xl text-[#CF1E2E]">Belum Sinkron</h2>
        </div>
    </div>

    <div class="rounded-t-lg overflow-hidden bg-linear-to-b from-primary to-accent-2 p-6">

        {{-- Title Table - Start --}}
        <h1 class="text-white mb-6 text-2xl">Sinkronisasi Data</h1>
        {{-- Title Table - End --}}

        <div class="flex space-x-2 bg-white mb-4 rounded-md p-6">
            <div class="bg-linear-to-l from-primary to-accent-1 text-center py-2 flex-1 rounded-md text-white">Sinkronisasi Data Publik</div>
            <div class="bg-linear-to-l text-center py-2 flex-1 rounded-md text-black">Sinkronisasi Data Private</div>
        </div>

        <div class="relative overflow-x-auto rounded-md">

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
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Terakhir Sinkron
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sumber
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                {{-- Table Head - End --}}

                {{-- Table Body - Start --}}
                <tbody>
                    <livewire:admin.button.mahasiswa-synchronize />
                    <livewire:admin.button.dosen-synchronize />
                </tbody>
                {{-- Table Body - End --}}

            </table>
            {{-- Table - End --}}

        </div>

    </div>
</div>