<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <?php $__currentLoopData = $hs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <h1><?php echo e($h->name); ?></h1>
                            <h4>Standort: <?php echo e($h->standort); ?></h4>
                            <p><?php echo e($h->text); ?></p>
                        </div>
                        <div
                                class="ldBar label-center col-md-6"
                                style="width:auto;height:250px;margin:auto"
                                data-value="<?php echo e($h->ranking); ?>"
                                data-preset="circle"
                                data-stroke="#004561"
                        ></div>
                    </div>
                    <div class="row top-buffer">
                        <div class="mx-auto">
                            <a href="<?php echo e($h->url); ?>">Webseite</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>