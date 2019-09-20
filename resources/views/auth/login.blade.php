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
                        <p class="login-box-msg">Ingresa para iniciar sesión</p>
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf

                            <div class="form-group has-feedback">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <span class="fa fa-envelope form-control-feedback"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group has-feedback">
                                <input id="password" type="password" placeholder="********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <span class="fa fa-lock form-control-feedback"></span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group has-feedback">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="checkbox icheck" for="remember">Recordar mi cuenta</label>
                            </div>

                            <div class="form-group has-feedback">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('./js/jquery.min.js') }}"></script>
    <script src="{{ asset('./js/admin/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('./js/admin/icheck.min.js') }}"></script>
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
