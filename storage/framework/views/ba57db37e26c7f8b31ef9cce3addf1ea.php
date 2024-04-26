<div class="bg_second_part">
      <div class="container">
        <div class="second_part">
          <ul class="ul_pages">
            <?php $__currentLoopData = App\Models\Page::where('parent_id',null)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($page->slug=='about'): ?>
            <li class="li_category">
                <a href="#" class="a_ref <?php echo e(Route::is(''.$page->slug.'.*')? "active_link": ""); ?>"><?php echo e($page->name); ?> <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    <?php $__currentLoopData = $page->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li class="li_drop_content"><a href="<?php echo e(route('about.'.$sub->slug.'')); ?>"><?php echo e($sub->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
            </li>
            <?php else: ?>
            <li class="li_category">
                <a href="#" class="a_ref <?php echo e(Route::is(''.$page->slug.'.*')? "active_link": ""); ?>"><?php echo e($page->name); ?> <span><i class="bi bi-chevron-down"></i></span></a>
                <ul class="ul_dropdown">
                    <?php $__currentLoopData = $page->childe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <li class="li_drop_content"><a href="#"><?php echo e($sub->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </ul>
              </li>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            
            
          </ul>
        </div>
      </div>
    </div>
<?php /**PATH C:\laragon\www\nen\resources\views/user/layout/includes/nav.blade.php ENDPATH**/ ?>