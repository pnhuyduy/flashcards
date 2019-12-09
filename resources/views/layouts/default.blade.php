<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  @include('includes.head')
</head>
<body class="d-flex flex-column h-100">
  @include('includes.header')

  <main>
    @yield('content')
  </main>

  @include('includes.footer')

  <!-- Scripts -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  @yield('scripts')
</body>
</html>
