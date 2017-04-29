<?php

namespace App\Http\Controllers;

use App\manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\fee;
use App\Models\M3Result;
use App\house;
use App\owner;
use App\mapping;
use Mail;
use jieba;

class ManagerController extends Controller
{
    public function login(Request $request)
    {
        Session::put('email', $request['email']);//添加session记录用户的邮箱编号
        $manager = new manager();
        $re = $manager->login_check($request['email'], $request['password']);
//        echo $re;
//        echo $request['email'];
        if ($re != 'false')
            return view('m_main')->with('name', $re);
        else
            return view('welcome')->with('status', 12);
    }

//   个人信息查看
    public function getp_info(Request $request)
    {
        $M3Result = new M3Result();
        $manager = new manager();
        $M3Result->message = $manager->getp_info($request->session()->get('email'));
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
        $manager = new manager();
        $M3Result->message = $manager->p_info_change($request, $request->session()->get('email'));
        if ($M3Result->message == 0 && $request->input('email') != '')
            Session::put('email', $request->input('email'));
        return $M3Result->toJson();

    }

//  密码修改
    public function p_info_pw_change(Request $request)
    {
        $manager = new manager();
        return $manager->p_info_pw_change($request, $request->session()->get('email'));
    }

//价格查看
    public function pr_check(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->pr_check($request['cate']);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

//房屋信息检索
    public function house_check(Request $request)
    {
        $house = new house();
        $M3Result = new M3Result();
        $M3Result->message = $house->house_check($request);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

    public function house_checkforchange(Request $request)
    {
        $house = new house();
        $M3Result = new M3Result();
        $M3Result->message = $house->house_checkforchange($request);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

//
    public function amount_check(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->amount_check($request);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

//业主信息检索
    public function owner_check(Request $request)
    {
        $owner = new owner();
        $M3Result = new M3Result();
        $M3Result->message = $owner->owner_check($request);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

//价格刷新
    public function price_modify(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->price_modify($request);
        $M3Result->status = 100;
        return $M3Result->toJson();

    }

//
    public function amount_update(Request $request)
    {

        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->amount_update($request->input('data', ''));
//    $M3Result->message = $request->input('data', '');
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

    public function fee_check(Request $request)
    {
        $fee = new fee();
        $M3Result = new M3Result();
        $M3Result->message = $fee->fee_check_for_manager($request->input('cate'));
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

    public function house_new_owner(Request $request)
    {
        $M3Result = new M3Result();
        $house = new house();
        $M3Result->message = $house->house_new_owner($request);
        $M3Result->status = 100;
        return $M3Result->toJson();
    }

    public function search(Request $request)
    {
        $sorw = 0;  //默认先是where的检索   到出现表名的时候  切换至1   查找列名
        $wh_fi = 1; //默认是1  单个where语句完整的   变0 继续检测条件
        $where_connect = [];

        $main_table = '';   //主表
        $tables = [];       //用到的表
        $cols = [];         //出现的列
        $select = [];        //select集合
        $where = [];        //where语句集合
        $t_i = 0;
        $c_i = 0;
        $w_i = 0;
        $s_i = 0;
        $sql = 'select ';
        $result = new M3Result();
        $jieba = new separate();
        $words = $jieba->jiebafenci($request->input('u'));
        $last = 0;
        foreach ($words as $el) {
            //映射列
            $db_every = mapping::maptodb($el);
            if ($db_every != null && $wh_fi) {
                if ($db_every->state != null && $wh_fi == 1 && $sorw == 0) {
//                    直接添加检索条件
                    $where[$w_i] = $db_every->state;
                    $w_i++;
                } else if ($db_every->col_name != null && $wh_fi == 1 && $sorw == 0) {/*如果以前的条件已经完整且仍处于where查找阶段且列名存在*/
                    $where[$w_i] = $db_every->db_name . '.' . $db_every->col_name;
                    $wh_fi = 0;
//                    继续查找该条件
                }
//                添加表名和列名
                if ($db_every->db_name != null) {
                    $tables[$t_i] = $db_every->db_name;
                    $t_i++;
                    if ($db_every->col_name != null) {
                        $cols[$c_i] = $db_every->db_name . '.' . $db_every->col_name;
                        $c_i++;
                        if ($sorw == 1) {
//                            添加需要展示的列
                            $select[$s_i] = $db_every->db_name . '.' . $db_every->col_name;
                            $s_i++;
                        }
                    } //                    遇到了主表     切换模式
                    else {
                        $main_table = $db_every->db_name;
                        $sorw = 1;
                    }
                }
                //添加用到的表和列
            }
            else {
                $op_every = mapping::maptoop($el);
                if ($op_every != null) {
                    $last = $op_every->short;
                    if ($wh_fi == 0 && ($op_every->short == 0 || $last == 4)) {
                        $where[$w_i] = $where[$w_i] . ' ' . $op_every->op;
                    }
                    if ($op_every->short == 2 && $op_every->op == 'or') {
                        array_push($where_connect, $w_i);
                    }
//                    添加了运算符 继续等待
                } //                两个映射表里面都没有找到信息
                else if ($wh_fi == 0) {
                    if (is_numeric($el))
                        $where[$w_i] = $where[$w_i] . ' ' . $el;//直接添加检索条件
                    else {
                        if ($last == 4)
                            $where[$w_i] = $where[$w_i] . ' ' . '\'%' . $el . '%\'';//直接添加检索条件
                        else
                            $where[$w_i] = $where[$w_i] . ' ' . '\'' . $el . '\'';//直接添加检索条件
                    }
                    $wh_fi = 1;
                    $w_i++;
                }
                $last = 0;
            }

        }//信息采集结束

//        去重处理

//        优化处理
        if (in_array('fee', $tables) && $s_i == 0) {
            array_push($select, 'fee.id');
            array_push($select, 'fee.cate');
            array_push($select, 'fee.time');
            array_push($select, 'fee.money');
            array_push($select, 'fee.haved');
            array_push($select, 'owner.owner_id');
            array_push($select, 'house.house_id');
            array_push($select, 'owner.name');
            array_push($select, 'owner.sex');
            array_push($select, 'owner.phone');
            array_push($select, 'owner.email');
            array_push($select, 'owner.work');
            $s_i = $s_i + 12;
        }

        $the_first = 1;//第一个元素
        if ($s_i == 0)
            $sql = $sql . '* ';
        else foreach ($select as $el) {
            if ($the_first)
                $sql = $sql . $el . ' ';
            else
                $sql = $sql . ',' . $el . ' ';
            $the_first = 0;
        }
        $the_first = 1;

        $tables = array_unique($tables);//去重
//        含有主表
        $sql = $sql . 'from ';
        if ($main_table != '') {
            if (count($tables) == 1)
                $sql = $sql . $main_table . ' ';
            foreach ($tables as $el) {
                if ($el != $main_table) {
                    switch ($main_table) {
                        case 'owner':
                            switch ($el) {
                                case 'house':
                                    if (in_array('fee', $tables)) {
                                    } else {
                                        if ($the_first)
                                            $sql = $sql . 'owner left join house on owner.owner_id = house.owner_id ';
                                        else
                                            $sql = $sql . 'and owner left join house on owner.owner_id = house.owner_id ';
                                        $the_first = 0;
                                    }
                                    break;
                                case 'fee':
                                    if ($the_first)
                                        $sql = $sql . 'house left join fee on house.house_id = fee.house_id left join owner on house.owner_id = owner.owner_id ';
                                    else
                                        $sql = $sql . 'and house left join fee on house.house_id = fee.house_id left join owner on house.owner_id = owner.owner_id ';
                                    $the_first = 0;
                                    break;
                            }
                            break;
                        case'house':
                            switch ($el) {
                                case 'owner':
                                    if ($the_first)
                                        $sql = $sql . 'house left join owner on house.owner_id = owner.owner_id ';
                                    else
                                        $sql = $sql . 'and house left join owner on house.owner_id = owner.owner_id ';
                                    $the_first = 0;
                                    break;
                                case 'fee':
                                    if ($the_first)
                                        $sql = $sql . 'fee natural join house natural join owner ';
                                    else
                                        $sql = $sql . 'and fee natural join house natural join owner ';
                                    $the_first = 0;
                                    break;
                            }
                            break;
                    }
                }
            }
        } //        没有主表   自然连接
        else
            foreach ($tables as $el) {
                if ($the_first)
                    $sql = $sql . $el . ' ';
                else
                    $sql = $sql . 'natural join ' . $el . ' ';
                $the_first = 0;
            }

        $the_first = 1;
        if (count($where) > 0)
            $sql = $sql . 'where ';
        $i = 0;
        $youkuohao = 0;
        foreach ($where as $el) {
            if ($the_first) {
                if (in_array($i + 1, $where_connect) && !in_array($i, $where_connect)) {
                    $sql = $sql . ' (' . $el . ' ';
                    $youkuohao = 1;
                } else if (in_array($i, $where_connect) && !in_array($i + 1, $where_connect)) {
                    $sql = $sql . ' ' . $el . ') ';
                    $youkuohao = 0;
                } else if (in_array($i, $where_connect)) {
                    $sql = $sql . ' ' . $el . ' ';
                } else if ($youkuohao == 0) {
                    if (!in_array($i, $where_connect))
                        $sql = $sql . ' ' . $el . ' ';
                    else
                        $sql = $sql . ' ' . $el . ' ';
                } else {
                    if ($youkuohao == 1)
                        $sql = $sql . ' ' . $el . ') ';
                    else {
                        $sql = $sql . ' ' . $el . ' ';
                        $youkuohao = 0;
                    }
                }
            }
//            if ($the_first && !in_array($i + 1, $where_connect))
//                $sql = $sql . $el . ' ';
//            else if ($the_first && in_array($i + 1, $where_connect))
//                $sql = $sql . '(' . $el . ' ';
            else {
                if (in_array($i + 1, $where_connect) && !in_array($i, $where_connect)) {
                    $sql = $sql . 'and (' . $el . ' ';
                    $youkuohao = 1;
                } else if (in_array($i, $where_connect) && !in_array($i + 1, $where_connect)) {
                    $sql = $sql . 'or ' . $el . ') ';
                    $youkuohao = 0;
                } else if (in_array($i, $where_connect)) {
                    $sql = $sql . 'or ' . $el . ' ';
                } else if ($youkuohao == 0) {
                    if (!in_array($i, $where_connect))
                        $sql = $sql . 'and ' . $el . ' ';
                    else
                        $sql = $sql . 'or ' . $el . ' ';
                } else {
                    if ($youkuohao == 1)
                        $sql = $sql . 'and ' . $el . ') ';
                    else {
                        $sql = $sql . 'and ' . $el . ' ';
                        $youkuohao = 0;
                    }
                }
            }
            $i++;
            $the_first = 0;
        }
        if ($youkuohao == 1)
            $sql = $sql . ') ';

        $re = [];
        $re[0] = $sql;
        $re[1] = $words;

        $result->status = $re;
        $mapping = new mapping();
        $result->message = $mapping->excute_sql($sql);
        return $result->toJson();
    }

//pull word  分词请求
    private
    function httpPost($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

//名词向数据库映射


    public
    function ducu(Request $request)
    {
        $fee = new fee();
        $request->input('id');
        $d = $fee->getonefee($request->input('id'));
        $M3 = new M3Result();
        $M3->message = 1;
        if ($d) {
            $d = head($d);
            $ca = '';
            switch ($d->cate) {
                case 1:
                    $ca = '水费';
                    break;
                case 2:
                    $ca = '电费';
                    break;
                case 3:
                    $ca = '物业管理费';
                    break;
            }
            $data = ['email' => $d->email, 'name' => $d->name, 'nam' => $d->name, 'time' => substr($d->time, 0, 10), 'cate' => $ca];
            Mail::send('mail', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['name'])->subject('小区物业：您有未缴费的账单！');
            });

            return $M3->toJson();

        }
        $M3->message = 0;
        echo '为发送';
        return $M3->toJson();
    }

//    弃用代码临时存放
//        第一种分词工具
//        $div_1 = explode('的', $request->input('u'));
//        $div_2=[];
//        $i=0;
//        foreach ($div_1 as $el)
//        {
//            $div_2[$i]=explode("\n", $this->httpPost("http://api.pullword.com/post.php", 'source=' .$el. "&param1=0.8&param2=0"));
//            $i++;
//        }
//        //div_2  二级数组    条件  表名  属性
}
