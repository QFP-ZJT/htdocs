<!DOCTYPE html>
<html lang="en" xmlns:background-image="http://www.w3.org/1999/xhtml">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/semantic.min.css">

    {{--//表明了所加载的CSS文件--}}
</head>

<style>
    body {
        background-image: url("http://www.cjdesign.cn/ProductPhoto/%E6%96%B0%E6%B2%82%E5%9B%9B%E5%AD%A3%E9%98%B3%E5%85%89%E5%B0%8F%E5%8C%BA%EF%BC%88%E5%B0%8F%EF%BC%89.jpg");
        background-color: #cccccc;
        background-size: cover;
    }
</style>


</br>
</br>
</br>
<h1 class="ui green centered grid header">欢迎访问小区物业管理系统</h1>
</br>
</br>
<div class='ui four column grid'>

    <div class="column"></div>
    <div class=" eight wide column">
        <div class="ui styled fluid accordion">
            {{--TODO 业主登陆--}}
            <div class="title">
                <i class="dropdown icon"></i>
                <h2 class="ui blue centered grid header">业主登陆</h2>
            </div>
            <div class="content">
                <?php
                if ($status == 11)
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
</div>';
                if ($status == 3)
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
                <div class="ui segment">
                    <div class="_login">
                        <form class="ui form" action='owner_logIn' method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            {{--TODO 业主注册--}}
            <div class="title">
                <i class="dropdown icon"></i>
                <h2 class="ui blue centered grid header">业主注册</h2>
            </div>
            <div class="content">
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
                <div class="ui segment">

                    <div class="register">
                        <form class="ui form" action='owner_Register' method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class='two fields'>
                                <div class="field">
                                    <label>身份证号</label>
                                    <input name="owner_id" type="text">
                                </div>
                                <div class="field">
                                    <label>姓名</label>
                                    <input name="name" type="text">
                                </div>

                            </div>
                            <div class="two fields">
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

                            </div>
                            <div class="two fields">
                                <div class="field">
                                    <label>邮箱</label>
                                    <input name="email" type="text">
                                </div>
                                <div class="field">
                                    <label>工作</label>
                                    <input name="work" type="text">
                                </div>
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
            {{--TODO 管理员登陆--}}
            <div class="title">
                <i class="dropdown icon"></i>
                <h2 class="ui blue centered grid header">管理员登陆</h2>
            </div>
            <div class="content">
                <?php
                if ($status == 12)
                    echo '<div id = "error" class="ui basic modal">
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
</div>';
                ?>
                <div class="column">
                    <div class="ui segment">
                        <div class="_login">
                            <form class="ui form" action='/manager/login' method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            </div>
        </div>
    </div>
    <div class="column"></div>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/semantic.min.js"></script>
<script type="text/javascript" src="/js/header.js"></script>
<script>
    $(document).ready(function () {
        console.log('js已启动')
        $('#error').modal('show');
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
        $('.ui.accordion').accordion("close others", {
            selector: {
                trigger: '.title .icon'
            }
        })
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
            })
    })

</script>
</body>
</html>
