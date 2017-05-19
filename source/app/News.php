<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";

    const TYPE_NOIBO = 0;
    const TYPE_DAUTU = 1;
    const TYPE_TCCN = 2;
    const TYPE_TD = 3;
    public $timestamps = true;

}