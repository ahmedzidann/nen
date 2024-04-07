<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <a href="<?php echo e($routeView??''); ?>">
        <div class="breadcrumb-title pe-3"><?php echo e(TranslationHelper::translate(ucfirst($name)??'')); ?></div>
    </a>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(TranslationHelper::translate(ucfirst($type)??'')); ?></li>
            </ol>
        </nav>
    </div>
</div>
<h6 class="mb-0 text-uppercase"><?php echo e(TranslationHelper::translate(ucfirst($name)??'')); ?></h6>
<?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/components/admin/form/breadcrumb.blade.php ENDPATH**/ ?>