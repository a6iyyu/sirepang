<form action="" method="GET">
    <section class="flex items-center justify-end space-x-4 text-sm">
        <span class="flex items-center space-x-2 text-slate-800">
            <i class="fa-solid fa-filter"></i>
            <h6 class="font-medium">Filter:</h6>
        </span>
        <fieldset class="relative">
            <label for="kecamatan" class="sr-only">Kecamatan</label>
            <select name="kecamatan" onchange="this.form.submit()" class="w-full appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-8 text-gray-900 transition-colors focus:border-slate-500 focus:ring-2 focus:ring-slate-500 focus:outline-none">
                <option value="">Kecamatan</option>
                @if (isset($kecamatan) && ! empty($kecamatan))
                    @foreach ($kecamatan as $id => $nama)
                        <option value="{{ $id }}" {{ $id == request('kecamatan') ? 'selected' : '' }}>
                            {{ $nama }}
                        </option>
                    @endforeach
                @endif
            </select>
            <i class="fa-solid fa-chevron-down pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 transform text-gray-400"></i>
        </fieldset>
    </section>
</form>