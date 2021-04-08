<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<!--     <script src="{{ asset('js/vue.js') }}" defer></script> -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" defer></script>
    <!-- <script src="{{ asset('assets/js/errors.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/theme.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/errors.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

<!--     <script src="https://unpkg.com/vue@next"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script> -->
    <script>window.laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
</head>
<body>


    <div id="app">
    
    <div style="margin-bottom: 10px;">
              @include('partials.menu')
    </div>

        
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-8">
              @include('partials.flash')  
        </div>
    </div>
</div>

        <main class="py-4">
            @yield('content')
        </main>

      <main class="py-4">
            @yield('javascripts')
      </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
