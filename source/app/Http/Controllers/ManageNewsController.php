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
use Vanguard\TypeNews;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageNewsController extends Controller
{

    private $news;
    private  $perPage = 10;
    public function __construct(NewsRepository $news)
    {
        $this->middleware('auth');
        $this->middleware('permission:newsAdmin.manage');
        $this->news = $news;
    }
    public function listNews()
    {

        $statusCurr = Input::get('status');
        $listNews = $this->news->paginate($this->perPage, '', Input::get('status'));

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
        $user = Auth::user();
        $params['created_by'] = $user->id;
        $this->news->create($params);

        return redirect()->route('newsadmin.create')
            ->withSuccess(trans('Thêm tin tức mới thành công!'));
    }

    public function editNews($id)
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
    public function updateNews($id)
    {
        $params = Input::all();
        $thumb = $this->uploadDoc($_FILES['fileimg']);
        $params['thumb'] = $thumb;
        $user = Auth::user();
        $params['updated_by'] = $user->id;
//        var_dump($params);exit();
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
    public  function getNewCategory(){
        $result = array(
            'result' =>false,
            'mess' =>'',
            'data'=>array()
        );
        $type = Request::get("type");
        $data = CategoryNews::where('status',CategoryNews::STATUS_ACTIVED)->where('type',$type)->orderBy("id","asc")
            ->get()->toArray();
        if(!empty($data)){
            $result['result'] = true;
            $result['data'] = $data;
        }
        return response($result)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
    }
    public function listTypeNews(CatNewsRepository $catNew){
        $statusCurr = Input::get('status');
        $listCats = $catNew->paginate($this->perPage, '', $statusCurr);

        return view('manage-news.list-cat-news', compact('listCats', 'statusCurr'));
    }
    public function createCat()
    {
        $edit = false;
        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-news.add-cat', compact('edit', 'listTypeNews'));
    }
    public function addCat(CatNewsRepository $catNew)
    {
        $params = Input::all();
        $catNew->create($params);

        return redirect()->route('catnewadmin.create')
            ->withSuccess(trans('Thêm category mới thành công!'));
    }

    public function editCat($id)
    {
        $edit = true;
        $cat = CategoryNews::join('type_news', 'type_news.idType', '=', 'category_new.type')
            ->select("category_new.*","type_news.idType")->where('category_new.id',$id)->get();
        if(!empty($cat)){
            $cat = $cat[0];
        }

        $listTypeNews = TypeNews::where('status', TypeNews::STATUS_ACTIVED)->get();

        return view('manage-news.add-cat', compact('edit', 'cat', 'listTypeNews'));
    }
    public function updateCat($id,CatNewsRepository $catNew)
    {
        $params = Input::all();

        $catNew->update($params, $id);

        return redirect()->route('catnewadmin.edit',$id)
            ->withSuccess(trans('Cập nhật category thành công!'));
    }

    public function deleteCat($id,CatNewsRepository $catNew)
    {
        $catNew->delete($id);

        return redirect()->route('catnewadmin.list')
            ->withSuccess('Xóa category thành công!');
    }
}