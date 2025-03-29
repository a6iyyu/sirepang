@if ($paginator->hasPages())
    <section class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-green-medium rounded-lg p-4 shadow-sm border border-emerald-100 mt-6" role="navigation">
        <div class="flex items-center">
            <label for="per_page" class="text-sm text-white mr-3">Show:</label>
            <select
                id="per_page"
                name="per_page"
                onchange="update_per_page(this.value)"
                class="rounded-md border border-gray-200 py-1.5 px-3 text-sm text-white bg-green-medium focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500"
            >
                @foreach ([5, 10, 25, 50, 100] as $perPageOption)
                    <option
                        value="{{ $perPageOption }}"
                        {{ Request::input('per_page', 10) == $perPageOption ? 'selected' : '' }}
                    >
                        {{ $perPageOption }}
                    </option>
                @endforeach
            </select>
            <span class="text-sm text-white ml-2">per page</span>
        </div>

        <div class="text-sm text-white hidden md:block">
            Showing <span class="font-medium text-white">{{ $paginator->firstItem() ?? $paginator->count() }}</span> to
            <span class="font-medium text-white">{{ $paginator->lastItem() }}</span> of
            <span class="font-medium text-white">{{ $paginator->total() }}</span> results
        </div>

        <div class="flex items-center space-x-1">
            <!-- Previous Page -->
            <a href="{{ $paginator->previousPageUrl() }}"
               class="{{ $paginator->onFirstPage() ? 'opacity-50 cursor-not-allowed' : 'hover:bg-emerald-50' }}
                     flex items-center justify-center h-8 w-8 rounded-md border border-gray-200 bg-white text-white-600 transition-colors"
               {{ $paginator->onFirstPage() ? 'aria-disabled="true"' : '' }}>
                <i class="fas fa-chevron-left text-xs"></i>
            </a>

            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <a href="{{ $url }}"
                           class="{{ $page == $paginator->currentPage()
                                ? 'bg-emerald-600 text-white border-emerald-600'
                                : 'bg-white text-white-700 border-gray-200 hover:bg-emerald-50' }}
                                flex items-center justify-center h-8 min-w-[2rem] rounded-md border text-sm transition-colors">
                            {{ $page }}
                        </a>
                    @endforeach
                @endif
            @endforeach
            <a href="{{ $paginator->nextPageUrl() }}"
               class="{{ $paginator->hasMorePages() ? 'hover:bg-emerald-50' : 'opacity-50 cursor-not-allowed' }}
                     flex items-center justify-center h-8 w-8 rounded-md border border-gray-200 bg-white text-white-600 transition-colors"
               {{ $paginator->hasMorePages() ? '' : 'aria-disabled="true"' }}>
                <i class="fas fa-chevron-right text-xs"></i>
            </a>
        </div>
    </section>
@endif

@push('skrip')
    <script>
        const update_per_page = (value) => {
            const url = new URL(window.location.href);
            url.searchParams.set('per_page', value);
            if (url.searchParams.get('page') === '1') url.searchParams.delete('page');
            window.location.replace(url.toString());
        };
    </script>
@endpush
