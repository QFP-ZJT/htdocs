<?php $__env->startSection('title'); ?>
    Welcome!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-6">
        <form action = "#" method="post">
            <div class="form-group">
                <label for="email">请输入您的邮箱地址</label>
                <input class = "form-control" type="text" name="email" id = "email">
            </div>
            <div class="form-group">
                <label for="password">请输入您的密码</label>
                <input class = "form-control" type="password" name="password" id = "password">
            </div>
            <button class="btn btn-primary" type="submit">登陆</button>
            <div>
                <p>还没有账号,注册</p>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action = "#" method="post">
            <div class="form-group">
                <label for="email">请输入您的邮箱地址</label>
                <input class = "form-control" type="text" name="email" id = "email">
            </div>
            <div class="form-group">
                <label for="password">请输入您的密码</label>
                <input class = "form-control" type="password" name="password" id = "password">
            </div>
            <button class="btn btn-primary" type="submit">登陆</button>
            <div>
                <p>还没有账号,注册</p>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>