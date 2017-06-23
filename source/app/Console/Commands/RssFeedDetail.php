<?php

namespace Vanguard\Console\Commands;
use Illuminate\Console\Command;
use Feeds;
use DB;
use Ixudra\Curl\Facades\Curl;
use Vanguard\Models\Rss;
use Vanguard\Models\RssExec;
use Vanguard\Models\RssExecDetail;
use Vanguard\News;


class RssFeedDetail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:FeedDetail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $listURL = RssExecDetail::getList(RssExecDetail::STATUS_NEW);
//        var_dump($listURL[0]);
        $count = 0;
        foreach ($listURL as $item){
            $response = Curl::to($item['urlDetail'])->get();
            $idArr = explode(",",$item['divID']);
            $clArr = explode(",",$item['divClass']);

            $dt =  $this->getContent($response,$idArr,$clArr);
            $rs = RssExecDetail::SYNCED_NG;
            if(!empty($dt) && !empty($dt['description']) && !empty($dt['thumb'])){
                $new = new News();
                $new->category = $item['catID'];
                $new->title = $item['title'];
                $new->summary = $item['description'];
                $new->description = $dt['description'];
                if(!empty($item['authorPolicy'])){
                    $new->description .= $item['authorPolicy'];
                }
                $new->thumb = $dt['thumb'];
                $new->created_by = 1;
                $new->status = News::STATUS_INACTIVED;
                $r = $new->save();

                if($r){
                    $rs = RssExecDetail::SYNCED_OK;
                }
                if($this->setDoneRssDetail($item['urlDetail'],RssExecDetail::STATUS_SYNCED,$rs)){
                    $count++;
                }


            }else{
                $this->setDoneRssDetail($item['urlDetail'],RssExecDetail::STATUS_SYNCED,$rs);
            }
        }
        echo 'Done: '.$count.PHP_EOL;
    }
    private function setDoneRssDetail($url='',$status=RssFeedDetail::STATUS_SYNCED,$syncResult='OK'){
        if(!empty($url) && !empty($status) && !empty($syncResult)){
            $r = RssExecDetail::where('url',$url)->update(array(
                'status' =>$status,
                'syncResult'=>$syncResult,
                'syncDT'=>date("YmdHis")
            ));
            if($r) return true;
        }
        return false;

    }
    private  function  getContent($data="",$divID =[],$divCLASS =[]){
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument('1.0', 'utf-8');
        $dom->loadHTML(mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8'));
        libxml_use_internal_errors(false);
        $dom->preserveWhiteSpace = true;
        $dom->formatOutput       = true;
        $dom->saveHTML();
        $content = null;
        if(!empty($divID)){
            foreach ($divID as $id){
                $content= $dom->getElementById($id);
                if($content != null) {
                    break;
                }
            }

        }
        if($content == null && !empty($divCLASS)){
            $xpath = new \DomXPath($dom);
            foreach ($divCLASS as $cl){
                $tmpcontent = $xpath->query("//div[@class='$cl']");
                if($tmpcontent != null){
                    $content = $tmpcontent->item(0);
                    break;
                }
            }
        }
        $thumb ='';
        if($content != null){
            $imgList = $content->getElementsByTagName('img');
            if(!empty($imgList)){
                $fstItem= $imgList->item(0);
                if(!empty($fstItem)){
                    $thumb = $fstItem->getAttribute('src');
                }
            }
            $divString = "";
            foreach($content->childNodes as $c){
                $divString .= $c->ownerDocument->saveHTML($c);
            }
            $dt = array(
                'thumb' =>$thumb,
                'description'=>$divString
            );
            return $dt;
        }

        return null;
    }

}
