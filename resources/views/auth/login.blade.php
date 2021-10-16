<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
<meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Plugin CSS -->
<link rel="stylesheet" href="{{ url('assets/plugin') }}/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ url('assets/plugin') }}/animate-css/animate.min.css">
<link rel="stylesheet" href="{{ url('assets/plugin') }}/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ url('assets/backend') }}/css/main.css">
<link rel="stylesheet" href="{{ url('assets/backend') }}/css/color_skins.css">
</head>

<body class="theme-blue">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="mobile-logo"><a href="index.html"><img src="../assets/images/logo-icon.svg" alt="Mplify"></a></div>
                    <div class="auth-left">
                        <div class="left-top">
                            <a href="index.html">
                                {{-- <img src="../assets/images/logo-icon.svg" alt="Mplify"> --}}
                                <span>Login</span>
                            </a>
                        </div>
                        <div class="left-slider">
                            <img src="../assets/images/login/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="auth-right">
                        <div class="card">
                            <div class="header">
                                <p class="lead">Log in</p>
                            </div>
                            <div class="body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password" class="control-label sr-only">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group clearfix">
                                        <label class="fancy-checkbox element-left">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span>{{ __('Remember Me') }}</span>
                                        </label>								
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Login') }}</button>
                                    <div class="bottom">
                                        {{-- @if (Route::has('password.request'))
                                            <span class="helper-text m-b-10">
                                                <i class="fa fa-lock"></i> 
                                                <a href="page-forgot-password.html">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </span>
                                        @endif --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
