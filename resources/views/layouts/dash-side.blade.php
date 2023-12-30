<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <x-general.sidenav />
        <main class="bg-gray-100 min-h-screen">
            <div class="xl:pl-60 py-24">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    @yield('scripts')
    @stack('js_after')
</body>

</html>
