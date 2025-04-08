<a
    href="{{ route('verifikasi.detail', $item->id_keluarga) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info"></i>
</a>
<form action="{{ route('verifikasi.disetujui') }}" method="POST" class="inline-block">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}" />
    <button
        type="submit"
        class="inline-flex cursor-pointer items-center rounded-md bg-emerald-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-emerald-700"
    >
        <i class="fa-solid fa-check"></i>
    </button>
</form>
<form action="{{ route('verifikasi.ditolak') }}" method="POST" class="inline-block">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}" />
    <button
        type="submit"
        class="inline-flex cursor-pointer items-center rounded-md bg-red-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-red-700"
    >
        <i class="fa-solid fa-x"></i>
    </button>
</form>