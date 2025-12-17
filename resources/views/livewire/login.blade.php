<div
    class="py-12 px-6 bg-white/80 backdrop-blur-md shadow-2xl rounded-4xl w-[350px] h-[500px] sm:h-[500px] sm:w-[500px] md:w-[600px] transition-all flex flex-col justify-center space-y-8">
    <div class="flex flex-col items-center gap-2">
        <img src="{{asset('assets/images/unj.png')}}" alt="Logo UNJ" class="w-[100px] sm:w-[150px]">
        <h1 class="mt-2 font-semibold text-2xl sm:text-3xl">dd</h1>
    </div>
    @if(session('error'))
        <div class="p-3 rounded-md bg-red-200 text-red-500 my-4 w-fit mx-auto text-center">
            <span>{{ session('error') }}</span>
        </div>
    @endif
    <a href="{{ route('sso.login') }}">
        <div
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 w-[75%] mx-auto flex space-x-2 items-center transition-all justify-center shadow-lg">
            <img src="{{ asset('assets/login/microsoft.svg') }}" alt="Microsoft" class="w-8">
            <span>Login dengan SSO</span>
        </div>
    </a>
</div>