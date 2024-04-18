<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Our Team <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(asset('content/images/about_img.png')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="about_content">
        <?php if($fSection =  $items->where('item','section-one')->first()): ?>

    <div class="investors_flex">
        <div class="investors_titel">
            <h1><?php echo e($fSection->title); ?></h1>
            <p><?php echo e(strip_tags($fSection->description)); ?></p>
        </div>

        <div class="investors_img">
            <img src="<?php echo e($fSection->getFirstMediaUrl('OurTeam')); ?>">
        </div>

    </div>
    <?php endif; ?>
    <?php if($items->where('item','member-board')->count()): ?>
        <div class="teams_sec">
            <div class="our_team_titels">
                <h5>Our Teams</h5>
                <h1>Meet our team</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text.</p>

            </div>

            <div class="grid_dives">
                <?php $__currentLoopData = $items->where('item','member-board'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="grid_div_cont">
                        <img src="<?php echo e($item->getFirstMediaUrl('OurTeam')); ?>">
                        <h5><?php echo e($item->name); ?></h5>
                        <p><?php echo e($item->jop); ?></p>
                        <div class="socail_flex_icons">
                            <a href="<?php echo e($item->facebook); ?>"><i class="bi bi-facebook"></i></a>
                            <a href="<?php echo e($item->whatsapp); ?>"><i class="bi bi-whatsapp"></i></a>
                            <a href="<?php echo e($item->instagrame); ?>"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>

        </div>
    <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/our-team.blade.php ENDPATH**/ ?>