<div class="about_content">
    <h5><?php echo e($page->name); ?></h5>
    <h2><?php echo e($projects->title); ?></h2>

    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li class="nav-item" role="presentation">
                <button <?php if($tab['slug']=='about' ): ?> class="nav-link proj_bttn active" <?php else: ?> class="nav-link proj_bttn" <?php endif; ?> id="pills-<?php echo e($tab['slug']); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($tab['slug']); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($tab['slug']); ?>" aria-selected="true"><?php echo e(ucfirst($tab['name'][App::getLocale()])); ?> </button>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php if(!empty($projects->getAbout)): ?>
        <?php $__currentLoopData = $projects->getAbout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab" tabindex="0">
                <div class="who_us">
                    <div class="who_us_titel">
                        <h5>Who we do for you</h5>
                        <?php if(!empty($about->shortDescription)): ?>
                        <p id="shortDescription" style="white-space: pre-line;"><?php echo $about->shortDescription; ?></p>
                        <?php endif; ?>
                        <?php if(!empty($about->description)): ?>
                        <p id="fullDescription" style="white-space: pre-line; display: none;"><?php echo $about->description; ?></p>
                        <?php endif; ?>
                        <a href="#" id="learnMoreBtn" class="btn_detail">Learn More</a>
                    </div>
                    <div class="whou_us_img">
                        <img src="<?php echo e(asset($about->getFirstMediaUrl('AboutTabs'))); ?>">
                    </div>

                </div>

                <div class="bg_div" style="background-image: url(<?php echo e(asset('content')); ?>/images/women.png);">
                    <div class="number_div">

                        <div class="num_img_div">
                            <img src="<?php echo e(asset('content')); ?>/images/small_icon/Vector (1).png">
                            <h3>19 +</h3>
                            <p><?php echo e($about['label1']); ?></p>
                        </div>

                        <div class="num_img_div">
                            <img src="<?php echo e(asset('content')); ?>/images/small_icon/Vector.png">
                            <h3>20 +</h3>
                            <p><?php echo e($about['label2']); ?></p>
                        </div>

                        <div class="num_img_div">
                            <img src="<?php echo e(asset('content')); ?>/images/small_icon/people.png">
                            <h3>850 +</h3>
                            <p><?php echo e($about['label3']); ?></p>
                        </div>

                        <div class="num_img_div">
                            <img src="<?php echo e(asset('content')); ?>/images/small_icon/receipt-add.png">
                            <h3>16 +</h3>
                            <p><?php echo e($about['label4']); ?></p>
                        </div>

                    </div>

                </div>
                <div class="tabs_div2">
                    <ul class="nav nav-pills ul_tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active tab_active" id="chalange_btn_tab" data-bs-toggle="pill" data-bs-target="#challang_tab" type="button" role="tab" aria-controls="challang_tab" aria-selected="true">Challenge
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn_tabs" id="solution_btn_tab" data-bs-toggle="pill" data-bs-target="#solution_tab" type="button" role="tab" aria-controls="solution_tab" aria-selected="false">Solution</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link btn_tabs" id="result_btn_tab" data-bs-toggle="pill" data-bs-target="#result_tab" type="button" role="tab" aria-controls="result_tab" aria-selected="false">Result</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabs">
                        <div class="tab-pane fade show active" id="challang_tab" role="tabpanel" aria-labelledby="chalange_btn_tab" tabindex="0">
                            <div class="who_us">
                                <div class="who_us_titel">
                                    <?php if(!empty($about['challenge'])): ?>
                                    <p><?php echo e($about['challenge']); ?></p>
                                    <?php endif; ?>

                                </div>


                            </div>
                        </div>
                        <?php if(!empty($about['solution'])): ?>
                        <div class="tab-pane fade" id="solution_tab" role="tabpanel" aria-labelledby="solution_btn_tab" tabindex="0"><?php echo e($about['solution']); ?></div>
                        <?php endif; ?>
                        <?php if(!empty($about['result'])): ?>
                        <div class="tab-pane fade" id="result_tab" role="tabpanel" aria-labelledby="result_btn_tab" tabindex="0"><?php echo e($about['result']); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-program" role="tabpanel" aria-labelledby="pills-program-tab" tabindex="0">
                <div class="program_sec">
                    <?php $__currentLoopData = $projects->getProgram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <div class="card all_program_card">

                        <div class="programe_content">
                            <img src="<?php echo e(asset($program->getFirstMediaUrl('firstImage'))); ?>">
                            <h3><?php echo e($program->title); ?></h3>
                            <p class="p_clamp"><?php echo $program->description; ?></p>
                            <button href="#" class="show_bttn">Show More <i class="bi bi-chevron-down"></i></button>
                            <div class="flex_icons_div">
                                <a href="<?php echo e(route('admin.tabproject.programTabDownload',$program->id)); ?>">
                                    <p><img src="<?php echo e(asset('content')); ?>/images/small_icon/archive-book.png"><span>Reference</span>
                                    </p>
                                </a>
                                <a href="https://<?php echo e($program->url); ?>" class="card_prgram" target="_blank">
                                    <p><img src="<?php echo e(asset('content')); ?>/images/small_icon/global.png"><span>Website</span>
                                    </p>
                                </a>

                            </div>
                        </div>
                    </div>

                   
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

    </div>


    <div class="tab-pane fade" id="pills-help" role="tabpanel" aria-labelledby="pills-help-tab" tabindex="0">

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <?php $__currentLoopData = $projects->getHelp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $helpItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <?php echo e($helpItem['title']); ?>

                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"><?php echo $helpItem['description']; ?></div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <div class="tab-pane fade" id="pills-archive" role="tabpanel" aria-labelledby="pills-archive-tab" tabindex="0">

        <div class="document_sec">
        <?php $__currentLoopData = $projects->getDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($doc->type == "pdf"): ?>
            <div class="document_content">
                
                <i class="bi bi-filetype-pdf"></i>
                <div class="document_titel">
                    <h3><?php echo e($doc->title); ?></h3>
                    <p class="p_clamp"> <?php echo e($doc->description); ?></p>
                        ever since the 1500s when an......</p>

                </div>
                <a href="<?php echo e(route('admin.tabproject.archiveDownload',$doc->id)); ?>"><i class="bi bi-download"></i></a>
            </div>
          <?php elseif($doc->type == "url"): ?>
            <div class="document_content">
                <i class="bi bi-link-45deg"></i>
                <div class="document_titel">
                    <h3><?php echo e($doc->title); ?></h3>
                    <p class="p_clamp"><?php echo e($doc->description); ?></p>

                </div>
                <a href="https://<?php echo e($doc->url); ?>">
                <i class="bi bi-box-arrow-up-right"></i>
                </a>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="media_sec">
            <h2>Media</h2>
            <div class="media_images">
           <?php $__currentLoopData = $projects->getDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($img->type =="image"): ?>
                <img src="<?php echo e(asset($img->getFirstMediaUrl('firstFile'))); ?>">
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-join-us" role="tabpanel" aria-labelledby="pills-join-us-tab" tabindex="0">

        <div class="bg_div bg_join" style="background-image: url(<?php echo e(asset('content')); ?>/images/girl.jpg);">
            <div class="join_us_sec">
                <h3 class="h3_style">Register Steps</h3>
                <div class="join_us_dives">
                 <?php $__currentLoopData = $projects->getJoinus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joinus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                
                    <div class="join_us_dive">
                        <img src="<?php echo e(asset('content')); ?>/images/small_icon/share.png">
                        <?php if(!empty($joinus['description'])): ?>
                        <p><?php echo $joinus['description']; ?></p>
                        <?php endif; ?>
                    </div>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

        </div>

        <div class="terms_sec">
            <h2>Terms and Conditions</h2>
            <div class="flex_jon">
                <ul class="terms_ul">
                   <?php if(!empty($joinus['description'])): ?>
                    <li>
                        <?php echo $joinus['sub_description']; ?>

                    </li>
                 <?php endif; ?>
                   
                </ul>

                <div class="terms_img">
                <?php if(!empty($joinus->getFirstMediaUrl('JoinusTerms'))): ?>
                    <img src="<?php echo e(asset($joinus->getFirstMediaUrl('JoinusTerms'))); ?>" >
                <?php endif; ?>
                </div>
            </div>


        </div>
    </div>

</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>


</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const learnMoreBtn = document.getElementById("learnMoreBtn");
        const shortDescription = document.getElementById("shortDescription");
        const fullDescription = document.getElementById("fullDescription");

        learnMoreBtn.addEventListener("click", function(event) {
            event.preventDefault();
            shortDescription.style.display = "none";
            fullDescription.style.display = "block";
        });
    });

</script>
<?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/components/frontend/projects/view-projects.blade.php ENDPATH**/ ?>