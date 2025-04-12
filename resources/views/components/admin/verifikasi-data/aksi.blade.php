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
    data-nama="{{ $item->nama }}"
    data-desa="{{ $item->desa }}"
    data-kecamatan="{{ $item->kecamatan }}"
    data-status="DITERIMA"
>
    <i class="fa-solid fa-check"></i>
</a>
<a
    href="javascript:void(0)"
    class="action-button inline-flex cursor-pointer items-center rounded-md bg-red-600 px-4 py-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-red-700"
    data-id="{{ $item->id }}"
    data-nama="{{ $item->nama }}"
    data-desa="{{ $item->desa }}"
    data-kecamatan="{{ $item->kecamatan }}"
    data-status="DITOLAK"
>
    <i class="fa-solid fa-x"></i>
</a>