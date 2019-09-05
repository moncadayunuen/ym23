<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ env('APP_NAME') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/9fa0f078e1.js"></script>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('./css/admin/adminlte.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/admin/square/blue.css') }}">
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img/logo.svg') }}" width="220px"></a>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Escribe tu correo para recuperar tu contraseña</p>
                        <form method="POST" action="{{ route('password.email') }}" autocomplete="off">
                            @csrf

                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" placeholder="Correo electrónico" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="fa fa-envelope form-control-feedback"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group has-feedback">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Enviar correo') }}</button>
                                <a class="btn btn-link" href="/login">
                                    {{ __('Ingresa para iniciar sesión') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('./js/jquery.min.js') }}"></script>
    <script src="{{ asset('./js/admin/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('./js/admin//icheck.min.js') }}"></script>
    <script>
    $(function () {
            $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass   : 'iradio_square-blue',
            increaseArea : '20%' // optional
        })
    })
    </script>
</body>
</html>
