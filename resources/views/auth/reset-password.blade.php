<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
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
                <form method="POST" class="login100-form validate-form" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Reset Password
					</span>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" value="{{ old('email') }}" value="{{ old('email',$request->email) }}" name="email" autocomplete="username" placeholder="email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" id="password" type="password" value="__('Password')" name="password" placeholder="Password" required autocomplete="new-password" >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" id="password" type="password" value="__('Confirm Password')" name="password_confirmation" placeholder="Password confirmation" required autocomplete="new-password" >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">{{ __('Reset Password') }}</button>
					</div>


				</form>
			</div>
		</div>
	</div>


</body>
</html>
