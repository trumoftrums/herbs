<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class InvestResult extends Model
{
    protected $table = 'invest_result';
    const STATUS_NEW= "NE";
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}