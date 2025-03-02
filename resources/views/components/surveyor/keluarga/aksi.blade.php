<button
    id="detail-keluarga"
    data-id="{{ $item->id }}"
    class="cursor-pointer inline-flex items-center px-4 py-3 bg-blue-600 text-white rounded-md text-sm font-medium transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info mr-2"></i>
    Detail
</button>
<a
    href="{{ route('keluarga.edit', $item->id) }}"
    class="inline-flex items-center px-4 py-3 bg-emerald-600 text-white rounded-md text-sm font-medium transition-colors duration-200 hover:bg-emerald-700"
>
    <i class="fa-solid fa-pencil mr-2"></i>
    Edit
</a>
<form action="{{ route('keluarga.hapus', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button
        type="submit"
        class="cursor-pointer inline-flex items-center px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm font-medium transition-colors duration-200"
        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
    >
        <i class="fa-solid fa-trash mr-2"></i>
        Hapus
    </button>
</form>