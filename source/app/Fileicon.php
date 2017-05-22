<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Fileicon extends Model
{
    protected $table = 'md_file_icons';
    public static  function getList(){
        $dt = Fileicon::get()->toArray();
        return $dt;
    }

}