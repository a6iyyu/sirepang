<section class="pangan-form bg-cream-50 mt-7 flex flex-col justify-between text-sm space-y-6">
    <fieldset class="w-full grow">
        <label for="pilihan-nama-pangan" class="mb-2 block font-medium">Nama Pangan</label>
        <div class="custom-select-pangan relative">
            <button type="button" id="tombol-dropdown-pangan" class="flex w-full items-center justify-between rounded-md border-2 border-gray-700 px-4 py-3 text-left">
                <span id="selected-pangan-text" class="truncate">Pilih Nama Pangan</span>
                <i class="fa-solid fa-chevron-down text-gray-400"></i>
            </button>
            <legend id="dropdown-pangan" class="absolute z-50 mt-1 hidden w-full rounded-md border-2 border-gray-200 bg-white">
                <div class="sticky top-0 border-b border-gray-200 p-2">
                    <span class="relative">
                        <i class="fa-solid fa-search absolute top-1/2 left-3 -translate-y-1/2 text-gray-400"></i>
                        <input type="search" id="search-pangan" class="w-full rounded-md border border-gray-300 py-2 pr-4 pl-10" placeholder="Cari..." autocomplete="off" tabindex="-1" />
                    </span>
                </div>
                <ul id="options-pangan" class="max-h-60 overflow-y-auto"></ul>
            </legend>
            <select id="pilihan-nama-pangan" class="hidden">
                <option value="" hidden>Pilih Nama Pangan</option>
            </select>
        </div>
    </fieldset>
    <fieldset class="w-full grow">
        <label for="jumlah-urt" class="mb-2 block font-medium">Takaran URT</label>
        <span class="flex items-center gap-2">
            <input type="number" id="jumlah-urt" class="grow rounded-md border-2 border-gray-700 px-4 py-3" placeholder="Cth. 1" min="0" onwheel="this.blur()" />
            <h5 id="unit-takaran" class="whitespace-nowrap text-gray-700"></h5>
        </span>
        <p id="konversi-referensi" class="mt-2 text-gray-500"></p>
    </fieldset>
    <fieldset class="mb-3 flex w-fit items-end justify-end xl:max-w-1/5">
        <button type="button" id="tombol-tambah" class="mb-auto h-fit w-fit cursor-pointer rounded-lg bg-green-600 px-6 py-3 text-white hover:bg-green-700">
            <i class="fa-solid fa-plus mr-2"></i> Tambah
        </button>
    </fieldset>
</section>
<section class="mt-6 cursor-default overflow-x-auto rounded-lg text-sm shadow">
    <div class="min-w-[600px]">
        <span class="bg-green-dark grid grid-cols-[40%_40%_20%] text-center font-medium text-white">
            <h3 class="px-4 py-3">Nama Pangan</h3>
            <h3 class="px-4 py-3">Takaran URT</h3>
            <h3 class="px-4 py-3">Aksi</h3>
        </span>
        <span id="daftar-pangan-container">
            <h5 id="pangan-empty-state" class="py-6 text-center text-gray-500 italic">
                Belum ada data pangan yang ditambahkan.
            </h5>
        </span>
    </div>
</section>
<section id="data-pangan-tersembunyi"></section>

@section('skrip')
    <script>
        window.controller = {
            semua_nama_pangan: {!! json_encode($semua_nama_pangan) !!},
            semua_takaran: {!! json_encode($semua_takaran) !!},
            nama_pangan: {!! json_encode($nama_pangan) !!},
            takaran: {!! json_encode($takaran) !!},
            jumlah_takaran: {!! json_encode($jumlah_takaran) !!},
        };
    </script>
    <script src="{{ asset('js/food-edit-form.js') }}"></script>
@endsection