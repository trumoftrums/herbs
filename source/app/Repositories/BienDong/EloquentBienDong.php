<?php

namespace Vanguard\Repositories\BienDong;

use Vanguard\BienDong;

class EloquentBienDong implements BienDongRepository
{
    /**
     * {@inheritdoc}
     */

    public function getByDate($date = null)
    {
        // TODO: Implement getTypebyID() method.
        if(!empty($date)){
            $where = " `fr` <='$date' and `to` >= '$date' and `status` = '".BienDong::STATUS_ACTIVED."' " ;

            $datas = BienDong::whereRaw($where)->orderBy('updated_at', 'desc')->limit(1)->get()->toArray();
            if(!empty($datas)){
                return $datas[0]['interest'];
            }
        }

        return null;

    }

    public function create(array $data)
    {
        $bd = new BienDong();
        $bd->fr = $data['fr'];
        $bd->to = $data['to'];
        $bd->interest = $data['interest'];

        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = BienDong::find($id);
        $bd->fr = $data['fr'];
        $bd->to = $data['to'];
        $bd->interest = $data['interest'];

        $bd->save();
    }


    public function delete($id)
    {
        $bd = BienDong::find($id);
        $bd->status = BienDong::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = BienDong::query();

        if ($status && $status != "All") {
            $query->where('status', $status);
        }
        $result = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
