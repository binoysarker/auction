<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Auction | @yield('title')</title>

  {{-- bulma css  --}}
  <link rel="stylesheet" href="{{url('/public/css/bulma.css')}}">

  <!-- Scripts -->
  <script src="{{ asset('/public/js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <section class="bgColor">
      <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
              <img src="{{url('/public/image/ccsa_logo.jpg')}}" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </a>
          </div>

          <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item" href="{{url('/')}}">
                Home
              </a>

              <a class="navbar-item" href="{{url('/news')}}">
                News
              </a>
              <a class="navbar-item" href="{{url('/about')}}">
                About
              </a>
              <a class="navbar-item" href="{{url('/contact')}}">
                Contact
              </a>


            </div>

            <div class="navbar-end">
              <div class="navbar-item">
                @guest
                  <div class="buttons">
                    <a class="button is-primary" href="{{ route('register') }}">
                      <strong>Sign up</strong>
                    </a>
                    <a class="button is-light" href="{{ route('login') }}">
                      Sign in
                    </a>
                  </div>
                @else
                  <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                      {{-- <figure class="image is-64*64">
                      <img src="https://bulma.io/images/placeholders/128x128.png">
                    </figure> --}}
                    {{ Auth::user()->name }}
                    <i class="fas fa-user"></i>
                  </a>

                  <div class="navbar-dropdown">
                    <a class="navbar-item" href="{{ route('login') }}">
                      Sign in
                    </a>
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    sign out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                </div>
              </div>
            @endguest

          </div>

        </div>
      </div>
    </nav>
  </header>

</section>

<section class=" bgColor">
  @yield('content')
</section>
<section class=" bgColor">
  <footer class="footer bgColor">
    <div class="content">
      <p class="textWhite">
        Coach's Corner Sports Auctions LLC - 47 N. Front Street, Souderton, PA 18964 (215) 721-9162, Fax (215) 721-7255 - E-mail: contact@myccsa.com
        Copyright © Coach's Corner Sports Auctions LLC. All rights reserved. Privacy Policy | Terms and Conditions
      </p>
    </div>
  </footer>
</section>

</div>
</body>
</html>
