<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.form_errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <?php echo Form::open(['id'=> 'post-question-form']); ?>


                    <?php echo Form::label('title','Title'); ?>

                    <?php echo Form::text('title',null, ['id' => 'title', 'class'=>'form-control','placeholder'=>'title','required']); ?>

                    <br/>
                    <?php echo Form::label('category','Category'); ?>

                    <select name="category" class="form-control">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <br/>
                    <?php echo Form::label('body','Body'); ?>

                    <?php echo Form::textarea('body',null, ['id' => 'body','class'=>'form-control','placeholder' => 'Bitte geben Sie Ihren Text ein','required']); ?>

                    <br/>
                    <?php echo Form::button('Post', ['class' => 'btn btn-lg btn-primary btn-block', 'type' =>'submit']); ?>


                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>