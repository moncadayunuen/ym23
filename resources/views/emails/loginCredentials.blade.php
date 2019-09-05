@component('mail::message')
# Credenciales de Acceso

{{ $user->name }} utiliza estas credenciales para acceder al sistema.

@component('mail::table')
    | Usuario | Contraseña |
    |:---------|:------------|
    | {{ $user->email }} | {{ $password }} |
@endcomponent

@component('mail::button', ['url' => 'login'])
Ingresar
@endcomponent

Gracias,<br>
El equipo de <a href="{{ route('index') }}" style="text-decoration: none;color: black;font-weight:bold;">{{ config('app.name') }}</a>
@endcomponent
