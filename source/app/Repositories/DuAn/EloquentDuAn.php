<?php

namespace Vanguard\Repositories\DuAn;

use Vanguard\Project;

class EloquentDuAn implements DuAnRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $now = date("Y-m-d H:i:s");
        $bd = new Project();
        $bd->tenDuAn = $data['tenDuAn'];
        $bd->tenKhoaHoc = $data['tenKhoaHoc'];
        $bd->moTa = $data['moTa'];
        $bd->thoiGianTrienKhai = $data['thoiGianTrienKhai'];
        $bd->duKienHoanThanh = $data['duKienHoanThanh'];
        $bd->thanhPhanHoaHoc = $data['thanhPhanHoaHoc'];
        $bd->tacDung = $data['tacDung'];
        $bd->slideIMGs = json_encode($data['slideIMGs'],true);
        $bd->created_at = $now;
        $bd->created_by = $data['created_by'];
        $bd->updated_at = $now;
        $bd->updated_by = $data['updated_by'];
        $bd->status = Project::STATUS_ACTIVED;

        $bd->save();
    }


    public function update(array $data, $id)
    {
        $now = date("Y-m-d H:i:s");
        $bd = Project::find($id);
        $bd->tenDuAn = $data['tenDuAn'];
        $bd->tenKhoaHoc = $data['tenKhoaHoc'];
        $bd->moTa = $data['moTa'];
        $bd->thoiGianTrienKhai = $data['thoiGianTrienKhai'];
        $bd->duKienHoanThanh = $data['duKienHoanThanh'];
        $bd->thanhPhanHoaHoc = $data['thanhPhanHoaHoc'];
        $bd->tacDung = $data['tacDung'];
        $bd->updated_at = $now;
        $bd->updated_by = $data['updated_by'];
        if(!empty($data['slideIMGs'])){
            $bd->slideIMGs = json_encode($data['slideIMGs'],true);
        }

        $bd->save();
    }


    public function delete($id)
    {
        $bd = Project::find($id);
        $bd->status = Project::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = Project::join('users', 'users.id', '=', 'projects.created_by')
            ->select("projects.*","users.username","users.first_name","users.last_name");

        if ($status && strtolower($status) != "all") {
            $query->where('projects.status', $status);
        }
        if (!empty($search) && strtolower($search) != "all") {
            $query->whereRaw("projects.tenDuAn like '%$search%' 
            or projects.tenKhoaHoc like '%$search%' ");
        }
        $result = $query->orderBy('projects.created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }


}
