<div class="space-y-4">
    <p>Nama kecamatan: {{ $kecamatan['kec_nama'] }}</p>
    @foreach ($desa as $satuDesa)
        <a href="/desa/{{ $satuDesa['desa_id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <div class="font-bold text-blue-500 text-sm">{{ $satuDesa['desa_nama'] }}</div>

        </a>
    @endforeach

    <div>
        {{ $desa->links() }}
    </div>
</div>
