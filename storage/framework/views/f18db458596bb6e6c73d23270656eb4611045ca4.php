<?php $__env->startSection('title'); ?>
    Welcome!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-6">
        <h3>登陆</h3>
        <form action = "<?php echo e(route('/')); ?>" method="post">
            <div class="form-group">
                <label for="email">请输入您的邮箱地址</label>
                <input class = "form-control" type="text" name="email" id = "email">
            </div>
            <div class="form-group">
                <label for="password">请输入您的密码</label>
                <input class = "form-control" type="password" name="password" id = "password">
            </div>
            <button class="btn btn-primary" type="submit">登陆</button>
        </form>
    </div>
    <div class="col-md-6">
        <h3>注册</h3>
        <form action = "<?php echo e(route('signUp')); ?>" method="post">
            <div class="form-group">
                <label for="email">请输入您的邮箱地址</label>
                <input class = "form-control" type="text" name="email" id = "email">
            </div>
            <div class="form-group">
                <label for="password">请输入您的密码</label>
                <input class = "form-control" type="password" name="password" id = "password">
            </div>
            <button class="btn btn-primary" type="submit">注册</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>