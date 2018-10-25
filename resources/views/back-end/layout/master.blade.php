<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auction | @yield('title')</title>
  <link rel="stylesheet" href="{{url('/public/css/bulma.css')}}">
  <link rel="stylesheet" href="{{url('/public/css/admin-pageCss.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
  <div id="app">
    <section class="section">
      <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item" href="{{url('')}}">
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
              <a class="navbar-item">
                Home
              </a>

              <a class="navbar-item">
                Documentation
              </a>

              <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                  More
                </a>

                <div class="navbar-dropdown">
                  <a class="navbar-item">
                    About
                  </a>
                  <a class="navbar-item">
                    Jobs
                  </a>
                  <a class="navbar-item">
                    Contact
                  </a>
                  <hr class="navbar-divider">
                  <a class="navbar-item">
                    Report an issue
                  </a>
                </div>
              </div>
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


<section class="section">
  <div class="columns">
    <div class="column is-3">
      <section>
        <aside class="menu">
          <ul class="menu-list">
            <li>
              <a class="is-active">Dashboard</a>
              <ul>
                <li><a href="{{url('/admin/add-terms-condition')}}">Add Terms And Condition</a></li>
              </ul>
            </li>
          </ul>
          <ul class="menu-list">
            <li>
              <a class="is-active">Bilboard Message</a>
              <ul>
                <li><a href="{{url('/admin/all-bilboard-message')}}">Show all bilboard message</a></li>
                <li><a href="{{url('/admin/add-bilboard-message')}}">Add bilboard message</a></li>
              </ul>
            </li>
          </ul>

          <ul class="menu-list">
            <li>
              <a class="is-active">Auctions</a>
              <ul>
                <li><a href="{{url('/admin/all-items')}}">All Items</a></li>
                <li><a href="{{url('/admin/create-item')}}">Create Item</a></li>
              </ul>
            </li>

          </ul>
          <ul class="menu-list">
            <li>
              <a class="is-active">News</a>
              <ul>
                <li><a href="{{url('/admin/all-news')}}">All News</a></li>
                <li><a href="{{url('/admin/add-new-news')}}">Add New News</a></li>
              </ul>
            </li>

          </ul>

        </aside>
      </section>
    </div>
    <div class="column is-9">
      @yield('content')
    </div>
  </div>
</section>

</div>
{{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ayn49ntzgcmzv4p8sz6zy5rjo2v1150mxjdbqfpwklnkm5xe"></script> --}}
{{-- <script>tinymce.init({ selector:'textarea' });</script> --}}
<script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'news_text' );

</script>
</body>
</html>
