<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>ROIC</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/roic.css') }}" rel="stylesheet">
  <script>
  var domain = 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/';
  </script>
</head>
<body>
  <div id="app" class="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel rc-nav">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="/images/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li><a class="nav-link" href="http://roic.io">About</a></li>
            <li><a class="nav-link" href="http://roic.io#details">Details</a></li>
            <li><a class="nav-link" href="http://roic.io#team">Team</a></li>
            <li><a class="nav-link" href="http://roic.io#faq">FAQs</a></li>
            <li><a class="nav-link" href="http://roic.io/blog">Blog</a></li>
            <!-- Authentication Links -->
            @if(!Auth::user())

            @else
            <li class="nav-item dropdown">
              <router-link to="user" id="navbarDropdown" class="nav-link dropdown-toggle nav-user" role="button">
                Your Account
              </router-link>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/logout">
                Logout
              </a>
            </div>
          </li>
          @endif
          <li>
            <router-link to="/cart" class="nav-link nav-cart">
              <img src="/images/icons/shopping-cart.svg">
              <span class="cart-count">@{{cart.items_count}}</span>
            </router-linkt>
          </li>
          <li><a class="nav-link nav-language">Language</a></li>
          <li><a href="/login" class="nav-link nav-language">Login</a></li>
          <li><a href="/register" class="nav-link nav-language">Register</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
  </main>
</div>
</body>
</html>
