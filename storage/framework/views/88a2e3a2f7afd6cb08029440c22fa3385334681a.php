<?php $__env->startSection('content'); ?>
    <form class="col-8 top-buffer mx-auto" action="<?php echo e(url('search')); ?>">
        <input id="search" class="form-control mr-sm-2" type="search" placeholder="Suchen" name="search">
    </form>
    <div id="searchOutput" class="top-buffer"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>