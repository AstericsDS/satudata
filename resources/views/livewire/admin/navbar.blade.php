<nav class="bg-primary border-gray-200 sticky top-0 z-50">

    {{-- All Container - Start --}}
    <div class="flex flex-wrap justify-between items-center w-full px-4 sm:px-6 py-2.5">

        {{-- Logo - Start --}}
        <a href="/dashboard" class="flex items-center space-x-3">
            <img src="{{ asset('assets/images/unj.png') }}" width="55px" class="h-14 w-auto mt-2 ml-2" alt="UNJ Logo">
            <div class="flex flex-col">
                <h1 class="font-bold text-lg sm:text-2xl text-white">SATU DATA</h1>
                <h2 class="font-bold text-xs sm:text-base text-white">UNIVERSITAS NEGERI JAKARTA</h2>
            </div>
        </a>
        {{-- Logo - End --}}

        <div class="flex gap-4 items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                </svg>
            </div>
            <div class="flex gap-2 items-center text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="size-9">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <span class="text-lg">Admin</span>
            </div>
        </div>
    </div>
    {{-- All Container - End --}}

</nav>
