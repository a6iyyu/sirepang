<section class="mt-2 mb-8">
    @include('shared.table.table', [
        'headers' => ['nama', 'desa', 'aksi' ],
        'sortable' => ['desa'],
    ])
    @if(count($data) > 0)
        <tr>
            <th>nama</th>
            <th>desa</th>
            <th>Aksi</th>
        </tr>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->desa }}</td>
                <td>
                    <a href='{{ route("detail", $item->id) }}'>Detail</a>
                    <a href='{{ route("edit", $item->id) }}'>Edit</a>
                    <form action='{{ route("delete", $item->id) }}' method='POST' style='display:inline;'>
                        @csrf
                        @method('DELETE')
                        <button type='submit'>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endif
</section>