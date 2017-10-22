<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>{{ setting('site.title') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bootstrap theme</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    {{ menu('site', 'partials.menu') }}
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-center text-muted">{{ setting('site.copyright') }}</p>
            </div>
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
