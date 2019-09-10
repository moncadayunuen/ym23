<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
        <script src="https://kit.fontawesome.com/9fa0f078e1.js"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css')}}">
        <link rel="stylesheet" href="{{ asset('css/main.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,500,600|Roboto:400,700" rel="stylesheet">
    </head>
    <body>
    <div class="d-flex justify-content-center py-3 bg-white"><img src="{{ asset('img/logo.svg') }}" width="150px"></div>
    <div class="container py-5">
      <div class="col-12 py-2">
        <h2>{{ $user->name }} utiliza estas credenciales para acceder al sistema.</h2>
      </div>
      <div class="col-12">
          <table class="table table-hover text-center">
              <thead>
                <tr>
                  <th scope="col"><i class="far fa-envelope mr-2"></i>Correo electrónico</th>
                  <th scope="col"><i class="fas fa-key mr-2"></i>Contraseña</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $user->email }}</td>
                  <td>{{ $password }}</td>
                </tr>
              </tbody>
          </table>
      </div>
    </div>
    <div class="col-12 py-3 bg-white text-center">
        All rights reserved <i class="far fa-copyright mr-2"></i> <img src="{{ asset('img/fav.png') }}" width="20px"><a class="pl-1" href="{{ route('index') }}" style="text-decoration: none;color: black;font-weight:bold;">{{ config('app.name') }}</a>
    </div>
    <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>