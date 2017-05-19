<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;
    public static function getList($idBranch=null){
        $dt =array();
        if(!empty($idBranch)){
            $dt = Project::where("status",Project::STATUS_ACTIVED)->where("idBranch",$idBranch)->get();
        }
        return $dt;
    }
}