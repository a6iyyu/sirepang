<section class="min-h-screen flex items-center justify-center bg-orange-100 p-2 sm:p-4 md:p-8">
    <div class="w-full max-w-2xl px-2 sm:px-4">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-center justify-center gap-0 mb-8 text-center">
            <div class="bg-orange-100/10 p-2 rounded-2xl hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset('img/logodkp.webp') }}" alt="Logo" class="w-16 h-16 sm:w-24 sm:h-24 md:w-20 md:h-20 object-contain">
            </div>
            <div class="space-y-1">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-stone-800 tracking-tight">SIREPANG</h1>
                <p class="hidden md:block text-stone-900/80 text-sm sm:text-base md:text-lg">Silakan masuk ke akun Anda</p>
                <p class="block md:hidden text-stone-900/80 text-xs sm:text-sm">Kabupaten Malang</p>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('masuk') }}" method="POST" class="space-y-6 sm:space-y-8">
            @csrf
            {{-- Error Messages --}}
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-2 sm:p-4 text-red-700 text-xs sm:text-sm">
                    <ul class="list-disc pl-4 sm:pl-6 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-stone-800">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Username Input --}}
            <div class="space-y-2 sm:space-y-3">
                <div class="flex items-center gap-2">
                    <i class="hidden md:block fa-solid fa-id-card text-stone-600 text-sm sm:text-base"></i>
                    <label class="text-neutral-900 font-bold text-xs sm:text-sm">
                        <span class="hidden md:inline">Nama Pengguna</span>
                        <span class="inline md:hidden">NIP</span>
                    </label>
                </div>
                <div class="relative group">
                    <input type="text" name="login_username"
                        class="w-full text-xs sm:text-sm px-2 sm:px-4 py-1.5 sm:py-2 border-b-2 border-t-0 border-l-0 border-r-0 md:border-2 border-stone-800 md:rounded-xl md:bg-orange-50 bg-transparent focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all duration-200 text-stone-900 placeholder-stone-400"
                        placeholder="Masukkan NIP Anda" value="{{ old('login_username') }}" required autofocus>
                </div>
            </div>

            {{-- Password Input --}}
            <div class="space-y-2 sm:space-y-3">
                <div class="flex items-center gap-2">
                    <i class="hidden md:block fa-solid fa-lock text-stone-600 text-sm sm:text-base"></i>
                    <label class="text-stone-950 font-bold text-xs sm:text-sm">Kata Sandi</label>
                </div>
                <div class="relative group">
                    <input type="password" name="login_password"
                        class="w-full text-xs sm:text-sm px-2 sm:px-4 py-1.5 sm:py-2 border-b-2 border-t-0 border-l-0 border-r-0 md:border-2 border-stone-800 md:rounded-xl md:bg-orange-50 bg-transparent focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 transition-all duration-200 text-stone-900 placeholder-stone-400"
                        placeholder="Masukkan Kata Sandi Anda" required>
                </div>
            </div>

            <button type="submit"
                class="mt-6 sm:mt-10 cursor-pointer w-full p-3 sm:p-4 rounded-lg font-semibold transform transition-all duration-200 bg-emerald-600 text-white focus:outline-none hover:scale-[1.02] hover:bg-emerald-400 flex items-center justify-center gap-2 text-xs sm:text-sm">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Masuk</span>
            </button>

            <p class="mt-6 sm:mt-8 cursor-default text-center text-xs sm:text-sm text-gray-500">
                &copy; {{ date('Y') }} Dinas Ketahanan Pangan Kabupaten Malang
            </p>
        </form>
    </div>
</section>
