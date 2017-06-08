<?php

namespace Vanguard\Repositories\Ads;
use Vanguard\Models\Ads;

class EloquentAds implements AdsRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $bd = new Ads();
        $bd->name = $data['name'];
        $bd->url = $data['url'];
        $bd->weight = $data['weight'];
        $bd->img = $data['img'];
        $bd->status = Ads::STATUS_ACTIVED;
        $bd->created_by = $data['created_by'];
        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = Ads::find($id);
        $bd->name = $data['name'];
        $bd->url = $data['url'];
        $bd->weight = $data['weight'];

        $bd->updated_by = $data['updated_by'];
        if($data['img'] != null){
            $bd->img = $data['img'];
        }else{
            $bd->img = $bd->img;
        }
        $bd->save();
    }


    public function delete($id)
    {
        $bd = Ads::find($id);
        $bd->status = Ads::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = Ads::orderBy('ads.weight', 'asc');

        if ($status && $status != "All") {
            $query->where('ads.status', $status);
        }
        $result = $query->paginate($perPage);

        return $result;
    }



}
