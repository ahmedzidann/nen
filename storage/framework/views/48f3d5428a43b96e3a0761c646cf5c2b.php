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
                                <a class="nav-link <?php echo e($loop->first?'active':''); ?>" data-bs-toggle="tab"
                                    href="#<?php echo e($item->id); ?>" role="tab" aria-selected="true">
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
                        <form method="post" id="myForm<?php echo e($key); ?>" action="<?php echo e($action??''); ?>"
                            enctype="multipart/form-data">
                            <?php echo $__env->make('components.admin.form.csrf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade <?php echo e($loop->first?'show active':''); ?>" id="<?php echo e($item->id); ?>"
                                    role="tabpanel">
                                    <div class="card-body p-4">
                                        
                                        <div class="card-body p-4 row">
                                            
                                            <input type="hidden" name="pages_id" value="<?php echo e($SelectPages->id ?? ''); ?>">
                                            <input type="hidden" name="category"
                                                value="<?php echo e(Request()->category ?? ''); ?>">
                                            <input type="hidden" name="subcategory"
                                                value="<?php echo e(Request()->subcategory ?? ''); ?>">
                                            <input type="hidden" name="item" value="<?php echo e(Request()->item ?? ''); ?>">
                                            
                                            <div class="col-md-12 mb-4">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('title.'.$translationFirst->key).'','name' => ''.e('title'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'Title '.e($translationFirst->name).'','class' => 'form-control valid','value' => $StaticTable->translate('title', $translationFirst->key)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('title.'.$translationFirst->key).'','name' => ''.e('title'.'['.$translationFirst->key.']').'','type' => 'text','required' => '','placeholder' => 'Title '.e($translationFirst->name).'','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate('title', $translationFirst->key))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter title  '.e($translationFirst->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter title  '.e($translationFirst->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'form-label','name' => 'Description  '.e($item->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'form-label','name' => 'Description  '.e($item->name).'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.text','data' => ['old' => ''.e('description.'.$item->key).'','name' => ''.e('description'.'['.$item->key.']').'','type' => 'text','placeholder' => 'Description '.e(ucfirst($item->name)).'','value' => $StaticTable->translate('description', $item->key)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('description.'.$item->key).'','name' => ''.e('description'.'['.$item->key.']').'','type' => 'text','placeholder' => 'Description '.e(ucfirst($item->name)).'','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->translate('description', $item->key))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter Name  '.e($item->name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter Name  '.e($item->name).'']); ?>
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
                                            
                                            
                                            <?php if(Request()->category == 'about' && Request()->subcategory == 'identity'
                                            && Request()->item == 'section-one'): ?>
                                            <?php else: ?>
                                            <?php if($loop->first): ?>
                                            <div class="col-md-12 mb-4">
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['old' => ''.e('sort').'','name' => ''.e('sort').'','type' => 'number','required' => '','placeholder' => 'sort','class' => 'form-control valid','value' => $StaticTable->sort]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['old' => ''.e('sort').'','name' => ''.e('sort').'','type' => 'number','required' => '','placeholder' => 'sort','class' => 'form-control valid','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->sort)]); ?>
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
                                            <div class="col-md-12 mb-4">
                                                <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'col-sm-3 col-form-label','name' => 'File Upload Image']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'col-sm-3 col-form-label','name' => 'File Upload Image']); ?>
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
                                                    <?php if (isset($component)) { $__componentOriginal375f0ed4f8ee156e823aad8b1382f853 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal375f0ed4f8ee156e823aad8b1382f853 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['model' => $StaticTable,'nameImage' => 'StaticTable','old' => 'image','name' => 'image','type' => 'file','readonly' => '','placeholder' => 'Please Enter Image','id' => 'image','class' => 'dropify','dataHeight' => '300','accept' => '.jpg, .png, image/jpeg, image/png']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable),'nameImage' => 'StaticTable','old' => 'image','name' => 'image','type' => 'file','readonly' => '','placeholder' => 'Please Enter Image','id' => 'image','class' => 'dropify','DataHeight' => '300','accept' => '.jpg, .png, image/jpeg, image/png']); ?>
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
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            
                                            <?php if($loop->first): ?>
                                            
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.radio','data' => ['checked' => $StaticTable->status==$status?'checked':'','name' => 'status','value' => ''.e($status).'','model' => $StaticTable]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.radio'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['checked' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable->status==$status?'checked':''),'name' => 'status','value' => ''.e($status).'','model' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($StaticTable)]); ?>
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
                                            

                                            <?php endif; ?>
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
<script src="<?php echo e(asset('admin/about/identity/js/edit.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/admin/about/identity/edit_sectionThree.blade.php ENDPATH**/ ?>