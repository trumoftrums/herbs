<?php

namespace Vanguard\Console\Commands;
use Illuminate\Console\Command;
use Feeds;
use DB;
use Vanguard\Models\Rss;
use Vanguard\Models\RssExec;
use Vanguard\Models\RssExecDetail;


class yhocsuckhoe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:yhocsuckhoe';

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
        $now = time();

        $listRSS = Rss::getList(Rss::STATUS_ACTIVED,1,$now."- lastRunning > `interval`");
        if(!empty($listRSS)){
            $this->setRunning($listRSS);
            try{
                foreach ($listRSS as $rss){
                    $now = time();
                    $dt = $this->feedData($rss['url']);
                    $rssexec = new RssExec();
                    $rssexec->idRss = $rss['id'];
                    $rssexec->execTime = $now;

                    if(!empty($dt)){
                        $count = 0;
                        $rssexec->result =RssExec::RESULT_DONE;
                        if(!empty($dt['items'])){
                            foreach ($dt['items'] as $item){
//                            var_dump($item);exit();
                                if(!$this->isURLExist($item->get_permalink())){
                                    $itemDetail = new RssExecDetail();
                                    $itemDetail->idRss = $rss['id'];
                                    $itemDetail->execTime = $now;
                                    $itemDetail->url = $item->get_permalink();
                                    $itemDetail->status = RssExecDetail::STATUS_NEW;
                                    $itemDetail->title = $item->get_title();
                                    $itemDetail->description = $item->get_description();
                                    $itemDetail->pubDate = $item->get_date('j F Y | g:i a');
                                    $itemDetail->save();
                                    $count++;
                                }

                            }
                        }
                    }else{
                        $rssexec->result =RssExec::RESULT_FAILED;
                    }
                    $rssexec->save();
                    echo 'DONE: '.$count.PHP_EOL;

                }
            }catch (Exception $e){
                echo 'Error'.PHP_EOL;
            }
            $this->setNotRunning($listRSS);
        }else{
            echo 'Empty RSS'.PHP_EOL;
        }


    }
    private function isURLExist($url){
        $ck =  RssExecDetail::where('url',$url)->count();
        if(!empty($ck) && $ck >0){
            return true;
        }
        return false;
    }
    private function setRunning($listRss){
        if(!empty($listRss)){
            foreach ($listRss as $rss){
                $item = new Rss();
                $item::where("id",$rss['id'])->update(array('isRunning'=> Rss::IS_RUNNING,'lastRunning'=> time()));
            }
        }

    }
    private function setNotRunning($listRss){
        if(!empty($listRss)){
            foreach ($listRss as $rss){
                $item = new Rss();
                $item::where("id",$rss['id'])->update(array('isRunning'=>Rss::IS_NOTRUNNING));
            }
        }

    }
    private function feedData($url){
        $feed = Feeds::make($url);
        $data = array(
            'title'     => $feed->get_title(),
            'permalink' => $feed->get_permalink(),
            'items'     => $feed->get_items(),
        );

        return $data;
    }
}
