@extends('views.layouts.client.master_semantic')

@section('title', '登录')

@section('content')
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
            <h2 class="ui blue centered grid header">欢迎使用小区物业管理系统</h2>
            <br>
            <br>
            <br>
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
        <div class="column">
        </div>
    </div>

@endsection

@section('js_zj')
    {{--TODO js检查仍然有--}}
    <script>
        $(document).ready(function () {
            console.log('js已启动')

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
@endsection
