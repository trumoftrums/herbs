<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;
use DB;
use Vanguard\Support\Enum\UserStatus;

class InvestTrade extends Model
{
    protected $table = 'invest_trade';
    public $timestamps = true;
    const  TRADE_DAUTU =  'Đầu tư';
    const  TRADE_TRALAI =  'Tiền lãi';
    const  TRADE_DAOHAN =  'Đáo hạn';
    const STATUS_ACTIVED = "AC";
    const  STATUS_PENDING = "PE";
    const  STATUS_DELETED = "DE";
    const  STATUS_CANCELED = "CA";
    const  STATUS_NEW = "NE";
    public static function getTrades($fromDate =null,$toDate =null,$options =array()){
        if(!empty($fromDate) && !empty($toDate)){
            $where = " AND ngayGD >='$fromDate' AND ngayGD <='$toDate' ";
            foreach ($options as $k => $op){
                $where .=" AND $op ";
            }
            $dt = DB::select("SELECT a.ngayGD, b.investTypeID, a.investSeq, a.id tradeID,a.`status` tradeStatus, a.soTienLai, a.loaiTien, b.investCode,c.typeName,d.first_name,d.last_name,e.filename,e.filepath FROM `invest_trade` a 
INNER JOIN invest b ON a.investID = b.id
INNER JOIN md_invest_type c ON c.id = b.investTypeID
INNER JOIN users d ON b.userID = d.id
LEFT JOIN invest_document as e ON a.investSeq = e.investSeq AND a.investID = e.investID
WHERE   d.status ='".UserStatus::ACTIVE."' AND b.status ='".Invest::STATUS_ACTIVED."' AND a.noiDungGD ='".InvestTrade::TRADE_TRALAI."' $where " );

            return $dt;

        }
        return null;

    }
    public static function getTradebyID($id,$seq=null){
        $dt = InvestTrade::join('invest', 'invest.id', '=', 'invest_trade.investID')
            ->join('users', 'users.id', '=', 'invest.userID')
            ->join('md_invest_type', 'md_invest_type.id', '=', 'invest.investTypeID')
            ->where('invest_trade.id',$id)
            ->select("invest_trade.id as tradeID","invest_trade.status as tradeStatus","invest_trade.*","invest.investCode","users.first_name","users.last_name","md_invest_type.typeName")
            ->get()->toArray();
        return $dt[0];

    }
    public static function checkCanActive($id){
        $ck = InvestTrade::join('invest', 'invest.id', '=', 'invest_trade.investID')
            ->join('users', 'users.id', '=', 'invest.userID')
            ->where("invest_trade.status","=",InvestTrade::STATUS_NEW)
            ->where("invest_trade.noiDungGD","=",InvestTrade::TRADE_TRALAI)
            ->where("users.status","=",UserStatus::ACTIVE)
            ->where("invest.status","=",Invest::STATUS_ACTIVED)->get()->toArray();
//        var_dump($ck);exit();
        if(!empty($ck)) return true;
        return false;
    }
    public static function getInvestID($tradeID){
        $dt = InvestTrade::where("id",$tradeID)->get()->toArray();
        if(!empty($dt)) return $dt[0];
        return null;
    }
}