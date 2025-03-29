<fieldset class="flex w-full items-center justify-end">
    <label for="filter-kecamatan" class="text-green-dark mr-4 font-medium">
        <i class="fas fa-filter mr-2"></i>
        Kecamatan
    </label>
    <span class="relative">
        <select id="filter-kecamatan" name="filter-kecamatan" class="appearance-none rounded-lg border-2 border-[#2c5e4f] bg-[#2c5e4f] p-3 pr-10 text-white focus:outline-none">
            <option value="">Semua Kecamatan</option>
            @foreach ($kecamatan as $id => $nama)
                <option value="{{ $id }}" {{ $filter == $id ? 'selected' : '' }}>
                    {{ $nama }}
                </option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-5 flex items-center text-white">
            <i class="fas fa-chevron-down"></i>
        </div>
    </span>
</fieldset>