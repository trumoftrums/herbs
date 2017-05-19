<?php

namespace Vanguard\Http\Controllers;

use Cache;
use Vanguard\Branch;
use Vanguard\Document;
use Vanguard\Fileicon;
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
class DocsController extends Controller
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
        $this->middleware('permission:docs.manage');
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

        $crBranch = "";
        $crProject ="";
        $crStatus ="";
        if(isset($_REQUEST['idBranch']) && !empty($_REQUEST['idBranch'])){
            $crBranch =  $_REQUEST['idBranch'];
        }
        if(isset($_REQUEST['idProject']) && !empty($_REQUEST['idProject'])){
            $crProject =  $_REQUEST['idProject'];
        }
        if(isset($_REQUEST['status']) && !empty($_REQUEST['status'])){
            $crStatus =  $_REQUEST['status'];
        }
        $result =array(
            'data'=>array(),
            'listBranch'=>Branch::getList(),
            'crBranch'=>$crBranch,
            'crProject'=>$crProject,
            'crStatus'=>$crStatus

        );
        if($crStatus=='all') $crStatus = "";
        if($crProject=='all') $crProject = "";
        if($crBranch=='all') $crBranch = "";

        $result['data'] = Document::getList($crStatus,$crProject,$crBranch);
        return view('docs.list-tai-lieu',$result);
    }
    public function getProject(){
        $result=array(
            'result'=>false,
            'mess'=>''
        );
        $formDT = Request::all();
        if(!empty($formDT) && !empty($formDT['idBranch'])){
            $result['data'] = Project::getList($formDT['idBranch']);
            if(!empty($result['data'])){
                $result['result'] =true;
            }
        }
        return response($result)
            ->withHeaders([
                'Content-Type' => 'application/json'
            ]);
    }
    public function addDoc(){
        $result =array(
            'data'=>array(),
            'listBranch'=>Branch::getList(),
            'listIcon' =>Fileicon::getList(),

        );
        return view('docs.add-edit',$result);

    }
    public function submitAddDoc(){
        $formDT = Request::all();
        $result = false;
        $mess = "";
        if(!empty($formDT['idProject']) && !empty($formDT['idBranch']) && !empty($formDT['nameFile'])  && !empty($formDT['fileDoc'])){
            $upload = $this->uploadDocs($formDT['idBranch'],$formDT['idBranch'],$_FILES['fileDoc']);
            if($upload['result']){
                $dt =date("Y-m-d H:i:s");
                $create =array(
                    'idProject'=>$formDT['idProject'],
                    'nameFile'=>$formDT['nameFile'],
                    'image'=>$upload['path'],
                    'status'=>Document::STATUS_ACTIVED,
                    'fileType'=>$upload['type'],
                    'fileSize'=>$upload['size'],
                    'thumbnail' =>$formDT['thumbnail']
                );
                if(!empty($formDT['id'])){
                    $create['updated_at'] = $dt;
                    $r = DB::table("document")->where("id",$formDT['id'])->update($create);
                }else{
                    $create['created_at'] = $dt;
                    $r = DB::table("document")->insert($create);
                }

                if($r){
                    $result = true;
                    $mess ="Thêm tài liệu thành công!";
                }else{
                    $mess ="Thêm tài liệu thất bại, vui lòng thử lại sau!";
                }
            }else{
                $mess ="Upload tài liệu thất bại, vui lòng thử lại sau!";
            }

        }else{
            $mess ="Vui lòng điền đầy đủ thông tin bắt buộc!";
        }
        if ($result) {
            return redirect()->route('docs.tai-lieu.list')
                ->withSuccess($mess);
        } else {
            return redirect()->route('docs.tai-lieu.list')
                ->withErrors($mess);
        }

    }
    public function submitEditDoc($id){
        $formDT = Request::all();
        $result = false;
        $mess = "";
        if(!empty($id) && !empty($formDT['id']) && $id == $formDT['id'] && !empty($formDT['idProject']) && !empty($formDT['idBranch']) && !empty($formDT['nameFile'])){
            $ck = Document::getDOc($id);
            if(!empty($ck)){
                $dt =date("Y-m-d H:i:s");
                $create =array(
                    'idProject'=>$formDT['idProject'],
                    'nameFile'=>$formDT['nameFile'],
                    'status'=>Document::STATUS_ACTIVED,
                    'thumbnail' =>$formDT['thumbnail']
                );

                if(!empty($formDT['fileDoc'])){
                    $upload = $this->uploadDocs($formDT['idBranch'],$formDT['idBranch'],$_FILES['fileDoc']);
                    if($upload['result']){
                        $create['image'] = $upload['path'];
                        $create['fileType'] = $upload['type'];
                        $create['fileSize'] = $upload['size'];
                    }else{
                        $mess ="Upload tài liệu thất bại, vui lòng thử lại sau!";
                    }
                }

                if(empty($mess)){

                    $create['updated_at'] = $dt;
                    $r = DB::table("document")->where("id",$id)->update($create);

                    if($r){
                        $result = true;
                        $mess ="Sửa tài liệu thành công!";
                    }else{
                        $mess ="Sửa tài liệu thất bại, vui lòng thử lại sau!";
                    }
                }
            }else{
                $mess ="Không tìm thấy tài liệu!";
            }


        }else{
            $mess ="Vui lòng điền đầy đủ thông tin bắt buộc!";
        }
        if ($result) {
            return redirect()->route('docs.tai-lieu.list')
                ->withSuccess($mess);
        } else {
            return redirect()->route('docs.tai-lieu.list')
                ->withErrors($mess);
        }

    }
    private function uploadDocs($idBranch = null, $idProject = null,$fdt = array())
    {
        $result =array(
            'name' =>'',
            'path' =>'',
            'type'=>'',
            'size'=>'',
            'result'=>false
        );
//        var_dump($fdt);exit();
        if (!empty($idBranch) && !empty($idProject)&& !empty($fdt['name'])) {
            $uploads_dir = 'upload/docs/' . $idBranch.'/'.$idProject;
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777,true);
            }
            $tmp_name = $fdt['tmp_name'];
            $nfname = $fdt['name'];


            if (file_exists("$uploads_dir/$nfname")) {
                $nfname = time()."-".$nfname;
            }
            $nPath = "$uploads_dir/$nfname";
            if (!file_exists($nPath)) {
                if (move_uploaded_file($tmp_name, $nPath)) {
                    $result['result'] =true;
                    $result['name'] =$nfname;
                    $result['path'] =$nPath;
                    $result['type'] =$fdt['type'];
                    $result['size'] =round($fdt['size']/1024);
                }
            }

        }
        return $result;

    }
    public function editDoc($id){
        $result =array(
            'idDoc'=>$id,
            'data'=>array(),
            'listBranch'=>Branch::getList(),
            'listIcon' =>Fileicon::getList(),

        );
        if(!empty($id)){
            $result['data'] = Document::getDOc($id);
            if(empty($result['data'])){
                return redirect()->route('docs.tai-lieu.list')
                    ->withErrors("Không tìm thấy tài liệu");
            }
        }else{
            return redirect()->route('docs.tai-lieu.list')
                ->withErrors("Không tìm thấy tài liệu");
        }
//        var_dump($result);exit();
        return view('docs.add-edit',$result);
    }
    public function delDoc($id){
        $result = false;
        $mess = "";
        if(!empty($id)){
            $ck = Document::getDOc($id);
            if(!empty($ck)){
                $result = Document::where('id',$id)->update(array('status'=>Document::STATUS_DELETED));
                if($result){
                    $mess ="Xóa thành công!";
                }else{
                    $mess ="Xóa thất bại, vui lòng thử lại sau!";
                }
            }else{
                $mess ="Xóa tài liệu không hợp lệ!";
            }
        }else{
            $mess ="Không tìm thấy tài liệu!";
        }
        if($result){
            return redirect()->route('docs.tai-lieu.list')
                ->withSuccess($mess);
        }
        return redirect()->route('docs.tai-lieu.list')
            ->withErrors($mess);
    }
    public function listDuAn(){

    }
    public function listChiNhanh(){

    }
}