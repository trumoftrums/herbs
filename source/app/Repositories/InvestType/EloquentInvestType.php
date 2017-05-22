<?php

namespace Vanguard\Repositories\InvestType;

use Vanguard\InvestType;

class EloquentInvestType implements InvestTypeRepository
{
    /**
     * {@inheritdoc}
     */
    public function getAll($status = null)
    {
        $where = " 1=1 ";
        if(!empty($status)){
            $where  .= " AND status ='".$status."' ";
        }
        $datas = InvestType::whereRaw($where)->get();
        return $datas;
    }

    public function getTypebyID($id = null,$toArray =false)
    {
        // TODO: Implement getTypebyID() method.
        $datas = null;
        if(!empty($id)){
            $where = "id =$id" ;

            $datas = InvestType::whereRaw($where)->get();
            if($toArray){
                $datas = $datas->toArray();
            }
            if(!empty($datas)){
                $datas = $datas[0];
            }

        }

        return $datas;
    }

    public function create(array $data)
    {
        $unitName = ($data['radio-kihan'] == "m") ? "tháng" : "năm";
        $typeName = "Gói đầu tư " . $data['ki_han'] . " " . $unitName;
        $bd = new InvestType();
        $bd->interest = $data['lai_suat'];
        $bd->period = $data['ki_han'];
        $bd->allowCompInterest = $data['radio-laikep'];
        $bd->unit = $data['radio-kihan'];
        $arr = [
            [
                "fr" => $data['month-fr-01'],
                "to" => $data['month-to-01'],
                "vl" => $data['percent-01']
            ],
            [
                "fr" => $data['month-fr-02'],
                "to" => $data['month-to-02'],
                "vl" => $data['percent-02']
            ],
            [
                "fr" => $data['month-fr-03'],
                "to" => $data['month-to-03'],
                "vl" => $data['percent-03']
            ]
        ];
        $bd->finalInvest = json_encode($arr, true);
        $bd->status = InvestType::STATUS_ACTIVED;
        $bd->typeName = $typeName;

        $bd->save();
    }

    public function update(array $data, $id)
    {
        $unitName = ($data['radio-kihan'] == "m") ? "tháng" : "năm";
        $typeName = "Gói đầu tư " . $data['ki_han'] . " " . $unitName;
        $bd = InvestType::find($id);
        $bd->interest = $data['lai_suat'];
        $bd->period = $data['ki_han'];
        $bd->allowCompInterest = $data['radio-laikep'];
        $bd->unit = $data['radio-kihan'];
        $arr = [
            [
                "fr" => $data['month-fr-01'],
                "to" => $data['month-to-01'],
                "vl" => $data['percent-01']
            ],
            [
                "fr" => $data['month-fr-02'],
                "to" => $data['month-to-02'],
                "vl" => $data['percent-02']
            ],
            [
                "fr" => $data['month-fr-03'],
                "to" => $data['month-to-03'],
                "vl" => $data['percent-03']
            ]
        ];
        $bd->finalInvest = json_encode($arr, true);
        $bd->typeName = $typeName;

        $bd->save();
    }

    public function delete($id)
    {
        $bd = InvestType::find($id);
        $bd->status = InvestType::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = InvestType::query();
        if ($status && $status != "All") {
            $query->where('status', $status);
        }
        $result = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
