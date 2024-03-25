<!DOCTYPE html>
<html lang="en">
<head>
	<title>forgot-password</title>
	<x-meta.meta></x-meta.meta> 
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ asset('auth/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
<!--===============================================================================================-->


</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image:url({{url('/auth/images/bg-01.jpg')}})" >
			<div class="wrap-login100">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" class="login100-form validate-form" action="{{ route('password.email') }}">
                    @csrf

					<span class="login100-form-title p-b-34 p-t-27">
						Reset Link
					</span>
                <!-- Session Status -->
                {{--  <x-auth-session-status class="mb-4" :status="session('status')" />  --}}
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('status') }}</strong>
                    </div>
                @endif

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" value="{{ old('Email') }}" value="{{ old('email') }}" name="email" autocomplete="username" placeholder="email" required autofocus>
					</div>


					<div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">{{ __('Email Password Reset Link') }}</button>
					</div>


				</form>
			</div>
		</div>
	</div>


</body>
</html>
