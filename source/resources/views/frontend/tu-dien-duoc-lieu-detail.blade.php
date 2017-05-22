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
            <div class="content-cay">
                <h3 class="ten-cay">Tên dược liệu: TRƯỜNG SINH</h3>
                <img class="img-cay" src="{{ url('assets/frontend/images/img-detail.jpg')}}"/>
                <div class="des-cay">
                    <p><b>Tên khác:</b> Sống đời, Thuốc bỏng, Diệp sinh căn, Thổ tam thất, Lạc địa sinh căn.</p>
                    <p><b>Tên khoa học:</b> Kalanchoe pinnata (Lamk.) Pers., họ Thuốc bỏng (Crassulaceae).</p>
                    <p><b>Tên đồng nghĩa:</b> Bryophyllum calycinumSalisb.</p>
                    <p><b>Mô tả cây:</b><br> Cây thân thảo, sống lâu năm, cao khoảng 0,4-0,6 m. Thân tròn nhẵn, có đốm tía. Lá mọc đối, phiến lá dày, mọng nước, mép lá có răng cưa tròn. Hoa mọc thõng xuống, màu đỏ hoặc vàng cam, tụ thành xim trên một trục phát hoa dài ở ngọn thân. Quả gồm 4 đại.</p>
                    <p><b>Phân bố sinh thái:</b><br> Cây mọc hoang ở đất khô cằn, còn được trồng làm cảnh và làm thuốc.</p>
                    <p><b>Bộ phận sử dụng:</b><br> Lá (Folium Kalanchoe). Lá thu hái quanh năm, thường dùng tươi.</p>
                    <p><b>Thành phần hóa học:</b><br> Cả cây chứa bryophyllin, flavonoid, acid hữu cơ như: acid citric, acid isocitric, acid malic.</p>
                    <p><b>Tác dụng:</b><br> Kháng khuẩn, tiêu viêm.<br>
                        Dùng chữa bỏng, vết thương, lở loét, viêm tấy, đau mắt sưng đỏ, chảy máu, giải độc.<br>
                        Lá tươi giã nát, thêm nước gạn uống (20-40 g/ngày) hoặc lá tươi giã nhỏ đắp hoặc chế thành dạng thuốc mỡ để bôi.</p>
                    <p><b>Bài thuốc:</b><br> 1. Chữa viêm tai giữa cấp tính: lá tươi giã nát, vắt lấy nước nhỏ vào tai.<br>
                        2. Bị thương thổ huyết: lá tươi giã nát, thêm rượu và đường vào uống trong ngày.</p>
                </div>
            </div>
            <div class="slider-cay">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="{{ url('assets/frontend/images/slider/tu-dien/img01.png')}}" alt="Los Angeles">
                            <div class="carousel-caption">
                                <h3>Lá mặt dưới</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ url('assets/frontend/images/slider/tu-dien/img02.png')}}" alt="Chicago">
                            <div class="carousel-caption">
                                <h3>Lá mặt trên</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ url('assets/frontend/images/slider/tu-dien/img03.png')}}" alt="New York">
                            <div class="carousel-caption">
                                <h3>Gốc cuống lá</h3>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ url('assets/frontend/images/slider/tu-dien/img04.png')}}" alt="New York">
                            <div class="carousel-caption">
                                <h3>Toàn cây</h3>
                            </div>
                        </div>
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
