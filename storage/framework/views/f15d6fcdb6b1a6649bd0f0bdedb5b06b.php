<?php $__env->startSection('parent_page_name'); ?>Education <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?><?php echo e($partner->name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('cover_image'); ?>
    <?php echo e(isset($slider) ? $slider->getFirstMediaUrl('image') : asset('content/images/about_img.png')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


<div class="about_content">
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

        <div class="tab-pane fade <?php if($loop->first): ?>show active <?php endif; ?>" id="pills-<?php echo e($sub->slug); ?>" role="tabpanel"
            aria-labelledby="pills-<?php echo e($sub->slug); ?>-tab" tabindex="0">
            <div class="accordion_dive">
            <div class="accordion accordion_flex" id="accordionExample">
            <?php $__currentLoopData = $items->where('pages_id',$sub->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo e($item->title); ?> </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php echo $item->description; ?> </div>
                </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>












  </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/education/tqs.blade.php ENDPATH**/ ?>