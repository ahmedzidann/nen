<?php $__env->startSection('parent_page_name'); ?>Solution <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Solution <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="about_content">
    <h5>Solution</h5>
    <h2><?php echo e($solution->title); ?></h2>

    <div class="tabs_div">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link proj_bttn <?php echo e($loop->first ? "active":""); ?>" id="pills-tab-<?php echo e($tab->id); ?>" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($tab->id); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($tab->id); ?>" aria-selected="false" tabindex="-1"><?php echo e($tab->name); ?> </button>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($tab->slug !='contacts'): ?>
            <div class="tab-pane fade  <?php echo e($loop->first ? "active show":""); ?>" id="pills-<?php echo e($tab->id); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($tab->id); ?>-tab" tabindex="0">
                <div class="program_sec">
                   <?php $__currentLoopData = $items->where('tabs_id',$tab->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <a  class="card_prgram">
                    <div class="card all_program_card">

                        <div class="programe_content">
                            <img src="<?php echo e($item->getFirstMediaUrl('solutionTabs')); ?>">
                            <h3><?php echo e($item->title); ?></h3>
                            <p style="color: #000;" class="description p_clamp"><?php echo e(strip_tags($item->description)); ?></p>
                            <button class="show_bttn" onclick="toggleDescription(this)">Show More <i class="bi bi-chevron-down"></i></button>
                            <div class="flex_icons_div">
                                <p><img src="<?php echo e(url('content/images/small_icon/archive-book.png')); ?>"><span>Reference</span></p>
                                <p><img src="<?php echo e(url('content/images/small_icon/global.png')); ?>"><span>Website</span></p>
                            </div>
                        </div>
                    </div>
                </a>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>

            </div>



            <?php else: ?>

            <div class="tab-pane fade " id="pills-<?php echo e($tab->id); ?>" role="tabpanel"
                aria-labelledby="pills-<?php echo e($tab->slug); ?>-tab" tabindex="0">
                <div class="flex_contact_us_sec">
                    <div class="left_part">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label label_action">Your Name</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Your Name">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label label_action">Phone Number</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label label_action">Your Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="Your Comment"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-12 col-sm-12">
                        <button type="button" class="contct_bttn">Send <i class="bi bi-send"></i></button>
                        </div>

                        </div>
                    </div>

                    <div class="right_part">
                    <div class="contact_us_links">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>

                    </div>
                    </div>

                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>
    </div>


</div>
<script>
    function toggleDescription(button) {
    var description = button.previousElementSibling;
    if (description.classList.contains('p_clamp')) {
        description.classList.remove('p_clamp');
        button.innerHTML = 'Show Less <i class="bi bi-chevron-up"></i>';
    } else {
        description.classList.add('p_clamp');
        button.innerHTML = 'Show More <i class="bi bi-chevron-down"></i>';
    }
}
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/solution/index.blade.php ENDPATH**/ ?>