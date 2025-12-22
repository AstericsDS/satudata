<div class="">

    {{-- Logo --}}
    <div class="absolute top-[40px] left-[63px] flex gap-16">

        {{-- Logo Pustikom --}}
        <div class="flex gap-4 items-center">
            <img src="{{asset('assets/landing_page/logo_unj.svg')}}" alt="Logo UNJ">
            <div class="flex flex-col">
                <span class="text-primary font-semibold text-xl">UNIVERSITAS NEGERI JAKARTA</span>
            </div>
        </div>

        {{-- Logo Diktisaintek --}}
        <img src="{{asset('assets/landing_page/logo_diktisaintek.svg')}}" alt="Logo Diktisaintek">
    </div>

    {{-- Menu --}}
    <div class="absolute left-[65px] top-[30%]">

        <div class="flex flex-col items-center">
            <span class="text-primary text-xl mb-4">Selamat Datang</span>
            <span class="text-primary text-6xl font-extrabold tracking-wide">SATU DATA</span>
            <span class="text-primary text-2xl font-semibold">Universitas Negeri Jakarta</span>
        </div>

        <hr class="text-gray-500 rounded-md my-8">

        <div class="flex gap-8">
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
    <div class="">
        <img src="{{ asset('assets/landing_page/mask.svg') }}" alt="" class="absolute right-0 w-[1200px] -z-30">
        <img src="{{ asset('assets/landing_page/vector_1.svg') }}" alt="" class="absolute right-10 -z-50 w-[1000px]">
        <img src="{{ asset('assets/landing_page/vector_2.svg') }}" alt="" class="absolute right-80 -z-40 w-[1100px]">
    </div>

    {{-- Footer --}}
    <div class="bg-primary text-white flex w-full justify-center py-3 mt-auto absolute bottom-0">
        <div>
            <i class="fa-regular fa-copyright"></i>
            <span class="font-semibold py-2 tracking-wide">
                2025 | PUSTIKOM - Universitas Negeri Jakarta
            </span>
        </div>
    </div>
</div>
