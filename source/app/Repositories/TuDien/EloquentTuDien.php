<?php

namespace Vanguard\Repositories\TuDien;

use Vanguard\Models\TuDien;

class EloquentTuDien implements TuDienRepository
{
    /**
     * {@inheritdoc}
     */

    public function create(array $data)
    {
        $now = date("Y-m-d H:i:s");
        $bd = new TuDien();
        $bd->tenDuocLieu = $data['tenDuocLieu'];
        $bd->tenKhoaHoc = $data['tenKhoaHoc'];
        $bd->tenDongNghia = $data['tenDongNghia'];
        $bd->tenKhac = $data['tenKhac'];
        $bd->moTa = $data['moTa'];
        $bd->phanBoSinhThai = $data['phanBoSinhThai'];
        $bd->boPhanSuDung = $data['boPhanSuDung'];
        $bd->thanhPhanHoaHoc = $data['thanhPhanHoaHoc'];
        $bd->tacDung = $data['tacDung'];
        $bd->thumb = $data['thumb'];
        $bd->baiThuoc = $data['baiThuoc'];
        $bd->slideIMGs = json_encode($data['slideIMGs'],true);
        $bd->created_at = $now;
        $bd->created_by = $data['created_by'];
        $bd->updated_at = $now;
        $bd->updated_by = $data['updated_by'];
        $bd->status = TuDien::STATUS_ACTIVED;

        $bd->save();
    }


    public function update(array $data, $id)
    {
        $now = date("Y-m-d H:i:s");
        $bd = TuDien::find($id);
        $bd->tenDuocLieu = $data['tenDuocLieu'];
        $bd->tenKhoaHoc = $data['tenKhoaHoc'];
        $bd->tenDongNghia = $data['tenDongNghia'];
        $bd->tenKhac = $data['tenKhac'];
        $bd->moTa = $data['moTa'];
        $bd->phanBoSinhThai = $data['phanBoSinhThai'];
        $bd->boPhanSuDung = $data['boPhanSuDung'];
        $bd->thanhPhanHoaHoc = $data['thanhPhanHoaHoc'];
        $bd->tacDung = $data['tacDung'];
        $bd->baiThuoc = $data['baiThuoc'];
        $bd->updated_at = $now;
        $bd->updated_by = $data['updated_by'];
        if(!empty($data['slideIMGs'])){
            $bd->slideIMGs = json_encode($data['slideIMGs'],true);
        }


        $bd->save();
    }


    public function delete($id)
    {
        $bd = TuDien::find($id);
        $bd->status = TuDien::STATUS_DELETED;

        $bd->save();
    }

    public function paginate($perPage, $search = null, $status = null)
    {
        $query = TuDien::join('users', 'users.id', '=', 'duoc_lieu.created_by')
            ->select("duoc_lieu.*","users.username","users.first_name","users.last_name");

        if ($status && $status != "All") {
            $query->where('duoc_lieu.status', $status);
        }
        $result = $query->orderBy('duoc_lieu.created_at', 'desc')
            ->paginate($perPage);

        return $result;
    }
    public function getLastest($num = 3,$type = null,$cat =null)
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
        $result = $query->orderBy('news.created_at', 'desc')->limit($num)->get()->toArray();

        return $result;
    }


}
