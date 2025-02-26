<x-menu
    icon="fa-solid fa-circle-info"
    label="Detail"
    route="keluarga.detail"
    sidebar="{{ false }}"
    style="inline-flex items-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-colors duration-200"
/>
<x-menu
    icon="fa-solid fa-pencil"
    label="Edit"
    route="keluarga.edit"
    sidebar="{{ false }}"
    style="inline-flex items-center px-4 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md text-sm font-medium transition-colors duration-200"
/>
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