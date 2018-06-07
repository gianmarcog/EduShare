<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Aktivitäten</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Aktivität</th>
                        <th id="column" class="notmobile">Standort</th>
                        <th id="column">Ranking</th>
                        <th id="detail">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $a; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td id="column"> <?php echo e($h->name); ?> </td>
                            <td id="column" class="notmobile"> <?php echo e($h->standort); ?></td>
                            <td id="column"> <?php echo e($h->ranking); ?></td>
                            <td>
                                <form action="/aktivitaet/<?php echo e($h->id); ?>">
                                    <button type="submit" class="btn btn-primary btn-url">Informationen</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>