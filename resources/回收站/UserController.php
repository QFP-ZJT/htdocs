<?php
/**
 * Created by PhpStorm.
 * User: QFP_ZJT
 * Date: 2017/3/7
 * Time: 下午7:12
 */
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $email = $request['email'];
        $password = bcrypt($request['password']);//密码为了安全处理
        $user = new User();

        $user->email = $email;
        $user->password = $password;
        $user->save();
        return redirect()->route('dashboard');
    }

    public function getDashboard(){
        return view('dashboard');
    }
    public function postSignIn(Request $request)//收到请求处理并进行处理
    {
       Auth::attempt();
    }
}