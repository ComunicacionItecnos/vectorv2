<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <style>
        @font-face {
            font-family: "DIN Next LT Pro";
            src: url("//db.onlinewebfonts.com/t/5b0be84ee7019608e3e098c541290494.eot");
            src: url("//db.onlinewebfonts.com/t/5b0be84ee7019608e3e098c541290494.eot?#iefix") format("embedded-opentype"), 
            url("//db.onlinewebfonts.com/t/5b0be84ee7019608e3e098c541290494.woff2") format("woff2"), 
            url("//db.onlinewebfonts.com/t/5b0be84ee7019608e3e098c541290494.woff") format("woff"), 
            url("//db.onlinewebfonts.com/t/5b0be84ee7019608e3e098c541290494.ttf") format("truetype"), 
            url("//db.onlinewebfonts.com/t/5b0be84ee7019608e3e098c541290494.svg#DIN Next LT Pro") format("svg");
        }

    </style>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon" />

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body style="font-family: DIN Next LT Pro; !important">
    <div class="min-h-screen min-w-full bg-gray-100">
        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    <x-livewire-alert::scripts />
</body>

</html>
