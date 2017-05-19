<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\News;
use Vanguard\Repositories\News\NewsRepository;
use Vanguard\Repositories\User\UserRepository;
use Auth;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Request;
use Vanguard\BienDong;
use Vanguard\Http\Requests\Invest\BienDongRequest;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\TypeNews;
use Vanguard\User;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageNewsController extends Controller
{

    private $news;
    public function __construct(NewsRepository $news)
    {
        $this->middleware('auth');
        $this->middleware('permission:newsAdmin.manage');
        $this->news = $news;
    }
    public function listNews()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listNews = $this->news->paginate($perPage, '', Input::get('status'));

        return view('manage-news.list-news', compact('listNews', 'statusCurr'));
    }
    public function createNews()
    {
        $edit = false;
        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-news.add-news', compact('edit', 'listTypeNews'));
    }
    public function addNews()
    {
        $params = Input::all();
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['thumb'] = $thumb;
        $this->news->create($params);

        return redirect()->route('newsadmin.create')
            ->withSuccess(trans('Thêm tin tức mới thành công!'));
    }

    public function editNews($id)
    {
        $edit = true;
        $news = News::find($id);
        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-news.add-news', compact('edit', 'news', 'listTypeNews'));
    }
    public function updateNews($id)
    {
        $params = Input::all();
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['thumb'] = $thumb;
        $this->news->update($params, $id);

        return redirect()->route('newsadmin.edit',$id)
            ->withSuccess(trans('Cập nhật tin tức thành công!'));
    }

    public function deleteNews($id)
    {
        $this->news->delete($id);

        return redirect()->route('newsadmin.list')
            ->withSuccess('Xóa tin tức thành công!');
    }

    private function uploadDoc($fileName)
    {
        if (!empty($fileName['name'])) {
            $uploads_dir = 'upload/news';
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