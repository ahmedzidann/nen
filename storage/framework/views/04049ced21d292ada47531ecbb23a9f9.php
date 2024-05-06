
<?php if(Session::has('add')): ?>
<script>
    toastr.success("<?php echo e(Session::get('add')); ?>",'Success!',{timeOut:11000});
</script>
<?php endif; ?>


<?php if(Session::has('edit')): ?>
<script>
    toastr.success("<?php echo e(Session::get('edit')); ?>",'Success!',{timeOut:11000});
</script>
<?php endif; ?>


<?php if(Session::has('delete')): ?>
<script>
    toastr.success("<?php echo Session::get('delete'); ?>",'Success!',{timeOut:11000});
</script>
<?php endif; ?>


<?php if($errors->any()): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<script>
    toastr.options.positionClass = 'toast-bottom-left';
        toastr.error("<?php echo e($error); ?>",'Error!',{timeOut:11000});
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php /**PATH /home/hatem/Desktop/nen/resources/views/admin/layouts/Validation/errorValidation.blade.php ENDPATH**/ ?>