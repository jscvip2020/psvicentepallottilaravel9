<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @isset($title){{ $title }} - @endisset{{ env('APP_NAME') }}
        </title>

        <link rel="icon" href="{{ asset('images/logo.png') }}">

        <meta property="og:url" content="{{ url()->current()}}" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="@isset($title){{ $title }} - @endisset{{ env('APP_NAME') }}" />
        <meta property="og:description" content="@isset($description){{ $description }}@endisset" />
        <meta property="og:image" content="@isset($imagemface){{ $imagemface }}@endisset" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/fontawesome/css/fontawesome.min.css', 'resources/fontawesome/css/solid.min.css', 'resources/fontawesome/css/brands.min.css'])
    </head>

    <body class="antialiased">
        <div class="container-fluid overflow-auto min-h-screen bg-gray-100">
            @include('layouts.navigationfront')
            <main>
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
        <a href="https://wa.me/55{{ $whatsapp }}"
            class="cursor-pointer z-[1000] bg-green-950 rounded-full fixed bottom-10 right-4" target="_blank">
            <span class="fab fa-whatsapp p-4 text-5xl text-white"></span>
        </a>
        </div>
        @vite(['resources/js/app.js'])
        @if (isset($script))
            {{ $script }}
        @endif
    </body>

    </html>
