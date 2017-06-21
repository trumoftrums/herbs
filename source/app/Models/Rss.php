<?php

namespace Vanguard\Models;

use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    protected $table = 'rss';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    const  IS_RUNNING = 1;
    const  IS_NOTRUNNING = 0;
    public $timestamps = true;
    public  static  function  getList($status = Rss::STATUS_ACTIVED,$number =1,$whereRaw = ""){
        $query = Rss::where('isRunning',Rss::IS_NOTRUNNING)->orderBy("created_at","asc");
        if(!empty($status)){
            $query->where("status",$status);
        }
        if(!empty($whereRaw)){
            $query->whereRaw($whereRaw);
        }
        if(!empty($status)){
            $query->limit($number);
        }
        $data = $query->get()->toArray();
        return $data;
    }

}