<!doctype html>
<html>

<head>
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- web icon --}}
    <link rel="icon" href="{{ asset('imgs/db-logo.png') }}">

    {{-- include links.blade.php --}}
    @include('partials.links')

    {{-- tailwind vite --}}
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>

</head>

<body class="relative top-0 left-0 w-full bg-gradient-to-b bg-gray-100 font-[poppins] pb-5">

    @include('overlay')
    @include('partials.overlay_message')
    @include('partials.sidebar')
    @include('partials.topbar')

    <main class="ml-[70px] md:ml-[250px] mt-[84px] md:py-5 px-4 md:px-10">
        @yield('content')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/data-tables-init.js') }}"></script>
    <script src="{{ asset('js/btn-close-overlay.js') }}"></script>
    <script src="{{ asset('js/edit-image.js') }}"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script src="{{ asset('js/service-worker.js') }}"></script>
</body>

</html>
