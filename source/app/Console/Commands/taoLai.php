<?php

namespace Vanguard\Console\Commands;

use Illuminate\Console\Command;
use Vanguard\Invest;
use DB;
use Vanguard\InvestTrade;

class taoLai extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'taoLai:monthly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $td = intval (date("d"));
        $today =date("Y-m-d");
        $td = 14;
//        DB::enableQueryLog();
        $db = DB::table('invest')->where("status",Invest::STATUS_ACTIVED)
            ->where("interestMethod",Invest::INTEREST_METHOD_MONTHLY)
            ->whereNotNull("actStartDate")
            ->whereDay("actStartDate",$td)->get();
//        var_dump(DB::getQueryLog());
        if(!empty($db)){
            foreach ($db as $v){
                $v->trade = InvestTrade::where("investID",$v->id)->get();
                if(!empty($v->trade)){
                    $canmake = true;
                    foreach ($v->trade as $trade){
                        if($trade->ngayGD == $today){
                            $canmake = false;
                            break;
                        }
                    }
                    if($canmake){

                    }

                }

            }
        }

    }
}
