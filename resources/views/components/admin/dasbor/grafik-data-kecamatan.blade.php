<section class="bg-green-medium mt-6 w-full max-w-7xl overflow-x-auto rounded-2xl bg-transparent p-4 md:p-6">
    <div class="mb-4 flex min-w-[800px] justify-between text-white">
        <span class="flex cursor-default items-center font-bold tracking-tight">
            <i class="fa-solid fa-chart-simple mr-4 text-3xl md:text-5xl"></i>
            <h5 class="text-lg md:text-2xl">Data Kecamatan Per Tahun</h5>
        </span>
        <span class="relative mt-4 flex items-center space-x-4 md:mt-0">
            <select class="cursor-pointer appearance-none rounded-lg bg-slate-50 py-2.5 pr-14 pl-4 font-semibold text-emerald-600 shadow-lg focus:ring-2 focus:ring-slate-300 focus:outline-none" {{ count($tahun) === 0 ? 'disabled' : '' }}>
                @forelse ($tahun as $item)
                    <option value="{{ $item }}" class="text-black">{{ $item }}</option>
                @empty
                    <option selected disabled class="text-black">—</option>
                @endforelse
            </select>
            <i class="fa-solid fa-chevron-down pointer-events-none absolute top-1/2 right-7 -translate-y-1/2 transform text-emerald-600"></i>
        </span>
    </div>
    <hr class="mb-8 h-1 w-full min-w-[800px] text-white" />
    <div class="w-full overflow-x-auto">
        @if (count($grafik_kecamatan) > 0)
            <div id="column-chart" class="w-fit min-w-[800px]"></div>
        @else
            <div class="flex flex-col items-center justify-center p-6 text-center text-white">
                <i class="fa-solid fa-check-double mb-10 text-5xl"></i>
                <h4 class="text-lg font-semibold">Belum ada data keluarga yang terverifikasi.</h4>
            </div>
        @endif
    </div>
</section>

@push('skrip')
    <script>
        window.grafik_kecamatan = @json($grafik_kecamatan);
    </script>
@endpush