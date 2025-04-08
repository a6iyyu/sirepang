@extends('layouts.main')

@section('judul')
    Verifikasi Data
@endsection

@section('deskripsi')
@endsection

@section('konten')
    <main class="h-full min-h-screen bg-cover bg-center bg-no-repeat p-10 transition-all duration-300 ease-in-out lg:pl-88"
        style="background: url({{ asset('img/latar-belakang.svg') }})">
        <section>
            <p></p>
            @dd($data)
        </section>
    </main>
@endsection
