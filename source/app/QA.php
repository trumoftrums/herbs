<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    protected $table = 'question_answer';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;

}