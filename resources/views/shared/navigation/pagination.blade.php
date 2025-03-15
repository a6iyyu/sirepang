@if ($paginator->hasPages())
    <section class="overflow-x-scroll whitespace-nowrap mt-4 w-full flex items-center justify-between rounded-lg shadow px-4 py-3 bg-green-medium sm:px-6" role="navigation">
        <select id="per_page" name="per_page" onchange="update_per_page(this.value)" class="mr-4 pl-3 pr-10 py-2 rounded-md text-white sm:text-sm focus:outline-none">
            @foreach ([5, 10, 25, 50, 100] as $perPageOption)
                <option value="{{ $perPageOption }}" class="text-black" {{ Request::input('per_page', 10) == $perPageOption ? 'selected' : '' }}>
                    {{ $perPageOption }} per halaman
                </option>
            @endforeach
        </select>
        <h5 class="cursor-default text-sm text-white">
            {!! __('Menampilkan') !!}
            <span class="font-medium">{{ $paginator->firstItem() ?? $paginator->count() }}</span>
            {!! __('sampai') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            {!! __('dari') !!}
            <span class="font-medium">{{ $paginator->total() }}</span> {!! __('data') !!}
        </h5>
        <span class="ml-20 inline-flex shadow-sm rounded-md">
            <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-2 border border-emerald-300 bg-white text-emerald-500 {{ $paginator->onFirstPage() ? 'cursor-not-allowed text-emerald-300' : 'hover:bg-emerald-50' }}">
                <i class="fas fa-chevron-left"></i>
            </a>
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ $url }}" class="px-4 py-2 border {{ $page == $paginator->currentPage() ? 'border-emerald-500 bg-emerald-50 text-emerald-600' : 'border-emerald-300 bg-white text-emerald-700 hover:bg-emerald-50' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                @endif
            @endforeach
            <a href="{{ $paginator->nextPageUrl() }}" class="px-2 py-2 border border-emerald-300 bg-white text-emerald-500 {{ $paginator->hasMorePages() ? 'hover:bg-emerald-50' : 'cursor-not-allowed text-emerald-300' }}">
                <i class="fas fa-chevron-right"></i>
            </a>
        </span>
    </section>
@endif

@push('skrip')
    <script>
        const update_per_page = value => {
            const url = new URL(window.location.href);
            url.searchParams.set('per_page', value);
            if (url.searchParams.get('page') === '1') url.searchParams.delete('page');
            window.location.replace(url.toString());
        }
    </script>
@endpush