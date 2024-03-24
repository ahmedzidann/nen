<script src="<?php echo e(asset('admin/assets/js/bootstrap.bundle.min.js')); ?>"></script>
<!--plugins-->
<script src="<?php echo e(asset('admin/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/plugins/simplebar/js/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/plugins/metismenu/js/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')); ?>"></script>

<script src="<?php echo e(asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')); ?>"></script>

<!--app JS-->
<script src="<?php echo e(asset('admin/assets/js/app.js')); ?>"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.2/dist/sweetalert2.all.min.js"
	integrity="sha256-iSkyJ41luwYhZX4JnDUop92wix0y8SBGAW5tCnnCfZ4=" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>


<script src="<?php echo e(asset('dropify/js/dropify.min.js')); ?>"></script>
<script>
    $(function () {
        $('.dropify').dropify();
    });
</script>


<script src="<?php echo e(asset('phone/intlTelInput.js')); ?>"></script>

<script src="<?php echo e(asset('toastr/js/toastr.min.js')); ?>"></script>

<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>

<?php echo $__env->make('admin.layouts.Validation.errorValidation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('jsadmin'); ?><?php /**PATH /home2/nendemo2024/public_html/resources/views/admin/layouts/js/js.blade.php ENDPATH**/ ?>