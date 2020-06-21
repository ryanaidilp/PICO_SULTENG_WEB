<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Styles -->
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js"></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-exports.min.js" async></script>
        <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.anychart.com/releases/8.7.1/css/anychart-ui.min.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdn.anychart.com/releases/8.7.1/fonts/css/anychart-font.min.css" />
            <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165600458-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-165600458-2');
        </script>

    </head>

    <body class="flex flex-col">
        <div id="app">
            <main class="h-screen">
                @yield('content')
            </main>
        </div>
        <!-- Scripts -->
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>

</html>