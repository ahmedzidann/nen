<!DOCTYPE html>
<html lang="en">
<head>
	<title>Verify Email</title>
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
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-6">
                        <form method="POST" class="login100-form validate-form" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">{{ __('Log Out') }}</button>
                            </div>
                        </form>
                    </div>
                </div>


			</div>
		</div>
	</div>


</body>
</html>
