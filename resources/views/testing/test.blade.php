<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <form action="{{ route('testing') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="no_kk" value="949073">
        <input type="text" name="nama_kepala_keluarga" value="Gus Miftah">
        <input type="text" name="jumlah_keluarga" value="4">
        <input type="text" name="alamat" value="Jl. Raya Perumahan Alasia">
        <input type="text" name="kode_pos" value="12345">
        <input type="text" name="is_hamil" value="1">
        <input type="text" name="is_menyusui" value="1">
        <input type="text" name="is_balita" value="1">
        <input type="file" name="gambar" accept="image/*">
        <input type="text" name="id_desa" value="2">
        <input type="text" name="id_kecamatan" value="2">

        <input type="text" name="rentang_pendapatan" value="2">
        <input type="text" name="rentang_pengeluaran" value="2">

        {{-- pangan ke-1 --}}
        <input type="text" name="detail_pangan_keluarga[0][jumlah_urt]" value="2">
        <input type="text" name="detail_pangan_keluarga[0][id_keluarga]" value="2">
        <input type="text" name="detail_pangan_keluarga[0][id_pangan]" value="2">

        {{-- pangan ke-2 --}}
        <input type="text" name="detail_pangan_keluarga[1][jumlah_urt]" value="7">
        <input type="text" name="detail_pangan_keluarga[1][id_keluarga]" value="2">
        <input type="text" name="detail_pangan_keluarga[1][id_pangan]" value="3">

        <button type="submit">Submit</button>
    </form>
</div>
