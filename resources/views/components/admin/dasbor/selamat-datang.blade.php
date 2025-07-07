<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-base font-bold lg:text-xl">Selamat datang, Admin!</h2>
        <h5 class="mt-1 text-sm italic">Apa yang bisa dibantu?</h5>
    </div>
    <form action="{{ route('admin.rekap-keseluruhan') }}" method="POST">
        @csrf
        @method('POST')
        <button type="submit" class="bg-green-dark flex h-full cursor-pointer items-center gap-4 rounded-lg px-5 text-[13px] text-white">
            <i class="fa-solid fa-file-excel"></i>
            <h5>Unduh Data Keseluruhan</h5>
        </button>
    </form>
</section>