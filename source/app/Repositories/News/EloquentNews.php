<?php

namespace Vanguard\Repositories\News;

use Vanguard\News;

class EloquentNews implements NewsRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $bd = new News();
        $bd->title = $data['title'];
        $bd->summary = $data['summary'];
        $bd->description = $data['description'];
        $bd->thumb = $data['thumb'];
        $bd->type = $data['typeNews'];
        $bd->status = News::STATUS_ACTIVED;

        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = News::find($id);
        $bd->title = $data['title'];
        $bd->summary = $data['summary'];
        $bd->description = $data['description'];
        $bd->type = $data['typeNews'];
        if($data['thumb'] != null){
            $bd->thumb = $data['thumb'];
        }else{
            $bd->thumb = $bd->thumb;
        }

        $bd->save();
    }


    public function delete($id)
    {
        $bd = News::find($id);
        $bd->status = News::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = News::join('type_news', 'type_news.idType', '=', 'news.type');

        if ($status && $status != "All") {
            $query->where('news.status', $status);
        }
        $result = $query->orderBy('news.created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
