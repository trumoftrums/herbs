<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

    public static function getList(){
        $dt = Branch::where("status",Branch::STATUS_ACTIVED)->get();
        return $dt;
    }
}