<?php

namespace Vanguard\Models;

use Illuminate\Database\Eloquent\Model;

class RssExecDetail extends Model
{
    protected $table = 'rss_exec_details';
    const STATUS_NEW = "NE";
    const  STATUS_SYNCED = "DO";
    public $timestamps = false;
    public static function getList($status = RssExecDetail::STATUS_NEW){
        $query =  RssExecDetail::join('rss', 'rss.id', '=', 'rss_exec_details.idRss')->select("rss.*",'rss_exec_details.*','rss_exec_details.url as urlDetail');
        if(!empty($status)){
            $query = $query->where("rss_exec_details.status",$status);
        }
        $data =$query->get()->toArray();
        return $data;
    }
}