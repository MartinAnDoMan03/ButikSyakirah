<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Toco Toco Design')</title>
  <link rel="stylesheet" href="{{ asset('css/pekerjapage.css') }}">
</head>
<body>
  <header>
    <nav>
      <ul class="nav-links">
        <li><a href="#about">Home</a></li>
      </ul>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>

  <script src="{{ asset('js/pekerja.js') }}"></script>
</body>
</html>
