<?php

namespace App\Http\Controllers;

use App\fee;
use App\Models\M3Result;
use App\owner;
use App\house;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class OwnerController extends Controller
{
    public function loginIn(Request $request)
    {
        Session::put('email', $request['email']);//添加session记录用户的邮箱编号
        $owner = new owner();
        $re = $owner->login_check($request['email'], $request['password']);
        if ($re != 'false')
            return view('main')->with('name', $re);
        else
            return view('welcome')->with('status',11);
    }

    public function Register(Request $request)
    {
        Session::put('email', $request['email']);//添加session记录用户的邮箱编号
        $owner = new owner();
        $re = $owner->Register($request);

        if ($re == 3)
            return view('welcome')->with('status', $re);
        else
            return view('welcome')->with('status', $re);
    }

//   个人信息查看
    public function getp_info(Request $request)
    {


        $M3Result = new M3Result();
        $owner = new owner();
        $M3Result->message = $owner->getp_info($request->session()->get('email'));
        $M3Result->status = 100;
        return $M3Result->toJson();

    }

//  房屋信息查询
    public function getp_house(Request $request)
    {
        $M3Result = new M3Result();
        $house = new house();
        $M3Result->message = $house->getp_house($request->session()->get('email'));
        $M3Result->status = 100;
        return $M3Result->toJson();

    }

//  个人信息修改
    public function p_info_change(Request $request)
    {

        $M3Result = new M3Result();
        $owner = new owner();
        $M3Result->message = $owner->p_info_change($request, $request->session()->get('email'));
        if ($M3Result->message == 0 && $request->input('email') != '')
            Session::put('email', $request->input('email'));
        return $M3Result->toJson();

    }

//  密码修改
    public function p_info_pw_change(Request $request)
    {
        $owner = new owner();
        return $owner->p_info_pw_change($request, $request->session()->get('email'));
    }

    public function pr_check(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->pr_check($request['cate']);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

    public function fee_check(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->fee_check_for_owner($request->input('cate'), $request->session()->get('email'));
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

    public function fee_up(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->fee_up_for_owner($request->input('id'));
        $M3Result->status = 100;
        return $M3Result->toJson();
    }
}