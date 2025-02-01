<section class="mx-auto w-4/5 flex flex-col items-center justify-center px-4 text-slate-950 lg:w-3/4">
    <h3 class="font-bold text-3xl">Selamat Datang</h3>
    <h5 class="mt-2 text-gray-600">
        Silakan masuk ke akun Anda.
    </h5>
    <form action="{{ route('masuk') }}" method="POST" class="w-full">
        @csrf
        @if ($errors->any())
            <ul class="my-5 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <fieldset class="flex flex-col space-y-4">
            <label for="login_username" class="font-medium">Nama Pengguna</label>
            <div class="relative">
                <i class="fa-solid fa-id-card absolute inset-y-0 top-4.5 left-0 flex items-center pl-5 text-gray-500"></i>
                <input
                    type="text"
                    name="login_username"
                    id="login_username"
                    class="w-full rounded-lg border-2 pl-12 pr-4 py-3 transition-all duration-200 text-gray-700 focus:outline-none focus:border-[#1a4167] focus:ring-2 focus:ring-[#1a4167]/20 @error('login_username') border-red-500 @enderror"
                    value="{{ old('login_username') }}"
                    placeholder="Masukkan NIP Anda"
                    autofocus
                    required
                />
            </div>
        </fieldset>
        <fieldset class="mt-4 flex flex-col space-y-4">
            <label for="login_password" class="font-medium">Kata Sandi</label>
            <div class="relative">
                <i class="fa-solid fa-lock absolute inset-y-0 top-4.5 left-0 flex items-center pl-5 text-gray-500"></i>
                <input
                    type="password"
                    name="login_password"
                    id="login_password"
                    class="w-full rounded-lg border-2 pl-12 pr-4 py-3 text-gray-700 focus:outline-none focus:border-[#1a4167] focus:ring-2 focus:ring-[#1a4167]/20 transition-all duration-200 @error('login_password') border-red-500 @enderror"
                    placeholder="Masukkan Kata Sandi Anda"
                    required
                />
            </div>
        </fieldset>
        <button
            type="submit"
            class="mt-10 cursor-pointer w-full p-4 rounded-lg font-semibold transform transition-all duration-200 bg-emerald-500 text-white focus:outline-none hover:scale-[1.02] hover:bg-emerald-400"
        >
            Masuk
        </button>
        <h5 class="mt-8 cursor-default text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Dinas Ketahanan Pangan Kabupaten Malang
        </h5>
    </form>
</section>