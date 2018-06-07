<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'EduShare')); ?></title>

    <!-- Styles -->
    <!--<link rel="stylesheet" href="/css/app.css">-->
    <link rel="icon" href="/image/Logosmall.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/customcss.css">
    <link rel="stylesheet" href="/css/loading-bar.css">
    <link rel="stylesheet" type="text/css"
          href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css"/>


</head>
<body>
<?php echo $__env->make('inc.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="app">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script src="/js/cookies.js"></script>
<script src="/js/loading-bar.js"></script>
<script src="/js/liveSearch.js"></script>
</body>
</html>