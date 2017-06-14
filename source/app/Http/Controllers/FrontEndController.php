<?php

namespace Vanguard\Http\Controllers;

use Intervention\Image\Gd\Commands\InvertCommand;
use Vanguard\Branch;
use Vanguard\Invest;
use Vanguard\Models\Ads;
use Vanguard\Models\CategoryNews;
use Vanguard\Models\TuDien;
use Vanguard\Models\Video;
use Vanguard\News;
use Vanguard\Project;
use Vanguard\QA;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\News\NewsRepository;
use Vanguard\Repositories\TuDien\TuDienRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Auth;
use Carbon\Carbon;
use Vanguard\TypeNews;
use Request;
use Vanguard\Models\Options;
class FrontEndController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var ActivityRepository
     */
    private $activities;

    const perpage = 9;
    /**
     * DashboardController constructor.
     * @param UserRepository $users
     * @param ActivityRepository $activities
     */
    public function __construct(UserRepository $users, ActivityRepository $activities)
    {
        //$this->middleware('auth');
        $this->users = $users;
        $this->activities = $activities;
    }

    /**
     * Displays dashboard based on user's role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(NewsRepository $newsRepository)
    {
        $listSlideShow = $newsRepository->getLastest(3);
        $listTintuc = array();
        $listType = TypeNews::where("status",TypeNews::STATUS_ACTIVED)->limit(3)->orderBy('created_at','desc')->get()->toArray();
        foreach ($listType as $type){
            $cats= CategoryNews::where('status',CategoryNews::STATUS_ACTIVED)->where('type',$type['idType'])
                ->limit(3)->orderBy('created_at','desc')->get()->toArray();
            $listTintuc[$type['idType']]['info'] = $type;
            $listTintuc[$type['idType']]['data'] = array();
            if(!empty($cats)){


                foreach ($cats as $v){
                    $listTintuc[$type['idType']]['data'][$v['id']]['info'] = $v;
                    $listTintuc[$type['idType']]['data'][$v['id']]['data'] = array();
                    $tt = $newsRepository->getLastest(5,null,$v['id'],array(10));
                    if(!empty($tt)){
                        $listTintuc[$type['idType']]['data'][$v['id']]['data'] = $tt;
                    }

                }
                $all = $newsRepository->getLastest(5,$type['idType'],null,array(10));
                $listTintuc[$type['idType']]['all'] = $all;
            }
        }
        $listHoatDong = array();
        $listHoatDong = $newsRepository->getLastest(3,null,10);
//        var_dump($listTintuc[1]['data']);exit();


        return view('frontend.home', array(
            'listSlideShow'=>$listSlideShow,
            'listTintuc'=>$listTintuc,
            'listHoatDong'=>$listHoatDong,
            'listAds'=>$this->getListAds(5),
            'listVideos'=>$this->getListVideo()
        ));
    }
    private function  getListVideo($num = 4){
        $data = Video::where('status',Video::STATUS_ACTIVED)->orderBy("id","desc")->limit($num)->get();
        return $data;
    }
    public function viewVideo($idSLug){
        $data = Video::where("status",Video::STATUS_ACTIVED)->where("id",$idSLug)->get();
        if(!empty($data)) $data = $data[0];
        return view('frontend.view-video', [
            'data'=>$data,
        ]);
    }
    private function getListAds($limit = 10){
        $listAds = Ads::where('status',Ads::STATUS_ACTIVED)->orderBy('weight','asc')->limit($limit)->get()->toArray();
        return $listAds;
    }
    public function tudienduoclieu(TuDienRepository $tudien, NewsRepository $newsRepository)
    {
        $params = Request::all();
        $urlParams = '?search=all';
        $search = "all";
        if(!empty($params['search']) && strtolower($params['search']) != 'all'){
            $search = $params['search'];
            $search = str_replace("'","",$search);
            $search = str_replace('"',"",$search);
            $search = strip_tags($search);
        }
        $datas = $tudien->paginate(7,$search,TuDien::STATUS_ACTIVED)->setPath($urlParams);
        $listHoatDong = array();
        $listHoatDong = $newsRepository->getLastest(3,null,10);
//        var_dump($datas);
        return view('frontend.tu-dien-duoc-lieu', [
            'datas'=>$datas,
            'search'=>$search,
            'listHoatDong'=>$listHoatDong,
            'listAds'=>$this->getListAds(5),
            'listVideos'=>$this->getListVideo()
        ]);
    }
    public function tudienduoclieuDetail($idSlug ,NewsRepository $newsRepository)
    {
        $dict =array();
        if(!empty($idSlug)){
            $arr = explode("-",$idSlug);
            if(count($arr)>1){
                $id = $arr[count($arr)-1];
                $dict = TuDien::where("id",$id)->where("status",TuDien::STATUS_ACTIVED)->get()->toArray();
                if(!empty($dict)) $dict = $dict[0];
            }
        }
        $listHoatDong = array();
        $listHoatDong = $newsRepository->getLastest(3,null,10);
        return view('frontend.tu-dien-duoc-lieu-detail', [
            'dict'=>$dict,
            'listHoatDong'=>$listHoatDong,
            'listAds'=>$this->getListAds(5),
            'listVideos'=>$this->getListVideo()
        ]);
    }
    public function sanpham()
    {
        return view('frontend.san-pham', []);
    }
    public function duan($id_type ,NewsRepository $newsRepository)
    {
        $projects = Project::where('id', $id_type)->first();
        $listProjects = Project::getList();
        $listHoatDong = $newsRepository->getLastest(3,null,10);

        return view('frontend.du-an', [
            'listHoatDong'=>$listHoatDong,
            'listProjects' => $listProjects,
            'listAds'=>$this->getListAds(5),
            'datas'=>$projects,
            'listVideos'=>$this->getListVideo()
        ]);
    }
    public function gioithieu(NewsRepository $newsRepository)
    {
        $listHoatDong = $newsRepository->getLastest(3,null,10);
        $data = Options::get()->toArray();
        $final =array();
        if(!empty($data)){
            foreach($data as $vl){
                $final[$vl['name']] = $vl;
            }
        }

        return view('frontend.gioi-thieu', [
            'listHoatDong'=>$listHoatDong,
            'datas'=>$final,
            'listVideos'=>$this->getListVideo()
        ]);
    }
    public function phanphoi(NewsRepository $newsRepository)
    {

        return view('frontend.phan-phoi', [
            'listVideos'=>$this->getListVideo()
        ]);
    }
    public function tintuc($id_type ,NewsRepository $newsRepository )
    {
        switch ($id_type){
            case 1:
                $title = "TIN DOANH NGHIỆP";

                break;
            case 2:
                $title = "TIN THỊ TRƯỜNG";
                break;
            case 3:
                $title = "TIN BÀI THUỐC";
                break;
            default:
                break;
        }
        $params = Request::all();
        $urlParams = '?category=all';

        $query= News::join('category_new', 'category_new.id', '=', 'news.category')
            ->join('type_news', 'type_news.idType', '=', 'category_new.type')
            ->join('users', 'users.id', '=', 'news.created_by')
            ->where('news.status', News::STATUS_ACTIVED)
            ->where('category_new.type',$id_type)
            ->where('category_new.id','<>',10)
            ->orderBy('news.created_at','desc')
            ->select("news.*","category_new.id as idCategory","category_new.nameCategory",
                "type_news.nameType","users.username","users.first_name","users.last_name");
        if(isset($params['category']) && !empty($params['category']) && strtolower($params['category']) !='all'){
            $urlParams = '?category='.$params['category'];
            $query = $query->where('category_new.slug',$params['category']);
        }
        $listCat= CategoryNews::where('status',CategoryNews::STATUS_ACTIVED)->where('type',$id_type)
            ->limit(3)->orderBy('created_at','desc')->get()->toArray();
        $listPost= $query->paginate(13)->setPath($urlParams);
        if($listPost->total()==0) $listPost =array();

        $listHoatDong = $newsRepository->getLastest(3,null,10);
        return view('frontend.tin-tuc', [
            'title'=>$title,
            'listPost'=>$listPost,
            'listCat'=>$listCat,
            'id_type'=>$id_type,
            'listHoatDong'=>$listHoatDong,
            'listAds'=>$this->getListAds(5),
            'listVideos'=>$this->getListVideo()
        ]);
    }
    public function detailNews($idSlug,NewsRepository $newsRepository)
    {
        $news = array();
        $listRelated = array();
        $arr = explode("-",$idSlug);
        if(!empty($arr)){
            $id = $arr[count($arr)-1];
            $news = News::join('category_new', 'category_new.id', '=', 'news.category')
                ->join('type_news', 'type_news.idType', '=', 'category_new.type')
                ->join('users', 'users.id', '=', 'news.created_by')
                ->where('news.status', News::STATUS_ACTIVED)
                ->where('news.id', $id)
                ->select("news.*","category_new.id as idCategory","category_new.nameCategory",
                    "type_news.nameType","users.username","users.first_name","users.last_name",'type_news.idType')
            ->get()->toArray();
            if(!empty($news)){
                $news = $news[0];
                $listRelated = News::join('category_new', 'category_new.id', '=', 'news.category')
                    ->join('type_news', 'type_news.idType', '=', 'category_new.type')
                    ->join('users', 'users.id', '=', 'news.created_by')
                    ->where('news.status', News::STATUS_ACTIVED)
                    ->where('type_news.idType', $news['idType'])
                    ->where('news.id','<>', $news['id'])
                    ->select("news.*","category_new.id as idCategory","category_new.nameCategory",
                        "type_news.nameType","users.username","users.first_name","users.last_name")
                    ->orderBy('news.created_at','desc')
                    ->limit(6)->get()->toArray();
            }

        }
        $listHoatDong = array();
        $listHoatDong = $newsRepository->getLastest(3,null,10);
        return view('frontend.tin-tuc-detail', [
            'news'=>$news,
            'listRelated'=>$listRelated,
            'listHoatDong'=>$listHoatDong,
            'listAds'=>$this->getListAds(5),
            'listVideos'=>$this->getListVideo()
        ]);
    }

}