<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="max-[8192px]:opacity-0 max-[3120px]:m-0 max-[3120px]:box-border max-[3120px]:p-0 max-[3120px]:[font-family:'Plus_Jakarta_Sans',Times,sans-serif,serif] max-[3120px]:opacity-100 max-[324px]:hidden"
>
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="robots" content="index" />
        <meta name="description" content="@yield('deskripsi')" />
        <meta property="og:title" content="@yield('judul') | Sirepang" />
        <meta property="og:description" content="@yield('deskripsi')" />
        <meta property="og:image" content="{{ asset('img/logo.webp') }}" />
        <meta name="twitter:title" content="@yield('judul') | Sirepang" />
        <meta name="twitter:description" content="@yield('deskripsi')" />
        <meta name="twitter:image" content="{{ asset('img/logo.webp') }}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('judul') | Sirepang</title>
        <link rel="icon" href="{{ asset('img/logo.webp') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full min-h-screen overflow-x-hidden bg-[#fff8eb]">
        @auth
            @include('shared.navigation.hamburger-menu')
            @include('shared.navigation.sidebar')
        @endauth
        @yield('konten')
        @stack('skrip')
    </body>
</html>