<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,500,600|Roboto:400,700" rel="stylesheet">
    </head>
    <body style="background:#fff;font-family:'Roboto';">
    <div style="padding: 15px 0; border-bottom: 2px solid #FFED12;"><center><h1 style="color: black; ">YM23</h1></center></div>
    <div style="padding: 20px;">
      <h3>Nombre: {{ $email->name }}</h3>
      <h3>Correo: {{ $email->email }}</h3>
      <h3>Mensaje recibido: </h3>
      <div style="background: #ffffff;border: 1px solid rgba(0,0,0,.2);padding: 10px 10px; border-radius:5px;">
        {{$email->message }}
      </div>
    </div>
    <div style="text-align: center;padding: 15px 0;border-top:1px solid #FFED12;">
        All rights reserved &copy; <a style="padding-left: 5px;color:#000;text-decoration:none;font-weight:bolder;" href="{{ route('index') }}" style="text-decoration: none;color: black;font-weight:bold;">{{ config('app.name') }}</a>
    </div>
  </body>
</html>
