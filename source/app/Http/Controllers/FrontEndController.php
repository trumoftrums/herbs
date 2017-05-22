<?php

namespace Vanguard\Http\Controllers;

use Intervention\Image\Gd\Commands\InvertCommand;
use Vanguard\Branch;
use Vanguard\Invest;
use Vanguard\News;
use Vanguard\Project;
use Vanguard\QA;
use Vanguard\Repositories\Activity\ActivityRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Support\Enum\UserStatus;
use Auth;
use Carbon\Carbon;

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
    public function index()
    {
        return view('frontend.home', array());
    }

    public function tuyendung()
    {
        $listNewsTuyendung = News::where('status', News::STATUS_ACTIVED)
            ->where('type', News::TYPE_TD)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        return view('frontend.tuyen-dung', compact('listNewsTuyendung'));
    }
    public function lienhe()
    {
        return view('frontend.lien-he', array());
    }
    public function giaiphapdautu()
    {
        return view('frontend.giai-phap-dau-tu', array());
    }
    public function hosocongty()
    {
        return view('frontend.ho-so-cong-ty', array());
    }
    public function nhansu()
    {
        return view('frontend.nhan-su', array());
    }
    public function doitac()
    {
        return view('frontend.doi-tac', array());
    }
    public function baocaotaichinh()
    {
        $listBranch = Branch::where('status', Branch::STATUS_ACTIVED)->get();
        foreach ($listBranch as &$item){
            $item->listProject = Project::where('idBranch', $item->id)
                ->where('status', Project::STATUS_ACTIVED)
                ->get();
        }

        return view('frontend.bao-cao-tai-chinh', compact('listBranch'));
    }
    public function hoidap()
    {
        $listQA = QA::where('status', QA::STATUS_ACTIVED)->get();
        $listNewsRelated = News::where('status', News::STATUS_ACTIVED)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('frontend.hoi-dap', compact('listNewsRelated', 'listQA'));
    }
    public function dautu()
    {
        $title = "TIN DOANH NGHIỆP";
        $listNews = News::where('status', News::STATUS_ACTIVED)
            ->where('type', News::TYPE_DAUTU)
            ->orderBy('created_at', 'desc')
            ->paginate(self::perpage);
        /*echo "<pre>";
        print_r($listNews);die;*/

        return view('frontend.dau-tu', compact('listNews', 'title'));
    }
    public function quanlytaichinhcanhan()
    {
        $title = "TIN THỊ TRƯỜNG";
        $listNews = News::where('status', News::STATUS_ACTIVED)
            ->where('type', News::TYPE_TCCN)
            ->orderBy('created_at', 'desc')
            ->paginate(self::perpage);

        return view('frontend.dau-tu', compact('listNews', 'title'));
    }
    public function dautuDetail($id)
    {
        $news = News::find($id);
        $listNewsRelated = News::where('status', News::STATUS_ACTIVED)
            ->where('type', $news->type)
            ->orderBy('created_at', 'desc')
            ->whereNotIn('id', [$news->id])
            ->limit(5)
            ->get();

        return view('frontend.dau-tu-detail', compact('news', 'listNewsRelated'));
    }

}