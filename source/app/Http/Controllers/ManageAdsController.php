<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Models\Ads;
use Vanguard\News;
use Auth;
use Request;
use Vanguard\Repositories\Ads\AdsRepository;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageAdsController extends Controller
{

    private $ads;
    private  $perPage = 10;
    public function __construct(AdsRepository $ads)
    {
        $this->middleware('auth');
        $this->middleware('permission:ads.manage');
        $this->ads = $ads;
//        echo 'OK';exit();
    }
    public function lists()
    {

        $statusCurr = Input::get('status');
        $listNews = $this->ads->paginate($this->perPage, '', Input::get('status'));

        return view('manage-ads.list-ads', compact('listNews', 'statusCurr'));
    }
    public function create()
    {
        $edit = false;
        return view('manage-ads.add-ads', compact('edit'));
    }
    public function add()
    {
        $params = Input::all();
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['img'] = $thumb;
        $user = Auth::user();
        $params['created_by'] = $user->id;
        $this->ads->create($params);

        return redirect()->route('adsadmin.create')
            ->withSuccess(trans('Thêm quảng cáo mới thành công!'));
    }

    public function edit($id)
    {
        $edit = true;
        $news = Ads::where('ads.id',$id)->get();
        if(!empty($news)){
            $news = $news[0];
        }
        return view('manage-ads.add-ads', compact('edit', 'news'));
    }
    public function update($id)
    {
        $params = Input::all();
        if(!empty($_FILES['fileimg'])){
            $thumb = $this->uploadDoc($_FILES['fileimg']);
            $params['img'] = $thumb;
        }

        $user = Auth::user();
        $params['updated_by'] = $user->id;
        $this->ads->update($params, $id);

        return redirect()->route('adsadmin.edit',$id)
            ->withSuccess(trans('Cập nhật quảng cáo thành công!'));
    }

    public function delete($id)
    {
        $this->ads->delete($id);

        return redirect()->route('adsadmin.lists')
            ->withSuccess('Xóa ads thành công!');
    }

    private function uploadDoc($fileName)
    {
        if (!empty($fileName['name'])) {
            $uploads_dir = 'upload/ads';
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