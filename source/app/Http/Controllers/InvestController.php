<?php

namespace Vanguard\Http\Controllers;

use Cache;
use Vanguard\Http\Requests\Role\CreateRoleRequest;
use Vanguard\Http\Requests\Role\UpdateRoleRequest;
use Vanguard\Invest;
use Vanguard\InvestType;
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
class InvestController extends Controller
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
        $this->middleware('permission:invest.manage');
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
    public function create(InvestTypeRepository $investTypes)
    {
        $edit = false;
        $listIVT = $investTypes->getAll(InvestType::STATUS_ACTIVED);
        $datas = array(
            'edit' => $edit,
            'listIVT' => $listIVT
        );
        return view('invest.add-edit', $datas);
    }

    public function contract()
    {
        $datas = array();
        if (Auth::check()) {
            $user = Auth::user();
            $where = " (`invest`.`status`='" . Invest::STATUS_ACTIVED . "' OR `invest`.`status`='" . Invest::STATUS_NEW . "') AND `invest`.`userID` = " . $user->id . " ";
            $datas = DB::table('invest')
                ->join('invest_result', 'invest.id', '=', 'invest_result.investID')
                ->select('invest.*', 'invest_result.*')
                ->whereRaw($where)->get()->toArray();
            if (!empty($datas)) {
                foreach ($datas as $k => $v) {
                    $v->ketQuaChiTiet = json_decode($v->ketQuaChiTiet, true);

                    $v->trade = $this->getInvestTrade($v->id);
//                    var_dump($v);exit();
                    $datas[$k] = $v;

                }
            }


        }

        $result = array(
            'edit' => false,
            'datas' => $datas
        );


        return view('invest.contract', $result);
    }

    private function getInvestTrade($id)
    {
        $datas = InvestTrade::where("investID", $id)->orderBy("ngayGD", "desc")->get()->toArray();
        return $datas;
    }

    public function refundInvest()
    {
        $datas = array();
        if (Auth::check()) {
            $user = Auth::user();
            $where = " `invest`.`status`='" . Invest::STATUS_ACTIVED . "' AND `invest`.`userID` = " . $user->id . " ";
            $datas = DB::table('invest')
                ->join('invest_result', 'invest.id', '=', 'invest_result.investID')
                ->select('invest.*', 'invest_result.*')
                ->whereRaw($where)->get()->toArray();
            if (!empty($datas)) {
                foreach ($datas as $k => $v) {
                    $v->ketQuaChiTiet = json_decode($v->ketQuaChiTiet, true);

                    $v->trade = $this->getInvestTrade($v->id);
//                    var_dump($v);exit();
                    $datas[$k] = $v;

                }
            }


        }
        $result = array(
            'edit' => false,
            'datas' => $datas,
            'investID' => 0
        );
        if (isset($_REQUEST['investID']) && !empty($_REQUEST['investID']) && is_numeric($_REQUEST['investID'])) {
            $result['investID'] = $_REQUEST['investID'];
        }


        return view('invest.refund-invest', $result);
    }

    public function submitRefundInvest()
    {
        $datas = array();
        $result = false;
        if (Auth::check()) {
            $user = Auth::user();
            $formData = Request::all();
            if (!empty($formData['investID'])) {
                $investID = $formData['investID'];
                $r = Invest::yeuCauHoanVon($investID, $user->id);
                if ($r) {
                    $result = true;
                    $mess = "Yêu cầu hoàn vốn thành công!";
                } else {
                    $mess = "Yêu cầu hoàn vốn gói đầu tư không hợp lệ!";
                }
            } else {
                $mess = "Vui lòng chọn gói đầu tư để yêu cầu hoàn vốn!";
            }


        } else {
            $mess = "Vui lòng chọn gói đầu tư để yêu cầu hoàn vốn!";
        }

        $result = array(
            'edit' => false,
            'datas' => $datas
        );
        if ($result) {
            return redirect()->route('invest.hoan_von')
                ->withSuccess($mess);
        } else {
            return redirect()->route('invest.hoan_von')
                ->withErrors($mess);
        }

    }


    /**
     * Store newly created role to database.
     *
     * @param CreateRoleRequest $request
     * @return mixed
     */
    public function store(InvestTypeRepository $investTypes, InvestRepository $invest, BienDongRepository $bd)
    {
        $result =false;
        $mess = "";
        if (Auth::check()) {
            $user = Auth::user();
            $formData = Request::all();

            if (!empty($formData['estStartDate']) && !empty($formData['money']) && !empty($formData['investTypeID'])) {

                $estStartDate = $formData['estStartDate'];
                $money = str_replace(",", "", $formData['money']);
                $formData['money'] = $money;
                $ivType = $investTypes->getTypebyID($formData['investTypeID'], true);
//                if (!empty($formData['paymentReceipt']) && !empty($_FILES['paymentReceipt'])) {
//                    $formData['paymentReceipt'] = $this->uploadReceipt($user->id, $_FILES['paymentReceipt']);
//                }
                $resultUpload =array();
                if (!empty($formData['paymentReceipt']) && !empty($_FILES['paymentReceipt'])) {
                    $resultUpload = $this->uploadReceipt($user->id, $_FILES['paymentReceipt']);
                    if(!empty($resultUpload) && $resultUpload['result']){
                        $formData['paymentReceipt'] = $resultUpload['path'];
                    }



                }

                if (!empty($ivType)) {
                    $formData['status'] = Invest::STATUS_NEW;
                    $formData['userID'] = $user->id;
                    $formData['tienPhat'] = $ivType['finalInvest'];
                    $formData['interest'] = $ivType['interest'];
                    $formData['further'] = $bd->getByDate($formData['estStartDate']);
                    $formData['onetimeBonus'] = $ivType['onetimeBonus'];

                    $formData['estEndDate'] = date("Y-m-d", strtotime($formData['estStartDate'] . " + " . $ivType['period'] . " month"));

                    if (!empty($formData['interestMethod']) && $formData['interestMethod'] == "MONTHLY") {
                        $formData['nextPayment'] = date("Y-m-d", strtotime($formData['estStartDate'] . " + 1 month"));

                    } else {
                        $formData['nextPayment'] = $formData['estEndDate'];

                    }
                    if (isset($formData['_token'])) {
                        unset($formData['_token']);
                    }

                    DB::beginTransaction();
                    $id = DB::table('invest')->insertGetId($formData, 'id');
                    if (!empty($id) && $id > 0) {
                        //calculate result
                        $updateCode['investCode'] = str_pad($ivType['id'], 2, '0', STR_PAD_RIGHT) . str_pad($id, 4, '0', STR_PAD_LEFT);
                        $rCode = DB::table('invest')->where('id', $id)->update($updateCode);


                        $resultDT = $this->calculateInterest($id, $formData, $ivType['period']);
                        $r = DB::table('invest_result')->insert([$resultDT]);

                        $rupload =true;
                        if(!empty($resultUpload)){

                            $dtDocs = array(
                                'investID' =>$id,
                                'type' =>InvestDocs::TYPE_NOPTIEN,
                                'filename' =>$resultUpload['name'],
                                'filepath' =>$resultUpload['path'],
                                'status' =>'AC',
                                'uploadBy' =>$user->id,
                                'created_at' =>date("Y-m-d H:i:s"),
                                'updated_at' =>date("Y-m-d H:i:s")
                            );
                            $rupload = DB::table("invest_document")->insert($dtDocs);

                        }

                        if ($rCode && $r && $rupload) {
                            DB::commit();
                            $result = true;
                            $mess = "Tạo gói đầu tư thành công!";
                        } else {
                            DB::rollBack();
                            $mess = "Tạo gói đầu tư thất bại!";
                        }

                    } else {
                        DB::rollBack();
                        $mess = "Tạo gói đầu tư thất bại!";
                    }

                }

            }else{
                $mess = "Vui lòng nhập đầy đủ các thông tin bắt buộc";
            }
        }else{
            $mess = "Vui lòng đăng nhập để được sử dụng chức năng này";
        }
        if($result){
            return redirect()->route('invest.hop_dong')
                ->withSuccess($mess);
        }
        return redirect()->route('invest.tao_moi')
            ->withErrors($mess);
    }

    private function calculateInterest($id, $formDT, $period)
    {

        $money = $formDT['money'];
        $laiSuat = $formDT['interest'];
        $laiSuatBienDong = $formDT['further'];
        $thuongNhanLai1Lan = $formDT['onetimeBonus'];

        $saveDT = array(
            'investID' => $id,
            'ngayBatDau' => $formDT['estStartDate'],
            'loaiTien' => $formDT['currency'],
            'soTienDauTu' => $money,
            'investTypeID' => $formDT['investTypeID'],
            'laiSuat' => $formDT['interest'],
            'laiSuatBienDong' => $formDT['further'],
            'laiKep' => $formDT['isCompInterest'],
            'phanTramLaiKep' => $formDT['compInterestPercent'],
            'hinhThucNhanLai' => $formDT['interestMethod'],
            'ngayDaoHan' => $formDT['estEndDate'],
            'thuongNhanLai1Lan' => $formDT['onetimeBonus'],
            'taiDauTu' => $formDT['isCompInterest'],

        );

        $ngayNhanLai = $saveDT['ngayDaoHan'];
        if ($saveDT['hinhThucNhanLai'] == Invest::INTEREST_METHOD_MONTHLY) {
            $ngayNhanLai = "Ngày " . date("d", strtotime($saveDT['ngayBatDau'])) . " hàng tháng";

        }
        $saveDT['ngayNhanLai'] = $ngayNhanLai;
        $laiHangThang = $money * $laiSuat / (100*$period);
        $quyTrinhTraLai = array();
        $tongTienDT = $money;
        $tongLai = 0;
        for ($i = 0; $i < $period; $i++) {
            if ($saveDT['laiKep'] == 1 && $saveDT['phanTramLaiKep'] > 0) {
                $laiHangThang = $tongTienDT * $laiSuat / (100*$period);
                $laiGop = $laiHangThang * $saveDT['phanTramLaiKep'] / 100;
                $tongTienDT += $laiGop;
                $tongLai += $laiHangThang - $laiGop;

            } else {
                $laiGop = 0;
                $tongLai += $laiHangThang;
            }
            $quyTrinhTraLai[] = array(
                'tienlai' => $laiHangThang,
                'gop' => $laiGop,
                'conlai' => $laiHangThang - $laiGop,
                'tongTienDauTu' => $tongTienDT
            );

        }

        $tongTien = $quyTrinhTraLai[$period - 1]['tongTienDauTu'] + $tongLai + $laiSuatBienDong * $money / 100;
        if ($saveDT['hinhThucNhanLai'] == Invest::INTEREST_METHOD_ONETIME) {
            $tongTien += $money * $thuongNhanLai1Lan / 100;
        }
        $saveDT['tongTien'] = $tongTien;
        $saveDT['ketQuaChiTiet'] = json_encode($quyTrinhTraLai);

        return $saveDT;

    }

    private function uploadReceipt($userID = null, $fdt = array())
    {
        $result =array(
            'name' =>'',
            'path' =>'',
            'result'=>false
        );
        if (!empty($userID) && !empty($fdt)) {
            $uploads_dir = 'upload/invests/' . $userID;
            if (!file_exists($uploads_dir)) {
                mkdir($uploads_dir, 0777);
            }
            $tmp_name = $fdt['tmp_name'];
//            $name = basename($fdt["originalName"]);
            $orginName = explode(".", $fdt['name']);
            $ext = "";
            if (count($orginName) > 1) {
                $ext = "." . $orginName[count($orginName) - 1];
            }
//            $nfname = md5_file($tmp_name) . $ext;
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
                }
            }

        }
        return $result;

    }
    public function documents($id){

        $datas = InvestDocs::getByInvestID($id,InvestDocs::STATUS_ACTIVED);
        $invest = Invest::getByID($id);
        $result = array(
            'listDocs' =>$datas,
            'invest'=>$invest
        );

        return view('invest.documents',$result);

    }


}