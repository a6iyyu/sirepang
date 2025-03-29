<section class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($tahun as $tahun => $data)
        <figure class="bg-green-dark group relative overflow-hidden rounded-xl p-6 transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg hover:shadow-emerald-950/50">
            <div class="absolute top-0 right-0 -mt-16 -mr-16 h-32 w-32 rounded-full bg-emerald-700 opacity-20 transition-transform duration-300 group-hover:scale-110"></div>
            <h2 class="mb-1 text-3xl font-bold text-white">{{ $tahun }}</h2>
            <h5 class="mb-6 text-white">Data PPH Tahunan</h5>
            <form action="{{ route('ekspor-pph', ['tahun' => $tahun]) }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="export cursor-pointer inline-flex items-center justify-center gap-2 bg-emerald-600 text-white py-3 px-5 rounded-lg hover:bg-emerald-500 transition-colors w-full"
                    data-tahun="{{ $tahun }}"
                >
                    <i class="fas fa-file-excel"></i>
                    <span>Ekspor Ke Excel</span>
                </button>
            </form>
        </figure>
    @endforeach
</section>