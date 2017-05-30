<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Auth;
use Request;
use Vanguard\Models\TuDien;
use Vanguard\Repositories\TuDien\TuDienRepository;
use Vanguard\TypeNews;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageTuDienController extends Controller
{

    private $dict;
    private  $perPage = 10;
    public function __construct(TuDienRepository $news)
    {
        $this->middleware('auth');
        $this->middleware('permission:dictadmin.manage');
        $this->dict = $news;
    }
    public function listDict()
    {

        $statusCurr = Input::get('status');
        $listNews = $this->dict->paginate($this->perPage, '', Input::get('status'));

        return view('manage-tudien.list-tudien', compact('listNews', 'statusCurr'));
    }
    public function createDict()
    {
        $edit = false;
        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-tudien.add-tudien', compact('edit', 'listTypeNews'));
    }
    public function addDict()
    {
        $params = Input::all();
//        var_dump($params);exit();
        if(!empty($params['tenDuocLieu']) && !empty($params['thumb'])){


            $user = Auth::user();
            $params['created_by'] = $user->id;
            $params['updated_by'] = $user->id;
            if(!empty($params['thumb'])){
                $thumb = $this->uploadDoc($_FILES['thumb']);
                $params['thumb'] = $thumb;
            }
            $IMGs =array();
            if(!empty($params['slideIMG'])){
                for($i =1;$i<=5;$i++){
                    if(!empty($params['slideIMG'][$i]) && !empty($params['slideIMG'.$i])){
                        $img = $this->uploadDoc($_FILES['slideIMG'.$i]);
                        $IMGs[] = array(
                            'name' =>$params['slideIMG'][$i],
                            'img' =>$img
                        );

                    }
                }
                $params['slideIMGs'] = json_encode($IMGs);

            }
            $this->dict->create($params);
        }else{
            return redirect()->route('dictadmin.create',['dict'=>$params])
                ->withErrors('Vui lòng nhập đầy đủ thông tin');
        }


        return redirect()->route('dictadmin.list')
            ->withSuccess(trans('Thêm dược liệu mới thành công!'));
    }

    public function editDict($id)
    {
        $edit = true;
        $dict = TuDien::where("id",$id)->get()->toArray();
        if(!empty($dict)){
            $dict = $dict[0];
        }
        return view('manage-tudien.add-tudien', compact('edit', 'dict'));
    }
    public function updateDict($id)
    {
        $params = Input::all();
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['thumb'] = $thumb;
        $user = Auth::user();
        $params['updated_by'] = $user->id;

//        var_dump($params);exit();
        $this->dict->update($params, $id);

        return redirect()->route('newsadmin.edit',$id)
            ->withSuccess(trans('Cập nhật dược liệu thành công!'));
    }

    public function deleteDict($id)
    {
        $this->dict->delete($id);

        return redirect()->route('newsadmin.list')
            ->withSuccess('Xóa dược liệu thành công!');
    }

    private function uploadDoc($fileName)
    {
        if (!empty($fileName['name'])) {
            $uploads_dir = 'upload/duoclieu';
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777);
            }
            $tmp_name = $fileName['tmp_name'];
            $orginName = explode(".", $fileName['name']);
            $ext = "";
            if (count($orginName) > 1) {
                $ext = "." . $orginName[count($orginName) - 1];
            }
            $nfname = md5_file($tmp_name) . $ext;

            $nPath = "$uploads_dir/$nfname";

            if (!file_exists($nPath)) {
                if (move_uploaded_file($tmp_name, $nPath)) {
                    return $nPath;
                }
            } else {
                return $nPath;
            }

        }
        return null;

    }

}