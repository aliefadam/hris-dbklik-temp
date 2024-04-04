<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- web icon --}}
    <link rel="icon" href="{{ asset('imgs/db-logo.png') }}">

    @include('partials.links')

    {{-- tailwind vite --}}
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>

<body class="relative top-0 left-0 w-full bg-gradient-to-b bg-gray-100 font-[poppins] pb-5">

    @include('overlay')
    @include('partials.overlay_message')
    @include('partials.owner_sidebar')
    @include('partials.owner_topbar')

    <main class="ml-[250px] mt-[84px] py-5 px-10">
        @yield('content')
    </main>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/table-daftar-pengajuan.js') }}"></script>
    <script src="{{ asset('js/table-daftar-pengajuan.js') }}"></script>
    <script src="{{ asset('js/handle-overlay.js') }}"></script>
    <script src="{{ asset('js/table-karyawan-owner.js') }}"></script>
    <script src="{{ asset('js/edit-image.js') }}"></script>
</body>

</html>
