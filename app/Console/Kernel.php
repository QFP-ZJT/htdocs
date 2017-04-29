<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function()
        {
            $price = DB::table('category_fee')->orderBy('cate_id', 'desc')->where('name', '物业管理费')->get();
            $price = $price[0]->price;
            $house_id = DB::select('select house_id ,area from house where owner_id is not null');
            foreach ($house_id as $el) {
                $bb = DB::select('select max(id) as id from fee');
                $bb = $bb[0]->id + 1;
                DB::insert('insert into fee values ('.$bb.',3,now(),'.$el->area*$price.',0,'.$el->area.',\''.$el->house_id.'\');');
            }
        })->monthly();
    }

}
