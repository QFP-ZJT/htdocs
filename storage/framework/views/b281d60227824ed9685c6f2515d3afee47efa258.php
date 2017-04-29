<?php $__env->startSection('title', '注册'); ?>

<?php $__env->startSection('content'); ?>
    <?php
    if ($status == 1)
        echo '<div id = "error" class="ui eerror basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    注册失败
  </div>
  <div class="content">
    <p>邮箱已经被使用</p>
  </div>
  <div class="actions">
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      重新输入
    </div>
  </div>
</div>';if ($status == 2)
        echo '<div id = "error" class="ui eerror basic modal">
  <div class="ui icon header">
    <i class="archive icon"></i>
    注册失败
  </div>
  <div class="content">
    <p>该身份证号已被使用</p>
  </div>
  <div class="actions">
    <div class="ui green ok inverted button">
      <i class="checkmark icon"></i>
      重新输入
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
            <h2 class="ui blue centered grid header">欢迎注册小区物业管理系统</h2>
            <br>
            <br>
            <br>
            <div class="ui segment">

                <div class="register">
                    <form class="ui form" action='owner_Register' method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="field">
                            <label>身份证号</label>
                            <input name="owner_id" type="text">
                        </div>
                        <div class="field">
                            <label>姓名</label>
                            <input name="name" type="text">
                        </div>
                        <div class="field">
                            <label>性别</label>
                            <select name="sex" class="ui dropdown">
                                <option value="">选择</option>
                                <option value="男">男</option>
                                <option value="女">女</option>
                            </select>
                        </div>
                        <div class="field">
                            <label>手机号</label>
                            <input name="phone" type="text">
                        </div>
                        <div class="field">
                            <label>邮箱</label>
                            <input name="email" type="text">
                        </div>
                        <div class="field">
                            <label>工作</label>
                            <input name="work" type="text">
                        </div>
                        <div class="field">
                            <label>密码</label>
                            <input name="p" type="password">
                        </div>
                        <div class="field">
                            <label>密码确认</label>
                            <input name="password" type="password">
                        </div>
                        <div class="ui blue submit button">注册</div>
                        <div class="ui reset right floated button">重置</div>
                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="column">
        </div>
    </div>
    <script>
        $(document).ready(function () {
            console.log('js ')
            $('.eerror').modal('show');
            $('.dropdown').dropdown();
            $('.ui.checkbox').checkbox();
            $('.register .form')
                .form({

                    fields: {
                        owner_id: {
                            identifier: 'owner_id',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: '身份证号不能为空'
                                }
                            ]
                        }, name: {
                            identifier: 'name',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: '姓名不能为空'
                                }
                            ]
                        }, phone: {
                            identifier: 'phone',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: '手机号不能为空'
                                }, {
                                    type: 'number',
                                    prompt: '请输入合法的手机号'
                                }
                            ]
                        }, email: {
                            identifier: 'email',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: '手机号不能为空'
                                }, {
                                    type: 'email',
                                    prompt: '请输入合法的邮箱'
                                }
                            ]
                        }, p: {
                            identifier: 'p',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: '密码不能为空'
                                }
                            ]
                        }, password: {
                            identifier: 'password',
                            rules: [
                                {
                                    type: 'match[p]',
                                    prompt: '两次输入的密码不一致'
                                }
                            ]
                        },


                        work: {
                            identifier: 'work',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: '工作不能为空'
                                }
                            ]
                        },

                    }, inline: true, on: 'blur'
                });
        })
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_zj'); ?>
    <?php /*TODO js检查仍然有*/ ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master_semantic', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>