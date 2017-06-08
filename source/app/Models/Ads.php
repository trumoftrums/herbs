<?php

namespace Vanguard\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}