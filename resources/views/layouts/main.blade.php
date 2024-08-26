<!-- resources/views/layouts/main.blade.php -->
<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title', 'Home') | iBase</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=" CRM for all" />
    <meta name="keywords" content="" />
    <meta name="author" content="Emanuel Trocmaer" />
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon" />

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <div class="page-loader">
      <div class="bar"></div>
    </div>

    @include('partials.sidebar')
    @include('partials.header')

    <div class="pc-container">
      <div class="pc-content">
        @yield('content')
      </div>
    </div>
 <!-- [Include Add Client Modal] -->
 @include('partials.add_client_modal')
 
    @include('partials.footer')

    <!-- Page Specific JS -->
    @yield('scripts')

    <!-- Required Js -->
    <script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
  </body>
</html>
