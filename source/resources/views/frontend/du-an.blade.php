@extends('layouts.frontend')

@section('page-title', 'HERBS')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/img-project.png')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="cover-title title-news title-detail-news">
                <h3 class="title-herbs">DỰ ÁN CỦA HERBS</h3>
            </div>
            <div class="detail-nes project-di">
                <h2 class="title-news-detail">{{$datas->tenDuAn}}</h2>
                <span class="sp-date">{{date_format(date_create($datas->created_at),"d/m/Y")}} by Administrator</span>
                <br>
                <?php
                $str_images = "";
                $str_thumbs = "";
                if(!empty($datas->slideIMGs)){
                    $arr = json_decode($datas->slideIMGs,true);
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
                </div>
                <div class="cv-ab">
                    <h4 class="h4-project">THÔNG TIN CHUNG</h4>
                    <p class="p-name">Tên dự án: {{$datas->tenDuAn}}</p>
                    <p class="p-name">Tên khoa học: {{$datas->tenKhoaHoc}}</p>
                    <p class="p-name">Thành phần hóa học: {{$datas->thanhPhanHoaHoc}}</p>
                    <p class="p-name">Tác dụng: {{$datas->tacDung}}</p>
                    <p class="p-name">Thời gian triển khai: {{$datas->thoiGianTrienKhai}}</p>
                    <p class="p-name">Dự kiến hoàn thành: {{$datas->duKienHoanThanh}}</p>
                </div>
                <div class="cv-ab">
                    <h4 class="h4-project">MÔ TẢ DỰ ÁN</h4>
                    <p style="text-align: justify;">
                        <?php echo $datas->moTa; ?>
                    </p>
                </div>
            </div>
            <div class="slider-pro slider-top">
                <div class="cover-title">
                    <h3 class="title-herbs">SẢN PHẨM MỚI CỦA HERBS</h3>
                </div>
                <div class="carousel slide row" data-ride="carousel" data-type="multi1" data-interval="40000" id="fruitscarousel1">
                    <div class="carousel-inner">
                        <div class="item active item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl01.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">Thuần Linh Chi </a>
                                    <hr class="hr-line">
                                    <p>Bổ sung dinh dưỡng cho mọi đối tượng, đặc biệt là bà bầu, trẻ em, người suy nhược và người già.<br>
                                        Viên tảo biển nhật giúp tăng cường...</p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                        <div class="item item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl02.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">VIÊN UỐNG GIẢM CÂN ĐẸP DA </a>
                                    <hr class="hr-line">
                                    <p>Bổ sung enzym cho cơ thể<br>
                                        Hỗ trợ các vấn đề về tiêu hóa, đào thải độc tố<br>
                                        Tăng cường hệ miễn dịch cho...</p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                        <div class="item item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl03.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">Hộp viên nang Tâm thống </a>
                                    <hr class="hr-line">
                                    <p>Hỗ trợ điều trị suy thận, sỏi thận, viêm đường tiết niệu <br>
                                        Bổ thận tráng dương, tăng cường sinh lý nam giới...<br>
                                    </p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                        <div class="item item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl04.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">Thuốc trị mất ngủ Siro</a>
                                    <hr class="hr-line">
                                    <p>Giải độc, thanh nhiệt, nhuận tràng<br>
                                        Hạ đường huyết, hỗ trợ điều trị bệnh tiểu đường, cao huyết áp<br>
                                        Giảm suy nhược, giúp cơ thể...
                                    </p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                        <div class="item item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl02.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">VIÊN UỐNG GIẢM CÂN ĐẸP DA </a>
                                    <hr class="hr-line">
                                    <p>Bổ sung enzym cho cơ thể<br>
                                        Hỗ trợ các vấn đề về tiêu hóa, đào thải độc tố<br>
                                        Tăng cường hệ miễn dịch cho...</p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                        <div class="item item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl03.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">Hộp viên nang Tâm thống </a>
                                    <hr class="hr-line">
                                    <p>Hỗ trợ điều trị suy thận, sỏi thận, viêm đường tiết niệu <br>
                                        Bổ thận tráng dương, tăng cường sinh lý nam giới...<br>
                                    </p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                        <div class="item item-herbs">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="cover-in">
                                    <div class="cover-media">
                                        <img src="{{ url('assets/frontend/images/sl04.png')}}"/>
                                    </div>
                                    <a class="title-slide" href="#">Thuốc trị mất ngủ Siro</a>
                                    <hr class="hr-line">
                                    <p>Giải độc, thanh nhiệt, nhuận tràng<br>
                                        Hạ đường huyết, hỗ trợ điều trị bệnh tiểu đường, cao huyết áp<br>
                                        Giảm suy nhược, giúp cơ thể...
                                    </p>
                                    <a href="#" class="a-view">Xem</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#fruitscarousel1" data-slide="prev"><img src="{{ url('assets/frontend/images/arrow-left.png')}}"/></a>
                    <a class="right carousel-control" href="#fruitscarousel1" data-slide="next"><img src="{{ url('assets/frontend/images/arrow-right.png')}}"/></a>
                </div>
            </div>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">HOẠT ĐỘNG XÃ HỘI</h4>
                <?php if(!empty($listHoatDong)){foreach ($listHoatDong as $hd){?>
                <div class="item-bs">
                    <img src="{{ url($hd['thumb'])}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs" href="{{route('frontend.detailNews', str_slug($hd['title'],'-').'-'.$hd['id'])}}"><?php echo implode(' ', array_slice(explode(' ', $hd['title']), 0, 9)) ?>...</a>
                        <span class="sp-chucvu">{{substr($hd['created_at'],0,10)}}</span>
                        <p class="sp-lh"><?php echo implode(' ', array_slice(explode(' ', $hd['summary']), 0, 10)) ?>...</p>
                    </div>
                </div>
                <?php }}?>
            </div>
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">DANH MỤC DỰ ÁN</h4>
                @foreach($listProjects as $item)
                    <?php $thumb = json_decode($item->slideIMGs, true) ?>
                <div class="it-project">
                    <img src="{{ url($thumb[0])}}"/>
                    <a href="#">{{$item->tenDuAn}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery('.carousel[data-type="multi1"] .item').each(function () {
            var next = jQuery(this).next();
            if (!next.length) {
                next = jQuery(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo(jQuery(this));
            for (var i = 0; i < 1; i++) {
                next = next.next();
                if (!next.length) {
                    next = jQuery(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
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
