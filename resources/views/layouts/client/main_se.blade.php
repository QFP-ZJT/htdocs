{{--主界面框架模板--}}
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/semantic.min.css">
    {{--//表明了所加载的CSS文件--}}
</head>

<style>
    body  {
        /*background-image: url("https://cdn.pixabay.com/photo/2016/06/21/20/30/boards-1471887__340.jpg");*/
        /*background-color: ;*/
    }
</style>



{{--加载自己的主界面标题内容--}}
<div class="container">
    @yield('_head')
</div>

<div class="ui grid">
    {{--次级导航栏--}}
    <div  id = 'aaa' class="four wide column">
        <div class='container'>
            @yield('_left')
        </div>
    </div>
    {{----}}

    {{--界面主内容--}}
    <div class="eleven wide column">
        <div class='_main'>
            @yield('_main')
        </div>
    </div>
    {{--<div class="one wide column">--}}
        {{--<div class='container'>--}}
            {{--@yield('_right')--}}
        {{--</div>--}}
    {{--</div>--}}
</div>

{{--加载框架自带的js文件--}}
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/semantic.min.js"></script>
<script type="text/javascript" src="/js/header.js"></script>

{{--加载自己独有的javascript--}}
<div class="js_zj">
    @yield('js_zj')
</div>


</body>

</html>