<section class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($tahun as $tahun => $data)
            <form action="{{ route('ekspor-pph', ['tahun' => $tahun]) }}" method="POST">
                @csrf
            </form>
        </figure>
    @endforeach
</section>
