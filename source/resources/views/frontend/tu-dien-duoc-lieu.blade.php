@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/banner-tddl.jpg')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="search">
                <input class="inp-search" type="text" placeholder="TÌM CÂY THUỐC"/>
                <input class="inp-bt" type="submit" value=" "/>
            </div>
            <div class="cov-line">
                <img class="img-line-tddl" src="{{ url('assets/frontend/images/line-tddl.png')}}"/>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
            </div>
            <div class="item-tddl">
                <img class="img-it-tddl" src="{{ url('assets/frontend/images/icon-tddl.png')}}"/>
                <a class="name-it-tddl" href="{{ route('frontend.tudienduoclieu.detail', [1,'abc']) }}">TRƯỜNG SINH</a>
                <hr class="tddl-line">
                <p class="p-tddl">Tên khác: Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                <p class="p-tddl name-t">Tên khoa học: Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                <p class="p-tddl">Tên đồng danh: Bryophyllum calycinum</p>
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
