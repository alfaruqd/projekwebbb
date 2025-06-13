<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Login')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

     <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">


    <!-- Font -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  </body>
</html>
