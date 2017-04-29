<?php echo $__env->make('component.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php /*加载了导航栏*/ ?>

<?php $__env->startSection('title'); ?>
    小区物业管理系统
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <p>你好</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master_semantic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>