<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <title>Maintenance</title>
    <link rel="stylesheet" href="{{url('/public/css/bulma.css')}}">
  </head>
  <body>
    <section class="hero is-primary ">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            {{ $exception->getMessage() }} <i class="fas fa-smile-beam"></i>
          </h1>

        </div>
      </div>
    </section>


  </body>
</html>
