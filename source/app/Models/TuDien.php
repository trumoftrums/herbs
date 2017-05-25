<?php

namespace Vanguard\Models;

use Illuminate\Database\Eloquent\Model;

class TuDien extends Model
{
    protected $table = 'duoc_lieu';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;


}