<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;
    public static function getList(){
        $dt = Project::where("status",Project::STATUS_ACTIVED)->get();

        return $dt;
    }
}