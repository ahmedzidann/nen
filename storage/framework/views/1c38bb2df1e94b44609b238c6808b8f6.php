<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Careers <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="about_content">
        <?php if($fSection =  $items->where('item','section-one')->first()): ?>
    <div class="investors_flex">
        <div class="investors_titel">
            <h1><?php echo e($fSection->title); ?></h1>
            <p><?php echo e(strip_tags($fSection->description)); ?></p>
        </div>

        <div class="investors_img">
            <img src="<?php echo e($fSection->getFirstMediaUrl('StaticTable')); ?>">
        </div>
    </div>
    <?php endif; ?>

        <div class="teams_sec">
            <div class="our_team_titels">
                <h1>Some of the jobs offered</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

            </div>
            <?php if($items->where('item','section-two')->count()): ?>
                <div class="grid_dive_cards">
                <?php $__currentLoopData = $items->where('item','section-two'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card frame_card">
                        <?php
                            $date = Carbon\Carbon::parse($item->created_at)
                        ?>
                        <div class="frame_card_content_img">
                            <div class="frame_img">
                                <img src="<?php echo e($item->getFirstMediaUrl('StaticTable')); ?>">
                            </div>
                            <div class="frame_card_content">
                                <h6><?php echo e($item->subtitle); ?></h6>
                                <h5><?php echo e($item->title); ?></h5> <?php if($date->isToday()): ?>
                                    <span class="span_style">New Post</span>
                                <?php endif; ?>
                                <div class="small_icons_div">
                                    <p><i class="bi bi-geo-alt"></i><span><?php echo e($item->city); ?></span></p>
                                    <p><i class="bi bi-clock"></i><span><?php echo e($item->job_type); ?></span></p>
                                    <p><i class="bi bi-currency-dollar"></i><span><?php echo e($item->salary); ?></span></p>
                                    <p><i class="bi bi-calendar2"></i><span><?php echo e($date->diffForHumans()); ?></span></p>
                                </div>
                                <p class="p_detail"><?php echo ($fSection->description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            <?php endif; ?>
        </div>





    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/careers.blade.php ENDPATH**/ ?>