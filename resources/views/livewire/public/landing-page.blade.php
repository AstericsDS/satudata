<div class="relative min-h-screen w-full overflow-hidden flex flex-col">

    {{-- Logo --}}
    <div class="flex flex-col items-center justify-center gap-4 px-4 pt-6 z-20 sm:flex-col sm:gap-6 sm:px-6 sm:pt-8 md:flex-row md:justify-center md:gap-8 md:px-8 md:pt-10 lg:absolute lg:flex-row lg:top-[40px] lg:left-[65px] lg:gap-16 lg:pt-0 lg:justify-start lg:px-0">
        {{-- Logo Pustikom --}}
        <div class="flex gap-4 items-center justify-center">
            <img
                src="{{asset('assets/landing_page/logo_unj.svg')}}"
                alt="Logo UNJ"
                class="h-14 w-auto sm:h-16 md:h-18"
            >
            <div class="flex flex-col text-left">
                <span class="text-primary font-semibold text-sm sm:text-base md:text-[18px]">
                    UNIVERSITAS NEGERI JAKARTA
                </span>
            </div>
        </div>

        {{-- Logo Diktisaintek --}}
        <img
            src="{{asset('assets/landing_page/logo_diktisaintek.svg')}}"
            alt="Logo Diktisaintek"
            class="h-11 lg:h-14 w-auto md:h-auto"
            width="20"
            height="20"
        >
    </div>

    {{-- Menu --}}
    <div class="flex flex-col items-center lg:items-start justify-center px-4 md:px-8 lg:px-15 mt-50 md:mt-24 lg:mt-0 top-[30%] lg:absolute lg:left-[65px]">

        <div class="flex flex-col items-center text-center">
            <span class="text-primary text-lg md:text-2xl lg:text-4xl mb-2 sm:mb-3 md:mb-4">
                Selamat Datang
            </span>
            <span class="text-primary text-4xl md:text-6xl lg:text-8xl font-extrabold tracking-wide">
                SATU DATA
            </span>
            <span class="text-primary text-lg md:text-2xl lg:text-4xl font-semibold mt-1 md:mt-2">
                Universitas Negeri Jakarta
            </span>
        </div>

        <hr class="text-gray-500 rounded-md my-6 w-50% lg:w-full sm:my-7 md:my-8">

        <div class="flex flex-col items-center gap-3 w-full sm:flex-row sm:justify-center sm:gap-4 md:gap-6 md:justify-center lg:justify-start">
            <a
                href="{{route('dashboard')}}"
                class="px-4 py-2 bg-linear-to-r from-accent-1 to-primary text-white text-lg sm:text-xl md:text-2xl rounded-2xl hover:from-primary hover:to-accent-1 transition-colors duration-300 cursor-pointer font-semibold w-[50%] md:w-full lg:w-[65%] text-center"
            >
                Jelajah Data
            </a>
            <a
                href="{{route('login')}}"
                class="flex gap-2 px-4 py-2 bg-linear-to-l from-accent-1 to-primary text-white text-lg sm:text-xl md:text-2xl rounded-2xl hover:from-primary hover:to-accent-1 transition-colors duration-300 cursor-pointer font-semibold w-[50%] md:w-full lg:w-[35%] justify-center"
            >
                <span>Login</span>
                <div class="bg-primary rounded-full size-6 sm:size-7 md:size-8 flex justify-center items-center">
                    <i class="fa-solid fa-arrow-right -rotate-45 bg-primary text-xs sm:text-sm md:text-base"></i>
                </div>
            </a>
        </div>
    </div>
    
    {{-- Background --}}
    <div
        style="background-image: url('{{ asset('assets/landing_page/bg2.png') }}');" 
        class="hidden lg:block absolute inset-0 bg-[length:auto_100%] bg-right bg-no-repeat -z-10""
    ></div>

    {{-- My UNJ --}}
    <div class="absolute bottom-24 md:bottom-90 lg:bottom-15 left-1/2 -translate-x-1/2 lg:left-7 lg:translate-x-0 z-10">
        <a href="http://my.unj.ac.id" target="_blank">
            <img
                src="{{asset('assets/landing_page/myunj.png')}}"
                alt="My UNJ"
                class="lg:block h-auto w-[180px] sm:w-[220px] md:w-[250px] lg:w-[300px]"
                width="300"
                height="300"
            
            >
        </a>
        
    </div>

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
