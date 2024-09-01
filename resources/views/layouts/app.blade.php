<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title')</title>

  @vite(['resources/scss/app.scss'])
  @stack('css')
</head>
<body>
  @yield('main')

  @vite(['resources/js/app.js'])
  @stack('js')
</body>
</html>