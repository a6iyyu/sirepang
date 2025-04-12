<a
    href="javascript:void(0)"
    data-id="{{ $item->id }}"
    data-nama="{{ $item->nama }}"
    data-desa="{{ $item->desa }}"
    data-kecamatan="{{ $item->kecamatan->nama_kecamatan . " - " . $item->kecamatan->kode_wilayah }}"
    data-komentar="{{ $item->komentar }}"
    class="action-button flex cursor-pointer items-center gap-3 rounded-full bg-red-500 px-4 py-2 text-sm text-white transition-all duration-300 ease-in-out hover:bg-red-400"
>
    <i class="fa-solid fa-eye"></i>
    Tampilkan
</a>