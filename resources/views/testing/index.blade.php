<table>
    @foreach ($pangan as $item )
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->nama_pangan }}</td>
            <td>{{ $item->takaran->nama_takaran }}</td>
            <td>{{ $item->referensi_urt}}</td>
            <td>{{$item->referensi_gram_berat}}</td>
        </tr>
    @endforeach
</table>
