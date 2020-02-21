<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

  <title>{{ config('app.name', 'Projects') }}</title>

  <style>
    body {
      font-family: Montserrat
    }
  </style>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  @include('partials.styles')
  @stack('styles')
</head>
<body>
  <div id="app">
    @include('layouts.navbar')

    <div class="main-container">
      @yield('content')
    </div>

    @stack('modals')

    @include('layouts.footer')
  </div>

  @include('partials.scripts')
  @stack('scripts')
</body>
@yield('social-api')
</html>
