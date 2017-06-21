<?php

namespace Vanguard\Console\Commands;
use Illuminate\Console\Command;
use Feeds;
use DB;
use Ixudra\Curl\Facades\Curl;
use Vanguard\Models\Rss;
use Vanguard\Models\RssExec;
use Vanguard\Models\RssExecDetail;


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
        foreach ($listURL as $item){
            $response = Curl::to($item['urlDetail'])->get();
            $dt =  $this->getContent($response,$item['didID']);
            echo($dt);exit();
        }
    }
    private  function  getContent($data="",$divID =""){
        $dom = new \DOMDocument('1.0', 'utf-8');
        $dom->loadHTML($data);
        $dom->preserveWhiteSpace = true;
        $content= $dom->getElementById($divID);
        if($content != null){
            return $content->textContent;
        }

        return "";
    }

}
