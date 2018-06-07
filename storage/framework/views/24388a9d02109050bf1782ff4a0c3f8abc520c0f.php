<?php if(Session::get('errors')): ?>
    <div id="form-errors" class="bg-danger">
        <ul>
            <?php $__currentLoopData = Session::get('errors')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>