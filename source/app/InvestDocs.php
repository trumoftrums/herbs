<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class InvestDocs extends Model
{
    protected $table = 'invest_document';

    const TYPE_NOPTIEN = "Nộp tiền";
    const TYPE_TRALAI = "Trả lãi";
    const TYPE_HOANVON = "Hoàn vốn";
    const TYPE_HOPDONG = "Hợp đồng";
    const TYPE_KHAC = "Khác";
    public $timestamps = true;
    const STATUS_NEW= "NE";
    const STATUS_ACTIVED = "AC";
    const  STATUS_UPDATED = "UP";
    const  STATUS_DELETED = "DE";
    public static function getByInvestID($id,$status = null){

        if(!empty($id)){
            $datas =array();
            if(!empty($status)){
                $datas = InvestDocs::where('investID',$id)->where("status",$status)->get()->toArray();
            }else{
                $datas = InvestDocs::where('investID',$id)->get()->toArray();
            }

            if(!empty($datas)){
                return $datas;
            }
        }
        return null;
    }
    public static function getDocsbyID($id){

        if(!empty($id)){
            $datas = InvestDocs::where('id',$id)->get()->toArray();
            if(!empty($datas)){
                return $datas[0];
            }
        }
        return null;
    }
    public static function getDocs($investID,$type){

        if(!empty($investID)){
            $datas = InvestDocs::where('investID',$investID)->where('type',$type)->where('status',InvestDocs::STATUS_ACTIVED)->get()->toArray();
            if(!empty($datas)){
                return $datas;
            }
        }
        return null;
    }
    public static function deleteDoc($id){

        if(!empty($id)){
            $r = InvestDocs::where('id',$id)->update(array('status'=>InvestDocs::STATUS_DELETED));
            if($r){
                return true;
            }
        }
        return false;
    }
}