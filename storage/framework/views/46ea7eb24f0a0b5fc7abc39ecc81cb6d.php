<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Clients <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="about_content">
    <?php if($fSection =  $items->where('item','section-one')->first()): ?>
    <div class="Awards_flex">
        <div class="Awards_titel">
            <h1><?php echo e($fSection->title); ?></h1>

            <?php echo $fSection->description; ?>

        </div>

        <div class="Awards_img">
            <img src="<?php echo e($fSection->getFirstMediaUrl('StaticTable')); ?>">
        </div>


    </div>
    <?php endif; ?>
    <div class="Awards_head_titel">
        <h1>Our Clients</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 clients_bttn " id="pills-tab" role="tablist">

                <?php $__currentLoopData = $subClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo e($loop->first ?" active":''); ?> proj_bttn" id="pills-<?php echo e($award->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($award->slug); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($award->slug); ?>" aria-selected="true"><?php echo e($award->name); ?></button>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </ul>

            <div class="tab-content" id="pills-tabContent">
                <?php $__currentLoopData = $subClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php echo e($loop->first ?" show active":''); ?>" id="pills-<?php echo e($award->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($award->slug); ?>-tab" tabindex="0">
                    <div class="tabs_content">
                        <div class="client_sec">
                            <?php $__currentLoopData = $items->where('item', $award->slug); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="client_content">
                                    <img src="<?php echo e($item->getFirstMediaUrl('StaticTable')); ?>">
                                    <h2><?php echo e($item->title); ?></h2>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/clients.blade.php ENDPATH**/ ?>