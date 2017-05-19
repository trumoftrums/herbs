<?php

namespace Vanguard\Repositories\QA;

use Vanguard\QA;

class EloquentQA implements QARepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $bd = new QA();
        $bd->question = $data['question'];
        $bd->answer = $data['answer'];
        $bd->status = QA::STATUS_ACTIVED;

        $bd->save();
    }


    public function update(array $data, $id)
    {
        $bd = QA::find($id);
        $bd->question = $data['question'];
        $bd->answer = $data['answer'];

        $bd->save();
    }


    public function delete($id)
    {
        $bd = QA::find($id);
        $bd->status = QA::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = QA::query();

        if ($status && $status != "All") {
            $query->where('status', $status);
        }
        $result = $query->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }

}
