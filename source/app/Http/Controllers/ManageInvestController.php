<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Invest;
use Vanguard\InvestDocs;
use Vanguard\InvestResult;
use Vanguard\InvestTrade;
use Vanguard\InvestType;
use Vanguard\Repositories\Invest\InvestRepository;
use Vanguard\Repositories\InvestType\InvestTypeRepository;
use Vanguard\Repositories\User\UserRepository;
use Auth;
use Vanguard\Repositories\BienDong\BienDongRepository;
use Request;
use Vanguard\BienDong;
use Vanguard\Http\Requests\Invest\BienDongRequest;
use Vanguard\Support\Enum\UserStatus;
use Vanguard\User;
use DB;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageInvestController extends Controller
{

    private $biendong;
    private $invest;
    public function __construct(BienDongRepository $biendong, InvestRepository $invest, InvestTypeRepository $investType)
    {
        $this->middleware('auth');
        $this->middleware('permission:investAdmin.manage');
        $this->biendong = $biendong;
        $this->invest = $invest;
        $this->investType = $investType;
    }
    public function listLaiBienDong()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listLaiBienDong = $this->biendong->paginate($perPage, '', Input::get('status'));

        return view('manage-interest.list-lai-bien-dong', compact('listLaiBienDong', 'statusCurr'));
    }
    public function createLaiBienDong()
    {
        $edit = false;
        return view('manage-interest.add-lai-bien-dong', compact('edit'));
    }
    public function addLaiBienDong()
    {
        $params = Input::all();
        $this->biendong->create($params);

        return redirect()->route('interest.lai_bien_dong.create')
            ->withSuccess(trans('Tạo lãi biến động thành công!'));
    }

    public function editLaiBienDong($id)
    {
        $edit = true;
        $biendong = BienDong::find($id);

        return view('manage-interest.add-lai-bien-dong', compact('edit', 'biendong'));
    }
    public function updateLaiBienDong($id)
    {
        $params = Input::all();
        $this->biendong->update($params, $id);

        return redirect()->route('interest.lai_bien_dong.edit',$id)
            ->withSuccess(trans('Cập nhật lãi biến động thành công!'));
    }

    public function deleteLaiBienDong($id)
    {
        $this->biendong->delete($id);

        return redirect()->route('interest.lai_bien_dong.list')
            ->withSuccess('Xóa lãi suất biến động thành công!');
    }
    /*
     * controller for manage interest package
     */
    public function listGoiLai()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $listGoiLai = $this->investType->paginate($perPage, '', Input::get('status'));
        foreach ($listGoiLai as $key => &$item) {
            $item->finalInvest = json_decode($item->finalInvest, true);
        }

        return view('manage-interest.list-goi-lai',
            compact('listGoiLai', 'statusCurr')
        );
    }
    public function createGoiLai()
    {
        $edit = false;
        return view('manage-interest.add-goi-lai', compact('edit'));
    }
    public function addGoiLai()
    {
        $params = Input::all();
        $this->investType->create($params);

        return redirect()->route('interest.goi_lai.create')
            ->withSuccess(trans('Tạo gói lãi thành công!'));
    }

    public function editGoiLai($id)
    {
        $edit = true;
        $goiLai = InvestType::find($id);
        $goiLai->finalInvest = json_decode($goiLai->finalInvest, true);

        return view('manage-interest.add-goi-lai', compact('edit', 'goiLai'));
    }
    public function updateGoiLai($id)
    {
        $params = Input::all();
        $this->investType->update($params, $id);

        return redirect()->route('interest.goi_lai.edit',$id)
            ->withSuccess(trans('Cập nhật gói lãi thành công!'));
    }

    public function deleteGoiLai($id)
    {
        $this->investType->delete($id);

        return redirect()->route('interest.goi_lai.list')
            ->withSuccess('Xóa gói lãi thành công!');
    }

    /*
     * controller for manage invest contract
     */

    public function listHopDongDauTu()
    {
        $perPage = 10;
        $statusCurr = Input::get('status');
        $idGoiDauTuCurr = Input::get('goi_dau_tu');
        $idUserCurr = Input::get('nha_dau_tu');
        $listHopDong = $this->invest->paginate($perPage, Input::get('search'), Input::get('nha_dau_tu'),Input::get('goi_dau_tu'), Input::get('status'));
        $listUser = User::where('status', "Active")->get();
        $listTypeInvest = InvestType::where('status', InvestType::STATUS_ACTIVED)->get();

        return view('invest.list-hop-dong-dau-tu',
            compact('listHopDong', 'statusCurr', 'idGoiDauTuCurr', 'idUserCurr', 'listUser', 'listTypeInvest')
        );
    }

    public function deleteHopDongDauTu($id)
    {
        $this->invest->updateStatus(Invest::STATUS_DELETED,$id);

        return redirect()->route('interest.list-hop-dong-dau-tu')
            ->withSuccess('Xóa hợp đồng thành công!');
    }

    public function updateHopDongDauTu($id)
    {
        $this->invest->updateStatus(Invest::STATUS_ACTIVED,$id);

        return redirect()->route('interest.list-hop-dong-dau-tu')
            ->withSuccess('Kích hoạt hợp đồng thành công!');
    }
    public function editInvest($id,InvestTypeRepository $investTypes)
    {
        if(!empty($id) && is_numeric($id)){
            $edit = true;
            $listIVT = $investTypes->getAll();
            $dataInvest = Invest::getNewByID($id);
            if(!empty($dataInvest)){
                $datas = array(
                    'edit' => $edit,
                    'listIVT' => $listIVT,
                    'investID' =>$id,
                    'dataInvest'=>$dataInvest
                );
                return view('invest.add-edit', $datas);
            }else{
                return redirect()->route('interest.list-hop-dong-dau-tu')
                    ->withErrors('Không thể chỉnh sửa hợp đồng đầu tư này');
            }

        }
        return redirect()->route('interest.list-hop-dong-dau-tu')
            ->withErrors('Không tìm thấy hợp đồng đầu tư');

    }
    private function initEditInvest($id){
        if(is_numeric($id)){
            $where = " `invest`.`status`='" . Invest::STATUS_NEW ."' ";
            $datas = DB::table('invest')
                ->leftJoin('invest_result', 'invest.id', '=', 'invest_result.investID')
                ->select('invest.*', 'invest_result.*')
                ->whereRaw($where)->get()->toArray();
            if(!empty($datas)){
                $rd = InvestResult::where("investID",$id)->delete();
                return true;
            }
        }
        return false;
    }
    public function submitEditInvest(InvestTypeRepository $investTypes, InvestRepository $invest, BienDongRepository $bd)
    {
        $result =false;
        $mess = "";
        if (Auth::check()) {
            $user = Auth::user();
            $formData = Request::all();

            if (!empty($formData['id']) && !empty($formData['estStartDate']) && !empty($formData['money']) && !empty($formData['investTypeID'])) {

                $id = $formData['id'];
                if($this->initEditInvest($id)){
                    $estStartDate = $formData['estStartDate'];
                    $money = str_replace(",", "", $formData['money']);
                    $formData['money'] = $money;
                    $ivType = $investTypes->getTypebyID($formData['investTypeID'], true);
                    $resultUpload =array();
                    if (!empty($formData['paymentReceipt']) && !empty($_FILES['paymentReceipt'])) {
                        $resultUpload = $this->uploadReceipt($user->id, $_FILES['paymentReceipt']);
                        if(!empty($resultUpload) && $resultUpload['result']){
                            $formData['paymentReceipt'] = $resultUpload['path'];
                        }



                    }
                    if (!empty($ivType)) {
                        $formData['tienPhat'] = $ivType['finalInvest'];
                        $formData['interest'] = $ivType['interest'];
                        $formData['further'] = $bd->getByDate($formData['estStartDate']);
                        $formData['onetimeBonus'] = $ivType['onetimeBonus'];

                        $formData['estEndDate'] = date("Y-m-d", strtotime($formData['estStartDate'] . " + " . $ivType['period'] . " month"));

                        if (!empty($formData['interestMethod']) && $formData['interestMethod'] == Invest::INTEREST_METHOD_MONTHLY) {
                            $formData['nextPayment'] = date("Y-m-d", strtotime($formData['estStartDate'] . " + 1 month"));

                        } else {
                            $formData['nextPayment'] = $formData['estEndDate'];

                        }
                        if (isset($formData['_token'])) {
                            unset($formData['_token']);
                        }

                        DB::beginTransaction();
                        $rup = DB::table('invest')->where('id',$id)->update($formData);
                        $rupload =true;
                        if(!empty($resultUpload)){
                            $ck = InvestDocs::getDocs($id,InvestDocs::TYPE_NOPTIEN);
                            $delete =true;
                            if(!empty($ck)){
                                $update = array("status"=>InvestDocs::STATUS_DELETED);
                                $delete = InvestDocs::where("investID",$id)->where("status",InvestDocs::STATUS_ACTIVED)->where("type",InvestDocs::TYPE_NOPTIEN)->update($update);
                            }
                            if($delete){
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
                            }else{
                                $rupload =false;
                            }
                        }
                        if ($rup && $rupload) {
                            //calculate result
                            $resultDT = $this->calculateInterest($id, $formData, $ivType['period']);
                            $r = DB::table('invest_result')->insert([$resultDT]);
                            if ($r) {
                                DB::commit();
                                $result = true;
                                $mess = "Chỉnh sửa gói đầu tư thành công!";
                            } else {
                                DB::rollBack();
                            }

                        } else {
                            DB::rollBack();
                        }

                    }
                }else{
                    $mess = "Chỉnh sửa hợp đồng đầu tư không hợp lệ!";
                }


            }else{
                $mess = "Vui lòng điền đầy đủ thông tin bắt buộc!";
                return view('invest.add-edit')
                    ->withSuccess($mess);
            }
        }
        if($result){
            return redirect()->route('interest.list-hop-dong-dau-tu')
                ->withSuccess($mess);
        }
        return redirect()->route('interest.list-hop-dong-dau-tu')
            ->withErrors($mess);


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
        $laiHangThang = round($money * $laiSuat / (100*$period), 2);
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
    public function listAttachments($id){

        $datas = InvestDocs::getByInvestID($id);
        $invest = Invest::getByID($id);
        $result = array(
            'listDocs' =>$datas,
            'invest'=>$invest
        );
        return view('manage-interest.list-attachments',$result);

    }
    public function createDocs($id){
        $invest = Invest::getByID($id);
        $result = array(
            'invest'=>$invest
        );
        return view('manage-interest.create-doc',$result);
    }
    public function submitCreateDocs($id){
        $result = false;
        $mess = "";
        $formData = Request::all();
//        var_dump($formData);exit();
        $user = Auth::user();
        if(!empty($formData['type']) && !empty($_FILES['investDoc']['name'])){
            $uploadResult = $this->uploadDocs($formData['investID'],$_FILES['investDoc']);
            if(!empty($uploadResult)){
                $savedt =array();
                $savedt['investID'] = $formData['investID'];
                $savedt['type'] = $formData['type'];
                $savedt['filename'] = $uploadResult['name'];
                $savedt['filepath'] = $uploadResult['path'];
                $savedt['status'] = InvestDocs::STATUS_ACTIVED;
                $savedt['uploadBy'] = $user->id;
                $dt  = date("Y-m-d H:i:s");
                $savedt['created_at'] = $dt;
                $savedt['updated_at'] = $dt;
                $r = DB::table("invest_document")->insert($savedt);
                if($r){
                    $result = true;
                    $mess = "Upload tài liệu thành công!";
                }else{
                    $mess = "Upload tài liệu thất bại, vui lòng thử lại!";
                }
            }else{
                $mess = "Upload tài liệu thất bại, vui lòng thử lại!";
            }

        }else{
            $mess = "Upload tài liệu thất bại, Không tìm thấy file!";
        }
        if($result){
            return redirect()->route('manage-interest.documents.createDocs',$id)->withSuccess($mess);
        }
        return redirect()->route('manage-interest.documents.createDocs',$id)->withErrors($mess);


    }
    private function uploadDocs($investID = null, $fdt = array())
    {
        $result =array(
            'name' =>'',
            'path' =>'',
            'result'=>false
        );
        if (!empty($investID) && !empty($fdt['name'])) {
            $uploads_dir = 'upload/invests/docs/' . $investID;
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
                }
            }

        }
        return $result;

    }
    public function deleteDoc($docID){
        $investID = 0;
        if(!empty($docID)){
            $ck = InvestDocs::getDocsbyID($docID);
            if(!empty($ck)){
                $investID = $ck['investID'];
                InvestDocs::deleteDoc($docID);
            }

        }
        if(!empty($investID)){
            return redirect()->route('manage-interest.documents.list',$investID)
                ->withSuccess('Xóa tài liệu thành công!');
        }
        return redirect()->route('manage-interest.documents.list',$investID)
            ->withErrors('Xóa tài liệu thất bại, vui lòng thử lại!');

    }

    public function listTraLai(){
        $statusCurr = Input::get('status');
        $idGoiDauTuCurr = Input::get('goi_dau_tu');
        $fromDate = Input::get('fromDate');
        $toDate = Input::get('toDate');
        if(empty($statusCurr)){
            $statusCurr = "all";
        }

        if(empty($idGoiDauTuCurr)){
            $idGoiDauTuCurr = "";
        }
        if(empty($fromDate)){
            $fromDate = date("Y-m-d");
        }
        if(empty($toDate)){
            $toDate = date("Y-m-d");
        }

        $listTypeInvest = InvestType::where('status', InvestType::STATUS_ACTIVED)->get();
        $result = array(
            'data' =>array(),
            'listTypeInvest'=>$listTypeInvest,
            'statusCurr'=>$statusCurr,
            'idGoiDauTuCurr'=>$idGoiDauTuCurr,
            'fromDate'=>$fromDate,
            'toDate'=>$toDate
        );
        if(!empty($fromDate) && strlen($fromDate) == 10 && !empty($toDate) && strlen($toDate) == 10){

            $condition =array(
                "a.noidungGD = '".InvestTrade::TRADE_TRALAI."'"
            );
            if(!empty($statusCurr) && $statusCurr !="all"){
                $condition[] = "`a`.`status` ='$statusCurr'";
            }
            if(!empty($idGoiDauTuCurr) && $idGoiDauTuCurr !="all"){
                $condition[] = "`b`.`investTypeID` =$idGoiDauTuCurr";
            }

            $result['data'] = InvestTrade::getTrades($fromDate,$toDate,$condition);
//            var_dump($result['data']);exit();

        }

        return view('manage-interest.list-tra-lai',$result);

    }
    public function qltl_xemhoadon($idTrade){
        $result['data'] = InvestTrade::getTradebyID($idTrade);
        $result['investCode'] = "";
        if(!empty($result['data'])){
            $result['investCode'] = $result['data']['investCode'];
        }

        return view('manage-interest.xemhoadon-tra-lai',$result);
    }
    public function qltl_thanhtoan($idTrade){
        $result['data'] = InvestTrade::getTradebyID($idTrade);
//        var_dump($result['data']);exit();
        $result['investCode'] = "";
        if(!empty($result['data'])){
            $result['investCode'] = $result['data']['investCode'];
        }
        return view('manage-interest.thanhtoan-tra-lai',$result);
    }
    public function qltl_thanhtoan_submit($idTrade){
        $formDT = Request::all();
        $user = Auth::user();
        $result = false;
        $mess = "";
        $redirect = true;
        if(!empty($formDT) && isset($_FILES['hoaDon']) && !empty($_FILES['hoaDon']['name'])){
//            var_dump($_FILES);
            $ck = InvestTrade::checkCanActive($idTrade);
//            var_dump($ck);exit();
            if($ck){
                $investTrade = InvestTrade::getInvestID($idTrade);
                if(!empty($investTrade)){
                    $dt = date("Y-m-d H:i:s");
                    $upload = $this->uploadDocs($investTrade['investID'],$_FILES['hoaDon']);
                    if($upload['result']){
                        $createDoc = array(
                            'filename'=>$upload['name'],
                            'filepath'=>$upload['path'],
                            'investID'=>$investTrade['investID'],
                            'type'=>InvestTrade::TRADE_TRALAI,
                            'status'=>InvestTrade::STATUS_ACTIVED,
                            'uploadBy'=>$user->id,
                            'investSeq' =>$investTrade['investSeq'],
                            'created_at' =>$dt,
                            'updated_at'=>$dt
                        );
                        DB::beginTransaction();
                        $r1 = DB::table("invest_document")->insert($createDoc);
                        $update =array(
                            'status' =>InvestTrade::STATUS_ACTIVED,
                            'nguoiConfirmGD'=>$user->id,
                            'confirmDT'=>$dt

                        );
                        $r2 = DB::table("invest_trade")->where("id",$idTrade)->update($update);
                        if($r1 && $r2){
                            DB::commit();
                            $result = true;
                            $mess = "Thanh toán lãi suất thành công!";
                        }else{
                            DB::rollBack();
                            $mess = "Thanh toán lãi suất thất bại, vui lòng thử lại sau!";
                            $redirect =false;
                        }
                    }else{
                        $mess = "Upload hóa đơn thất bại, vui lòng thử lại sau!";
                        $redirect =false;
                    }
                }else{
                    $mess = "Thanh toán không hợp lệ, Không tìm thấy hợp đồng đầu tư!";
                }

            }else{
                $mess = "Thanh toán không hợp lệ, Hiện tại hợp đồng này không được thanh toán lãi suất!";
            }
        }else{
            $mess = "Vui lòng upload hóa đơn thanh toán lãi suất!";
            $redirect =false;
        }
        if($result){
            return redirect()->route('interest.list-tra-lai')
                ->withSuccess($mess);
        }else{
            if($redirect){
                return redirect()->route('interest.list-tra-lai')
                    ->withErrors($mess);
            }else{
                return redirect()->route('interest.quan-ly-tra-lai.thanhtoan',$idTrade)
                    ->withErrors($mess);
            }

        }

    }
    public function qltl_huy($idTrade){
        $user = Auth::user();
        $result = false;
        $mess = "";
        $dt =date("Y-m-d H:i:s");
        $update =array(
            'status' =>InvestTrade::STATUS_CANCELED,
            'nguoiHuyGD'=>$user->id,
            'huyGDDT'=>$dt
        );
        $result = InvestTrade::where('id',$idTrade)->update($update);
        if($result){
            $mess = "Hủy giao dịch thành công!";
        }else{
            $mess = "Hủy giao dịch thất bại, vui lòng thử lại sau!";
        }
        if($result){
            return redirect()->route('interest.list-tra-lai')
                ->withSuccess($mess);
        }
        return redirect()->route('interest.list-tra-lai')
            ->withErrors($mess);

    }
    public function qltl_khoa($idTrade){

    }
}