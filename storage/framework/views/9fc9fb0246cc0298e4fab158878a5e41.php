<?php $__env->startSection('titleadmin'); ?>
<?php echo e(str_replace("-"," ",ucfirst(TranslationHelper::translate($nameView??'')))); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssadmin'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentadmin'); ?>
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--end row-->
				<div class="row row-cols-1 row-cols-xl-2">
					<div class="col d-flex">
						<div class="card radius-10 w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
									
										<h5 class="mb-1">Welcome to Dashboard : <?php echo e(ucfirst((Auth::guard('admin')->name??''))??''); ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
			</div>
		</div>
		<!--end page wrapper -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('jsadmin'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nen\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>