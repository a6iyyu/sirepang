<h3 class="mb-6 cursor-default text-lg font-bold text-[#2c5e4f] lg:text-2xl">
    Dokumentasi Kegiatan
</h3>
<fieldset>
    <label for="gambar" class="flex h-full w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-[#2c5e4f] p-20">
        <i class="fa-solid fa-upload text-4xl text-[#2c5e4f]"></i>
        <span class="mt-2 text-[#2c5e4f]">Pilih Gambar</span>
    </label>
    <section id="image-preview" class="hidden grid-cols-1 gap-6 rounded-lg border-2 border-[#2c5e4f] p-4 lg:grid-cols-3"></section>
    <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" onchange="preview_image(event)" />
</fieldset>
<h6 class="mt-2 cursor-default text-sm text-[#2c5e4f] italic">*Format gambar yang diperbolehkan: .jpg, .jpeg, .png</h6>
<h6 class="cursor-default text-sm text-[#2c5e4f] italic">
    Ukuran gambar yang diunggah:
    <span id="ukuran-gambar">—</span>
    dari 5120 KB.
</h6>