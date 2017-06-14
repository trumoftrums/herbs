<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Auth;
use Request;
use Vanguard\Models\TuDien;
use Vanguard\Project;
use Vanguard\Repositories\DuAn\DuAnRepository;
use Vanguard\Repositories\TuDien\TuDienRepository;
use Vanguard\TypeNews;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageDuAnController extends Controller
{

    private $dict;
    private  $perPage = 10;
    public function __construct(DuAnRepository $news)
    {
        $this->middleware('auth');
        $this->middleware('permission:duan.manage');
        $this->dict = $news;
    }
    public function lists()
    {

        $statusCurr = Input::get('status');
        $listNews = $this->dict->paginate($this->perPage, '', Input::get('status'));

        return view('manage-duan.lists', compact('listNews', 'statusCurr'));
    }
    public function create()
    {
        $edit = false;
        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-duan.add', compact('edit', 'listTypeNews'));
    }
    public function add()
    {
        $params = Input::all();
//        var_dump($params);exit();
        if(!empty($params['tenDuAn'])){


            $user = Auth::user();
            $params['created_by'] = $user->id;
            $params['updated_by'] = $user->id;

            $IMGs =array();

            for($i =1;$i<=5;$i++){
                if(isset($params['slideIMG'.$i]) && !empty($params['slideIMG'.$i])){
                    $img = $this->uploadDoc($_FILES['slideIMG'.$i]);
                    $IMGs[] = $img;

                }
            }
            $params['slideIMGs'] = $IMGs;


            $this->dict->create($params);
        }else{
            return redirect()->route('duanadmin.create',['dict'=>$params])
                ->withErrors('Vui lòng nhập đầy đủ thông tin');
        }


        return redirect()->route('duanadmin.lists')
            ->withSuccess(trans('Thêm dự án mới thành công!'));
    }

    public function edit($id)
    {
        $edit = true;
        $dict = Project::where("id",$id)->get()->toArray();
        if(!empty($dict)){
            $dict = $dict[0];
        }
//        var_dump($dict);exit();
        return view('manage-duan.add', compact('edit', 'dict'));
    }
    public function update($id)
    {
        $params = Input::all();
        if(!empty($id) && !empty($params['tenDuAn'])){


            $user = Auth::user();
            $params['updated_by'] = $user->id;


            $IMGs =array();
            if(!empty($params['slideIMG'])){
                for($i =1;$i<=5;$i++){
                    if(!empty($params['slideIMG'][$i]) && !empty($params['slideIMG'.$i])){
                        $img = $this->uploadDoc($_FILES['slideIMG'.$i]);
                        $IMGs[] = array(
                            'name' =>$params['slideIMG'][$i]['name'],
                            'img' =>$img
                        );

                    }
                }
                if(!empty($IMGs)){
                    $params['slideIMGs'] = $IMGs;
                }


            }
            $this->dict->update($params,$id);
        }else{
            return redirect()->route(['duanadmin.edit',$id])
                ->withErrors('Vui lòng nhập tên dự án');
        }


        return redirect()->route('duanadmin.lists')
            ->withSuccess(trans('Sửa thông tin dự án thành công!'));
    }

    public function delete($id)
    {
        $this->dict->delete($id);

        return redirect()->route('duanadmin.lists')
            ->withSuccess('Xóa dự án thành công!');
    }

    private function uploadDoc($fileName)
    {
        if (!empty($fileName['name'])) {
            $uploads_dir = 'upload/duan';
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