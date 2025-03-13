<h3 class="mb-6 cursor-default font-bold text-3xl text-[#2c5e4f]">
    Dokumentasi Kegiatan
</h3>
<fieldset>
    <label for="gambar" class="cursor-pointer h-full w-full flex flex-col items-center justify-center p-20 rounded-lg border-2 border-[#2c5e4f]">
        <i class="fa-solid fa-upload text-4xl text-[#2c5e4f]"></i>
        <span class="mt-2 text-[#2c5e4f]">Pilih Gambar</span>
    </label>
    <div class="mt-6 space-y-2 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
        <section id="image-preview" class="p-4 rounded-lg border-2 border-[#2c5e4f] grid-cols-1 gap-6 lg:grid-cols-3">
            @if($gambar)
            <span class="block mb-2 text-xl font-semibold text-[#2c5e4f]">Gambar Lama</span>
            <img src="{{ 'data:image/jpeg;base64,' . base64_encode($gambar) }}" alt="Preview Image" class="w-auto h-96 object-cover rounded-lg">
            @endif
        </section>
    </div>
    <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" onchange="preview_image(event)" />
</fieldset>
