{{--html框架模版--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/semantic.min.css">

    {{--//表明了所加载的CSS文件--}}
</head>

<body background="images/background.jpg">

{{--@section('sidebar')--}}
    {{--This is the master sidebar.--}}
{{--@show--}}


{{--加载自己的主界面内容--}}
<div class="container">
    @yield('content')
</div>

<div class = 'container'>
    @yield('sidebar')
</div>

<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/semantic.min.js"></script>
<script type="text/javascript" src="/js/header.js"></script>

{{--加载自己独有的javascript--}}
<div class="js_zj">
    @yield('js_zj')
</div>

</body>

</html>