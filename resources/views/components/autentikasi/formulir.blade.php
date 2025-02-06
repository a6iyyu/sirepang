<section
    class="w-full flex flex-col items-center justify-center bg-cover bg-center bg-no-repeat bg-gradient-to-lr from-[#a9d6ff] to-[#edf2f7] text-black lg:w-1/2 lg:px-4"
    style="background: url({{ asset('img/latar-belakang.svg') }})"
>
    <h3 class="cursor-default font-bold text-xl text-[#1a4167] lg:text-3xl">
        Selamat Datang
    </h3>
    <h5 class="mb-6 mt-1 cursor-default text-sm text-gray-600 lg:text-base">
        Silakan masuk ke akun Anda.
    </h5>
    <form action="{{ route('masuk') }}" method="POST" class="w-3/4 lg:w-[65%]">
        @csrf
        @if ($errors->any())
            <ul class="my-5 p-4 rounded-lg bg-red-50 border border-red-500 list-disc list-inside text-sm text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mt-7 space-y-5">
            <x-input
                name="login_username"
                label="Nama Kecamatan"
                type="text"
                icon="fa-solid fa-id-card"
                required="true"
                placeholder="Masukkan Nama Kecamatan Anda"
                autofocus
            />
            <x-input
                name="login_password"
                label="Kata Sandi"
                type="password"
                icon="fa-solid fa-lock"
                required="true"
                placeholder="Masukkan Kata Sandi Anda"
            />
        </div>
        <button type="submit" class="mt-10 cursor-pointer w-full p-4 rounded-lg font-semibold transform transition-all duration-200 bg-emerald-500 text-white focus:outline-none hover:scale-[1.02] hover:bg-emerald-400">
            <i class="fa-solid fa-right-to-bracket"></i>
            &ensp;Masuk
        </button>
    </form>
    <h5 class="mt-8 cursor-default text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} SIREPANG
        <br />
        Dinas Ketahanan Pangan Kabupaten Malang
    </h5>
</section>