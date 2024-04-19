<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete<i class="fadeIn animated bx bx-trash"></i></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('admin.about.investors.manydelete',$StaticTable->id)); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
                <div class="modal-body">
                        <?php echo e(__('Are you sure you want to delete?')); ?>

                    <input type="hidden" value="" name="id" id="id">                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save<i class="fadeIn animated bx bx-trash"></i></button>
                </div>
            </form>
            
        </div>
    </div>
</div><?php /**PATH D:\xampp8.2\htdocs\nen\resources\views/admin/about/investors/modal/delete.blade.php ENDPATH**/ ?>