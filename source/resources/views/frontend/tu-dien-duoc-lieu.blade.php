@extends('layouts.frontend')

@section('page-title', 'HERBS')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/banner-tddl.jpg')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="search">
                <form action="{{ route('frontend.tudienduoclieu')}}" id="searchDict" method="get" >
                <input class="inp-search" type="text" value="<?php if(!empty($search) && $search!='all') echo $search; ?>" name="search" placeholder="TÌM CÂY THUỐC"/>
                <input class="inp-bt" type="submit" value=" "/>
                </form>
            </div>
            <div class="cov-line">
                <img class="img-line-tddl" src="{{ url('assets/frontend/images/line-tddl.png')}}"/>
            </div>
            <?php
                if(!empty($datas)){
                    foreach ($datas as $dt){


            ?>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url($dt->thumb)}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', str_slug($dt->tenDuocLieu,'-').'-'.$dt->id) }}">{{$dt->tenDuocLieu}}</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: {{$dt->tenKhac}}</p>
                <p class="p-tddl name-t">Tên khoa học: {{$dt->tenKhoaHoc}}</p>
                <p class="p-tddl">Tên đồng danh: {{$dt->tenDongNghia}}</p>
            </div>
            <?php   }}else{?>
            <p>Không tìm thấy dược liệu...</p>
            <?php }?>
            <div class="cover-page">
                <div class="pagination">
                    <?php if(!empty($datas)) echo $datas->links() ?>
                </div>
            </div>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">TIN BÀI THUỐC MỚI</h4>
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
