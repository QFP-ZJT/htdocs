<?php $__env->startSection('title', '登录'); ?>

<?php $__env->startSection('content'); ?>
    <?php
    if ($status == 0)
        echo '<div id = "error" class="ui eerror basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    登录失败
  </div>
  <div class="content">
    <p>您的账号和密码不匹配</p>
  </div>
  <div class="actions">
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      重新登录
    </div>
  </div>
</div>';if ($status == 3)
        echo '<div id = "error" class="ui eerror basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    注册成功
  </div>
  <div class="content">
    <p>欢迎使用</p>
  </div>
  <div class="actions">
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      进行登陆
    </div>
  </div>
</div>';
    ?>
    <div class="ui three column grid">
        <div class="column">
        </div>
        <div class="column">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2 class="ui blue centered grid header">欢迎登陆小区物业管理系统</h2>
            <br>
            <br>
            <br>
            <div class="ui segment">

                <div class="_login">
                    <form class="ui form" action='owner_logIn' method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="field">
                            <label>邮箱</label>
                            <input name="email" type="text">
                        </div>
                        <div class="field">
                            <label>密码</label>
                            <input name="password" type="password">
                        </div>
                        <div class="ui blue submit button">登录</div>
                        <div class="ui reset right floated button">重置</div>
                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="column">
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_zj'); ?>
    <?php /*TODO js检查仍然有*/ ?>
    <script>
        $(document).ready(function () {
            console.log('js已启动')
            $('.eerror').modal('show');
            $('._login .form')
                .form({
                    on: 'blur',
                    fields: {
                        email: {
                            identifier: 'email',
                            rules: [
                                {
                                    type: 'email',
                                    prompt: '请输入合法的邮箱'
                                }
                            ]
                        }
                    }
                });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master_semantic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>