<?php $__env->startSection('parent_page_name'); ?>Testing <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?><?php echo e($partner->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="about_content">
        <h1><?php echo e($partner->name); ?></h1>

        <div class="tabs_div">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php $__currentLoopData = $subPartners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($loop->first): ?> active <?php endif; ?> proj_bttn" id="pills-<?php echo e($sub->slug); ?>-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-<?php echo e($sub->slug); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($sub->slug); ?>"
                            aria-selected="true"><?php echo e($sub->name); ?></button>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
            <div class="tab-content certificates_h" id="pills-tabContent">
                <?php $__currentLoopData = $subPartners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $fs= $items->where('item','section-one')
                    ->where('childe_pages_id',$sub->id)->first();

                ?>

                <div class="tab-pane fade <?php if($loop->first): ?>show active <?php endif; ?>" id="pills-<?php echo e($sub->slug); ?>" role="tabpanel"
                    aria-labelledby="pills-<?php echo e($sub->slug); ?>-tab" tabindex="0">
                    <div class="explain_titel">
                        <p><?php echo $fs?->description; ?></p>

                    </div>

                    <div class="swiper-slide">
                        <?php if($fs): ?>
                            <img src="<?php echo e($fs->getFirstMediaUrl('StaticTable')); ?>" alt="<?php echo e($fs->title); ?>">
                        <?php endif; ?>
                    </div>


                    <div class="ceryifcates_sec">



                            <div class="grid_div_bttn">
                                <div class="grid_div">
                                    <?php $__empty_1 = true; $__currentLoopData = $items->where('pages_id',$sub->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="card card_styles">
                                        <div class="card_content">
                                            <div class="iso_div">
                                                <img src="<?php echo e($item->getFirstMediaUrl('Education')); ?>">
                                                <p><?php echo e($item->title); ?> </p>
                                            </div>
                                            <div class="iso_titels">
                                            <?php echo $item->description; ?>


                                                <div class="flex_icons_div">
                                                    <p>
                                                        <img src="<?php echo e(url('content/images/small_icon/archive-book.png')); ?>"><span><a  href="<?php echo e($item->getFirstMediaUrl('StaticTable2')); ?>">Reference</a></span>
                                                    </p>
                                                    <p>
                                                        <img  src="<?php echo e(url('content/images/small_icon/global.png')); ?>"><span><a  href="<?php echo e($item->url); ?>">Website</a></span>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div style="display: flex; justify-content: center;">
                                            <p style="color:#999;">There is No Data Available</p>
                                        </div>
                                    <?php endif; ?>


                                </div>

                            </div>




                    </div>
                </div>


                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/testing/index.blade.php ENDPATH**/ ?>