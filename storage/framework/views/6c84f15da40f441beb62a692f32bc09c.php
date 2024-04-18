<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Investors <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(isset($slider)? $slider->getFirstMediaUrl('image'): asset('content/images/about_img.png')); ?>

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
            <img src="<?php echo e($fSection->getFirstMediaUrl('StaticTable')); ?>">
        </div>

    </div>
    <?php endif; ?>
    <?php if($items->where('item','section-two')->count()): ?>
    <div class="bg_div" style="background-image: url(<?php echo e($items->where('item','section-three')?->first()->getFirstMediaUrl('StaticTable') ?? content/images/women2.png); ?>);">
        <div class="number_div">
            <?php $__currentLoopData = $items->where('item','section-two'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="num_img_div">

                    <img class="w-icons" src="<?php echo e($item->getFirstMediaUrl('StaticTable')); ?>">
                    <h3><?php echo e($item->title); ?> </h3>
                    <p><?php echo e($item->subtitle); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

    </div>
    <?php endif; ?>
    <?php if($items->where('item','section-foure')->count()): ?>
    <div id="clients" class="clients-sec">
        <div class="swiper clients-slide">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $items->where('item','section-foure'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <img src="<?php echo e($item->getFirstMediaUrl('StaticTable')); ?>" alt="<?php echo e($item->title); ?>">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/investors.blade.php ENDPATH**/ ?>