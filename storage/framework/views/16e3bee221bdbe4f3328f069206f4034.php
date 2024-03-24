
<?php $__env->startSection('titleadmin'); ?>
<?php echo e(str_replace('-', ' ', ucfirst(TranslationHelper::translate($viewTable . ' ' . $type)))); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssadmin'); ?>
<style>
    .hr hr {
        border: 4px solid black;

        /* You can adjust the border properties */
        margin: 10px 0;
        /* Adjust the margin to control the spacing around the <hr> */
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentadmin'); ?>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <?php if (isset($component)) { $__componentOriginala1ba9cf9e0d37b4fbf312bf08317c532 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala1ba9cf9e0d37b4fbf312bf08317c532 = $attributes; } ?>
<?php $component = App\View\Components\Admin\CustomizeBreadcrumb::resolve(['name' => $viewTable,'routeView' => $routeView,'type' => 'Create'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
        <div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col">
                <h6 class="mb-0 text-uppercase"><?php echo e(TranslationHelper::translate(ucfirst('Nav Tabs') ?? '')); ?></h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#<?php echo e($translationFirst->id); ?>" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> <?php echo e(ucfirst($translationFirst->name)); ?></div>

                                    </div>
                                </a>
                            </li>
                        </ul>
                        <form method="post" id="myForm" action="<?php echo e($action ?? ''); ?>" enctype="multipart/form-data">

                            <?php echo $__env->make('components.admin.form.csrf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade show active" id="<?php echo e($translationFirst->id); ?>" role="tabpanel">
                                    <div class="card-body p-4">

                                        <div class="card-body p-4 row">
                                            <input type="hidden" name="category" value="<?php echo e(Request()->category ?? ''); ?>">
                                            <input type="hidden" name="project_id" value="<?php echo e(Request()->project_id); ?>">
                                            <input type="hidden" name="tabs_id" value="<?php echo e($tabs->id ?? ''); ?>">



                                            <!-- Repeater Items -->
                                            <div class="items" data-group="test">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div id="kt_repeater_1" class="repeater">
                                                            <div class="repeater-default" data-repeater-list="body">
                                                                <div class="row g-3" data-repeater-item>
                                                                    <div class="col-md-6 mb-2">
                                                                        <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'form-label','name' => 'Title  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'form-label','name' => 'Title  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('title.' . $translationFirst->key).'','name' => 'body[0][title]','type' => 'text','placeholder' => 'Title '.e(ucfirst($translationFirst->name)).'','value' => $StaticTable->translate(
                                                                                                            'title',
                                                                                                            $translationFirst->key,
                                                                                                        )]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('title.' . $translationFirst->key).'','name' => 'body[0][title]','type' => 'text','placeholder' => 'Title '.e(ucfirst($translationFirst->name)).'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate(
                                                                                                            'title',
                                                                                                            $translationFirst->key,
                                                                                                        ))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter Title  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter Title  '.e($translationFirst->name).'']); ?>
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
                                                                    <div class="col-md-6 mb-2">
                                                                        <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'type  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'type  '.e($translationFirst->name).'']); ?>
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
                                                                        <select class="form-select selectedTypes" name="body[0][type]" id="type">
                                                                            <option disabled selected>Choose Type
                                                                            </option>
                                                                            <?php $__currentLoopData = $getTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                        <?php if (isset($component)) { $__componentOriginal1719fcc38154baad93f627a80a957b58 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1719fcc38154baad93f627a80a957b58 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['name' => 'please enter type  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'please enter type  '.e($translationFirst->name).'']); ?>
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
                                                                    <input name="body[0][url]" type="search" placeholder="url <?php echo e($translationFirst->name); ?>" class="form-control valid col-12 " id="url">
                                                                    
                                                                    
                                                                    
                                                                    <?php if (isset($component)) { $__componentOriginal375f0ed4f8ee156e823aad8b1382f853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['model' => $StaticTable,'nameImage' => 'firstImage','old' => 'image','name' => 'body[0][image]','type' => 'file','readonly' => '','placeholder' => 'Please Enter Image','id' => 'image','class' => 'dropify','dataHeight' => '300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable),'nameImage' => 'firstImage','old' => 'image','name' => 'body[0][image]','type' => 'file','readonly' => '','placeholder' => 'Please Enter Image','id' => 'image','class' => 'dropify','DataHeight' => '300']); ?>
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
                                                                    
                                                                    <br><br>
                                                                    <div class="col-md-12 mb-2">
                                                                        <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'form-label','name' => 'Description  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'form-label','name' => 'Description  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.text','data' => ['old' => ''.e('description.' . $translationFirst->key).'','name' => 'body[0][description]','value' => $StaticTable->translate(
                                                                            'description',
                                                                            $translationFirst->key,
                                                                        )]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('description.' . $translationFirst->key).'','name' => 'body[0][description]','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate(
                                                                            'description',
                                                                            $translationFirst->key,
                                                                        ))]); ?>
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
                                                                    <div class='hr'>
                                                                        <hr>
                                                                    </div>
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-md font-weight-bolder btn-outline-danger">
                                                                            <i class="la la-close"></i>delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <!-- Repeater Add Button -->
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <a href="javascript:;" data-repeater-create="" class="btn btn-md font-weight-bolder btn-outline-dark">
                                                                        <i class=" bx bx-plus-medical"></i>
                                                                    </a>
                                                                </div>
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
<!-- Add this in your HTML head section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-a4n5LfkiMDqQFm6LOACvYPgeH6fP8w+D9FKPec+Vr+Mq4+fxS0vdLvgp97/BfUSoZ1LmVi2CpZbBz6a32Jn+Qg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-MHrEKoiNs0FXZMk9P0jK9FSjk1g/1jnmUlFCvtNSmOsBwnVz0hk8ZtsoeTeC8eN2YyEtE17arRC/Ud+wU0fA4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="<?php echo e(asset('admin/project/tabs/archive/js/create.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/nendemo2024/public_html/resources/views/admin/project/tabs/archive/create.blade.php ENDPATH**/ ?>