<section class="mt-2 mb-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @include('shared.table.table', [
        'headers' => ['Nama', 'Desa', 'Aksi'],
        'sortable' => ['Desa'],
    ])
    
    @if (isset($data) && count($data) > 0)
        @foreach ($data as $item)
        {{-- Monggo mas FE di adjust awokwoak --}}
            <tr class="border-b border-gray-200 hover:bg-blue-50 transition-all duration-200">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="font-medium text-gray-900">{{ $item->nama }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-gray-600">{{ $item->desa }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center space-x-3">
                        {{-- <a href='{{ route("keluarga.detail", $item->id) }}' class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-colors duration-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                                <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                            </svg>
                            Detail
                        </a>
                        <a href='{{ route("keluarga.edit", $item->id) }}' class="inline-flex items-center px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-md text-sm font-medium transition-colors duration-200">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                            </svg>
                            Edit
                        </a> --}}
                        {{-- <form action='{{ route("keluarga.delete", $item->id) }}' method='POST' class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm font-medium transition-colors duration-200"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
                                </svg>
                                Hapus
                            </button>
                        </form> --}}
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3" class="text-center p-8">
                <div class="flex flex-col items-center justify-center rounded-lg p-6">
                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-lg font-medium mb-1">Belum ada data keluarga</p>
                    <p class="text-gray-500 text-sm">Silakan tambahkan data keluarga baru</p>
                </div>
            </td>
        </tr>
    @endif
</section>