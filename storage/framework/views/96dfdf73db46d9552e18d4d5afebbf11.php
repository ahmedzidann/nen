
<?php $__env->startSection('titleadmin'); ?>
<?php echo e(str_replace("-"," ",ucfirst(TranslationHelper::translate($viewTable.' '.$type)))); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('cssadmin'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentadmin'); ?>
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <?php if (isset($component)) { $__componentOriginala1ba9cf9e0d37b4fbf312bf08317c532 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala1ba9cf9e0d37b4fbf312bf08317c532 = $attributes; } ?>
<?php $component = App\View\Components\Admin\CustomizeBreadcrumb::resolve(['name' => $viewTable,'routeView' => $routeView,'type' => 'Edit'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                <h6 class="mb-0 text-uppercase"><?php echo e(TranslationHelper::translate(ucfirst('Nav Tabs')??'')); ?></h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-danger" role="tablist">
                            <?php $__currentLoopData = $translation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo e($loop->first?'active':''); ?>" data-bs-toggle="tab" href="#<?php echo e($item->id); ?>" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                        </div>
                                        <div class="tab-title"> <?php echo e(ucfirst($item->name)); ?></div>

                                    </div>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <input type="hidden" id="key_new" value="<?php echo e($translation->count()); ?>">
                        <?php $__currentLoopData = $translation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="post" id="myForm<?php echo e($key); ?>" action="<?php echo e($action??''); ?>" enctype="multipart/form-data">
                            <?php echo $__env->make('components.admin.form.csrf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade <?php echo e($loop->first?'show active':''); ?>" id="<?php echo e($item->id); ?>" role="tabpanel">
                                    <div class="card-body p-4">
                                        
                                        <div class="card-body p-4 row">
                                            
                                            <input type="hidden" name="category" value="<?php echo e(Request()->category ?? ''); ?>">
                                            
                                            

                                            <!-- Repeater Html Start -->
                                            <div id="repeater">
                                                <!-- Repeater Heading -->



                                                <!-- Repeater Items -->
                                                <div class="items" data-group="test">

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <!-- Repeater Content -->

                                                            <div class="repeater item-content row">
                                                                <br>
                                                                <div class="col-md-12 mb-2">
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
                                                                     <select class="form-select" id="type" name="type" onchange="types()">
                                                                        <option disabled>Choose Type</option>
                                                                        <?php $__currentLoopData = $getTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>" <?php echo e(($StaticTable->type == $key) ? 'selected' : ""); ?>><?php echo e($value); ?></option>
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
                                                               


                                                            <div class="col-md-12 mb-2 url" id="link">
                                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'url  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'url  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('url.' . $translationFirst->key).'','id' => 'url','name' => ''.e('url' . '[' . $translationFirst->key . ']').'','type' => 'search','placeholder' => 'url '.e($translationFirst->name).'','class' => 'form-control valid','value' => $StaticTable->translate(
                                                                            'url',
                                                                            $translationFirst->key,
                                                                        )]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('url.' . $translationFirst->key).'','id' => 'url','name' => ''.e('url' . '[' . $translationFirst->key . ']').'','type' => 'search','placeholder' => 'url '.e($translationFirst->name).'','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate(
                                                                            'url',
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['name' => 'please enter url  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'please enter url  '.e($translationFirst->name).'']); ?>
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
                                                            
                                                            <div class="col-md-12 mb-2 upload" id="upload">
                                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'upload  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'upload  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['model' => $StaticTable,'nameImage' => 'firstFile','old' => 'image','name' => 'image','type' => 'file','readonly' => '','placeholder' => 'Please Enter Pdf','id' => 'image','class' => 'dropify','dataHeight' => '300']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable),'nameImage' => 'firstFile','old' => 'image','name' => 'image','type' => 'file','readonly' => '','placeholder' => 'Please Enter Pdf','id' => 'image','class' => 'dropify','DataHeight' => '300']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['name' => 'please enter upload  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'please enter upload  '.e($translationFirst->name).'']); ?>
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
                                                                <a class="button" class="dropdown-item d-flex align-items-center" href="<?php echo e(route("admin.tabproject.archiveDownload",$StaticTable->id)); ?>"><span style="color:blue;font-weight:bold"><i class="bx bx-download fs-5"></i><span> Downloads</span></span></a>
                                                                <br>
                                                            </div>
                            

                                                        <div class="col-md-12 mb-2">
                                                            <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'title  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'title  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('title.'.$translationFirst->key).'','name' => ''.e('title'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'title '.e($translationFirst->name).'','class' => 'form-control valid','value' => $StaticTable->translate('title', $translationFirst->key)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('title.'.$translationFirst->key).'','name' => ''.e('title'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'title '.e($translationFirst->name).'','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate('title', $translationFirst->key))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['name' => 'please enter title  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'please enter title  '.e($translationFirst->name).'']); ?>
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
                                                        <div class="col-md-12 mb-2">
                                                            <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['class' => 'form-label','name' => 'description  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'form-label','name' => 'description  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('description.'.$translationFirst->key).'','name' => ''.e('description'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'description '.e($translationFirst->name).'','class' => 'form-control valid','value' => $StaticTable->translate('description', $translationFirst->key)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('description.'.$translationFirst->key).'','name' => ''.e('description'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'description '.e($translationFirst->name).'','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate('description', $translationFirst->key))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['name' => 'please enter description  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'please enter description  '.e($translationFirst->name).'']); ?>
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
                                                    </div>
                                                    <!-- Repeater Remove Btn -->

                                                </div>
                                            </div>

                                        </div>




                                    </div>
                                    <!-- Repeater End -->

                                    


                                    <input type="hidden" name="submit2" value="<?php echo e($item->key); ?>">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<!--end row-->
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsadmin'); ?>


<script src="<?php echo e(asset('admin/project/tabs/archive/js/edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/nendemo2024/public_html/resources/views/admin/project/tabs/archive/edit.blade.php ENDPATH**/ ?>