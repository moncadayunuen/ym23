<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ env('APP_NAME') }}</title>
      <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
      <script src="https://kit.fontawesome.com/9fa0f078e1.js"></script>
      <link rel="stylesheet" href="{{ asset('css/flaticon.css')}}">
      <link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}">
      <link rel="stylesheet" href="{{ asset('css/app.css')}}">
      <link rel="stylesheet" href="{{ asset('css/main.css')}}">
      <link href="https://fonts.googleapis.com/css?family=Oswald:300,500,600|Roboto:400,700" rel="stylesheet">
      <style>
        .page_404{width: 100%; height: 100vh; padding:40px 10px; background:#fff; font-family: 'Roboto', serif;
        }

        .page_404  img{ width:100%;}

        .four_zero_four_bg{
          background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
          height: 400px;
          background-position: center;
        }
        .four_zero_four_bg h1{
        font-size:80px;
        }
          .four_zero_four_bg h3{
              font-size:80px;
              }
          .contant_box_404{ margin-top:-50px;}
    </style>
  </head>
  <body class="bg-dark">
    <section class="page_404">
      <div class="container">
        <div class="row">	
          <div class="col-sm-12">
            <div class="text-center">
              <div class="four_zero_four_bg">
                <h1 class="text-center ">Error 404</h1>
              </div>
              <div class="contant_box_404">
                <h3 class="h2"> Look like you're lost</h3>
                <p>The page you are looking for not avaible!</p>
                <a href="{{ route('index') }}" class="btn btn-warning">Go to Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
  </body>
</html>