<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Achievements <?php $__env->stopSection(); ?>
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


        <div class="bg_team_div" style="background-image: url(<?php echo e(asset('content/images/team_view.jpeg')); ?>);">
            <div class="nen_sec">
                <div class="flex_upper_div">
                    <h3>NEN is a professional consulting company</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>

                </div>
                <div class="two_flex_grid_sec">
                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="grid_sec">
                            <?php $__currentLoopData = $items->where('years', $year); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="year_div">
                                <h5><?php echo e($achievement->title); ?></h5>
                                <p><?php echo $achievement->description; ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            


                            <span class="span_number"><?php echo e($year); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>

            </div>


        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/achievements.blade.php ENDPATH**/ ?>