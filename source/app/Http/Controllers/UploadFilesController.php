<?php

namespace Vanguard\Http\Controllers;
use Session;
use Vanguard\Http\Requests\User\UpdateUserRequest;
use Auth;

/**
 * Class UsersController
 * @package Vanguard\Http\Controllers
 */
class UploadFilesController extends Controller
{
    private $TMP_DIR = "upload/temp/";
    public function __construct()
    {
        $this->middleware('auth');

        $user = Auth::user();
        if(!empty($user)){
            $this->TMP_DIR .=$user->id."/";
        }
    }


    public function upload(){

        $output_dir = $this->TMP_DIR;
        if(!file_exists($output_dir)){
            mkdir($output_dir,0777,true);
        }
        if(isset($_FILES["myfile"]))
        {
            $ret = array();

//	This is for custom errors;
            /*	$custom_error= array();
                $custom_error['jquery-upload-file-error']="File already exists";
                echo json_encode($custom_error);
                die();
            */
            $error =$_FILES["myfile"]["error"];
            //You need to handle  both cases
            //If Any browser does not support serializing of multiple files using FormData()
            if(!is_array($_FILES["myfile"]["name"])) //single file
            {
                $fileName = $_FILES["myfile"]["name"];
                if(file_exists($output_dir.$fileName)) unlink($output_dir.$fileName);
                $r  = move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);

                if($r) chmod($output_dir.$fileName, 0777);
//                var_dump($r);exit();
                $ret[]= $fileName;
            }
            else  //Multiple files, file[]
            {
                $fileCount = count($_FILES["myfile"]["name"]);
                for($i=0; $i < $fileCount; $i++)
                {
                    $fileName = $_FILES["myfile"]["name"][$i];
                    if(file_exists($output_dir.$fileName)) unlink($output_dir.$fileName);
                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
                    $ret[]= $fileName;
                }

            }
            echo json_encode($ret);
        }
    }
    public function load(){
        $dir = $this->TMP_DIR;
        $files = scandir($dir);
        $ret= array();
        foreach($files as $file)
        {
            if($file == "." || $file == "..")
                continue;
            $filePath=$dir."/".$file;
            $details = array();
            $details['name']=$file;
            $details['path']=$filePath;
            $details['size']=filesize($filePath);
            $ret[] = $details;
        }
        echo json_encode($ret);
    }
    public function delete(){
        $output_dir = $this->TMP_DIR;
        if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['name']))
        {
            $fileName =$_POST['name'];
            $fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files
            $filePath = $output_dir. $fileName;
            if (file_exists($filePath))
            {
                unlink($filePath);
            }
            echo '["'.$fileName.'"]';
        }
    }
    public function download(){
        if(isset($_GET['filename']))
        {
            $fileName=$_GET['filename'];
            $fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files
            $file = $this->TMP_DIR.$fileName;
            $file = str_replace("..","",$file);
            if (file_exists($file)) {
                $fileName =str_replace(" ","",$fileName);
                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename='.$fileName);
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                ob_clean();
                flush();
                readfile($file);
                exit;
            }
        }
    }

}