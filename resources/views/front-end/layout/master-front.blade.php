<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auction | @yield('title')</title>
  <link rel="stylesheet" href="{{url('/public/css/bulma.css')}}">
  <link rel="stylesheet" href="{{url('/public/css/front_end_style.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
  <div id="app">
    <section class=" bgColor">
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
                <div class="buttons">
                  <a class="button is-primary">
                    <strong>Sign up</strong>
                  </a>
                  <a class="button is-light">
                    Log in
                  </a>
                </div>
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
  {{-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ayn49ntzgcmzv4p8sz6zy5rjo2v1150mxjdbqfpwklnkm5xe"></script> --}}
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <script>
			CKEDITOR.replace( 'editor1' );
		</script>
</body>
</html>
