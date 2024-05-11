<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">
        <a href="<?php echo e($routeView??''); ?>">
            <?php echo e(str_replace("-"," ",ucfirst(Request()->item))); ?>

        </a>
    </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="bx bx-home-alt"></i></a></li>
                <?php if(!empty(Request('category'))): ?>
                    <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e(str_replace("-"," ",ucfirst($category->name??''))); ?>

                    </li>
                <?php endif; ?>
                <?php if(!empty(Request('subcategory'))): ?>
                    <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e(str_replace("-"," ",ucfirst($subcategory->name??''))); ?>

                    </li>
                <?php endif; ?>
                <?php if(!empty(Request('subsubcategory'))): ?>
                    <li class="breadcrumb-item active" aria-current="page">
                            <?php echo e(str_replace("-"," ",ucfirst($subsubcategory->name??''))); ?>

                    </li>
                <?php endif; ?>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e(TranslationHelper::translate(ucfirst($type)??'')); ?></li>
            </ol>
        </nav>
    </div>
</div>
<?php if(!empty($subsubcategory)): ?>
<h6 class="mb-0 text-uppercase"><?php echo e(ucfirst($subsubcategory->name??'')); ?></h6>
<?php elseif(!empty($subcategory)): ?>
<h6 class="mb-0 text-uppercase"><?php echo e(ucfirst($subcategory->name??'')); ?></h6>
<?php endif; ?>
<?php /**PATH /home/hatem/Desktop/nen/resources/views/components/admin/customize-breadcrumb.blade.php ENDPATH**/ ?>