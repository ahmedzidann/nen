<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()=='ar'?'rtl':'ltr' }}">
<head>
    <x-Meta.Meta />
    <title>@yield('titleadmin')</title>
@if (App::getLocale() == 'ar')
    @include('admin.layouts.css.css_ar')
@else
    @include('admin.layouts.css.css')
@endif
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="{{ asset('admin/assets/images/logo-icon.png') }}" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Syndron Admin</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
						                @if ($errors->any())
						                    <div class="alert alert-danger">
						                        <ul>
						                            @foreach ($errors->all() as $error)
						                                <li>{{ $error }}</li>
						                            @endforeach
						                        </ul>
						                    </div>
						                @endif
						                <form method="POST" class="row g-3" action="{{ route('admin.login') }}">
						                    @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="email" value="{{ old('email') }}" value="{{ old('email') }}" name="email" required class="form-control" id="inputEmailAddress" placeholder="jhon@example.com">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input  class="form-control border-end-0" id="inputChoosePassword" type="password"  required name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" required type="checkbox" checked id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
    @include('admin.layouts.js.js')
    	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
</body>


<!-- Mirrored from codervent.com/syndron/demo/rtl/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Dec 2023 14:32:53 GMT -->
</html>