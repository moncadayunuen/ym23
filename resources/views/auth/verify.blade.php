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
                <div class="card login-card-body">
                    <div class="card-header">{{ __('Verificar correo electrónico') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
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
