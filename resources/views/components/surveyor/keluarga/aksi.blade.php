<a
    href="{{ route('keluarga.detail', $item->id) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 p-3 text-xs font-medium text-white transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info mr-3"></i>
    Detail
</a>
@if ($item->status->value !== 'DITERIMA')
    <a
        href="{{ route('keluarga.edit', $item->id) }}"
        class="inline-flex cursor-pointer items-center rounded-md bg-yellow-600 p-3 text-xs font-medium text-white transition-colors duration-200 hover:bg-yellow-700"
    >
        <i class="fa-solid fa-pencil mr-3"></i>
        Edit
    </a>
    <form action="{{ route('keluarga.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-flex cursor-pointer items-center rounded-md bg-red-600 p-3 text-xs font-medium text-white transition-colors duration-200 hover:bg-red-700">
            <i class="fa-solid fa-trash mr-3"></i>
            Hapus
        </button>
    </form>
@endif