@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/banner-news.jpg')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="cover-menu-tab">
                <div class="cover-tab-cate">
                    <ul>
                        <li><a href="#">TẤT CẢ</a> </li>
                        <li><a href="#">CÂY THUỐC</a> </li>
                        <li><a href="#">BÀI THUỐC</a> </li>
                        <li><a href="#">CHUẨN ĐOÁN</a> </li>
                    </ul>
                </div>
                <div class="cover-title title-news">
                    <h3 class="title-herbs">{{$title}}</h3>
                </div>
                <div class="main-news">
                    <img class="img-main-news" src="{{ url('assets/frontend/images/img-item.png')}}"/>
                    <div class="cv-main-news">
                        <a href="{{ route('frontend.tintuc.detail', [1,'abc']) }}"><h5 class="h5-title">7 loại thảo dược thông thường tốt cho não bộ</h5></a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <a class="a-view" href="{{ route('frontend.tintuc.detail', [1,'abc']) }}">XEM CHI TIẾT &raquo;</a>
                    </div>
                </div>
                <div class="list-news">
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <div class="it-news">
                        <img class="img-it" src="{{ url('assets/frontend/images/img-item-sm.png')}}"/>
                        <a href="tin-tuc-detail.html" class="p-it-news">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                        <hr class="hr-line">
                        <p class="sum-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <a class="icon-more" href="tin-tuc-detail.html"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                </div>
            </div>
            <div class="cover-page">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
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
