<?php

namespace App\Http\Controllers;
ini_set('memory_limit', '1024M');
use Fukuball\Jieba\Finalseg;
use Fukuball\Jieba\Jieba;

class separate extends Controller
{
//    初始化
    function __construct() {
        Jieba::init();
        Finalseg::init();
        Jieba::loadUserDict('/Applications/XAMPP/xamppfiles/htdocs/app/lib/jieba-php/newwords/dict.txt');
    }

    public function jiebafenci($con)
    {
        return Jieba::cut($con);
    }
}
