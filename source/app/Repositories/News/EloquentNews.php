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
        $bd->category = $data['typeNews'];
        $bd->status = News::STATUS_ACTIVED;
        $bd->created_by = $data['created_by'];
        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = News::find($id);
        $bd->title = $data['title'];
        $bd->summary = $data['summary'];
        $bd->description = $data['description'];
        $bd->category = $data['category'];
        $bd->updated_by = $data['updated_by'];
        $bd->status = News::STATUS_ACTIVED;
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
        $query = News::join('category_new', 'category_new.id', '=', 'news.category')
            ->join('type_news', 'type_news.idType', '=', 'category_new.type')
            ->join('users', 'users.id', '=', 'news.created_by')
            ->select("news.*","category_new.id as idCategory","category_new.nameCategory","type_news.nameType","users.username","users.first_name","users.last_name");

        if ($status && $status != "All") {
            $query->where('news.status', $status);
        }
        $result = $query->orderBy('news.created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }
    public function getLastest($num = 3,$type = null,$cat =null,$notInCat =null)
    {

        $query = News::join('category_new', 'category_new.id', '=', 'news.category')
            ->join('type_news', 'type_news.idType', '=', 'category_new.type')
            ->join('users', 'users.id', '=', 'news.created_by')
            ->where('news.status', News::STATUS_ACTIVED)
            ->select("news.*","category_new.id as idCategory","category_new.nameCategory","type_news.nameType","users.username","users.first_name","users.last_name");
        if(!empty($type)){
            $query  = $query->where('type_news.idType', $type);
        }
        if(!empty($cat)){
            $query  = $query->where('news.category', $cat);
        }
        if(!empty($notInCat)){
            foreach ($notInCat as $vl){
                $query  = $query->where('news.category','<>', $vl);
            }

        }
//        var_dump($query);exit();
        $result = $query->orderBy('news.created_at', 'desc')->limit($num)->get()->toArray();

        return $result;
    }


}
