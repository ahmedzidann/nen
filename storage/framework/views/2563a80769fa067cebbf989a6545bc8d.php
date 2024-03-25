<select class="form-select" id=<?php echo e(isset($id)?$id:''); ?> value=""  name="<?php echo e($name); ?>">
    <option selected="" value="" <?php echo e(isset($disabled)?$disabled:''); ?>>Select <?php echo e(isset($nameselect)?$nameselect:''); ?></option>
    <?php $__currentLoopData = $foreach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(isset($model->id)): ?>
    
    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $model->$name ?'selected':''); ?>><?php echo e($item->name); ?></option>
    <?php else: ?>
    
    <option value="<?php echo e($item->id); ?>" <?php if(old($name)==$item->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($item->name); ?></option>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH /home2/nendemo2024/public_html/resources/views/components/admin/form/dropdown.blade.php ENDPATH**/ ?>