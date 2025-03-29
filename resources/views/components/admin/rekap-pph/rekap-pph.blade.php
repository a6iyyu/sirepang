  <div class="mb-12 max-w-md">
                <label for="kecamatan_filter" class="block text-green-dark text-sm font-medium mb-3">
                    <i class="fas fa-filter mr-2"></i>Filter Kecamatan
                </label>
                <select id="kecamatan_filter" class="w-full p-3 border-green-800  border-2 rounded-lg text-green-dark focus:outline-none focus:ring-2 focus:ring-emerald-400 appearance-none relative z-10">
                    <option value="">Semua Kecamatan</option>
                    @foreach ($kecamatans as $id => $nama)
                        <option value="{{ $id }}" {{ $currentFilter == $id ? 'selected' : '' }}>
                            {{ $nama }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-5 flex items-center px-2 text-white top-9">
                    <i class="fas fa-chevron-down text-white"></i>
                </div>
            </div>
        </div>
        <div id="cards-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($dataTahun as $tahun => $data)
                <div class="bg-green-dark rounded-xl overflow-hidden transition-all duration-300 hover:translate-y-[-5px] hover:shadow-lg hover:shadow-emerald-950/50 group">
                    <div class="p-6 relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-700 rounded-full -mt-16 -mr-16 opacity-20 transition-transform duration-300 group-hover:scale-110"></div>

                        <h2 class="text-3xl font-bold mb-1 text-white">{{ $tahun }}</h2>
                        <p class="text-white mb-6">Data PPH Tahunan</p>

                        <a href="{{ route('pph-export', ['tahun' => $tahun, 'kecamatan_filter' => $currentFilter]) }}"
                           class="export-btn inline-flex items-center justify-center gap-2 bg-emerald-600 text-white py-3 px-5 rounded-lg hover:bg-emerald-500 transition-colors w-full"
                           data-tahun="{{ $tahun }}">
                            <i class="fas fa-file-excel"></i>
                            <span>Export to Excel</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No Data Message -->
        <div id="no-data-message" class="mt-10 bg-emerald-800 p-6 rounded-xl text-white {{ empty($dataTahun) ? '' : 'hidden' }}" role="alert">
            <div class="flex items-center">
                <i class="fas fa-info-circle text-emerald-400 text-xl mr-3"></i>
                <p>Tidak ada data untuk ditampilkan.</p>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const kecamatanFilter = document.getElementById('kecamatan_filter');

    kecamatanFilter.addEventListener('change', function () {
        document.body.style.opacity = '0.8';
        document.body.style.transition = 'opacity 0.3s ease';

        setTimeout(() => {
            const kecamatanId = this.value;
            const baseUrl = '{{ route('rekap-pph') }}';
            window.location.href = kecamatanId ? `${baseUrl}?kecamatan_filter=${kecamatanId}` : baseUrl;
        }, 300);
    });

    document.querySelectorAll('.export-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Exporting...</span>';

            setTimeout(() => {
                window.location.href = this.getAttribute('href');
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-file-excel"></i> <span>Export to Excel</span>';
                }, 1000);
            }, 400);
        });
    });
});
</script>
