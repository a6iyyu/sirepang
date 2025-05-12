<a
    href="{{ route('admin.detail', $item->id) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-blue-600 p-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-blue-700"
>
    <i class="fa-solid fa-circle-info mr-3"></i>
    Detail
</a>
<a
    href="{{ route('admin.rekap-kecamatan', $item->id) }}"
    class="inline-flex cursor-pointer items-center rounded-md bg-green-600 p-3 text-sm font-medium text-white transition-colors duration-200 hover:bg-green-700"
>
    <i class="fa-solid fa-file-excel mr-3"></i>
    Rekap
</a>