<?php

namespace Vanguard\Http\Controllers;

use Cache;
use Vanguard\Branch;
use Vanguard\Document;
use Vanguard\Http\Requests\Role\CreateRoleRequest;
use Vanguard\Http\Requests\Role\UpdateRoleRequest;
use Vanguard\Invest;
use Vanguard\InvestType;
use Vanguard\Project;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Vanguard\Repositories\Role\RoleRepository;
use Vanguard\Repositories\User\UserRepository;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Role;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use  Request;
use DB;
use Vanguard\InvestResult;
use Vanguard\InvestTrade;
use Vanguard\InvestDocs;

/**
 * Class InvestController
 * @package Vanguard\Http\Controllers
 */
class DocsviewController extends Controller
{
    /**
     * @var RoleRepository
     */
    private $roles;

    /**
     * RolesController constructor.
     * @param RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
    {
        $this->middleware('auth');
        $this->middleware('permission:docs.view');
        $this->roles = $roles;


    }

    /**
     * Display page with all available roles.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->roles->getAllWithUsersCount();

        return view('role.index', compact('roles'));
    }

    /**
     * Display form for creating new role.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function listDocs(){

        $listBranch = Branch::where('status', Branch::STATUS_ACTIVED)->get();
        foreach ($listBranch as &$item){
            $item->listProject = Project::where('idBranch', $item->id)
                ->where('status', Project::STATUS_ACTIVED)
                ->get();
        }

        return view('docsview.list-docs', compact('listBranch'));
    }
    public function detailProject($idProject=""){
        $mess = "";
        if(!empty($idProject)){
            $dt = Document::getDocsByProject($idProject);
            if(!empty($dt)){
                return view('docsview.detail-docs', array('data'=>$dt));
            }else{
                $mess ="Không tìm thấy tài liệu của dự án này!";
            }
        }else{
            $mess ="Dự án không hợp lệ!";
        }
        return redirect()->route('docsview.list')
            ->withErrors($mess);

    }
}