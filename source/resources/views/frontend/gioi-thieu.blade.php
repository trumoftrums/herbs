@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/gioithieu/2.jpg')}}"/>
    <div class="slider-top">
        <div class="cover-title">
            <h3 class="title-herbs">GIỚI THIỆU</h3>
        </div>
        <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
            <P>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum."
            </P>
        </div>
    </div>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="cover-title">
                <h3 class="title-herbs">LỊCH SỬ HÌNH THÀNH</h3>
            </div>
            <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
                <P>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."
                </P>
            </div>
            <div class="cover-title">
                <h3 class="title-herbs">THÔNG TIN CÔNG TY</h3>
            </div>
            <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
                <p>Tên công ty: <br>
                    Địa chỉ: <br>
                    Mã số thuế: <br>
                    Email: <br>
                    Điện thoại: <br>
                    Fax: <br>

                </p>
            </div>
            <div class="cover-title">
                <h3 class="title-herbs">HÌNH ẢNH HOẠT ĐỘNG</h3>
            </div>
            <div class="gioithieu-content" data-ride="carousel" data-type="multi" data-interval="40000">
                <div id='body'>
                    <div id="bigPic">
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/1.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/2.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/3.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/4.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/5.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/6.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/7.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/8.jpg')}}" alt=""/>
                        <img src="{{ url('assets/frontend/images/gioithieu/imgs/9.jpg')}}" alt=""/>
                    </div>
                    <ul id="thumbs">
                        <li class='active' rel='1'><img
                                    src="{{ url('assets/frontend/images/gioithieu/imgs/1_thumb.jpg')}}" alt=""/></li>
                        <li rel='2'><img src="{{ url('assets/frontend/images/gioithieu/imgs/2_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='3'><img src="{{ url('assets/frontend/images/gioithieu/imgs/3_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='4'><img src="{{ url('assets/frontend/images/gioithieu/imgs/4_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='5'><img src="{{ url('assets/frontend/images/gioithieu/imgs/5_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='6'><img src="{{ url('assets/frontend/images/gioithieu/imgs/6_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='7'><img src="{{ url('assets/frontend/images/gioithieu/imgs/7_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='8'><img src="{{ url('assets/frontend/images/gioithieu/imgs/8_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='9'><img src="{{ url('assets/frontend/images/gioithieu/imgs/9_thumb.jpg')}}" alt=""/>
                        </li>
                        <li rel='10'><img src="{{ url('assets/frontend/images/gioithieu/imgs/10_thumb.jpg')}}" alt=""/>
                        </li>
                    </ul>
                </div>
                <div class='clearfix'></div>
                <div id='push'></div>
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