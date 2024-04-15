<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col col-sm-12"><b><?php echo e(TranslationHelper::translate(ucfirst('Filter Data')??'')); ?></b></div>
            <div class="col col-sm-5 col-12">
                <label for="input29" class="form-label"><?php echo e(TranslationHelper::translate(ucfirst('Data To')??'')); ?></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <input type="date" class="form-control datepickerto" name="datepickerto" id="datepickerto"
                        placeholder="<?php echo e(TranslationHelper::translate(ucfirst('Data To...')??'')); ?>">
                </div>
            </div>
            <div class="col col-sm-5 col-12">
                <label for="input29" class="form-label"><?php echo e(TranslationHelper::translate(ucfirst('Data From')??'')); ?></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <input type="date" class="form-control datepickerfrom" name="datepickerfrom" id="datepickerfrom"
                        placeholder="<?php echo e(TranslationHelper::translate(ucfirst('Data From...')??'')); ?>">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col col-sm-12"><b>parents</b></div>
            <div class="col col-sm-3 col-12">
                <label for="input29" class="form-label">searchs</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <input  required="" name="search_text"   class="search" data-search="true">

                </div>
            </div>
            <div class="col col-sm-3 col-12">
                <label for="input29" class="form-label">parents</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <?php if (isset($component)) { $__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.dropdown','data' => ['disabled' => '','required' => '','foreach' => $parents,'name' => 'parent_id','nameselect' => 'pages','model' => $parents,'class' => 'parent_id','dataSearch' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => '','required' => '','foreach' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($parents),'name' => 'parent_id','nameselect' => 'pages','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($parents),'class' => 'parent_id','data-search' => 'true']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3)): ?>
<?php $attributes = $__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3; ?>
<?php unset($__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3)): ?>
<?php $component = $__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3; ?>
<?php unset($__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="col col-sm-3 col-12">
                <label for="input29" class="form-label">sub parents</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                    <?php if (isset($component)) { $__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.dropdown','data' => ['disabled' => '','required' => '','foreach' => $subparents,'name' => 'sub_parent_id','nameselect' => 'sub_parent_id','model' => $subparents,'class' => 'sub_parent_id','dataSearch' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => '','required' => '','foreach' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($subparents),'name' => 'sub_parent_id','nameselect' => 'sub_parent_id','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($subparents),'class' => 'sub_parent_id','data-search' => 'true']); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3)): ?>
<?php $attributes = $__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3; ?>
<?php unset($__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3)): ?>
<?php $component = $__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3; ?>
<?php unset($__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="col col-sm-2 col-12">
                <label for="input29" style="visibility:hidden" class="form-label"><?php echo e(TranslationHelper::translate(ucfirst('Data From')??'')); ?></label>
                <div class="input-group">
                    <a href="javascript:;" id="filterButton" class="btn btn-primary px-5 filterButton"><i
                            class="fadeIn animated bx bx-filter"></i><?php echo e(TranslationHelper::translate(ucfirst('Filter')??'')); ?></a>
                </div>
            </div>
        </div>




        <br>
        <?php if(isset($customzie)): ?>
        <a href="<?php echo e($route??''); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0">
            <i class="bx bxs-plus-square"></i><?php echo e(TranslationHelper::translate(ucfirst($nameone??'')??'')); ?>

        </a>
        <a href="<?php echo e($routeCreatesectionTwo??''); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0">
            <i class="bx bxs-plus-square"></i><?php echo e(TranslationHelper::translate(ucfirst($nametwo??'')??'')); ?>

        </a>
        <?php else: ?>
        <a href="<?php echo e($route??''); ?>" class="btn btn-primary radius-30 mt-2 mt-lg-0">
            <i class="bx bxs-plus-square"></i><?php echo e(TranslationHelper::translate(ucfirst('Create')??'')); ?>

        </a>
        <?php endif; ?>
        <button type="button" class="btn btn-secondary btn-xs " name="bulk_delete" id="bulk_delete"><i
                class="bx bxs-trash"></i><?php echo e(TranslationHelper::translate(ucfirst('Delete')??'')); ?></button>
    </div>
</div>
<?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/components/admin/form/pages-filter.blade.php ENDPATH**/ ?>