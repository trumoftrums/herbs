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
            <?php if(!empty($dict)){?>
            <div class="content-cay">
                <h3 class="ten-cay">Tên dược liệu: <?php echo $dict['tenDuocLieu'] ?></h3>
                <?php if(!empty($dict['thumb_detail'])){?>
                <img class="img-cay" src="{{url($dict['thumb_detail'])}}"/>
                <?php }?>
                <div class="des-cay">
                    <p><b>Tên khác:</b> <?php echo $dict['tenKhac']?></p>
                    <p><b>Tên khoa học:</b> <?php echo $dict['tenKhoaHoc']?></p>
                    <p><b>Tên đồng nghĩa:</b> <?php echo $dict['tenDongNghia']?></p>
                    <p><b>Mô tả cây:</b><br>
                        <?php echo $dict['moTa']?>
                    </p>
                    <p><b>Phân bố sinh thái:</b><br><?php echo $dict['phanBoSinhThai']?></p>
                    <p><b>Bộ phận sử dụng:</b><br><?php echo $dict['boPhanSuDung']?></p>
                    <p><b>Thành phần hóa học:</b><br><?php echo $dict['thanhPhanHoaHoc']?></p>
                    <p><b>Tác dụng:</b><br>
                        <?php echo $dict['tacDung']?>
                    </p>
                    <p><b>Bài thuốc:</b><br><?php echo $dict['baiThuoc']?></p>
                </div>
            </div>
            <div class="slider-cay">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php if(!empty($dict['slideIMGs'])){
                            $arr = json_decode($dict['slideIMGs'],true);
                            $i =0;
                            foreach ($arr as $sl){
                                $actived = "";
                                if($i==0) $actived = "active";
                        ?>
                        <div class="item {{$actived}}">
                            <img src="{{ url($sl['img'])}}" alt="{{$sl['name']}}">
                            <div class="carousel-caption">
                                <h3>{{$sl['name']}}</h3>
                            </div>
                        </div>
                        <?php $i++;}}?>

                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <img src="{{ url('assets/frontend/images/arrow-left-slider.png')}}"/>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <img src="{{ url('assets/frontend/images/arrow-right-slide.png')}}"/>
                    </a>
                </div>
            </div>
            <?php }else{?>
            <p>Không tìm thấy dược liệu....</p>
            <?php }?>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">BÀI THUỐC LIÊN QUAN</h4>
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
            </div>
        </div>
    </div>
@stop
