<section
    id="modal-tampilkan-komentar"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm"
    aria-modal="true"
    role="dialog"
>
    <figure class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-lg font-semibold text-gray-800">Detail Komentar</h2>
        <figcaption id="id-modal" class="mb-6 grid cursor-default grid-cols-1 gap-x-4 gap-y-2 text-sm text-gray-600"></figcaption>
        <h5 class="mb-2 font-semibold text-gray-800">Komentar:</h5>
        <p id="komentar" class="mb-6 text-sm text-gray-700"></p>
        <button id="btn-confirm" class="cursor-pointer rounded-lg bg-green-600 px-4 py-2 text-sm text-white transition hover:bg-green-700">
            Tutup
        </button>
    </figure>
</section>