<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('admin.about.investors.manypost',$StaticTable->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="col-md-12 mb-4">
                        <?php if (isset($component)) { $__componentOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3a6bcdc49aa05a7873738ce3c8c8a35a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'form-label','name' => 'since']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'form-label','name' => 'since']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['required' => 'required','old' => ''.e('since').'','name' => ''.e('since').'','type' => 'number','placeholder' => 'since','class' => 'form-control valid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['required' => 'required','old' => ''.e('since').'','name' => ''.e('since').'','type' => 'number','placeholder' => 'since','class' => 'form-control valid']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter since']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter since']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'form-label','name' => 'sharing']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'form-label','name' => 'sharing']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['required' => 'required','old' => ''.e('sharing').'','name' => ''.e('sharing').'','type' => 'number','placeholder' => 'sharing','class' => 'form-control valid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['required' => 'required','old' => ''.e('sharing').'','name' => ''.e('sharing').'','type' => 'number','placeholder' => 'sharing','class' => 'form-control valid']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['star' => '*','name' => 'please enter sharing']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','name' => 'please enter sharing']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['required' => '','old' => ''.e('sort').'','name' => ''.e('sort').'','type' => 'number','placeholder' => 'sort','class' => 'form-control valid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['required' => '','old' => ''.e('sort').'','name' => ''.e('sort').'','type' => 'number','placeholder' => 'sort','class' => 'form-control valid']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-end','data' => ['name' => 'please enter sort']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-end'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'please enter sort']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.label-first','data' => ['star' => '*','class' => 'col-sm-3 col-form-label','name' => 'File Upload Country']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.label-first'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['star' => '*','class' => 'col-sm-3 col-form-label','name' => 'File Upload Country']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.form.input','data' => ['required' => 'required','nameImage' => 'country','old' => 'image2','name' => 'image2','type' => 'file','readonly' => '','placeholder' => 'Please Enter Image','id' => 'image','class' => 'dropify','dataHeight' => '300','accept' => '.jpg, .png, image/jpeg, image/png']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('admin.form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['required' => 'required','nameImage' => 'country','old' => 'image2','name' => 'image2','type' => 'file','readonly' => '','placeholder' => 'Please Enter Image','id' => 'image','class' => 'dropify','DataHeight' => '300','accept' => '.jpg, .png, image/jpeg, image/png']); ?>
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
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            
        </div>
    </div>
</div><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/admin/about/investors/modal/modal.blade.php ENDPATH**/ ?>