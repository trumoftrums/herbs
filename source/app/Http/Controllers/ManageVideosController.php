<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Auth;
use Request;
use Vanguard\Models\Video;
use Vanguard\Repositories\Video\VideoRepository;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageVideosController extends Controller
{

    private $ads;
    private  $perPage = 10;
    public function __construct(VideoRepository $ads)
    {
        $this->middleware('auth');
        $this->middleware('permission:videos.manage');
        $this->ads = $ads;
    }
    public function lists()
    {

        $statusCurr = Input::get('status');
        $listNews = $this->ads->paginate($this->perPage, '', Input::get('status'));

        return view('manage-videos.lists', compact('listNews', 'statusCurr'));
    }
    public function create()
    {
        $edit = false;
        return view('manage-videos.add', compact('edit'));
    }
    public function add()
    {
        $params = Input::all();
        if(!empty($_FILES['fileimg'])){
            $thumb = $this->uploadDoc($_FILES['fileimg']);
            $params['thumbnail'] = $thumb;
        }
        if(!empty($_FILES['src'])){
            $src = $this->uploadDoc($_FILES['src']);
            $params['src'] = $src;
        }
        $user = Auth::user();
        $params['created_by'] = $user->id;
        $this->ads->create($params);

        return redirect()->route('videoadmin.create')
            ->withSuccess(trans('Thêm video mới thành công!'));
    }

    public function edit($id)
    {
        $edit = true;
        $news = Video::where('videos.id',$id)->get();
        if(!empty($news)){
            $news = $news[0];
        }
        return view('manage-videos.add', compact('edit', 'news'));
    }
    public function update($id)
    {
        $params = Input::all();
        if(!empty($_FILES['fileimg'])){
            $thumb = $this->uploadDoc($_FILES['fileimg']);
            $params['thumbnail'] = $thumb;
        }
        if(!empty($_FILES['src'])){
            $src = $this->uploadDoc($_FILES['src']);
            $params['src'] = $src;
        }

        $user = Auth::user();
        $params['updated_by'] = $user->id;
        $this->ads->update($params, $id);

        return redirect()->route('videoadmin.edit',$id)
            ->withSuccess(trans('Cập nhật video thành công!'));
    }

    public function delete($id)
    {
        $this->ads->delete($id);

        return redirect()->route('videoadmin.lists')
            ->withSuccess('Xóa video thành công!');
    }

    private function uploadDoc($fileName)
    {
        if (!empty($fileName['name'])) {
            $uploads_dir = 'upload/videos';
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