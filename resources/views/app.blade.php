<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ subdirAsset('assets/images/logo.png') }}" type="image/x-icon" />

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link rel="stylesheet" href="{{ subdirMix('css/app.css') }}">
    <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-exports.min.js" async></script>
    <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.anychart.com/releases/8.7.1/css/anychart-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.anychart.com/releases/8.7.1/fonts/css/anychart-font.min.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165600458-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-165600458-2');

    </script> --}}
    <!-- Scripts -->
    @routes
    <script src="{{ subdirMix('js/app.js') }}" defer></script>
</head>
<body class="flex flex-col">
    @inertia
</body>
</html>
