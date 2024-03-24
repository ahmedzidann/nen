

<?php $__env->startSection('titleadmin'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssadmin'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentadmin'); ?>
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <?php if (isset($component)) { $__componentOriginal650a71726bcbe85ca6a56c1e60267aaf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal650a71726bcbe85ca6a56c1e60267aaf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.breadcrumb','data' => ['name' => $viewTable,'routeView' => $routeView,'type' => $type]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($viewTable),'routeView' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($routeView),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal650a71726bcbe85ca6a56c1e60267aaf)): ?>
<?php $attributes = $__attributesOriginal650a71726bcbe85ca6a56c1e60267aaf; ?>
<?php unset($__attributesOriginal650a71726bcbe85ca6a56c1e60267aaf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal650a71726bcbe85ca6a56c1e60267aaf)): ?>
<?php $component = $__componentOriginal650a71726bcbe85ca6a56c1e60267aaf; ?>
<?php unset($__componentOriginal650a71726bcbe85ca6a56c1e60267aaf); ?>
<?php endif; ?>
        <!--end breadcrumb-->
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase"><?php echo e(TranslationHelper::translate(ucfirst('Nav Tabs')??'')); ?></h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#<?php echo e($translationFirst->id); ?>"
                                    role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> <?php echo e(ucfirst($translationFirst->name)); ?></div>

                                    </div>
                                </a>
                            </li>
                        </ul>
                        <form method="post" id="myForm" action="<?php echo e($action??''); ?>" enctype="multipart/form-data">

                            <?php echo $__env->make('components.admin.form.csrf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="<?php echo e($translationFirst->id); ?>" role="tabpanel">
                                    <div class="card-body p-4">
                                        
                                        <div class="card-body p-4 row">
                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'Select Parent']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'Select Parent']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal5c0c9b460fcf8b718aa767f0da9d8dc3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c0c9b460fcf8b718aa767f0da9d8dc3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.dropdown','data' => ['disabled' => '','required' => '','foreach' => $allPage,'name' => 'parent_id','nameselect' => 'pages','model' => $pages,'class' => 'select2','dataSearch' => 'true']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => '','required' => '','foreach' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allPage),'name' => 'parent_id','nameselect' => 'pages','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages),'class' => 'select2','data-search' => 'true']); ?>
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
                                            
                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'form-label','name' => 'Name  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'form-label','name' => 'Name  '.e($translationFirst->name).'']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal375f0ed4f8ee156e823aad8b1382f853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('name.'.$translationFirst->key).'','name' => ''.e('name'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'Name '.e($translationFirst->name).'','class' => 'form-control valid','value' => $pages->translate('name', $translationFirst->key)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('name.'.$translationFirst->key).'','name' => ''.e('name'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'Name '.e($translationFirst->name).'','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->translate('name', $translationFirst->key))]); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal375f0ed4f8ee156e823aad8b1382f853)): ?>
<?php $attributes = $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853; ?>
<?php unset($__attributesOriginal375f0ed4f8ee156e823aad8b1382f853); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal375f0ed4f8ee156e823aad8b1382f853)): ?>
<?php $component = $__componentOriginal375f0ed4f8ee156e823aad8b1382f853; ?>
<?php unset($__componentOriginal375f0ed4f8ee156e823aad8b1382f853); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal1719fcc38154baad93f627a80a957b58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1719fcc38154baad93f627a80a957b58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter Name  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter Name  '.e($translationFirst->name).'']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $attributes = $__attributesOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__attributesOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $component = $__componentOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__componentOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'sort']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'sort']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal375f0ed4f8ee156e823aad8b1382f853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('sort').'','name' => ''.e('sort').'','type' => 'number','required' => '','placeholder' => 'sort','class' => 'form-control valid','value' => $pages->sort]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('sort').'','name' => ''.e('sort').'','type' => 'number','required' => '','placeholder' => 'sort','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->sort)]); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal375f0ed4f8ee156e823aad8b1382f853)): ?>
<?php $attributes = $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853; ?>
<?php unset($__attributesOriginal375f0ed4f8ee156e823aad8b1382f853); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal375f0ed4f8ee156e823aad8b1382f853)): ?>
<?php $component = $__componentOriginal375f0ed4f8ee156e823aad8b1382f853; ?>
<?php unset($__componentOriginal375f0ed4f8ee156e823aad8b1382f853); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal1719fcc38154baad93f627a80a957b58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1719fcc38154baad93f627a80a957b58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter sort']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter sort']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $attributes = $__attributesOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__attributesOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $component = $__componentOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__componentOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'link']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal375f0ed4f8ee156e823aad8b1382f853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('link').'','name' => ''.e('link').'','type' => 'text','required' => '','placeholder' => 'link','class' => 'form-control valid','value' => $pages->link]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('link').'','name' => ''.e('link').'','type' => 'text','required' => '','placeholder' => 'link','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->link)]); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal375f0ed4f8ee156e823aad8b1382f853)): ?>
<?php $attributes = $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853; ?>
<?php unset($__attributesOriginal375f0ed4f8ee156e823aad8b1382f853); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal375f0ed4f8ee156e823aad8b1382f853)): ?>
<?php $component = $__componentOriginal375f0ed4f8ee156e823aad8b1382f853; ?>
<?php unset($__componentOriginal375f0ed4f8ee156e823aad8b1382f853); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal1719fcc38154baad93f627a80a957b58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1719fcc38154baad93f627a80a957b58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter link']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $attributes = $__attributesOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__attributesOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $component = $__componentOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__componentOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
                                            </div>
                                            
                                            
                                            <div class="col-md-12 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'Description  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'Description  '.e($translationFirst->name).'']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal8095f65bcb6cd63d5b96918b7b8b39a2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8095f65bcb6cd63d5b96918b7b8b39a2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.text','data' => ['old' => ''.e('description.'.$translationFirst->key).'','name' => ''.e('description'.'['.$translationFirst->key.']').'','type' => 'text','placeholder' => 'Description '.e(ucfirst($translationFirst->name)).'','value' => $pages->translate('description', $translationFirst->key)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('description.'.$translationFirst->key).'','name' => ''.e('description'.'['.$translationFirst->key.']').'','type' => 'text','placeholder' => 'Description '.e(ucfirst($translationFirst->name)).'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->translate('description', $translationFirst->key))]); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8095f65bcb6cd63d5b96918b7b8b39a2)): ?>
<?php $attributes = $__attributesOriginal8095f65bcb6cd63d5b96918b7b8b39a2; ?>
<?php unset($__attributesOriginal8095f65bcb6cd63d5b96918b7b8b39a2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8095f65bcb6cd63d5b96918b7b8b39a2)): ?>
<?php $component = $__componentOriginal8095f65bcb6cd63d5b96918b7b8b39a2; ?>
<?php unset($__componentOriginal8095f65bcb6cd63d5b96918b7b8b39a2); ?>
<?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginal1719fcc38154baad93f627a80a957b58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1719fcc38154baad93f627a80a957b58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter Description  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter Description  '.e($translationFirst->name).'']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $attributes = $__attributesOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__attributesOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1719fcc38154baad93f627a80a957b58)): ?>
<?php $component = $__componentOriginal1719fcc38154baad93f627a80a957b58; ?>
<?php unset($__componentOriginal1719fcc38154baad93f627a80a957b58); ?>
<?php endif; ?>

                                            </div>
                                            

                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'Checked switch checkbox navbar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'Checked switch checkbox navbar']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            <?php $__currentLoopData = App\Models\Page::NAVBAR; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $navbar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="form-check">
                                                                <?php if (isset($component)) { $__componentOriginalcf25a82317d778a56dd449ef2e79618a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf25a82317d778a56dd449ef2e79618a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.radio','data' => ['name' => 'navbar','value' => ''.e($navbar).'','checked' => $pages->navbar==$navbar?'checked':'','model' => $pages]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'navbar','value' => ''.e($navbar).'','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->navbar==$navbar?'checked':''),'model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages)]); ?>
                                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf25a82317d778a56dd449ef2e79618a)): ?>
<?php $attributes = $__attributesOriginalcf25a82317d778a56dd449ef2e79618a; ?>
<?php unset($__attributesOriginalcf25a82317d778a56dd449ef2e79618a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf25a82317d778a56dd449ef2e79618a)): ?>
<?php $component = $__componentOriginalcf25a82317d778a56dd449ef2e79618a; ?>
<?php unset($__componentOriginalcf25a82317d778a56dd449ef2e79618a); ?>
<?php endif; ?>
                                                                <label class="form-check-label" for="bsValidation6"><?php echo e($navbar); ?></label>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'Checked switch checkbox footer']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'Checked switch checkbox footer']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            <?php $__currentLoopData = App\Models\Page::FOOTER; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="form-check">
                                                                <?php if (isset($component)) { $__componentOriginalcf25a82317d778a56dd449ef2e79618a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf25a82317d778a56dd449ef2e79618a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.radio','data' => ['name' => 'footer','value' => ''.e($footer).'','checked' => $pages->footer==$footer?'checked':'','model' => $pages]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'footer','value' => ''.e($footer).'','checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->footer==$footer?'checked':''),'model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages)]); ?>
                                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf25a82317d778a56dd449ef2e79618a)): ?>
<?php $attributes = $__attributesOriginalcf25a82317d778a56dd449ef2e79618a; ?>
<?php unset($__attributesOriginalcf25a82317d778a56dd449ef2e79618a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf25a82317d778a56dd449ef2e79618a)): ?>
<?php $component = $__componentOriginalcf25a82317d778a56dd449ef2e79618a; ?>
<?php unset($__componentOriginalcf25a82317d778a56dd449ef2e79618a); ?>
<?php endif; ?>
                                                                <label class="form-check-label" for="bsValidation6"><?php echo e($footer); ?></label>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            
                                            <div class="col-md-6 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'Checked switch checkbox status']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'Checked switch checkbox status']); ?>
                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $attributes = $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a)): ?>
<?php $component = $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a; ?>
<?php unset($__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a); ?>
<?php endif; ?>
                                                <div class="col-sm-9">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            <?php $__currentLoopData = App\Models\Page::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="form-check">
                                                                <?php if (isset($component)) { $__componentOriginalcf25a82317d778a56dd449ef2e79618a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf25a82317d778a56dd449ef2e79618a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.radio','data' => ['checked' => $pages->status==$status?'checked':'','name' => 'status','value' => ''.e($status).'','model' => $pages]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages->status==$status?'checked':''),'name' => 'status','value' => ''.e($status).'','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pages)]); ?>
                                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf25a82317d778a56dd449ef2e79618a)): ?>
<?php $attributes = $__attributesOriginalcf25a82317d778a56dd449ef2e79618a; ?>
<?php unset($__attributesOriginalcf25a82317d778a56dd449ef2e79618a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf25a82317d778a56dd449ef2e79618a)): ?>
<?php $component = $__componentOriginalcf25a82317d778a56dd449ef2e79618a; ?>
<?php unset($__componentOriginalcf25a82317d778a56dd449ef2e79618a); ?>
<?php endif; ?>
                                                                <label class="form-check-label" for="bsValidation6"><?php echo e($status); ?></label>
                                                            </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <div class="d-md-flex d-grid align-items-center gap-3">
                                                    <?php if (isset($component)) { $__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.submit','data' => ['type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c)): ?>
<?php $attributes = $__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c; ?>
<?php unset($__attributesOriginal6b10ec1e08d4fadc40f7f5dc9075934c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c)): ?>
<?php $component = $__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c; ?>
<?php unset($__componentOriginal6b10ec1e08d4fadc40f7f5dc9075934c); ?>
<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsadmin'); ?>
<script src="<?php echo e(asset('admin/pages/js/index.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/nendemo2024/public_html/resources/views/admin/pages/view.blade.php ENDPATH**/ ?>