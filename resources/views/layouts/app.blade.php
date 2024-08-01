<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title')</title>

  @vite(['resources/scss/app.scss'])
</head>
<body>
  <main id="min-vh-100" class="min-vh-100">
    @yield('main')
  </main>

  @yield('extra')

  @vite(['resources/js/app.js'])
</body>
</html>