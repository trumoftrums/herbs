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
use Vanguard\User;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class NewsController extends Controller
{

    private $news;
    public function __construct(NewsRepository $news)
    {
        $this->middleware('auth');
        $this->middleware('permission:news.user');
        $this->news = $news;
    }
    public function listNews()
    {
        $listNews = News::where('status', News::STATUS_ACTIVED)
            ->where('type', News::TYPE_NOIBO)
            ->orderBy('id', 'desc')
            ->get();

        return view('news.list-news', compact('listNews'));
    }
    public function detailNews($id)
    {
        $news = News::find($id);

        return view('news.detail-news', compact('news'));
    }
    public function leaderHSG()
    {
        return view('manage-news.leader-hsg');
    }
}