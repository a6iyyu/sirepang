<h3 class="mb-6 cursor-default font-bold text-3xl text-[#2c5e4f]">
    Dokumentasi Kegiatan
</h3>
<fieldset>
    <label for="gambar" class="cursor-pointer flex flex-col items-center justify-center p-4 rounded-lg border-2 gap-4 border-[#2c5e4f]">
        <h4 class="h-fit w-full font-bold text-center text-2xl text-[#2c5e4f]">Gambar Baru</h4>
        <hr class="h-1 w-full" />
        <div class="flex flex-col items-center my-20">
            <i class="fa-solid fa-upload text-4xl text-[#2c5e4f]"></i>
            <h5 class="mt-2 text-[#2c5e4f]">Pilih Gambar</h5>
        </div>
    </label>
    <section id="image-preview" class="mt-6 flex flex-col items-center justify-center p-4 rounded-lg border-2 border-[#2c5e4f] gap-4">
        @if ($gambar)
            <h5 class="h-fit w-full font-bold text-center text-2xl text-[#2c5e4f]">Gambar Lama</h5>
            <hr class="h-1 w-full" />
            <img
                src="{{ 'data:image/jpeg;base64,' . base64_encode($gambar) }}"
                alt="Dokumentasi Kegiatan"
                class="mb-4 h-96 w-full object-cover rounded-lg"
            />
        @endif
    </section>
    <input type="file" name="gambar" id="gambar" accept="image/*" class="hidden" onchange="preview_image(event)" />
</fieldset>