<?php

namespace Vanguard\Http\Controllers;

use Intervention\Image\Gd\Commands\InvertCommand;
use Vanguard\Branch;
use Vanguard\Invest;
use Vanguard\Models\CategoryNews;
use Vanguard\News;
use Vanguard\Project;
use Vanguard\QA;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\News\NewsRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Auth;
use Carbon\Carbon;
use Vanguard\TypeNews;

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
                    $tt = $newsRepository->getLastest(5,null,$v['id']);
                    if(!empty($tt)){
                        $listTintuc[$type['idType']]['data'][$v['id']]['data'] = $tt;
                    }

                }
                $all = $newsRepository->getLastest(5,$type['idType']);
                $listTintuc[$type['idType']]['all'] = $all;
            }
        }
//        var_dump($listTintuc[1]['data']);exit();


        return view('frontend.home', array('listSlideShow'=>$listSlideShow,'listTintuc'=>$listTintuc));
    }
    public function tudienduoclieu()
    {
        return view('frontend.tu-dien-duoc-lieu', []);
    }
    public function tudienduoclieuDetail($id)
    {
        return view('frontend.tu-dien-duoc-lieu-detail', []);
    }
    public function sanpham()
    {
        return view('frontend.san-pham', []);
    }
    public function duan()
    {
        return view('frontend.du-an', []);
    }
    public function gioithieu()
    {
        return view('frontend.gioi-thieu', []);
    }
    public function phanphoi()
    {
        return view('frontend.phan-phoi', []);
    }
    public function tintuc($id_type)
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
        return view('frontend.tin-tuc', compact('title'));
    }
    public function tintucDetail($id)
    {
        return view('frontend.tin-tuc-detail', []);
    }

}