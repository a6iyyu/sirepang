<form action="{{ route('keluarga.perbarui', [$keluarga->id_keluarga]) }}">
    @csrf
    @method('PUT')
    {{ $keluarga->nama_kepala_keluarga }}
    Contoh aje ni.
</form>