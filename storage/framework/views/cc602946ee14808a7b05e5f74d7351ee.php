<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Partners <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="about_content">
        <h1>STRATIGIC PARTNERS</h1>

        <div class="tabs_div">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php $__currentLoopData = $subPartners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if($loop->first): ?> active <?php endif; ?> proj_bttn" id="pills-<?php echo e($sub->id); ?>-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-<?php echo e($sub->id); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($sub->id); ?>"
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
                <div class="tab-pane fade <?php if($loop->first): ?>show active <?php endif; ?>" id="pills-<?php echo e($sub->id); ?>" role="tabpanel"
                    aria-labelledby="pills-<?php echo e($sub->id); ?>-tab" tabindex="0">
                    <div class="explain_titel">
                        <p><?php echo $fs?->description; ?></p>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

            </div>
        </div>

            <div class="ceryifcates_sec">
                <h1>Our Partners</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                <div class="grid_div_bttn">
                    <div class="grid_div">
                        <div class="card card_styles">
                            <div class="card_content">
                                <div class="iso_div">
                                    <img src="content/images/small_icon/Image.png">
                                    <p>NITIDUS FOR TRAINING AND DEVELOPMENT <span>(2019)</span></p>
                                </div>
                                <div class="iso_titels">
                                    <p>ISO 9001 certification is the world's most widely used standard for
                                        quality
                                        management systems, quality level control and Process Management. It
                                        also
                                        helps to develop the mechanism of business performance in various
                                        fields.
                                        Requirements for a quality management system....</p>

                                    <div class="flex_icons_div">
                                        <p><img
                                                src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img
                                                src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <a href="#" class="read_more">Read More</a>

                        </div>
                        <div class="card card_styles">
                            <div class="card_content">
                                <div class="iso_div">
                                    <img src="content/images/small_icon/Image (1).png">
                                    <p>TANMEYA EDUCATIONAL CONSULTING LLC-<span>(2019)</span></p>
                                </div>
                                <div class="iso_titels">
                                    <p>ISO 9001 certification is the world's most widely used standard for
                                        quality
                                        management systems, quality level control and Process Management. It
                                        also
                                        helps to develop the mechanism of business performance in various
                                        fields.
                                        Requirements for a quality management system....</p>

                                    <div class="flex_icons_div">
                                        <p><img
                                                src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img
                                                src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <a href="#" class="read_more">Read More</a>

                        </div>

                        <div class="card card_styles">
                            <div class="card_content">
                                <div class="iso_div">
                                    <img src="content/images/small_icon/Image (2).png">
                                    <p>EITESAL ENABLING (ICTE) - <span>(2019)</span></p>
                                </div>
                                <div class="iso_titels">
                                    <p>ISO 9001 certification is the world's most widely used standard for
                                        quality
                                        management systems, quality level control and Process Management. It
                                        also
                                        helps to develop the mechanism of business performance in various
                                        fields.
                                        Requirements for a quality management system....</p>

                                    <div class="flex_icons_div">
                                        <p><img
                                                src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img
                                                src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>

                                    </div>

                                </div>
                            </div>
                            <a href="#" class="read_more">Read More</a>

                        </div>

                        <div class="card card_styles">
                            <div class="card_content">
                                <div class="iso_div">
                                    <img src="content/images/small_icon/Image (3).png">
                                    <p>DENTAL SYNDICATE - EGYPT -<span>(2019)</span></p>
                                </div>
                                <div class="iso_titels">
                                    <p>ISO 9001 certification is the world's most widely used standard for
                                        quality
                                        management systems, quality level control and Process Management. It
                                        also
                                        helps to develop the mechanism of business performance in various
                                        fields.
                                        Requirements for a quality management system....</p>

                                    <div class="flex_icons_div">
                                        <p><img
                                                src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img
                                                src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>

                                    </div>

                                </div>
                            </div>
                            <a href="#" class="read_more">Read More</a>

                        </div>

                        <div class="card card_styles">
                            <div class="card_content">
                                <div class="iso_div">
                                    <img src="content/images/small_icon/Image (4).png">
                                    <p>VETERINARIANS SYNDICATE - EGYPT -<span>(2019)</span></p>
                                </div>
                                <div class="iso_titels">
                                    <p>ISO 9001 certification is the world's most widely used standard for
                                        quality
                                        management systems, quality level control and Process Management. It
                                        also
                                        helps to develop the mechanism of business performance in various
                                        fields.
                                        Requirements for a quality management system....</p>

                                    <div class="flex_icons_div">
                                        <p><img
                                                src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img
                                                src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>

                                    </div>

                                </div>
                            </div>
                            <a href="#" class="read_more">Read More</a>

                        </div>


                        <div class="card card_styles">
                            <div class="card_content">
                                <div class="iso_div">
                                    <img src="content/images/small_icon/Image (5).png">
                                    <p>GRADUATE YOUTH EMPLOYMENT DEVICE - CAIRO GOVERNORATE - <span>(2019)</span></p>
                                </div>
                                <div class="iso_titels">
                                    <p>ISO 9001 certification is the world's most widely used standard for
                                        quality
                                        management systems, quality level control and Process Management. It
                                        also
                                        helps to develop the mechanism of business performance in various
                                        fields.
                                        Requirements for a quality management system....</p>

                                    <div class="flex_icons_div">
                                        <p><img
                                                src="content/images/small_icon/archive-book.png"><span>Reference</span>
                                        </p>
                                        <p><img
                                                src="content/images/small_icon/global.png"><span>Website</span>
                                        </p>

                                    </div>

                                </div>
                            </div>
                            <a href="#" class="read_more">Read More</a>

                        </div>

                    </div>
                    <a href="#" class="see_more_bttn">See More <span><i class="bi bi-chevron-down"></i></span></a>

                </div>



            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/partners.blade.php ENDPATH**/ ?>