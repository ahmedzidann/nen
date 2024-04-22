
<?php $__env->startSection('parent_page_name',"Projects"); ?>
<?php $__env->startSection('page_name', ucwords($slug)); ?>
<?php $__env->startSection('websiteStyle'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if (isset($component)) { $__componentOriginalddd3225e29c94d5b563a98721dacbe29 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalddd3225e29c94d5b563a98721dacbe29 = $attributes; } ?>
<?php $component = App\View\Components\Frontend\Projects\ViewProjects::resolve(['slug' => $slug,'id' => $id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.projects.view-projects'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Frontend\Projects\ViewProjects::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalddd3225e29c94d5b563a98721dacbe29)): ?>
<?php $attributes = $__attributesOriginalddd3225e29c94d5b563a98721dacbe29; ?>
<?php unset($__attributesOriginalddd3225e29c94d5b563a98721dacbe29); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalddd3225e29c94d5b563a98721dacbe29)): ?>
<?php $component = $__componentOriginalddd3225e29c94d5b563a98721dacbe29; ?>
<?php unset($__componentOriginalddd3225e29c94d5b563a98721dacbe29); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>  
<?php $__env->startSection('websiteStyle'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\nen\resources\views/user/projects/viewProjects.blade.php ENDPATH**/ ?>