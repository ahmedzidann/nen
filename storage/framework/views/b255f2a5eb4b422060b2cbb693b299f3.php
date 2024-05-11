<select class="form-select" id=<?php echo e(isset($id)?$id:''); ?> value=""  name="<?php echo e($name); ?>" <?php echo e($required??''); ?>>
    <option selected="" value="" <?php echo e(isset($disabled)?$disabled:''); ?>><?php echo e(TranslationHelper::translate(ucfirst('Select '.$nameselect)??'')); ?></option>
    <?php $__currentLoopData = $foreach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <?php if(!empty($model)): ?>
     
    <option value="<?php echo e($item??''); ?>" <?php echo e($item == $model ?'selected':''); ?>><?php echo e($item??''); ?></option>
    <?php else: ?>
     
    <option value="<?php echo e($item??''); ?>" <?php if(old($name)): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($item??''); ?></option>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select><?php /**PATH /home/hatem/Desktop/nen/resources/views/components/admin/form/role.blade.php ENDPATH**/ ?>