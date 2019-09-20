<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }}</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,500,600|Roboto:400,700" rel="stylesheet">
    </head>
    <body>
    <div style="padding: 15px 0; background: white;border-bottom: 2px solid #FFED12;"><center><h1 style="color: black; ">YM23</h1></center></div>
    <div style="padding: 20px;">
      <center><h1>Tus Credenciales de Acceso fueron actualizadas</h1></center>
      <h2>{{ $user->name }} utiliza estas credenciales para acceder al sistema.</h2>
      <div style="display: block;padding: 20px 0;">
          <table style="border-collapse:collapse; margin: 0 auto;">
              <thead>
                <tr>
                  <th style="padding: 15px 12px; background: #efefef; border-bottom:2px solid gray;">Correo electrónico</th>
                  <th style="padding: 15px 12px; background: #efefef; border-bottom:2px solid gray;">Contraseña</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="padding: 15px 12px; background: white; border-bottom: 1px solid gray;"><a style="text-decoration: underline;">{{ $user->email }}</a></td>
                  <td style="padding: 15px 12px; background: white; border-bottom: 1px solid gray;">{{ $password }}</td>
                </tr>
              </tbody>
          </table>
      </div>
      <center style="margin: 25px 0;">
        <a href="{{ route('index') }}" style="text-decoration: none; background: #FFED12; padding: 15px 25px; width: max-content; color: black; font-weight: bold;">Ingresar</a>
      </center>
    </div>
    <div style="text-align: center;padding: 15px 0;background:#fff;border-top:1px solid #FFED12;">
        All rights reserved &copy; <a style="padding-left: 5px;color:#000;text-decoration:none;font-weight:bolder;" href="{{ route('index') }}" style="text-decoration: none;color: black;font-weight:bold;">{{ config('app.name') }}</a>
    </div>
  </body>
</html>
