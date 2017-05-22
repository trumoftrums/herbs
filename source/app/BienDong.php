<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class BienDong extends Model
{
    protected $table = 'md_biendong';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}