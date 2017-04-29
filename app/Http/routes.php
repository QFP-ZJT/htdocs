<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
*/
//TODO 路由控制文件

//欢迎界面
Route::get('/', function () {
    return view('welcome')->with('status',-1);
});


//进入登陆界面
Route::group(['middleware' => ['web']], function () {
    // your routes here
//个人信息查看
    Route::any('/person_see', function () {
        return view('person_see');
    });
//个人信息更改
    Route::any('/person_modify', function () {
        return view('person_modify');
    });
    Route::any('/login', function () {
        return view('login')->with('status', -1);
    });
    //进入登陆验证界面
    Route::post('owner_logIn', 'Ownercontroller@loginIn');
    Route::post('owner_Register', 'Ownercontroller@Register');

//进入注册界面
    Route::any('/register', function () {
        return view('register')->with('status', -1);;
    });
//个人信息查看
    Route::get('/person/info', 'Ownercontroller@getp_info');
//房屋信息查询
    Route::get('/person/house', 'Ownercontroller@getp_house');
//个人信息修改
    Route::get('/person/info_change', 'Ownercontroller@p_info_change');
//个人密码修改
    Route::get('/person/info_pw_change', 'Ownercontroller@p_info_pw_change');
//水费查询
    Route::get('/price', 'Ownercontroller@pr_check');
    Route::get('/fee_check', 'Ownercontroller@fee_check');
    Route::get('/fee_up', 'Ownercontroller@fee_up');

});

Route::group(['middleware' => ['web']], function () {
    Route::post('/manager/login', 'ManagerController@login');
    Route::any('/m_login', function () {
        return view('m_login')->with('status', 1);
    });
    Route::get('/manager/info', 'ManagerController@getp_info');
    Route::get('/manager/info_change', 'ManagerController@p_info_change');
    Route::get('/manager/info_pw_change', 'ManagerController@p_info_pw_change');

    Route::get('/house/check', 'ManagerController@house_check');
    Route::get('/house/check/change', 'ManagerController@house_checkforchange');
    Route::get('/owner/check', 'ManagerController@owner_check');
    Route::get('/price/modify', 'ManagerController@price_modify');
    //
    Route::get('/amount/check', 'ManagerController@amount_check');
    Route::get('/amount/update', 'ManagerController@amount_update');
    Route::get('/manager/search', 'ManagerController@search');
    Route::get('/manager/fee_check', 'ManagerController@fee_check');
    Route::get('/house/new_owner', 'ManagerController@house_new_owner');
    Route::get('/ducu', 'ManagerController@ducu');
});
