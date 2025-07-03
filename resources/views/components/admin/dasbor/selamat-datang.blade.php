<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-base font-bold lg:text-xl">Selamat datang, Admin!</h2>
        <h5 class="mt-1 text-sm italic">Apa yang bisa dibantu?</h5>
    </div>
    <a href="{{ route('admin.rekap-keseluruhan') }}" class="flex items-center gap-4 rounded-lg bg-green-dark px-5 py-1.5 text-white text-[13px]">
        <i class="fa-solid fa-file-excel"></i>
        <h5>Unduh Data Keseluruhan</h5>
    </a>
</section>