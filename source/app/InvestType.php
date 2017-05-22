<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class InvestType extends Model
{
    protected $table = 'md_invest_type';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}