<?php /*主界面框架模板*/ ?>
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="/css/semantic.min.css">
    <?php /*//表明了所加载的CSS文件*/ ?>
</head>

<style>
    body  {
        /*background-image: url("http://img95.699pic.com/photo/50014/2560.jpg_wh300.jpg");*/
        /*background-color: #cccccc;*/
        /*background-size: cover;*/
    }
</style>

<?php /*加载自己的主界面标题内容*/ ?>
<div class="container">
    <?php echo $__env->yieldContent('_head'); ?>
</div>

<div class="ui grid">
    <?php /*次级导航栏*/ ?>
    <div id="aaa" class="three wide column">
        <div class='container'>
            <?php echo $__env->yieldContent('_left'); ?>
        </div>
    </div>
    <?php /**/ ?>

    <?php /*界面主内容*/ ?>
    <div id="m_m_m" class="eleven wide centered column">
        <div class='_main'>
            <?php echo $__env->yieldContent('_main'); ?>
        </div>
    </div>
    <?php /*<div class="one wide column">*/ ?>
        <?php /*<div class='container'>*/ ?>
            <?php /*<?php echo $__env->yieldContent('_right'); ?>*/ ?>
        <?php /*</div>*/ ?>
    <?php /*</div>*/ ?>
</div>


<?php /*加载框架自带的js文件*/ ?>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/semantic.min.js"></script>
<script type="text/javascript" src="/js/m_header.js"></script>

<?php /*加载自己独有的javascript*/ ?>
<div class="js_zj">
    <?php echo $__env->yieldContent('js_zj'); ?>
</div>

</body>

</html>