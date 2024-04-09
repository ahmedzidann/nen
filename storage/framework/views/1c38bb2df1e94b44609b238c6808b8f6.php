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

                        <div class="frame_card_content_img">
                            <div class="frame_img">
                                <img src="content/images/small_icon/Frame 17.png">
                            </div>
                            <div class="frame_card_content">
                                <h6>Linear company</h6>
                                <h5><?php echo e($item->title); ?> <span class="span_style">New Post</span></h5>
                                <div class="small_icons_div">
                                    <p><i class="bi bi-geo-alt"></i><span>Cairo</span></p>
                                    <p><i class="bi bi-clock"></i><span>Full time</span></p>
                                    <p><i class="bi bi-currency-dollar"></i><span>10k</span></p>
                                    <p><i class="bi bi-calendar2"></i><span>1 year</span></p>
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