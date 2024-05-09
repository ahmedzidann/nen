<div class="aside_div">
  <?php if(isset($VCpages)): ?>
    <?php $__currentLoopData = $VCpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('about.'.$page->slug.'')); ?>" class="ref_styles active_ref <?php echo e(Route::is('about.'.$page->slug.'')? "active_link active": ""); ?>">
            <div class="img_link">
            <img  class="<?php if($page->slug == 'identity'): ?> Identity_icon <?php endif; ?>"  src="<?php echo e(asset($page->getFirstMediaUrl('icon'))); ?>"
                alt="" /><?php echo e($page->name); ?>

            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php elseif(isset($Spages)): ?>
            <?php $__currentLoopData = $Spages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('education.'.$page->slug.'',['page_id'=>$page->id] )); ?>" class="ref_styles active_ref <?php echo e(Route::is('education.'.$page->slug.'')? "active_link active": ""); ?>">
                    <div class="img_link">
                    <img  class="<?php if($loop->first): ?> Identity_icon <?php endif; ?>"  src="<?php echo e(asset($page->getFirstMediaUrl('icon'))); ?>"
                        alt="" /><?php echo e($page->name); ?>

                    </div>
                    </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php elseif(isset($Tpages)): ?>
            <?php $__currentLoopData = $Tpages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('testing.'.$page->slug.'',['page_id'=>$page->id] )); ?>" class="ref_styles active_ref <?php echo e(Route::is('testing.'.$page->slug.'')? "active_link active": ""); ?>">
                    <div class="img_link">
                    <img  class="<?php if($loop->first): ?> Identity_icon <?php endif; ?>"  src="<?php echo e(asset($page->getFirstMediaUrl('icon'))); ?>"
                        alt="" /><?php echo e($page->name); ?>

                    </div>
                    </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php else: ?>
        <?php

        ?>
            <?php $__currentLoopData = $ss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex_asid_menu">
                <a class="ref_styles dropdown_arrow <?php echo e(Route::is('solutions.'.$page->slug.'')? "active_link active": ""); ?>" href="#">
                <div class="img_link">
                    <img class="Identity_icon" src="content/images/small_icon/card.png" alt=""><?php echo e($page->name); ?>

                </div>
                <i class="bi bi-chevron-down"></i>
                </a>

                <ul class="aside_menu">
                    <?php $__currentLoopData = \App\Models\Solution::where('pages_id',$page->id )->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a class="<?php echo e(Route::is('solutions.'.$page->slug.'') && ($solution->id == Request()->solution_id)? "active_link active": ""); ?>" href="<?php echo e(route('solutions.'.$page->slug.'',['page_id'=>$page->id, 'solution_id'=>$solution->id])); ?>"><?php echo e($solution->title); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </ul>

            </div>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>



</div>
<?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/layout/includes/about/sidebar.blade.php ENDPATH**/ ?>