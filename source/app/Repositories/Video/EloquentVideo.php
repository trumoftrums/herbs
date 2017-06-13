<?php

namespace Vanguard\Repositories\Video;
use Vanguard\Models\Video;

class EloquentVideo implements VideoRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $bd = new Video();
        $bd->title = $data['title'];
        $bd->description = $data['description'];
        $bd->summary = $data['summary'];
        $bd->thumbnail = $data['thumbnail'];
        $bd->src = $data['src'];
        $bd->status = Video::STATUS_ACTIVED;
        $bd->created_by = $data['created_by'];
        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = Video::find($id);
        $bd->title = $data['title'];
        $bd->description = $data['description'];
        $bd->summary = $data['summary'];

        $bd->updated_by = $data['updated_by'];
        if(!empty($data['thumbnail'])){
            $bd->thumbnail = $data['thumbnail'];
        }else{
            $bd->thumbnail = $bd->thumbnail;
        }
        if(!empty($data['src'])){
            $bd->src = $data['src'];
        }else{
            $bd->src = $bd->src;
        }
        $bd->save();
    }


    public function delete($id)
    {
        $bd = Video::find($id);
        $bd->status = Video::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = Video::orderBy('videos.id', 'desc');

        if ($status && $status != "All") {
            $query->where('videos.status', $status);
        }
        $result = $query->paginate($perPage);

        return $result;
    }



}
