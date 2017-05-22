@extends('layouts.frontend')

@section('page-title', 'HERBS')

@section('content')
<div class="slide-show">
    <div class="cover-news">
        <p class="newsest">Tin mới nhất <span class="sp-date">Ngày 30/04/2017 - bởi Trung Tran</span></p>
    </div>
    <div class="inner-slide-show">
        <div class="col-sm-6" style="margin-left: -2%;">
            <div class="slider">
                <div id="home-slider" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">

                            {{ HTML::image('assets/frontend/images/slider/img01.png', 'Image caption', array('class' => 'img-responsive')) }}
                            <div class="carousel-caption">
                                <h4></h4>
                            </div>
                        </div>
                        <div class="item">
                            {{ HTML::image('assets/frontend/images/slider/img01.png', 'Image caption', array('class' => 'img-responsive')) }}
                            <div class="carousel-caption">
                                <h4></h4>
                            </div>
                        </div>
                        <div class="item">
                            {{ HTML::image('assets/frontend/images/slider/img01.png', 'Image caption', array('class' => 'img-responsive')) }}
                            <div class="carousel-caption">
                                <h4></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" style="width: 52%;">
            <div class="list-group slider-list">
                <a href="#" class="list-group-item active" data-target="#home-slider" data-slide-to="0">

                    {{ HTML::image('assets/frontend/images/slider/item-01.png', '', array('class' => 'img-item-slide')) }}
                    <p>Tin bài thuốc</p>
                    <hr>
                    THÀNH PHẦN THẢO DƯỢC PHƯƠNG THỨC TRỊ NHỨC MỎI<br>
                    <span class="sum-sp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .</span>
                </a>
                <a href="#" class="list-group-item" data-target="#home-slider" data-slide-to="1">
                    <img class="img-item-slide" src="./images/slider/item-02.png"/>
                    <p>Tin bài thuốc</p>
                    <hr>
                    THÀNH PHẦN THẢO DƯỢC PHƯƠNG THỨC TRỊ NHỨC MỎI<br>
                    <span class="sum-sp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</span>
                </a>
                <a href="#" class="list-group-item" data-target="#home-slider" data-slide-to="2">
                    <img class="img-item-slide" src="./images/slider/item-03.png"/>
                    <p>Tin bài thuốc</p>
                    <hr>
                    THÀNH PHẦN THẢO DƯỢC PHƯƠNG THỨC TRỊ NHỨC MỎI<br>
                    <span class="sum-sp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .</span>
                </a>
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
                            <img src="./images/sl01.png"/>
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
                            <img src="./images/sl02.png"/>
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
                            <img src="./images/sl03.png"/>
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
                            <img src="./images/sl04.png"/>
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
                            <img src="./images/sl01.png"/>
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
                            <img src="./images/sl02.png"/>
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
                            <img src="./images/sl03.png"/>
                        </div>
                        <a class="title-slide" href="#">mantra herbal từ herbs</a>
                        <hr class="hr-line">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                        <a href="#" class="a-view">Xem</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#fruitscarousel1" data-slide="prev"><img src="./images/arrow-left.png"/></a>
        <a class="right carousel-control" href="#fruitscarousel1" data-slide="next"><img src="./images/arrow-right.png"/></a>
    </div>
</div>
<div class="news-herbs">
    <div class="herbs-left">
        <div class="unit-herbs">
            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#menu3">CHUẨN ĐOÁN</a></li>
                <li><a data-toggle="tab" href="#menu2">CÂY THUỐC</a></li>
                <li><a data-toggle="tab" href="#menu1">BÀI THUỐC</a></li>
                <li class="active"><a data-toggle="tab" href="#home">TẤT CẢ</a></li>
            </ul>
            <div class="tab-content">
                <div class="cover-title cover-title-tab">
                    <h3 class="title-herbs">TIN CỦA HERBS</h3>
                </div>
                <div id="home" class="tab-pane fade in active">
                    <div class="main-item-news">
                        <img src="./images/img-item.png"/>
                        <a class="title-first" href="#">7 LOẠI THẢO DƯỢC THÔNG THƯỜNG TỐT CHO NÃO BỘ</a>
                        <span>08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a class="a-view-more-item" href="#">XEM CHI TIẾT &raquo;</a>
                    </div>
                    <div class="list-item-news">
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab item-final">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
            </div>
        </div>
        <div class="unit-herbs">
            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#menub3">CHUẨN ĐOÁN</a></li>
                <li><a data-toggle="tab" href="#menub2">CÂY THUỐC</a></li>
                <li><a data-toggle="tab" href="#menub1">BÀI THUỐC</a></li>
                <li class="active"><a data-toggle="tab" href="#homeb">TẤT CẢ</a></li>
            </ul>
            <div class="tab-content">
                <div class="cover-title cover-title-tab">
                    <h3 class="title-herbs">TIN THỊ TRƯỜNG</h3>
                </div>
                <div id="homeb" class="tab-pane fade in active">
                    <div class="main-item-news">
                        <img src="./images/img-item.png"/>
                        <a class="title-first" href="#">7 LOẠI THẢO DƯỢC THÔNG THƯỜNG TỐT CHO NÃO BỘ</a>
                        <span>08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a class="a-view-more-item" href="#">XEM CHI TIẾT &raquo;</a>
                    </div>
                    <div class="list-item-news">
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab item-final">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menub1" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
                <div id="menub2" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
                <div id="menub3" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
            </div>
        </div>
        <div class="unit-herbs">
            <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#menuc3">CHUẨN ĐOÁN</a></li>
                <li><a data-toggle="tab" href="#menuc2">CÂY THUỐC</a></li>
                <li><a data-toggle="tab" href="#menuc1">BÀI THUỐC</a></li>
                <li class="active"><a data-toggle="tab" href="#homec">TẤT CẢ</a></li>
            </ul>
            <div class="tab-content">
                <div class="cover-title cover-title-tab">
                    <h3 class="title-herbs">TIN BÀI THUỐC</h3>
                </div>
                <div id="homec" class="tab-pane fade in active">
                    <div class="main-item-news">
                        <img src="./images/img-item.png"/>
                        <a class="title-first" href="#">7 LOẠI THẢO DƯỢC THÔNG THƯỜNG TỐT CHO NÃO BỘ</a>
                        <span>08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a class="a-view-more-item" href="#">XEM CHI TIẾT &raquo;</a>
                    </div>
                    <div class="list-item-news">
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                        <div class="item-news-tab item-final">
                            <img src="./images/img-item-small.png"/>
                            <div class="cover-co-item">
                                <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                                <span class="date-sp">08:00 - ngày 30/04/2017</span>
                                <span class="sum-av">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menuc1" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
                <div id="menuc2" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
                <div id="menuc3" class="tab-pane fade">
                    <p>Đang cập nhật.</p>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.right-sidebar')
</div>
<div class="slider-top">
    <div class="cover-title">
        <h3 class="title-herbs">VIDEO NỔI BẬT</h3>
    </div>
    <div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="40000" id="fruitscarousel2">
        <div class="carousel-inner">
            <div class="item active item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <a class="title-slide" href="#">mantra herbal từ herbs</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                </div>
            </div>
            <div class="item item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <a class="title-slide" href="#">mantra herbal từ herbs</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
            <div class="item item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <a class="title-slide" href="#">mantra herbal từ herbs</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
            <div class="item item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <a class="title-slide" href="#">mantra herbal từ herbs</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
            <div class="item item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <a class="title-slide" href="#">mantra herbal từ herbs</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
            <div class="item item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        <iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <a class="title-slide" href="#">mantra herbal từ herbs</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#fruitscarousel2" data-slide="prev"><img src="./images/arrow-left.png"/></a>
        <a class="right carousel-control" href="#fruitscarousel2" data-slide="next"><img src="./images/arrow-right.png"/></a>
    </div>
    <div class="div-bt-view-more">
        <a href="#"><img src="./images/bt-more-vid.png"/></a>
    </div>
    <div class="doi-tac">
        <img src="./images/nh1.jpg"/>
        <img src="./images/nh2.jpg"/>
        <img src="./images/nh3.jpg"/>
        <img src="./images/nh4.jpg"/>
    </div>
</div>
@stop
