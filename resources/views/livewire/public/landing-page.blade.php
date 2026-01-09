<div class="relative min-h-screen w-full overflow-hidden flex flex-col">

    {{-- Logo --}}
    <div class="flex items-center lg:items-center gap-8 px-10 lg:px-5 pt-10 z-20 lg:absolute lg:flex-row lg:top-[40px] lg:left-[65px] lg:gap-16 lg:pt-0">
        {{-- Logo Pustikom --}}
        <div class="flex gap-4 items-center">
            <img src="{{asset('assets/landing_page/logo_unj.svg')}}" alt="Logo UNJ" class="h-18 w-auto">
            <div class="flex flex-col text-left">
                <span class="text-primary font-semibold text-[18px]">UNIVERSITAS NEGERI JAKARTA</span>
            </div>
        </div>

        {{-- Logo Diktisaintek --}}
        <img src="{{asset('assets/landing_page/logo_diktisaintek.svg')}}" alt="Logo Diktisaintek">
    </div>

    {{-- Menu --}}
    <div class="absolute left-[65px] top-[40%] lg:top-[30%] lg:ml-25">

        <div class="flex flex-col items-center text-center">
            <span class="text-primary text-2xl mb-4">Selamat Datang</span>
            <span class="text-primary text-6xl font-extrabold tracking-wide">SATU DATA</span>
            <span class="text-primary text-2xl font-semibold mt-2">Universitas Negeri Jakarta</span>
        </div>

        <hr class="text-gray-500 rounded-md my-8">

        <div class="flex sm:flex-row gap-4 sm:gap-8">
            <a href="{{route('dashboard')}}" class="px-4 py-2 bg-linear-to-r from-accent-1 to-primary text-white text-2xl rounded-2xl hover:from-primary hover:to-accent-1 transition-colors duration-300 cursor-pointer font-semibold">Jelajah Data</a>
            <a href="{{route('login')}}" class="flex gap-2 px-4 py-2 bg-linear-to-l from-accent-1 to-primary text-white text-2xl rounded-2xl hover:from-primary hover:to-accent-1 transition-colors duration-300 cursor-pointer font-semibold">
                <span>Login</span>
                <div class="bg-primary rounded-full size-8 flex justify-center items-center">
                    <i class="fa-solid fa-arrow-right -rotate-45 bg-primary"></i>
                </div>
            </a>
        </div>
    </div>
    
    {{-- Background --}}
    <div
        style="background-image: url('{{ asset('assets/landing_page/bg.png') }}');" 
        class="hidden lg:block absolute inset-0 bg-[length:auto_100%] bg-right bg-no-repeat -z-10""
    ></div>

    {{-- Footer --}}
    <div class="bg-primary text-white flex w-full justify-center py-3 mt-auto fixed bottom-0">
        <div>
            <i class="fa-regular fa-copyright"></i>
            <span class="font-semibold py-2 tracking-wide">
                2025 | PUSTIKOM - Universitas Negeri Jakarta
            </span>
        </div>
    </div>
</div>
