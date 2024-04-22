<div class="aside_div">
  <?php if(isset($VCpages)): ?>
    <?php $__currentLoopData = $VCpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('about.'.$page->slug.'')); ?>" class="ref_styles active_ref active_link active">
            <img  class="<?php if($page->slug == 'identity'): ?> Identity_icon <?php endif; ?>"  src="<?php echo e(asset($page->getFirstMediaUrl('icon'))); ?>"
                alt="" /><?php echo e($page->name); ?>

        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    
  </div>
<?php /**PATH C:\laragon\www\nen\resources\views/user/layout/includes/about/sidebar.blade.php ENDPATH**/ ?>