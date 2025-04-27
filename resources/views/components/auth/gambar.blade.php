<section class="relative hidden w-1/2 lg:inline">
    <span class="absolute inset-0 z-10 bg-gradient-to-b from-[#1a4167]/20 to-[#1a4167]/30 transition-opacity duration-300"></span>
    <div class="carousel-container h-full">
        <img
            src="{{ asset('img/login-1.jpg') }}"
            alt="Selamat Datang"
            class="carousel-image absolute h-full w-full bg-white object-cover opacity-0"
            loading="lazy"
            data-index="0"
        />
        <img
            src="{{ asset('img/login-2.jpg') }}"
            alt="Selamat Datang"
            class="carousel-image absolute h-full w-full bg-white object-cover opacity-0"
            loading="lazy"
            data-index="1"
        />
        <img
            src="{{ asset('img/login-3.jpg') }}"
            alt="Selamat Datang"
            class="carousel-image absolute h-full w-full bg-white object-cover opacity-0"
            loading="lazy"
            data-index="2"
        />
        <img
            src="{{ asset('img/login-4.jpg') }}"
            alt="Selamat Datang"
            class="carousel-image absolute h-full w-full bg-white object-cover opacity-0"
            loading="lazy"
            data-index="2"
        />
    </div>
    <figure class="absolute bottom-8 left-8 z-20 space-y-2 text-white">
        <img
            id="carousel-img"
            src="{{ asset('img/logo.svg') }}"
            alt="Dinas Ketahanan Pangan"
            class="mb-4 w-16 transform transition-transform duration-300 hover:scale-105"
            loading="lazy"
        />
        <h4 class="cursor-default text-2xl font-bold tracking-tight">Dinas Ketahanan Pangan</h4>
        <h6 class="cursor-default text-sm text-gray-200">Pemerintah Kabupaten Malang</h6>
        <div class="carousel-pointer mt-4 flex h-fit space-x-4">
            <span data-index="0" class="carousel-indicator h-3 w-3 cursor-pointer rounded-full border-2 border-white bg-white"></span>
            <span data-index="1" class="carousel-indicator h-3 w-3 cursor-pointer rounded-full border-2 border-white"></span>
            <span data-index="2" class="carousel-indicator h-3 w-3 cursor-pointer rounded-full border-2 border-white"></span>
            <span data-index="3" class="carousel-indicator h-3 w-3 cursor-pointer rounded-full border-2 border-white"></span>
        </div>
    </figure>
</section>