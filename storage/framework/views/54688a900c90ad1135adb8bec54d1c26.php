
<textarea rows="4"   id="<?php echo e($id??''); ?>" class="form-control" placeholder="<?php echo e($placeholder??''); ?>"  <?php echo e($required ?? ''); ?> name="<?php echo e(($name)??''); ?>" /><?php echo e(isset($value) ? $value : old($old??'')); ?></textarea>
<?php /**PATH /home2/nendemo2024/public_html/resources/views/components/admin/form/text.blade.php ENDPATH**/ ?>