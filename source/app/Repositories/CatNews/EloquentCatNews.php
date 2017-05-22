<?php

namespace Vanguard\Repositories\CatNews;

use Vanguard\Models\CategoryNews;

class EloquentCatNews implements CatNewsRepository
{
    /**
     * {@inheritdoc}
     */

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = CategoryNews::join('type_news', 'type_news.idType', '=', 'category_new.type')
            ->select("category_new.*","type_news.nameType");

        if ($status && $status != "All") {
            $query->where('category_new.status', $status);
        }
        $result = $query->orderBy('type_news.created_at', 'desc')->orderBy('category_new.created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }
    public  function create(array $data)
    {
        $bd = new CategoryNews();
        $bd->nameCategory = $data['nameCategory'];
        $bd->type = $data['type'];
        $bd->slug = str_slug($data['nameCategory'],"-");
        $bd->created_at = date("Y-m-d H:i:s");
        $bd->status = CategoryNews::STATUS_ACTIVED;

        $bd->save();
    }


    public  function update(array $data, $id)
    {
        $bd = CategoryNews::find($id);
        $bd->nameCategory = $data['nameCategory'];
        $bd->type = $data['type'];
        $bd->slug = str_slug($data['nameCategory'],"-");
        $bd->updated_at = date("Y-m-d H:i:s");

        $bd->save();
    }


    public  function delete($id)
    {
        $bd = CategoryNews::find($id);
        $bd->status = CategoryNews::STATUS_DELETED;

        $bd->save();
    }

}
