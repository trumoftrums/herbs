<?php

namespace Vanguard\Http\Controllers;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Repositories\User\UserRepository;
use Auth;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Request;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class InvestTypeController extends Controller
{
    /**
     * @var UserRepository
     */
//    private $users;

    /**
     * UsersController constructor.
     * @param UserRepository $users
     */
//    public function __construct(UserRepository $users)
//    {
//        $this->middleware('auth');
//        $this->middleware('session.database', ['only' => ['sessions', 'invalidateSession']]);
//        $this->middleware('permission:investtype.manage');
//        $this->users = $users;
//    }

    /**
     * Display paginated list of all users.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $perPage = 20;
//
//        $users = $this->users->paginate($perPage, Input::get('search'), Input::get('status'));
//        $statuses = ['' => trans('app.all')] + UserStatus::lists();

//        return view('investtype.list', compact('users', 'statuses'));
        return view('investtype.list', array());
    }
    public function getInvestType(InvestTypeRepository $investTypes){

        $result = array(
            'result' => false,
            'mess' => '',
            'data'=>null
        );
        if (Auth::check()) {
            $formData = Request::all();
            if(!empty($formData['cvl'])){
                $datas = $investTypes->getTypebyID($formData['cvl'],true);
                if(!empty($datas)){
                    $result['data'] = $datas;
                    $result['result'] = true;
                }else{
                    $result['mess'] = "Data not found";
                }
            }else{
                $result['mess'] = "Data not found";
            }

        }else{
            $result['mess'] = "Do not have permission";
        }

        return response($result)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
    }
    public function getBienDong(BienDongRepository $bd){
        $result = array(
            'result' => false,
            'mess' => '',
            'data'=>null
        );
        if (Auth::check()) {
            $formData = Request::all();
            if(!empty($formData['date'])){
//                $date = str_replace("-","",$formData['date'])."000000";
                $date = $formData['date'];
                $datas = $bd->getByDate($date);
                if(!empty($datas)){

                    $result['data'] = $datas;
                    $result['result'] = true;
                }else{
                    $result['mess'] = "Data not found";
                }
            }else{
                $result['mess'] = "Data not found";
            }

        }else{
            $result['mess'] = "Do not have permission";
        }

        return response($result)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
    }


}