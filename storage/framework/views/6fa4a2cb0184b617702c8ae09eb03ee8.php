<?php $__env->startSection('parent_page_name'); ?>About <?php $__env->stopSection(); ?>
<?php $__env->startSection('page_name'); ?>Identity <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="about_content">
    <?php if($fSection =  $items->where('item','section-one')->first()): ?>
        <div class="about_flex">
            <div class="video_div">
                <img class="video_img" src="<?php echo e(asset('content/images/women.png')); ?>" />
                <span class="video_icon" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="bi bi-play-circle"></i></span>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content modal_syles">
                    <div class="modal-header">

                        <a href="#" class="bttn_close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-lg"></i></a>
                    </div>
                    <div class="modal-body">
                        <iframe width="700" height="350"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY?playlist=tgbNymZ7vqY&loop=1">
                        </iframe>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="about_titel_circle_progress">
                <div class="about_titel">
                <h1><?php echo e($fSection->title); ?></h1>
                <p>
                    <?php echo e(strip_tags($fSection->description)); ?>

                </p>

                <a href="#" class="see_more">see more</a>
                </div>

                <div class="three_circles">
                <div class="circle_content">
                    <circle-progress class="progress_1" value="90" max="100" text-format="percent"></circle-progress>
                    <span class="text">Ui/Ux Designer</span>
                </div>
                <div class="circle_content">
                    <circle-progress class="progress_1" value="70" max="100" text-format="percent"></circle-progress>
                    <span class="text">Ui/Ux Designer</span>
                </div>
                <div class="circle_content">
                    <circle-progress class="progress_1" value="80" max="100" text-format="percent"></circle-progress>
                    <span class="text">Ui/Ux Designer</span>
                </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($items->where('item','section-two')->count()): ?>
    <div class="bg_div" style="background-image: url(<?php echo e(asset('content/images/imge2.jpeg')); ?>)">
        <div class="explain_div">
        <div class="d-flex align-items-start flex_action">
            <div class="nav flex-column nav-pills our_visions me-3" id="v-pills-tab" role="tablist"
            aria-orientation="vertical">
            <?php $__currentLoopData = $items->where('item','section-two'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="nav-link tab_state  w_nav_link <?php if($loop->first): ?>active <?php else: ?> bttn_tab <?php endif; ?>" id="v-pills-section-two-<?php echo e($item->id); ?>-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-section-two-<?php echo e($item->id); ?>" type="button" role="tab" aria-controls="v-pills-section-two-<?php echo e($item->id); ?>"
                aria-selected="true">
                <?php echo e($item->title); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </div>
            <div class="tab-content tab_horzintal" id="v-pills-tabContent">

                <?php $__currentLoopData = $items->where('item','section-two'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="tab-pane fade <?php if($loop->first): ?>show active  <?php endif; ?>" id="v-pills-section-two-<?php echo e($item->id); ?>" role="tabpanel"
                aria-labelledby="v-pills-section-two-<?php echo e($item->id); ?>-tab" tabindex="0">
                <p class="tab_p">
                <?php echo e(strip_tags($item->description)); ?>

                </p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
        </div>
    </div>
    <?php endif; ?>
   <!-- <div class="objectives_div">
    <div class="objectiv_titling">
      <h1>Our Objectives Of Company</h1>
      <ul class="objectives_ul">
        <li>
          Developing highly qualified calibers to keep pace with the
          requirements of the labor market.
        </li>
        <li>
          Providing free educational resources and platforms to
          enabling self-education that would guarantee equal
          opportunities for young people everywhere
        </li>
        <li>
          Expanding the range of our consultation services focusing on
          hyper growth sectors.
        </li>
        <li>
          Promoting benefits of technological solutions for enhancing
          organizational capabilities and competencies with small
          businesses.
        </li>
        <li>
          Leading a strong, comprehensive network of professional,
          socially responsible organizations dedicated to innovation
          and excellence.
        </li>
        <li>
          Preparing a generation of qualified teachers, trainers, and
          lecturers capable of utilizing state-of-the-art
          technological solutions to facilitate education and
          learning.
        </li>
      </ul>
    </div>

    <div class="objectives_img">
      <img src="content/images/Rating.png" />
    </div>
  </div> -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/user/about/identity.blade.php ENDPATH**/ ?>