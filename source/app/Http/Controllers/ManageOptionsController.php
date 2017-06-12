<?php

namespace Vanguard\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Vanguard\Models\Ads;
use Vanguard\Models\Options;
use Vanguard\News;
use Auth;
use Request;
use Vanguard\Repositories\Ads\AdsRepository;


/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class ManageOptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:options.manage');
    }
    public function index(){
        $data = Options::get()->toArray();
        $final =array();
        if(!empty($data)){
            foreach($data as $vl){
                $final[$vl['name']] = $vl;
            }
        }
        return view('manage-options.index', [
            'data' =>$final
        ]);
    }
    private $UP_DIR = "upload/";
    private $TMP_DIR = "temp/";
    public function update(){
        $params = Input::all();

        if(!empty($params['hinh-anh-hoat-dong'])){
            $output = explode('"]["',$params['hinh-anh-hoat-dong']);
            $arrIMG = array();
            $y =date("Y");
            $m = date("m");
            $d = date("d");
//            var_dump($this->UP_DIR.$y."/".$m."/".$d);
            if(!file_exists($this->UP_DIR.$y."/".$m."/".$d)){
                mkdir($this->UP_DIR.$y."/".$m."/".$d,0777,true);
            }
            foreach ($output as $img){
                $img = str_replace('["','',$img);
                $img = str_replace('"]','',$img);
                if(file_exists($this->UP_DIR.$this->TMP_DIR.$img)){
                    $nf = $this->UP_DIR.$y."/".$m."/".$d."/".$img;
                    $r = rename($this->UP_DIR.$this->TMP_DIR.$img,$nf);
                    if($r) chmod($nf, 0777);
                }
                $arrIMG[] = $nf;
            }
//            var_dump($arrIMG);exit();
            $params['hinh-anh-hoat-dong'] = $arrIMG;
        }
        unset($params['_method']);
        unset($params['_token']);
        foreach ($params as $k=>$vl){
            $dt = Options::where("name",$k)->get();
            if(!empty($dt)){
                $dt = $dt[0];
                $dt->value =json_encode($vl,true);
                $dt->save();
            }
        }
        return redirect()->route('options.all')
            ->withSuccess(trans('Cập nhật thông tin thành công!'));
    }

}