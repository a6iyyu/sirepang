<div class="flex items-center justify-center gap-4">
    <a href="{{ route('kelola-surveyor.detail', ['id' => $item->kader->id_kader ?? 'N/A']) }}">
        <i class="fa-solid fa-circle-info rounded-lg bg-blue-600 p-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-blue-500"></i>
    </a>
    <a href="{{ route('kelola-surveyor.edit', ['id' => $item->kader->id_kader ?? 'N/A']) }}">
        <i class="fa-solid fa-pencil rounded-lg bg-green-600 p-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-green-500"></i>
    </a>
    <form action="{{ route('kelola-surveyor.hapus', ['id' => $item->kader->id_kader ?? 'N/A']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="fa-solid fa-trash cursor-pointer rounded-lg bg-red-600 p-3 text-white transition-all duration-300 ease-in-out lg:hover:bg-red-500"></button>
    </form>
</div>