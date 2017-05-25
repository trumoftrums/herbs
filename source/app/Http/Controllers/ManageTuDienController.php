<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Models\CategoryNews;
use Vanguard\News;
use Vanguard\Repositories\CatNews\CatNewsRepository;
use Vanguard\Repositories\News\NewsRepository;
use Auth;
use Request;
use Vanguard\Repositories\TuDien\TuDienRepository;
use Vanguard\TypeNews;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageTuDienController extends Controller
{

    private $news;
    private  $perPage = 10;
    public function __construct(TuDienRepository $news)
    {
        $this->middleware('auth');
        $this->middleware('permission:dictadmin.manage');
        $this->news = $news;
    }
    public function listDict()
    {

        $statusCurr = Input::get('status');
        $listNews = $this->news->paginate($this->perPage, '', Input::get('status'));

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
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['thumb'] = $thumb;
        $user = Auth::user();
        $params['created_by'] = $user->id;
        $this->news->create($params);

        return redirect()->route('newsadmin.create')
            ->withSuccess(trans('Thêm dược liệu mới thành công!'));
    }

    public function editDict($id)
    {
        $edit = true;
        $news = News::join('category_new', 'category_new.id', '=', 'news.category')
            ->join('type_news', 'type_news.idType', '=', 'category_new.type')
            ->select("news.*","category_new.id as idCategory","type_news.idType")->where('news.id',$id)->get();
//        var_dump($news);exit();
        if(!empty($news)){
            $news = $news[0];
        }

        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-news.add-news', compact('edit', 'news', 'listTypeNews'));
    }
    public function updateDict($id)
    {
        $params = Input::all();
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['thumb'] = $thumb;
        $user = Auth::user();
        $params['updated_by'] = $user->id;
//        var_dump($params);exit();
        $this->news->update($params, $id);

        return redirect()->route('newsadmin.edit',$id)
            ->withSuccess(trans('Cập nhật dược liệu thành công!'));
    }

    public function deleteDict($id)
    {
        $this->news->delete($id);

        return redirect()->route('newsadmin.list')
            ->withSuccess('Xóa dược liệu thành công!');
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