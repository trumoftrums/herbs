<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    const STATUS_ACTIVED = "AC";
    const  STATUS_INACTIVED = "IA";
    const  STATUS_DELETED = "DE";
    public $timestamps = true;
    public static function getList($status = null,$idProject =null,$idBranch =null){
        $whereraw = " project.status = '".Project::STATUS_ACTIVED."' AND branch.status ='".Branch::STATUS_ACTIVED."' ";
        if(!empty($status)){
            $whereraw .= " AND document.status = '".$status."' ";
        }
        if(!empty($idProject)){
            $whereraw .= " AND project.id = ".$idProject." ";
        }
        if(!empty($idBranch)){
            $whereraw .= " AND branch.id = ".$idBranch." ";
        }
        $dt = Document::join('project', 'project.id', '=', 'document.idProject')
            ->join('branch', 'branch.id', '=', 'project.idBranch')
            ->whereRaw($whereraw)
            ->select('document.*','branch.thumbBranch','branch.name as branchName','project.nameProject')
            ->get();
        return $dt;
    }
    public static function getDOc($id,$status = Document::STATUS_ACTIVED){
        $dt = Document::join('project', 'project.id', '=', 'document.idProject')
            ->join('branch', 'branch.id', '=', 'project.idBranch')
            ->where("project.status",Project::STATUS_ACTIVED)
            ->where("branch.status",Branch::STATUS_ACTIVED)
            ->where("document.status",$status)
            ->where("document.id",$id)
            ->select('document.*','branch.thumbBranch','branch.name as branchName','branch.id as idBranch','project.nameProject')
            ->get()->toArray();
//        var_dump($dt);exit();
        if(!empty($dt)){
            return $dt[0];
        }
        return null;
    }
    public static function getDocsByProject($idProject){
        $result = array();
        if(!empty($idProject)){
            $dt = Document::join('project', 'project.id', '=', 'document.idProject')
                ->where("document.status",Document::STATUS_ACTIVED)
                ->where("document.idProject",$idProject)->select("document.*","project.nameProject")
                ->get()->toArray();
            if(!empty($dt)){
                $result = $dt;
            }
        }
        return $result;
    }
}