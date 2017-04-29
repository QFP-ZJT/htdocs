<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class house extends Model
{
    protected $table = 'house';

//    查看房屋基本信息
    public function getp_house($email)
    {
        $re = DB::select("select *
                            from house where owner_id = 
                            (select owner_id from owner where email = ?)", [$email]);
        return head($re);
    }

    public function house_check($request)
    {
        $id = '';
        $id_building = '';
        $id_unit = '';
        $id_id = '';
        if ($request->input('id', '') != null)
            $id = " and house.house_id = '" . $request->input('id', '') . "'";
        if ($request->input('id_building', '') != null)
            $id_building = "and house.id_building = '" . $request->input('id_building', '') . "'";
        if ($request->input('id_unit', '') != null)
            $id_unit = " and house.id_unit = '" . $request->input('id_unit', '') . "'";
        if ($request->input('id_id', '') != null)
            $id_id = "and house.id_id = '" . $request->input('id_id', '') . "'";
        return DB::select('select house.house_id , house.id_building , house.id_unit , house.area , house.id_id , house.house_time , owner.name ' .
            'from house left join owner on house.owner_id = owner.owner_id where house.house_id > 0  ' . $id . $id_building . $id_id . $id_unit);
    }

    public function house_checkforchange($request)
    {
        $id = " and house.house_id = '" . $request->input('id', '0') . "'";
        $re = DB::select('select house.house_id , house.id_building , house.id_unit , house.area , house.id_id , house.house_time , owner.name ' .
            'from house left join owner on house.owner_id = owner.owner_id where house.id_id > 0 ' . $id);
        if ($re != null)
            return head($re);
        else
            return null;
    }

    public function house_new_owner($request)
    {
        $r1 = DB::table('owner')->where('owner_id', $request->input('new_id', 0))->get();
        if ($r1 == null)
            return 0;
        $time = date("Y-m-d");
        $r2 = DB::table('house')->where('house_id', $request->input('id_building', 0))->update(['owner_id' => $request->input('new_id'), 'house_time' => $time]);
        if ($r2 == 1)
            return 1;
        return -1;
    }
}
