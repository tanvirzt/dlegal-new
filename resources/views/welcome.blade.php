<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>dLegal | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('login_assets/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('login_assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('login_assets/css/fontawesome-all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('login_assets/font/flaticon.css') }}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('login_assets/style.css') }}">

    <style>
        .fxt-template-layout14:before {
            content: "";
            height: 100%;
            width: 100%;
            background-color: rgb(4 4 14 / 52%);
            left: 0;
            top: 0;
            position: absolute;
            z-index: -1;
        }
    </style>

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to
    improve your experience.</p>
<![endif]-->
<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>
<section class="fxt-template-animation fxt-template-layout14" data-bg-image="{{ asset('login_assets/img/figure/bg14-l.png') }}">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-4 col-lg-7 col-sm-12 col-12 fxt-bg-color">
                <div class="fxt-content">
                    <div class="fxt-header">
                        <a href="#" class="fxt-logo"><img src="{{ asset('login_assets/img/rsz_1d_legal_logo.png') }}" alt="Logo"></a>
                        <p>Login into your pages account</p>
                    </div>

                    @if ($errors->has('email'))
                        <span class="error" style="color: red; font-weight:bold;">{{ $errors->first('email') }}</span>
                    @endif

                    @if ($errors->has('password'))
                        <span class="error" style="color: red; font-weight:bold;">{{ $errors->first('password') }}</span>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="fxt-form">
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-1">
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email" :value="old('email')" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-2">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="********"
                                           required autocomplete="current-password">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="fxt-transformY-50 fxt-transition-delay-4">
                                    <button type="submit" class="fxt-btn-fill">Log in</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- jquery-->
<script src="{{ asset('login_assets/js/jquery-3.5.0.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('login_assets/js/bootstrap.min.js') }}"></script>
<!-- Imagesloaded js -->
<script src="{{ asset('login_assets/js/imagesloaded.pkgd.min.js') }}"></script>
<!-- Validator js -->
<script src="{{ asset('login_assets/js/validator.min.js') }}"></script>
<!-- Custom Js -->
<script src="{{ asset('login_assets/js/main.js') }}"></script>

</body>

</html>
