<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{env('APP_NAME') }} | @yield('title')</title>
  
   {{-- BS Icons --}}
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  {{-- Includiamo gli assets con la direttiva @vite --}}
  @vite('resources/js/app.js')
</head>
   @yield('cdn')
<body>
    @include('partials.navbar')

  
    <div class="container">
      @yield('title')
      @yield('content')
    </div>
    
    @yield('modals')
</body>

</html>
