@extends('layouts.main')

@section('judul')
    Verifikasi Datasdads
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})">
        <section>
            <div>
                @dump($keluarga)
                <div>
                    <form action="{{route('verifikasi.setujui', ['id' => $keluarga->id_keluarga])}}" method="POST">@csrf<button class="text-red-500" type="submit">Setuju</button></form>
                    <form action="{{route('verifikasi.tolak', ['id' => $keluarga->id_keluarga])}}" method="POST">@csrf<button class="text-red-500" type="submit">Tolak</button></form>
                </div>
            </div>

        </section>
    </main>
@endsection
