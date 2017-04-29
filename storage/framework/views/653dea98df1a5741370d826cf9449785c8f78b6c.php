<?php $__env->startSection('title'); ?>
    小区物业管理系统主界面
<?php $__env->stopSection(); ?>

<?php $__env->startSection('_head'); ?><?php /*主导航栏*/ ?>
<?php echo $__env->make('component.manager.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('_left'); ?><?php /*次级导航栏*/ ?>
<?php echo $__env->make('component.manager.sidegrid', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('_main'); ?><?php /*页面主显示区*/ ?>
<?php echo $__env->make('component.manager.main_page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_zj'); ?><?php /*加载私有js文件*/ ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.manager.main_se', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>