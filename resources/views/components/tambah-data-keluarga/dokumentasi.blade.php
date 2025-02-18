<h3 class="mb-6 cursor-default font-bold text-3xl text-[#2c5e4f]">
    Dokumentasi Kegiatan
</h3>
<fieldset>
    <label for="file-upload" class="cursor-pointer h-full w-full flex flex-col items-center justify-center p-20 rounded-lg border-2 border-[#2c5e4f]">
        <i class="fa-solid fa-upload text-4xl text-[#2c5e4f]"></i>
        <span class="mt-2 text-[#2c5e4f]">Pilih Gambar</span>
    </label>
    <section id="image-preview" class="hidden p-4 rounded-lg border-2 border-[#2c5e4f] grid-cols-1 gap-6 lg:grid-cols-3"></section>
    <input type="file" id="file-upload" accept="image/*" class="hidden" onchange="preview_image(event)" multiple />
</fieldset>