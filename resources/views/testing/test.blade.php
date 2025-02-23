<script>
    let index = 2; // Mulai dari 2 karena sudah ada dua kelompok

    function addPangan() {
        const container = document.getElementById("pangan-container");
        const div = document.createElement("div");
        div.classList.add("pangan-group");
        div.setAttribute("data-index", index);
        div.innerHTML = `
            <p>Pangan ke-${index + 1}</p>
            <input type="text" name="detail_pangan_keluarga[${index}][jumlah_urt]" placeholder="Jumlah URT">
            <input type="text" name="detail_pangan_keluarga[${index}][id_keluarga]" placeholder="ID Keluarga">
            <input type="text" name="detail_pangan_keluarga[${index}][id_pangan]" placeholder="ID Pangan">
            <button type="button" onclick="removePangan(this)">Hapus</button>
        `;
        container.appendChild(div);
        index++;
    }

    function removePangan(button) {
        button.parentElement.remove();
    }
</script>
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

        <div id="pangan-container">
            <div class="pangan-group" data-index="0">
                <p>Pangan ke-1</p>
                <input type="text" name="detail_pangan_keluarga[0][jumlah_urt]" value="2">
                <input type="text" name="detail_pangan_keluarga[0][id_keluarga]" value="2">
                <input type="text" name="detail_pangan_keluarga[0][id_pangan]" value="2">
            </div>
            <div class="pangan-group" data-index="1">
                <p>Pangan ke-2</p>
                <input type="text" name="detail_pangan_keluarga[1][jumlah_urt]" value="7">
                <input type="text" name="detail_pangan_keluarga[1][id_keluarga]" value="2">
                <input type="text" name="detail_pangan_keluarga[1][id_pangan]" value="3">
            </div>
        </div>
        <button type="button" onclick="addPangan()">Tambah Pangan</button>

        <button type="submit">Submit</button>
    </form>
</div>
