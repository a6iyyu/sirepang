<a
    href="{{ Auth::user()->tipe === 'admin' ? route('admin.detail', $item->id) : route('keluarga.detail', $item->id) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info mr-2"></i>
    Detail
</a>
@if (Auth::user()->tipe === 'admin')
    <a
        href="{{ route('admin.edit', $item->id) }}"
        class="inline-flex cursor-pointer items-center rounded-md bg-yellow-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-yellow-700"
    >
        <i class="fa-solid fa-pencil mr-2"></i>
        Edit
    </a>
@endif
<form action="{{ Auth::user()->tipe === 'admin' ? route('admin.hapus', $item->id) : route('keluarga.hapus', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        type="submit"
        class="inline-flex cursor-pointer items-center rounded-md bg-red-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-red-700"
        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
    >
        <i class="fa-solid fa-trash mr-2"></i>
        Hapus
    </button>
</form>