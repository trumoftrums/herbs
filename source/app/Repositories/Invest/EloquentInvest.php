<?php

namespace Vanguard\Repositories\Invest;

use Vanguard\Invest;
use Vanguard\InvestTrade;
use Vanguard\InvestType;
use DB;

class EloquentInvest implements InvestRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        if(!empty($data)){
            if(isset($data['_token'])){
                unset($data['_token']);
            }
//            var_dump($data);exit();
            return Invest::create($data);
        }
        return false;
    }

    public function updateStatus($status, $id)
    {
        DB::beginTransaction();
        $hd = Invest::find($id);
        $investType = InvestType::where('id', $hd->investTypeID)->first();
        $hd->status = $status;
        $r2 =true;
        if ($status == Invest::STATUS_ACTIVED) {
            $hd->actStartDate = date("Y-m-d");
            $dateEnd = mktime(0, 0, 0, date("m") + $investType->period, date("d"), date("Y"));
            $hd->actEndDate = date('Y-m-d', $dateEnd);
            $createTrade = array(
                'investID'=>$id,
                'ngayGD' => $hd->actStartDate,
                'noidungGD'=>InvestTrade::TRADE_DAUTU,
                'nguoitaoGD' =>0,
                'tongTien' =>$hd->money,
                'tongDauTu' =>$hd->money,
                'soTienLai' =>0,
                'soTienTaiDauTu' =>0,
                'loaiTien' =>$hd->currency,
                'tienLaiDaTra' =>0,
            );
            $r2 = DB::table("invest_trade")->insert($createTrade);
        }

        $r1 = $hd->save();


        if($r1 && $r2){
            DB::commit();
            return true;
        }else{
            DB::rollBack();

        }
        return false;

    }

    public function paginate($perPage, $search = null, $nhadautu = null, $goidautu = null, $status = null)
    {
        $query = Invest::join('users', 'users.id', '=', 'invest.userID')
            ->join('md_invest_type', 'md_invest_type.id', '=', 'invest.investTypeID')
            ->select(['invest.id','invest.userID','invest.investTypeID', 'users.username', 'md_invest_type.typeName', 'invest.money', 'invest.interest', 'invest.estStartDate',
                'invest.actEndDate', 'invest.actStartDate', 'invest.interestMethod', 'invest.status']);
        if ($status && $status != "All") {
            $query->where('invest.status', $status);
        }
        if ($nhadautu && $nhadautu != "All") {
            $query->where('invest.userID', $nhadautu);
        }
        if ($goidautu && $goidautu != "All") {
            $query->where('invest.investTypeID', $goidautu);
        }
        if ($search) {
            $timestamp = strtotime($search);
            $dateSearch = date("d", $timestamp);
            $query->where(function ($q) use ($search, $dateSearch) {
                $q->where('actStartDate', '<=', $search)
                    ->where('actEndDate', '>=', $search)
                    ->whereRaw("DAY(actStartDate) = ?", $dateSearch);
            });
        }
        $result = $query->orderBy('invest.created_at', 'desc')
            ->paginate($perPage);
        if ($search) {
            $result->appends(['search' => $search]);
        }

        return $result;
    }

}
