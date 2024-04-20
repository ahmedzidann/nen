<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Awards <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(isset($slider)? $slider->getFirstMediaUrl('image'): asset('content/images/about_img.png')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="about_content">

    <?php if($fSection): ?>
    <div class="Awards_flex">
        <div class="Awards_titel">
            <h1><?php echo e($fSection->title); ?></h1>

            <p><?php echo ($fSection->description); ?></p>
        </div>

        <div class="Awards_img">
            <img src="<?php echo e($fSection->getFirstMediaUrl('StaticTable')); ?>">
        </div>
    </div>
    <?php endif; ?>

    <div class="Awards_head_titel">
        <h1>AWARDS</h1>
        <div class="tabs_div">
            <ul class="nav nav-pills mb-3 Awards_bttn " id="pills-tab" role="tablist">
                <!-- Swiper -->
                <div class="swiper mySwiper Awards_slider swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden">
                    <div class="swiper-wrapper swipper_action" id="swiper-wrapper-106b4cf6610d8a50610" aria-live="polite">
                        <?php $__currentLoopData = $subAwards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide <?php echo e($key==0? 'swiper-slide-active':($key==1?'swiper-slide-next':'swiper-slide')); ?>" role="group" aria-label="<?php echo e($key+1); ?> / 6" style="margin-right: 5px;">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link proj_bttn  <?php echo e($loop->first? 'active':''); ?>" id="pills-<?php echo e($award->slug); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($award->slug); ?>" type="button"
                                     role="tab" aria-controls="pills-<?php echo e($award->id); ?>" aria-selected="true">
                                     <?php echo e($award->name); ?></button>
                            </li>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-106b4cf6610d8a50610" aria-disabled="false"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-106b4cf6610d8a50610" aria-disabled="true"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

                <!-- Swiper JS -->

                <!-- <li class="nav-item" role="presentation">
                    <button class="nav-link active proj_bttn" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">TAMKEEN COMPETITION</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab"
                        aria-controls="pills-profile" aria-selected="false">CISCO ACADEMY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab"
                        aria-controls="pills-contact" aria-selected="false">Microsoft</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">ACTIVATE ICT PRODUCT
                        DEVELOPMENT</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">INNOVATION AWARD</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn" id="pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-disabled" type="button" role="tab"
                        aria-controls="pills-disabled" aria-selected="false">LEARNING CENTER</button>
                </li> -->
            </ul>

            <div class="tab-content" id="pills-tabContent">

                <?php $__currentLoopData = $subAwards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php echo e($loop->first? 'active show':''); ?>" id="pills-<?php echo e($award->slug); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($award->slug); ?>-tab" tabindex="0">
                    <?php echo e($award->item); ?>

                    <div class="tabs_content">
                        <?php
                            $it = clone $items;
                            $it = $it->where('item', $award->slug)
                        ?>
                        <?php $__currentLoopData = $it; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="<?php echo e($item->getFirstMediaUrl('StaticTable')); ?>">

                                </div>
                                <div class="icons_div">
                                    <h5><?php echo e($item->title); ?></h5>
                                    <div class="flex_icons_div">
                                        <p><img src="<?php echo e(url('content/images/small_icon/archive-book.png')); ?>"><span><a target="_blank" href='<?php echo e($item->getFirstMediaUrl('StaticTable2')); ?>'>Reference</a></span>
                                        </p>
                                        <p><img src="<?php echo e(url('content/images/small_icon/global.png')); ?>"><span><a target="_blank" href="<?php echo e($item->url); ?>">Website</a> </span>
                                        </p>
                                        <p><img src="<?php echo e(url('content/images/small_icon/calendar-2.png')); ?>"><span><?php echo e($item->years_text); ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="discreption_div">
                                <p><?php echo $item->description; ?></p>
                            </div>

                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>

            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="tabs_content">
                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="content/images/logo_imge.png">

                                </div>
                                <div class="icons_div">
                                    <h5>TAMKEEN COMPETITION ( MCIT )</h5>
                                    <div class="flex_icons_div">
                                        <p><img src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>
                                        <p><img src="content/images/small_icon/calendar-2.png"><span>19
                                                /3 /
                                                2024</span></p>
                                    </div>


                                </div>
                            </div>

                            <div class="discreption_div">
                                <p>The first award is for developing the app Tasaheel which is a portal
                                    to
                                    facilitate for citizens with special needs access to all services,
                                    whether governmental or otherwise; the app includes sign language as
                                    a
                                    feature enabling the deaf to fully utilize all the capabilities of
                                    the
                                    system. The Second award is for Qayas, a system for managing
                                    electronic
                                    tests for people with visual disabilities enabling them to handle
                                    the
                                    tests at ease.</p>
                            </div>

                        </div>

                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="content/images/logo_imge.png">

                                </div>
                                <div class="icons_div">
                                    <h5>TAMKEEN COMPETITION ( MCIT )</h5>
                                    <div class="flex_icons_div">
                                        <p><img src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>
                                        <p><img src="content/images/small_icon/calendar-2.png"><span>19
                                                /3 /
                                                2024</span></p>
                                    </div>


                                </div>
                            </div>

                            <div class="discreption_div">
                                <p>The first award is for developing the app Tasaheel which is a portal
                                    to
                                    facilitate for citizens with special needs access to all services,
                                    whether governmental or otherwise; the app includes sign language as
                                    a
                                    feature enabling the deaf to fully utilize all the capabilities of
                                    the
                                    system. The Second award is for Qayas, a system for managing
                                    electronic
                                    tests for people with visual disabilities enabling them to handle
                                    the
                                    tests at ease.</p>
                            </div>

                        </div>

                        <div class="logo_img_discreption">
                            <div class="icons_div_logo_img_div">
                                <div class="logo_img_div">
                                    <img class="logo_img" src="content/images/logo_imge.png">

                                </div>
                                <div class="icons_div">
                                    <h5>TAMKEEN COMPETITION ( MCIT )</h5>
                                    <div class="flex_icons_div">
                                        <p><img src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>
                                        <p><img src="content/images/small_icon/calendar-2.png"><span>19
                                                /3 /
                                                2024</span></p>
                                    </div>


                                </div>
                            </div>

                            <div class="discreption_div">
                                <p>The first award is for developing the app Tasaheel which is a portal
                                    to
                                    facilitate for citizens with special needs access to all services,
                                    whether governmental or otherwise; the app includes sign language as
                                    a
                                    feature enabling the deaf to fully utilize all the capabilities of
                                    the
                                    system. The Second award is for Qayas, a system for managing
                                    electronic
                                    tests for people with visual disabilities enabling them to handle
                                    the
                                    tests at ease.</p>
                            </div>

                        </div>


                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>

            </div>
        </div>
    </div>






</div>

<script src="<?php echo e(url('content/js/vendors/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('content/js/vendors/kursor.min.js')); ?>"></script>
    <script src="<?php echo e(url('content/js/vendors/all.min.js')); ?>"></script>
    <script src="<?php echo e(url('content/js/vendors/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(url('content/js/vendors/swiper-bundle.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js" type="module"></script>
    <script src="<?php echo e(url('content/js/scripts.js')); ?>"></script>

    <script>
        var swiper = new Swiper(".Awards_slider", {
            slidesPerView: "auto",
            spaceBetween: 10,
            breakpoints: {

                1024: {
                    slidesPerView: "auto",
                    spaceBetween: 5
                },

                900: {
                    slidesPerView:3,
                    spaceBetween: 5
                },

                650: {
                    slidesPerView: 2,
                    spaceBetween:5
                },

                375: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },

                0: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },

            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/award.blade.php ENDPATH**/ ?>