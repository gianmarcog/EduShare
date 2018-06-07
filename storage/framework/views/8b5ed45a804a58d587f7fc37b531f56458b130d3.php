<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12 ml-3">
                <div class="row">
                    <h1 class="top-buffer">Hallo <?php echo e(Auth::user()->name); ?>!</h1>
                </div>
                <div class="row">
                    <h2>Du kannst folgendes bewerten: </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container top-buffer">
        <div class="row">
            <div class="col-12">
                <h3>Deine Hochschule</h3>
                <form class="form-horizontal" method="POST" action="<?php echo e(route('bewerten')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <table class="table">
                        <thead>
                        <tr>
                            <th id="column">Name</th>
                            <th id="column" class="notmobile">Standort</th>
                            <th id="column">Deine Bewertung</th>
                            <th id="column">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="column"> <?php echo e($h->name); ?> </td>
                            <input type='hidden' name="name" value="<?php echo e($h->name); ?>"/>
                            <td id="column" class="notmobile"> <?php echo e($h->standort); ?></td>
                            <td id="bewertung"><input id="bewertungH" type="number" class="form-control"
                                                      name="bewertung"
                                                      <?php if($bewertungHochschule->bewertung ==='nicht bewertet'): ?>
                                                      placeholder="<?php echo e($bewertungHochschule->bewertung); ?>"
                                                      <?php else: ?>
                                                      value="<?php echo e($bewertungHochschule->bewertung); ?>"
                                                      disabled
                                                      <?php endif; ?>
                                                      required></td>
                            <?php if($errors->has('bewertungH')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('bewertungH')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <td>
                                <button type="submit" class="btn btn-primary"
                                        <?php if($bewertungHochschule->bewertung !=='nicht bewertet'): ?>
                                        disabled
                                        <?php endif; ?>
                                >Bewerten
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Vorlesungen der <?php echo e($h->name); ?></h3>
                <form class="form-horizontal" method="POST" action="<?php echo e(route('bewerten')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <table class="table">
                        <thead>
                        <tr>
                            <th id="column">Name</th>
                            <th id="column" class="notmobile">Professor</th>
                            <th id="column">Deine Bewertung</th>
                            <th id="detail">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $vs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td id="column"> <?php echo e($v->name); ?></td>
                                <input type='hidden' name="name" value="<?php echo e($v->name); ?>"/>
                                <td id="column" class="notmobile"> <?php echo e($v->professor); ?></td>
                                <td id="bewertung"><input id="bewertungV" type="number" class="form-control"
                                                          name="bewertung"
                                                          <?php $__currentLoopData = $bewertungen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bewertung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <?php if($bewertung->bezeichnung === $v->name): ?>
                                                          value="<?php echo e($bewertung->bewertung); ?>"
                                                          disabled
                                                          <?php else: ?>
                                                          placeholder="nicht bewertet"
                                                          <?php endif; ?>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          required>
                                </td>
                                <?php if($errors->has('bewertungV')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('bewertungV')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <td>
                                    <button
                                            <?php if($bewertung->bezeichnung === $v->name): ?>
                                            disabled
                                            <?php endif; ?>
                                            type="submit"
                                            class="btn btn-primary">Bewerten
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Aktivitäten</h3>
                <form class="form-horizontal" method="POST" action="<?php echo e(route('bewerten')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <table class="table">
                        <thead>
                        <tr>
                            <th id="column">Aktivität</th>
                            <th id="column" class="notmobile">Standort</th>
                            <th id="column">Deine Bewertung</th>
                            <th id="detail">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $as; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td id="column"> <?php echo e($a->name); ?> </td>
                                <input type='hidden' name="name" value="<?php echo e($a->name); ?>"/>
                                <td id="column" class="notmobile"> <?php echo e($a->standort); ?></td>
                                <td id="bewertung"><input id="bewertungA" type="number" class="form-control"
                                                          name="bewertung"
                                                          <?php $__currentLoopData = $bewertungen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bewertung): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <?php if($bewertung->bezeichnung === $a->name): ?>
                                                          value="<?php echo e($bewertung->bewertung); ?>"
                                                          disabled
                                                          <?php else: ?>
                                                          placeholder="nicht bewertet"
                                                          <?php endif; ?>
                                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          required>
                                <?php if($errors->has('bewertungA')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('bewertungA')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                <td>
                                    <button
                                            <?php if($bewertung->bezeichnung === $a->name): ?>
                                            disabled
                                            <?php endif; ?>
                                            type="submit"
                                            class="btn btn-primary">Bewerten
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>