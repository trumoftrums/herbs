@extends('layouts.frontend')

@section('page-title', 'HERBS')

@section('content')
    <div class="slide-show">
        <div class="cover-news">
            <p class="newsest">Tin mới nhất <span class="sp-date">{{$listSlideShow[0]['created_at']}} - bởi {{$listSlideShow[0]['first_name'].''.$listSlideShow[0]['last_name']}}</span></p>
        </div>
        <div class="inner-slide-show">
            <div class="col-sm-6 mainabc">
                <div class="slider">
                    <div id="home-slider" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php
                                if(isset($listSlideShow) && !empty($listSlideShow)){
                                $i = 0;
                                foreach ($listSlideShow as $vl){
                                    $actived = '';
                                    if($i==0) $actived = 'active';
                                    $i++;
                            ?>
                            <div class="item {{$actived}}">
                                <img class="img-responsive"  src="{{ url($vl['thumb'])}}" alt="{{$vl['title']}}">
                                <div class="carousel-caption caption-slide-home">
                                    <p>{{$vl['nameType']}}</p>
                                    <hr>
                                    <h4>{{$vl['title']}}</h4>
                                    <a href="{{route('frontend.detailNews', str_slug($vl['title'],'-').'-'.$vl['id'])}}"><img src="{{ url('assets/frontend/images/see-more.png')}}"/></a>
                                </div>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 listabc">
                <div class="list-group slider-list">
                    <?php
                    if(isset($listSlideShow) && !empty($listSlideShow)){
                        $i = 0;
                        foreach ($listSlideShow as $vl){
                            $actived = '';
                            if($i==0) $actived = 'active';

                            ?>
                    <a href="#" class="list-group-item {{$actived}}" data-target="#home-slider" data-slide-to="{{$i}}">
                        <img class="img-item-slide" src="{{ url($vl['thumb'])}}"/>
                        <p>{{$vl['nameType']}}</p>
                        <hr>
                        {{$vl['title']}}<br>
                        <span class="sum-sp"><?php echo implode(' ', array_slice(explode(' ', $vl['summary']), 0, 15)) ?>...</span>
                    </a>
                    <?php $i++;}}?>

                </div>
                <a class="a-view-more" href="#">XEM NHIỀU HƠN &raquo;</a>
            </div>
        </div>
    </div>
    <div class="slider-top">
        <div class="cover-title">
            <h3 class="title-herbs">SẢN PHẨM MỚI CỦA HERBS</h3>
        </div>
        <div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="40000" id="fruitscarousel1">
            <div class="carousel-inner">
                <div class="item active item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl01.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">Thuần Linh Chi </a>
                            <hr class="hr-line">
                            <p>Bổ sung dinh dưỡng cho mọi đối tượng, đặc biệt là bà bầu, trẻ em, người suy nhược và người già.<br>
                                Viên tảo biển nhật giúp tăng cường hệ miễn dịch cho cơ thể.<br>
                                Giúp tái tạo máu, hỗ trợ thải lọc độc tố, ngăn ngừa bệnh tật và làm đẹp da</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
                <div class="item item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl02.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">VIÊN UỐNG GIẢM CÂN ĐẸP DA </a>
                            <hr class="hr-line">
                            <p>Bổ sung enzym cho cơ thể<br>
                                Hỗ trợ các vấn đề về tiêu hóa, đào thải độc tố<br>
                                Tăng cường hệ miễn dịch cho cơ thể</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
                <div class="item item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl03.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">Hộp viên nang mềm Tâm thống </a>
                            <hr class="hr-line">
                            <p>Hỗ trợ điều trị suy thận, sỏi thận, viêm đường tiết niệu <br>
                                Bổ thận tráng dương, tăng cường sinh lý nam giới.<br>
                                Cải thiện các vấn đề về đau lưng, mỏi gối. <br>
                                Bồi bổ, tăng cường sức khỏe.</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
                <div class="item item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl04.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">Thuốc điều trị mất ngủ Siro</a>
                            <hr class="hr-line">
                            <p>Giải độc, thanh nhiệt, nhuận tràng<br>
                                Hạ đường huyết, hỗ trợ điều trị bệnh tiểu đường, cao huyết áp<br>
                                Giảm suy nhược, giúp cơ thể khoẻ mạnh, trẻ trung và gia tăng tuổi thọ</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
                <div class="item item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl01.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">mantra herbal từ herbs</a>
                            <hr class="hr-line">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
                <div class="item item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl02.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">mantra herbal từ herbs</a>
                            <hr class="hr-line">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
                <div class="item item-herbs">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="cover-in">
                            <div class="cover-media">
                                <img src="{{ url('assets/frontend/images/sl03.png')}}"/>
                            </div>
                            <a class="title-slide" href="#">mantra herbal từ herbs</a>
                            <hr class="hr-line">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a href="#" class="a-view">Xem</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#fruitscarousel1" data-slide="prev"><img src="{{ url('assets/frontend/images/arrow-left.png')}}"/></a>
            <a class="right carousel-control" href="#fruitscarousel1" data-slide="next"><img src="{{ url('assets/frontend/images/arrow-right.png')}}"/></a>
        </div>
    </div>
    <div class="news-herbs">
        <div class="herbs-left">
            <?php
                if(!empty($listTintuc)){

                foreach ($listTintuc as $type){
            ?>
            <div class="unit-herbs">
                <ul class="nav nav-tabs">
                    <?php
                        if(!empty($type['data'])){
                            foreach ($type['data'] as $cat){

                    ?>
                    <li><a data-toggle="tab" href="#menu{{$cat['info']['id']}}">{{$cat['info']['nameCategory']}}</a></li>
                    <?php  }} ?>
                    <li class="active"><a data-toggle="tab" href="#home{{$type['info']['idType']}}">TẤT CẢ</a></li>
                </ul>
                <div class="tab-content">
                    <div class="cover-title cover-title-tab">
                        <h3 class="title-herbs">{{$type['info']['nameType']}}</h3>
                    </div>
                    <div id="home{{$type['info']['idType']}}" class="tab-pane fade in active">
                        <?php if(!empty($type['all'])){?>
                            <div class="main-item-news">
                                <img src="{{$type['all'][0]['thumb']}}"/>
                                <a class="title-first" href="{{route('frontend.detailNews', str_slug($type['all'][0]['title'],'-').'-'.$type['all'][0]['id'])}}">{{$type['all'][0]['title']}}</a>
                                <span>{{$type['all'][0]['created_at']}}</span>
                                <hr class="hr-line">
                                <p>{{$type['all'][0]['summary']}}</p>
                                <a class="a-view-more-item" href="{{route('frontend.detailNews', str_slug($type['all'][0]['title'],'-').'-'.$type['all'][0]['id'])}}">XEM CHI TIẾT &raquo;</a>
                            </div>
                            <div class="list-item-news">
                                <?php
                                for($i=1;$i<count($type['all']);$i++){
                                ?>
                                <div class="item-news-tab">
                                    <img src="{{$type['all'][$i]['thumb']}}"/>
                                    <div class="cover-co-item">
                                        <a href="{{route('frontend.detailNews', str_slug($type['all'][$i]['title'],'-').'-'.$type['all'][$i]['id'])}}">{{$type['all'][$i]['title']}}</a>
                                        <span class="date-sp">{{$type['all'][$i]['created_at']}}</span>
                                        <span class="sum-av"><?php echo implode(' ', array_slice(explode(' ', $type['all'][$i]['summary']), 0, 15)) ?>...</span>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        <?php }else{?>
                            <p>Đang cập nhật...</p>
                        <?php }?>
                    </div>
                    <?php
                    if(!empty($type['data'])){
                    foreach ($type['data'] as $cat){

                    ?>
                    <div id="menu{{$cat['info']['id']}}" class="tab-pane fade">
                        <?php if(!empty($cat['data'])){?>
                        <div class="main-item-news">
                            <img src="{{$cat['data'][0]['thumb']}}"/>
                            <a class="title-first" href="#">{{$cat['data'][0]['title']}}</a>
                            <span>{{$cat['data'][0]['created_at']}}</span>
                            <hr class="hr-line">
                            <p>{{$cat['data'][0]['summary']}}</p>
                            <a class="a-view-more-item" href="#">XEM CHI TIẾT &raquo;</a>
                        </div>
                        <div class="list-item-news">
                            <?php
                            for($i=1;$i<count($cat['data']);$i++){
                            ?>
                            <div class="item-news-tab">
                                <img src="{{$cat['data'][$i]['thumb']}}"/>
                                <div class="cover-co-item">
                                    <a href="#">{{$cat['data'][$i]['title']}}</a>
                                    <span class="date-sp">{{$cat['data'][$i]['created_at']}}</span>
                                    <span class="sum-av">
                                        <?php echo implode(' ', array_slice(explode(' ', $cat['data'][$i]['summary']), 0, 15)) ?>...
                                    </span>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                            <?php  }else{ ?>
                            <p>Đang cập nhật...</p>
                        <?php }?>
                    </div>

                    <?php }}?>

                </div>
            </div>
                <?php }}?>
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
