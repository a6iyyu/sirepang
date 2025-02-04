<span>
    Nama: {{ $desa['desa_nama'] }}
</span>

<span>
    Kecamatan: {{ $desa->kecamatan['kec_nama'] }}
</span>
<span>
    {{-- @dd($desa->koleksiKeluarga) --}}

    @foreach ($desa->koleksiKeluarga as $keluarga)
    <div>
        <a href="/keluarga/{{ $keluarga['keluarga_id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
            <p>
                {{ $keluarga['keluarga_id'] }}
            </p>
            <p>
                {{$keluarga->anggotaKeluarga->first()['anggota_keluarga_nama']}}
            </p>
        </a>
    </div>
    @endforeach

</span>
