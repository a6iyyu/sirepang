<a
    href="{{ route('verifikasi.detail', $item->id) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info"></i>
</a>
<a
    href="javascript:void(0)"
    class="action-button inline-flex cursor-pointer items-center rounded-md bg-emerald-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-emerald-700"
    data-id="{{ $item->id }}"
    data-action="approve"
>
    <i class="fa-solid fa-check"></i>
</a>
<a
    href="javascript:void(0)"
    class="action-button inline-flex cursor-pointer items-center rounded-md bg-red-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-red-700"
    data-id="{{ $item->id }}"
    data-action="reject"
>
    <i class="fa-solid fa-x"></i>
</a>
<section
    id="modal-konfirmasi"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm"
    aria-modal="true"
    role="dialog"
>
    <figure class="mx-4 w-full max-w-md rounded-xl bg-white p-6 shadow-lg">
        <h2 class="mb-4 text-lg font-semibold text-gray-800">Konfirmasi Verifikasi</h2>
        <figcaption id="modal-id" class="mb-6 text-sm text-gray-600">ID Keluarga: -</figcaption>
        <div class="mb-6 flex flex-col gap-2">
            <span class="flex items-center justify-between">
                <label for="komentar" class="text-left font-bold">Komentar</label>
                <h6>
                    <span id="hitung-karakter">0</span> / 200
                </h6>
            </span>
            <textarea
                name="komentar"
                id="komentar"
                rows="4"
                class="w-full resize-none rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-800 placeholder-gray-400 shadow-sm focus:border-green-600 focus:ring-1 focus:ring-green-600 focus:outline-none"
                placeholder="Tulis komentar jika diperlukan..."
                maxlength="200"
            ></textarea>
        </div>
        <span class="flex justify-end gap-2">
            <button id="btn-cancel" class="cursor-pointer rounded-lg border border-gray-300 px-4 py-2 text-sm text-gray-700 transition hover:bg-gray-100">
                Batal
            </button>
            <button id="btn-confirm" class="cursor-pointer rounded-lg bg-green-600 px-4 py-2 text-sm text-white transition hover:bg-green-700">
                Konfirmasi
            </button>
        </span>
    </figure>
</section>