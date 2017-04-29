<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class fee extends Model
{
    public function amount_check($request)
    {
        $current = $this->GetMonth(0);
        $next = $this->GetMonth(1);
        $id = '';
        $id_building = '';
        $id_unit = '';
        $id_id = '';
        if ($request->input('id', '') != null)
            $id = " and a.house_id = '" . $request->input('id', '') . "'";
        if ($request->input('id_building', '') != null)
            $id_building = "and a.id_building = '" . $request->input('id_building', '') . "'";
        if ($request->input('id_unit', '') != null)
            $id_unit = " and a.id_unit = '" . $request->input('id_unit', '') . "'";
        if ($request->input('id_id', '') != null)
            $id_id = "and a.id_id = '" . $request->input('id_id', '') . "'";
        return DB::select('select a.house_id as id , a.id_building , a.id_unit , a.id_id , owner.name ,wa.amount as re_water,el.amount as re_electric ' .
            'from house as a left join owner on a.owner_id = owner.owner_id left join (select * from fee as water where date_format(water.time, \'%Y%m\') = date_format(curdate() , \'%Y%m\') and water.cate = 1) as wa on a.house_id = wa.house_id left join (select * from fee as electric where date_format(electric.time, \'%Y%m\') = date_format(curdate() , \'%Y%m\') and electric.cate = 2) as el on a.house_id = el.house_id where a.house_id>0 '
            . $id . $id_building . $id_id . $id_unit);
    }

    public function amount_update($data)
    {
//       生成id

        $id = head(DB::table('fee')->orderBy('id', 'desc')->limit(1)->get())->id ?: 0;
        $id++;
        $money = 0;
        foreach ($data as $el) {
//            水费信息插入
            if ($el[1] != '') {
                $money = head(DB::table('category_fee')->where('name', "水费")->orderBy('cate_time', 'desc')->limit(1)->get())->price;
                DB::table('fee')->insert(['id' => $id, 'cate' => 1, 'time' => date("Y-m-d"), 'money' => ($money * $el[1]), 'haved' => 0, 'amount' => $el[1], 'house_id' => $el[0]]);
                $id++;
            }
//            电费信息插入
            if ($el[2] != '') {
                $money = head(DB::table('category_fee')->where('name', "电费")->orderBy('cate_time', 'desc')->limit(1)->get())->price;
                DB::table('fee')->insert(['id' => $id, 'cate' => 2, 'time' => date("Y-m-d"), 'money' => ($money * $el[2]), 'haved' => 0, 'amount' => $el[2], 'house_id' => $el[0]]);
                $id++;
            }
        }
        return 1;
    }

    public function pr_check($cate)
    {
        $cate_name = '';
        switch ($cate) {
            case 1:
                $cate_name = '水费';
                break;
            case 2:
                $cate_name = '电费';
                break;
            case 3:
                $cate_name = '物业管理费';
                break;
            case 4: {//当月价格情况
                $re = ['0' => head(DB::table('category_fee')->orderBy('cate_time', 'desc')->where('name', '水费')->limit(1)->get()),
                    '1' => head(DB::table('category_fee')->orderBy('cate_time', 'desc')->where('name', '电费')->limit(1)->get()),
                    '2' => head(DB::table('category_fee')->orderBy('cate_time', 'desc')->where('name', '物业管理费')->limit(1)->get())];
                return $re;
            }
        }
        return DB::table('category_fee')->orderBy('cate_id', 'desc')
            ->where('name', $cate_name)->get();
    }

    public function price_modify($request)
    {
        $cate_id = head(DB::table('category_fee')->orderBy('cate_id', 'desc')->limit(1)->get())->cate_id;
        $cate_id++;
        if ($request->input('water', '') != '') {
            DB::insert('insert into category_fee (cate_id, name ,price , uom , cate_time ) values (?,?,?,?,?)', [$cate_id, '水费', $request->input('water', ''), '元/立方米', date("Y-m-d")]);
            $cate_id++;
        }
        if ($request->input('electric', '') != '') {
            DB::insert('insert into category_fee (cate_id, name ,price , uom , cate_time ) values (?,?,?,?,?)', [$cate_id, '电费', $request->input('electric', ''), '元/度', date("Y-m-d")]);
            $cate_id++;
        }
        if ($request->input('wy', '') != '') {
            return DB::insert('insert into category_fee (cate_id, name ,price , uom , cate_time ) values (?,?,?,?,?)', [$cate_id, '物业管理费费', $request->input('wy', ''), '元/平方米/月', date("Y-m-d")]);
        }
        return 1;
    }

    public function fee_check_for_owner($cate, $email)
    {
        $owner_id = head(DB::table('owner')->where('email', $email)->limit(1)->get())->owner_id;
        $a = DB::table('house')->where('owner_id', $owner_id)->limit(1)->get();
        if ($a)
            $house_id = head($a)->house_id;
        else
            return null;

        if ($cate == 4) {
//           返回当月的账单
            return DB::select('select * from fee where date_format(fee.time, \'%Y%m\')= date_format(curdate() , \'%Y%m\') and house_id = ' . $house_id);
        }
        return DB::table('fee')->orderBy('time', 'desc')->where('cate', $cate)->where('house_id', $house_id)->get();
    }

    public function fee_check_for_manager($cate)
    {
        if ($cate == 4) {
            return DB::select('select fee.id , fee.cate ,fee.time , fee.money , fee.haved , fee.amount , owner.name ,fee.house_id 
            from fee , house ,owner  where date_format(fee.time, \'%Y%m\') = date_format(curdate() , \'%Y%m\') and fee.house_id = house.house_id and house.owner_id = owner.owner_id order by cate DESC');
        }
        return DB::select('select fee.id , fee.cate ,fee.time , fee.money , fee.haved , fee.amount , owner.name , fee.house_id 
            from fee , house ,owner  where cate = ? and fee.house_id = house.house_id and house.owner_id = owner.owner_id order by cate DESC', [$cate]);
    }

    public function fee_up_for_owner($id)
    {
        return DB::table('fee')->where('id', $id)->update(['haved' => 1]);
    }

    function GetMonth($sign = "1")
    {
        //得到系统的年月
        $tmp_date = date("Ym");
        //切割出年份
        $tmp_year = substr($tmp_date, 0, 4);
        //切割出月份
        $tmp_mon = substr($tmp_date, 4, 2);
        $tmp_nextmonth = mktime(0, 0, 0, $tmp_mon + 1, 1, $tmp_year);
        $tmp_forwardmonth = mktime(0, 0, 0, $tmp_mon - 1, 1, $tmp_year);
        $tmp_currentmonth = mktime(0, 0, 0, $tmp_mon, 1, $tmp_year);
        if ($sign == 1) {
            //得到当前月的下一个月
            return $fm_next_month = date("Y-m", $tmp_nextmonth);
        } else if ($sign == 0) {
            //得到当前月
            return $fm_current_month = date("Y-m", $tmp_currentmonth);
        } else if ($sign == -1) {
            //得到当前月的上一个月
            return $fm_forward_month = date("Y-m", $tmp_forwardmonth);
        }
    }

    public function getonefee($id)
    {
        return DB::select('select fee.id , fee.cate as cate ,fee.time as time , fee.money , email, owner.name as name,fee.house_id 
            from fee natural join house natural join owner  where fee.id = ?', [$id]);

    }


}