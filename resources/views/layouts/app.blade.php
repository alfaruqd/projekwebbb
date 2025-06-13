<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>MediCareID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="AdminLTE Dashboard" />

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    {{-- Fonts --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" crossorigin="anonymous" />

    {{-- OverlayScrollbars --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" crossorigin="anonymous" />

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous" />

    {{-- AdminLTE CSS --}}
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">

    {{-- ApexCharts (opsional) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" crossorigin="anonymous" />

   <link rel="stylesheet" href="{{ asset('dist/css/costume.css') }}">

  </head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!-- App Wrapper -->
    <div class="app-wrapper">
      <!-- Header -->
      @include('layouts.header')

      <!-- Sidebar -->
      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="app-main">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>

      <!-- Footer -->
      @include('layouts.footer')
    </div>

    {{-- Optional JS Stack --}}
    @stack('scripts')
  </body>
</html>
