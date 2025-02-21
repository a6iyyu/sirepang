<h3 class="mb-6 cursor-default font-bold text-3xl text-[#2c5e4f]">
    Masukkan Data Pangan
</h3>
<section class="mt-6 space-y-6 flex flex-col justify-between lg:space-x-6 lg:space-y-0 lg:flex-row">
    <x-select
        name="nama_jenis"
        label="Jenis Pangan"
        :options="$jenis_pangan"
    />
    <x-select
        name="nama_pangan"
        label="Nama Pangan"
        :options="[]"
    />
    <x-input
        name="urt"
        label="Jumlah URT"
        icon="fa-solid fa-ruler"
        placeholder="Cth. 1"
    />
</section>
<section class="flex justify-end">
    <button type="submit" onclick="" class="mt-6 flex items-center cursor-pointer h-fit rounded-lg px-5 py-3 transition-all transform duration-300 ease-in-out bg-[#2c5e4f] text-white lg:hover:bg-green-700">
        <i class="fa-solid fa-plus"></i>
        &ensp;Tambah
    </button>
</section>
<section class="mt-6 mb-8">
    @include('shared.table.table', [
        'headers' => ['Nama Pangan', 'Jenis Pangan', 'Takaran URT', 'Aksi'],
        'sortable' => ['Nama Pangan'],
    ])
    @if (isset($data) && is_array($data) && count($data) > 0)
        <tr>
            <th>Nama</th>
            <th>Desa</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->desa }}</td>
                <td>
                    <a href="{{ route('detail', $item->id) }}">
                        <i class="fa-solid fa-info bg-blue-400 text-slate-50"></i>
                    </a>
                    <a href='{{ route('edit', $item->id) }}'>
                        <i class="fa-solid fa-pencil bg-green-medium text-slate-50"></i>
                    </a>
                    <form action="{{ route('delete', $item->id) }}" method='POST' style='display:inline;'>
                        @csrf
                        @method("DELETE")
                        <button type="submit">
                            <i class="fa-solid fa-trash bg-red-500 text-slate-50"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
</section>

@push('skrip')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let jenis_pangan = document.querySelector("[name='nama_jenis']");
            let nama_pangan = document.querySelector("[name='nama_pangan']");
            let daftar_pangan = @json($nama_pangan);

            jenis_pangan.addEventListener("change", () => {
                let selected = jenis_pangan.value;
                nama_pangan.innerHTML = "<option value='' selected disabled>Pilih Nama Pangan</option>";

                if (daftar_pangan[selected]) {
                    Object.entries(daftar_pangan[selected]).forEach(([id, nama]) => {
                        let option = document.createElement("option");
                        option.value = id;
                        option.textContent = nama;
                        nama_pangan.appendChild(option);
                    });
                }
            });
        });
    </script>
@endpush