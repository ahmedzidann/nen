<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(app()->getLocale()=='ar'?'rtl':'ltr'); ?>">
<head>
    <?php if (isset($component)) { $__componentOriginal8995371d285806ef756ad29b1a70b814 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8995371d285806ef756ad29b1a70b814 = $attributes; } ?>
<?php $component = App\View\Components\Meta\Meta::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('Meta.Meta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Meta\Meta::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8995371d285806ef756ad29b1a70b814)): ?>
<?php $attributes = $__attributesOriginal8995371d285806ef756ad29b1a70b814; ?>
<?php unset($__attributesOriginal8995371d285806ef756ad29b1a70b814); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8995371d285806ef756ad29b1a70b814)): ?>
<?php $component = $__componentOriginal8995371d285806ef756ad29b1a70b814; ?>
<?php unset($__componentOriginal8995371d285806ef756ad29b1a70b814); ?>
<?php endif; ?>
    <title><?php echo $__env->yieldContent('titleadmin'); ?></title>
<?php if(App::getLocale() == 'ar'): ?>
    <?php echo $__env->make('admin.layouts.css.css_ar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('admin.layouts.css.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
</head>

<body class="">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0" style="background-image: url('<?php echo e(asset('admin/assets/images/login-images/slide-1.jpg')); ?>');background-repeat: no-repeat; background-size: cover; background-position: center;">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
									<div class="mb-3 text-center">
										<img src="<?php echo e(asset('admin/assets/images/logo-icon.png')); ?>" width="60" alt="" />
									</div>
									<div class="text-center mb-4">
										<h5 class="">Syndron Admin</h5>
										<p class="mb-0">Please log in to your account</p>
									</div>
									<div class="form-body">
									<div class="form-body">
						                <?php if($errors->any()): ?>
						                    <div class="alert alert-danger">
						                        <ul>
						                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						                                <li><?php echo e($error); ?></li>
						                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						                        </ul>
						                    </div>
						                <?php endif; ?>
						                <form method="POST" class="row g-3" action="<?php echo e(route('admin.login')); ?>">
						                    <?php echo csrf_field(); ?>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email</label>
												<input type="email" value="<?php echo e(old('email')); ?>" value="<?php echo e(old('email')); ?>" name="email" required class="form-control" id="inputEmailAddress" placeholder="jhon@example.com">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input  class="form-control border-end-0" id="inputChoosePassword" type="password" value="__('Password')" required name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
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
	<script src="<?php echo e(asset('admin/assets/js/bootstrap.bundle.min.js')); ?>"></script>
	<!--plugins-->
	<script src="<?php echo e(asset('admin/assets/js/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
	<script src="<?php echo e(asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>
	
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
	<!--app JS-->
	<script src="<?php echo e(asset('admin/assets/js/app.js')); ?>"></script>
</body>


<!-- Mirrored from codervent.com/syndron/demo/rtl/vertical/auth-basic-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Dec 2023 14:32:53 GMT -->
</html><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/AdminAuth/login.blade.php ENDPATH**/ ?>