<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class mapping extends Model
{
    //
    public static function maptodb($word)
    {
        $re = DB::select("select db_name , col_name ,state from mapping where original = ?;", [$word]);
        if($re==null)
            $re[0]=null;
        return $re[0];
    }
    public static function maptoop($word)
    {
        $re = DB::select("select op ,short from operate where original = ?;", [$word]);
        if($re==null)
            $re[0]=null;
        return $re[0];
    }
    public function excute_sql($word)
    {
        return DB::select($word);
    }
}
