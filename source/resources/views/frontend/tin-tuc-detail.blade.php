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
                <div class="cover-title title-news">
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
                        <a href="#">{{$n['title']}}</a>
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
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
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
