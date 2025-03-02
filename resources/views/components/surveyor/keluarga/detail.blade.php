@if (isset($keluarga))
    {{ $keluarga->nama_kepala_keluarga }}
@else
    <h6>Terdapat kesalahan saat mengambil data.</h6>
@endif