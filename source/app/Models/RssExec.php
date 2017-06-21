<?php

namespace Vanguard\Models;

use Illuminate\Database\Eloquent\Model;

class RssExec extends Model
{
    protected $table = 'rss_exec';
    const RESULT_DONE = "DO";
    const  RESULT_FAILED = "FA";
    public $timestamps = false;

}