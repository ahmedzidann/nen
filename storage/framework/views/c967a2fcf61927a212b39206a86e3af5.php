<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(app()->getLocale()=='ar'?'rtl':'ltr'); ?>">
<head>
	<!-- Required meta tags -->
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
<body>

	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?php echo $__env->make('admin.layouts.sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php echo $__env->make('admin.layouts.head.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!--end header -->
		<?php echo $__env->yieldContent('contentadmin'); ?>
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<?php echo $__env->make('admin.layouts.switcher.switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.layouts.js.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/hatem/Desktop/nen/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>