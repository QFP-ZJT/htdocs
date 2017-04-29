<?php /*html框架模版*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/semantic.min.css">

    <?php /*//表明了所加载的CSS文件*/ ?>
</head>

<body background="images/background.jpg">

<?php /*<?php $__env->startSection('sidebar'); ?>*/ ?>
    <?php /*This is the master sidebar.*/ ?>
<?php /*<?php echo $__env->yieldSection(); ?>*/ ?>


<?php /*加载自己的主界面内容*/ ?>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>

<div class = 'container'>
    <?php echo $__env->yieldContent('sidebar'); ?>
</div>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/semantic.min.js"></script>
<script type="text/javascript" src="/js/header.js"></script>

<?php /*加载自己独有的javascript*/ ?>
<div class="js_zj">
    <?php echo $__env->yieldContent('js_zj'); ?>
</div>

</body>

</html>