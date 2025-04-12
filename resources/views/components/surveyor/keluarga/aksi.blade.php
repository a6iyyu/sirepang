<a
    href="{{ route('keluarga.detail', $item->id) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info mr-2"></i>
    Detail
</a>
@if ($item->status->value !== 'DITERIMA')
    <a
        href="{{ route('keluarga.edit', $item->id) }}"
        class="inline-flex cursor-pointer items-center rounded-md bg-yellow-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-yellow-700"
    >
        <i class="fa-solid fa-pencil mr-2"></i>
        Edit
    </a>
@endif
<form action="{{ route('keluarga.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="inline-flex cursor-pointer items-center rounded-md bg-red-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-red-700">
        <i class="fa-solid fa-trash mr-2"></i> Hapus
    </button>
</form>