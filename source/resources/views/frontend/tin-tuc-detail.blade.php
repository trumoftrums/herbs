@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/banner-news.jpg')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <?php if(!empty($news)){?>
            <div class="cover-menu-tab">
                {{--<div class="cover-tab-cate">--}}
                    {{--<ul>--}}
                        {{--<li><a href="#">TẤT CẢ</a> </li>--}}
                        {{--<li><a href="#">CÂY THUỐC</a> </li>--}}
                        {{--<li><a href="#">BÀI THUỐC</a> </li>--}}
                        {{--<li><a href="#">CHUẨN ĐOÁN</a> </li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                <div class="cover-title title-news title-detail-news">
                    <h3 class="title-herbs">{{$news['nameType']}}</h3>
                </div>
            </div>
            <div class="detail-nes">
                <h2 class="title-news-detail">{{$news['title']}}</h2>
                <span class="sp-date">{{$news['created_at']}} by {{$news['first_name'].' '.$news['last_name']}}</span>
                <br>
                <p style="text-align: justify;">
                    <?php echo $news['description']; ?>
                </p>
            </div>
            <h5 class="title-news-khac">Tin tức khác</h5>
            <div class="cover-list-related">
                <?php foreach ($listRelated as $n){?>
                <div class="item-news-tab">
                    <img src="{{ url($n['thumb'])}}"/>
                    <div class="cover-co-item">
                        <a href="{{route('frontend.detailNews', str_slug($n['title'],'-').'-'.$n['id'])}}">{{$n['title']}}</a>
                        <span class="date-sp">{{$n['created_at']}}</span>
                    </div>
                </div>
                <?php }?>

            </div>
            <?php }else{?>
            <p>Không tìm thấy tin tức</p>
            <?php }?>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">HOẠT ĐỘNG XÃ HỘI</h4>
                <?php if(!empty($listHoatDong)){foreach ($listHoatDong as $hd){?>
                <div class="item-bs">
                    <img src="{{ url($hd['thumb'])}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs" href="{{route('frontend.detailNews', str_slug($hd['title'],'-').'-'.$hd['id'])}}">{{$hd['title']}}</a>
                        <span class="sp-chucvu">{{substr($hd['created_at'],0,10)}}</span>
                        <p class="sp-lh"><?php echo implode(' ', array_slice(explode(' ', $hd['summary']), 0, 15)) ?>...</p>
                    </div>
                </div>
                <?php }}?>
            </div>
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">FANPAGE</h4>
                <div class="item-qa">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook/">Facebook</a></blockquote></div>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item.png')}}"/></a>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item2.png')}}"/></a>
                </div>
            </div>
        </div>
    </div>
@stop
