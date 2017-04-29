<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class owner extends Model
{
    protected $table = 'owner';

    protected $guarded = ['password'];

    //由于使用邮箱登陆   暂定primaryKey为email
    ////    protected $primaryKey = 'email';

    //登陆确认
    public function login_check($email, $password)
    {
        $user_name = DB::select('select name from owner where email = ? and password = ?;', [$email, $password]);
        if ($user_name) {
            return head($user_name)->name;//返回数组的第一组数据
        } else
            return 'false';
    }

    public function Register($request)
    {
//        3：注册成功  1：邮箱被占用  2：身份证号已使用
        if (DB::select('select name from owner where email = ?;', [$request['email']])!=null) {
            return 1;//返回数组的第一组数据
        }
        if (DB::select('select name from owner where owner_id = ?;', [$request['owner_id']])!=null) {
            return 2;//返回数组的第一组数据
        }
        DB::table('owner')->insert(['owner_id' => $request['owner_id'], 'name' => $request['name'], 'sex' => $request['sex'],
            'phone' => $request['phone'], 'email' => $request['email'], 'work' => $request['work'], 'password' => $request['p']]);
        return 3;
    }

    //注册
    public function loginUp()
    {


    }

//    查看个人基本信息
    public function getp_info($email)
    {
        $re = DB::select("select name , sex , phone , email , work , owner_id
                            from owner where email = ?", [$email]);
        return head($re);
    }

//个人基本信息修改
    public function p_info_change($request, $email)
    {
        $re = 0;
        if ($request->input('phone', '') != '') {
            DB::update("update owner set phone = ?  where email =?;", [$request->input('phone', ''), $email]);
        }
        if ($request->input('work', '') != '') {
            DB::update("update owner set work = ? where email = ?;", [$request->input('work', ''), $email]);
        }
        if ($request->input('email', '') != '') {
            if (!DB::table('owner')->where('email', $request->input('email', ''))->value('id'))
                DB::update("update owner set email = ?  where email =?;", [$request->input('email', ''), $email]);
            else
                $re = 11;
//            TODO 11 邮箱已经被注册过
        }
        return $re;
    }

    public function p_info_pw_change($request, $email)
    {
        return DB::table('owner')->where('email', $email)
            ->where('password', $request->input('oldps', ''))
            ->update(['password' => $request->input('newps', '')]);
    }

    public function owner_check($request)
    {
        $id = '';
        $name = '';
        $sex = '';
        $work = '';
        if ($request->input('id', '') != null)
            $id = " and owner.owner_id = '" . $request->input('id', '') . "'";
        if ($request->input('name', '') != null)
            $name = " and owner.name = '" . $request->input('name', '') . "'";
        if ($request->input('sex', '') != null)
            $sex = " and owner.sex = '" . $request->input('sex', '') . "'";
        if ($request->input('work', '') != null)
            $work = " and owner.work = '" . $request->input('work', '') . "'";
        return DB::select('select owner.owner_id , owner.name , owner.sex , owner.phone , owner.email , owner.work , house.house_id as id_house ' .
            'from owner left join house on owner.owner_id = house.owner_id where owner.owner_id > 0 ' . $id . $name . $sex . $work . ';');
    }
}
