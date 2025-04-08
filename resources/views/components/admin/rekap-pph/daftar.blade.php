<section class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($tahun as $tahun => $data)
        <figure class="bg-green-dark group relative overflow-hidden rounded-xl p-6 transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg hover:shadow-emerald-950/50">
            <div class="absolute top-0 right-0 -mt-16 -mr-16 h-32 w-32 rounded-full bg-emerald-700 opacity-20 transition-transform duration-300 group-hover:scale-110"></div>
            <h2 class="mb-1 text-xl font-bold text-white md:text-2xl lg:text-3xl">{{ $tahun }}</h2>
            <h5 class="mb-6 text-sm text-white lg:text-base">Data PPH Tahunan</h5>
            <form action="{{ route('ekspor-pph', ['tahun' => $tahun]) }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="export inline-flex w-full cursor-pointer items-center justify-center gap-2 rounded-lg bg-emerald-600 px-5 py-3 text-sm text-white transition-colors hover:bg-emerald-500 lg:text-base"
                    data-tahun="{{ $tahun }}"
                >
                    <i class="fas fa-file-excel"></i>
                    <span>Ekspor Ke Excel</span>
                </button>
            </form>
        </figure>
    @endforeach
</section>