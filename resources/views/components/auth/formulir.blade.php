<section class="bg-gradient-to-lr flex w-full flex-col items-center justify-center from-[#a9d6ff] to-[#edf2f7] bg-cover bg-center bg-no-repeat text-black lg:w-1/2 lg:px-4" style="background: url({{ asset('img/latar-belakang.svg') }})">
    <h3 class="cursor-default text-xl font-bold text-[#1a4167] lg:text-3xl">Selamat Datang</h3>
    <h5 class="mt-1 mb-6 cursor-default text-sm text-gray-600 lg:text-base">Silakan masuk ke akun Anda.</h5>
    <form action="{{ route('masuk') }}" method="POST" class="w-3/4 lg:w-[65%]">
        @csrf
        @if ($errors->any())
            <ul class="my-5 list-inside list-disc rounded-lg border border-red-500 bg-red-50 p-4 text-sm text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mt-7 space-y-5">
            <x-input
                name="username"
                label="Nama Kecamatan"
                icon="fa-solid fa-id-card"
                placeholder="Masukkan Nama Kecamatan Anda"
                autocomplete
                required
            />
            <x-input
                name="password"
                label="Kata Sandi"
                type="password"
                icon="fa-solid fa-lock"
                placeholder="Masukkan Kata Sandi Anda"
                required
            />
        </div>
        <button type="submit" class="mt-10 w-full transform cursor-pointer rounded-lg bg-emerald-500 p-4 font-semibold text-white transition-all duration-200 hover:scale-[1.02] hover:bg-emerald-400 focus:outline-none">
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