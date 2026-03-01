<div class="relative min-h-screen w-full overflow-hidden flex flex-col">

    {{-- Background --}}
    <div
        style="background-image: url('{{ asset('assets/landing_page/bg3.png') }}');" 
        class="hidden lg:block absolute inset-0 left-45 bg-cover bg-center bg-no-repeat z-0"
    ></div>

    {{-- Header / Logo --}}
    <header class="relative z-10 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 sm:gap-6 px-6 pt-8 lg:px-16 lg:pt-10 w-full">
        {{-- Logo Pustikom --}}
        <div class="flex gap-4 items-center justify-center">
            <img
                src="{{asset('assets/landing_page/logo_unj.svg')}}"
                alt="Logo UNJ"
                class="h-14 sm:h-16 md:h-18 w-auto"
            >
            <div class="flex flex-col text-left">
                <span class="text-primary font-bold text-sm sm:text-base md:text-[18px]">
                    UNIVERSITAS NEGERI JAKARTA
                </span>
            </div>
        </div>

        {{-- Logo Diktisaintek --}}
        <img
            src="{{asset('assets/landing_page/logo_diktisaintek.svg')}}"
            alt="Logo Diktisaintek"
            class="h-11 lg:h-14 w-auto"
        >
    </header>

    {{-- Menu --}}
    <main class="flex flex-col items-center lg:items-start justify-cente md:px-8 lg:px-0 mt-50 md:mt-24 lg:mt-0 top-[25%] lg:absolute lg:left-[65px]">

        <div class="flex flex-col items-center text-center">
            <span class="text-primary text-xl md:text-2xl lg:text-4xl mb-2 sm:mb-3 md:mb-4">
                Selamat Datang
            </span>
            <span class="text-primary text-4xl md:text-6xl lg:text-8xl font-extrabold tracking-wide">
                SATU DATA
            </span>
            <span class="text-primary text-lg md:text-2xl lg:text-4xl font-semibold mt-1 md:mt-2">
                Universitas Negeri Jakarta
            </span>
        </div>

        <hr class="border-gray-200 border-2 rounded-md my-4 md:my-5 w-50% lg:w-full">
        {{-- MyUNJ --}}
        <div class="pb-6 w-full flex justify-center lg:justify-center">
            <a href="http://my.unj.ac.id" target="_blank">
                <img
                    src="{{asset('assets/landing_page/myunj.png')}}"
                    alt="My UNJ"
                    class="lg:block h-auto w-[120px] md:w-[220px] lg:w-[220px]"
                    width="200"
                    height="200"
                >
            </a>
        </div>
        
        {{-- Button --}}
        <div class="flex flex-col items-center gap-3 w-full sm:flex-row sm:justify-center sm:gap-4 md:gap-6 md:justify-center lg:justify-start">
            <a
                href="{{route('dashboard')}}"
                class="px-4 py-2 bg-linear-to-r from-accent-1 to-primary text-white text-lg sm:text-xl md:text-2xl rounded-2xl hover:from-primary hover:to-accent-1 transition-colors duration-300 cursor-pointer font-semibold w-[50%] md:w-full lg:w-[60%] text-center"
            >
                Jelajah Data
            </a>
            <a
                href="{{route('login')}}"
                class="flex gap-2 px-4 py-2 bg-linear-to-l from-accent-1 to-primary text-white text-lg sm:text-xl md:text-2xl rounded-2xl hover:from-primary hover:to-accent-1 transition-colors duration-300 cursor-pointer font-semibold w-[50%] md:w-full lg:w-[40%] justify-center"
            >
                <span>Login</span>
                <div class="bg-primary rounded-full size-6 sm:size-7 md:size-8 flex justify-center items-center">
                    <i class="fa-solid fa-arrow-right -rotate-45 bg-primary text-xs sm:text-sm md:text-base"></i>
                </div>
            </a>
        </div>
    </main>
    
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
