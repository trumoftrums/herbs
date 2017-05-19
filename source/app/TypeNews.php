<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class TypeNews extends Model
{
    protected $table = 'type_news';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}