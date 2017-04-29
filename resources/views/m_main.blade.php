@extends('layouts.manager.main_se')

@section('title')
    小区物业管理系统主界面
@endsection

@section('_head'){{--主导航栏--}}
@include('component.manager.header')
@endsection

@section('_left'){{--次级导航栏--}}
@include('component.manager.sidegrid')
@endsection

@section('_main'){{--页面主显示区--}}
@include('component.manager.main_page')
@endsection

@section('js_zj'){{--加载私有js文件--}}

@endsection

