<section id="modal-{{ Str::slug($title) }}" class="z-30 absolute inset-0 h-screen w-screen hidden items-center justify-center bg-black/50">
    <div class="w-1/2 px-6 py-5 rounded-lg shadow-lg bg-[#fff8eb]">
        <header class="pb-2 flex items-center justify-between border-b">
            <h2 class="cursor-default text-2xl font-semibold">
                {{ ucwords(strtolower(str_replace("-", " ", $title))) }}
            </h2>
            <button id="keluar-detail-keluarga" class="cursor-pointer text-sm transition-colors duration-300 text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-x"></i>
            </button>
        </header>
        <section class="py-4 text-gray-700">
            {!! $content !!}
        </section>
        <footer class="pt-2 flex justify-end">
            <button id="keluar-detail-keluarga" class="cursor-pointer items-center px-4 py-3 bg-emerald-600 text-white rounded-md text-sm font-medium transition-colors duration-200 hover:bg-emerald-700">
                Kembali
            </button>
        </footer>
    </div>
</section>