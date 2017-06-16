@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/gioithieu/2.jpg')}}"/>
    <div class="slider-top">
        <div class="cover-title">
            <h3 class="title-herbs">GIỚI THIỆU</h3>
        </div>
        <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
            <P><?php echo json_decode($datas['gioi-thieu']['value'],true) ?>
            </P>
        </div>
    </div>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="cover-title">
                <h3 class="title-herbs">LỊCH SỬ HÌNH THÀNH</h3>
            </div>
            <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
                <P><?php echo json_decode($datas['lich-su-hinh-thanh']['value'],true)?>
                </P>
            </div>
            <div class="cover-title">
                <h3 class="title-herbs">THÔNG TIN CÔNG TY</h3>
            </div>
            <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
                <p><?php echo json_decode($datas['thong-tin-cong-ty']['value'],true)?>
                </p>
            </div>
            <div class="cover-title">
                <h3 class="title-herbs">HÌNH ẢNH HOẠT ĐỘNG</h3>
            </div>
            <?php
                $str_images = "";
                $str_thumbs = "";
                if(!empty($datas['hinh-anh-hoat-dong']['value'])){
                    $arr = json_decode($datas['hinh-anh-hoat-dong']['value'],true);
                    if(!empty($arr)){
                        $i = 1;
                        foreach ($arr as $vl){
                            $str_images .= '<img src="'.url($vl).'" alt=""/>';
                            $actived = "";
                            if($i==1){
                                $actived = " class='active' ";
                            }
                            $str_thumbs .= '<li '.$actived.' rel="'.$i.'"><img src="'.url($vl).'" alt=""/>';
                            $i++;
                        }
                    }

                }
            ?>
            <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
                <div id='body'>
                    <div id="bigPic">
                       <?php echo $str_images;?>
                    </div>
                    <ul id="thumbs">
                        <?php echo $str_thumbs;?>
                    </ul>
                </div>
                <div class='clearfix'></div>
                <div id='push'></div>
            </div>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">HOẠT ĐỘNG XÃ HỘI</h4>
                <?php if(!empty($listHoatDong)){foreach ($listHoatDong as $hd){?>
                <div class="item-bs">
                    <img src="{{ url($hd['thumb'])}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs" href="{{route('frontend.detailNews', str_slug($hd['title'],'-').'-'.$hd['id'])}}?lang={{$lang}}"><?php echo implode(' ', array_slice(explode(' ', $hd['title']), 0, 9)) ?>...</a>
                        <span class="sp-chucvu">{{substr($hd['created_at'],0,10)}}</span>
                        <p class="sp-lh"><?php echo implode(' ', array_slice(explode(' ', $hd['summary']), 0, 10)) ?>...</p>
                    </div>
                </div>
                <?php }}?>
            </div>
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">FANPAGE</h4>
                <div class="item-qa">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook/" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/facebook/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/facebook/">Facebook</a></blockquote>
                    </div>
                </div>
                {{--<div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item.png')}}"/></a>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item2.png')}}"/></a>
                </div>--}}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var currentImage;
        var currentIndex = -1;
        var interval;
        function showImage(index) {
            if (index < $('#bigPic img').length) {
                var indexImage = $('#bigPic img')[index]
                if (currentImage) {
                    if (currentImage != indexImage) {
                        $(currentImage).css('z-index', 2);
                        clearTimeout(myTimer);
                        $(currentImage).fadeOut(250, function () {
                            myTimer = setTimeout("showNext()", 3000);
                            $(this).css({'display': 'none', 'z-index': 1})
                        });
                    }
                }
                $(indexImage).css({'display': 'block', 'opacity': 1});
                currentImage = indexImage;
                currentIndex = index;
                $('#thumbs li').removeClass('active');
                $($('#thumbs li')[index]).addClass('active');
            }
        }

        function showNext() {
            var len = $('#bigPic img').length;
            var next = currentIndex < (len - 1) ? currentIndex + 1 : 0;
            showImage(next);
        }

        var myTimer;

        $(document).ready(function () {
            myTimer = setTimeout("showNext()", 3000);
            showNext(); //loads first image
            $('#thumbs li').bind('click', function (e) {
                var count = $(this).attr('rel');
                showImage(parseInt(count) - 1);
            });
        });


    </script>
@stop
