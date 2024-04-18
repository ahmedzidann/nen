<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Certificates <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="about_content">
        <h1>CERTIFICATES</h1>

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
                    <h1>Our CERTIFICATES</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>


                        <div class="grid_div_bttn">
                            <div class="grid_div">
                                <?php $__currentLoopData = $items->where('item', 'section-two')->where('childe_pages_id',$sub->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="card card_styles">
                                    <div class="card_content">
                                        <div class="iso_div">
                                            <img src="<?php echo e($item->getFirstMediaUrl('StaticTable')); ?>">
                                            <p><?php echo e($item->title); ?> <span>(<?php echo e($item->years_text); ?>)</span></p>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>

                        </div>




                </div>
            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>
        </div>



        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/certificates.blade.php ENDPATH**/ ?>