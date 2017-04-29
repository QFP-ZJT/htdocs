<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class manager extends Model
{
    protected $table = 'manager';

    protected $guarded = ['password'];

    //由于使用邮箱登陆   暂定primaryKey为email
    ////    protected $primaryKey = 'email';

    //登陆确认   OK
    public function login_check($email, $password)
    {
        $user_name = DB::select('select name from manager where email = ? and password = ?;', [$email, $password]);
        if ($user_name) {
            return head($user_name)->name;//返回数组的第一组数据
        } else
            return 'false';
    }

//    查看个人基本信息
    public function getp_info($email)
    {
        $re = DB::select("select name , sex , phone , email , id
                            from manager where email = ?", [$email]);
        return head($re);
    }

//个人基本信息修改
    public function p_info_change($request, $email)
    {
        $re = 0;
        if ($request->input('phone', '') != '') {
            DB::update("update manager set phone = ?  where email =?;", [$request->input('phone', ''), $email]);
        }
        if ($request->input('email', '') != '') {
            if (!DB::table('manager')->where('email', $request->input('email', ''))->value('id'))
                DB::update("update manager set email = ?  where email =?;", [$request->input('email', ''), $email]);
            else
                $re = 11;
//            TODO 11 邮箱已经被注册过
        }
        return $re;
    }

    public function p_info_pw_change($request,$email)
    {
        return DB::table('manager')->where('email',$email)
            ->where('password',$request->input('oldps',''))
            ->update(['password'=>$request->input('newps','')]);
    }
}
