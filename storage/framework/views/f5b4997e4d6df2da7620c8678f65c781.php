<?php $__env->startSection('titleadmin'); ?>
<?php echo e(str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' View')))); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssadmin'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentadmin'); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <?php if (isset($component)) { $__componentOriginala1ba9cf9e0d37b4fbf312bf08317c532 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala1ba9cf9e0d37b4fbf312bf08317c532 = $attributes; } ?>
<?php $component = App\View\Components\Admin\CustomizeBreadcrumb::resolve(['name' => $viewTable,'routeView' => $routeView,'type' => 'View'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.customize-breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Admin\CustomizeBreadcrumb::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala1ba9cf9e0d37b4fbf312bf08317c532)): ?>
<?php $attributes = $__attributesOriginala1ba9cf9e0d37b4fbf312bf08317c532; ?>
<?php unset($__attributesOriginala1ba9cf9e0d37b4fbf312bf08317c532); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala1ba9cf9e0d37b4fbf312bf08317c532)): ?>
<?php $component = $__componentOriginala1ba9cf9e0d37b4fbf312bf08317c532; ?>
<?php unset($__componentOriginala1ba9cf9e0d37b4fbf312bf08317c532); ?>
<?php endif; ?>
        <!--end breadcrumb-->
        <hr />
        <input type="hidden" id="<?php echo e($viewTable); ?>" value="<?php echo e(app()->getLocale()); ?>">
        
        <?php if (isset($component)) { $__componentOriginalc49e54a9ef7c3d21eea2545ba6c53add = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc49e54a9ef7c3d21eea2545ba6c53add = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.filter','data' => ['route' => $routeCreate]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($routeCreate)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc49e54a9ef7c3d21eea2545ba6c53add)): ?>
<?php $attributes = $__attributesOriginalc49e54a9ef7c3d21eea2545ba6c53add; ?>
<?php unset($__attributesOriginalc49e54a9ef7c3d21eea2545ba6c53add); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc49e54a9ef7c3d21eea2545ba6c53add)): ?>
<?php $component = $__componentOriginalc49e54a9ef7c3d21eea2545ba6c53add; ?>
<?php unset($__componentOriginalc49e54a9ef7c3d21eea2545ba6c53add); ?>
<?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table id="yajra-datatable"
                    class="yajra-datatable table table-striped table-bordered p-0 text-center table-hover">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input selectAll" id="selectAll"></th>
                            <th><?php echo e(TranslationHelper::translate(ucfirst('#')??'')); ?></th>
                            <th><?php echo e(TranslationHelper::translate(ucfirst('title')??'')); ?></th>
                            <th><?php echo e(TranslationHelper::translate(ucfirst('Project')??'')); ?></th>
                            <th><?php echo e(TranslationHelper::translate(ucfirst('Tabs')??'')); ?></th>
                            <th><?php echo e(TranslationHelper::translate(ucfirst('Created At')??'')); ?></th>
                            <th><?php echo e(TranslationHelper::translate(ucfirst('Processes')??'')); ?></th>
                        </tr>
                    </thead>

                    <tbody></tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsadmin'); ?>
<script src="<?php echo e(asset('admin/project/tabs/program/js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nen\resources\views/admin/project/tabs/program/view.blade.php ENDPATH**/ ?>