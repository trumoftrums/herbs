@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
<div class="first-top">
    <div class="one">
        <div class="why-invest">
            <img class="img-header" src="{{ url('assets/frontend/images/bg-header.jpg') }}"/>
            <img class="icon-why-invest" src="{{ url('assets/frontend/images/icon-vi-sao-dau-tu.png') }}"/>
            <p class="date-author">08/03/2017 | Được viết bởi: ông Lê Hoàng Thái Sang(CEO)</p>
        </div>
        <div class="slide-why-invest">
            <div class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ url('assets/frontend/images/slides/img1.png') }}"/>
                    </div>
                    <div class="item">
                        <img src="{{ url('assets/frontend/images/slides/img2.png') }}"/>
                    </div>
                    <div class="item">
                        <img src="{{ url('assets/frontend/images/slides/img3.png') }}"/>
                    </div>
                    <div class="item">
                        <img src="{{ url('assets/frontend/images/slides/img4.png') }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="two">
        <div class="up">
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/giai-phap-dau-tu.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.giaiphapdautu') }}"><img class="img-title-01" src="{{ url('assets/frontend/images/title-service-01.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-bds.png')}}"/>
                        <p>Bất Động Sản</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-ipo.png')}}"/>
                        <p>Thị Trường IPO</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-tmdt.png')}}"/>
                        <p>Thương Mại Điện Tử</p>
                    </div>
                    <div class="icon-item" style="margin-left: 17%;">
                        <img src="{{ url('assets/frontend/images/icon-chan-nuoi.png')}}"/>
                        <p>Công Nghiệp SX</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-dau-tu-khoi-nghiep.png')}}"/>
                        <p>Quỹ Đầu Tư Khởi Nghiệp</p>
                    </div>
                </div>
            </div>
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/nha-dau-tu.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.baocaotaichinh') }}"><img class="img-title-02" src="{{ url('assets/frontend/images/title-service-02.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <ul>
                        <li>
                            <input type="checkbox" checked/><span>Công bố thông tin</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Lịch hoạt động của quỹ</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Hỏi và đáp</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Hỗ trợ tư vấn tài chính</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Báo cáo tài chính</span>
                        </li>
                    </ul>
                    <a class="view-more" href="{{ route('frontend.baocaotaichinh') }}">Tìm hiểu thêm</a>
                </div>
            </div>
            {{--<div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/giai-phap-dau-tu.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.giaiphapdautu') }}"><img class="img-title-01" src="{{ url('assets/frontend/images/title-service-01.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-bds.png')}}"/>
                        <p>Bất Động Sản</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-ipo.png')}}"/>
                        <p>Thị Trường IPO</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-tmdt.png')}}"/>
                        <p>Thương Mại Điện Tử</p>
                    </div>
                    <div class="icon-item" style="margin-left: 17%;">
                        <img src="{{ url('assets/frontend/images/icon-chan-nuoi.png')}}"/>
                        <p>Chăn Nuôi</p>
                    </div>
                    <div class="icon-item">
                        <img src="{{ url('assets/frontend/images/icon-dau-tu-khoi-nghiep.png')}}"/>
                        <p>Quỹ Đầu Tư Khởi Nghiệp</p>
                    </div>
                </div>
            </div>
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/nha-dau-tu.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.baocaotaichinh') }}"><img class="img-title-02" src="{{ url('assets/frontend/images/title-service-02.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <ul>
                        <li>
                            <input type="checkbox" checked/><span>Công bố thông tin</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Lịch hoạt động của quỹ</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Hỏi và đáp</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Hỗ trợ tư vấn tài chính</span>
                        </li>
                        <li>
                            <input type="checkbox" checked/><span>Báo cáo tài chính</span>
                        </li>
                    </ul>
                    <a class="view-more" href="{{ route('frontend.baocaotaichinh') }}">Tìm hiểu thêm</a>
                </div>
            </div>--}}
        </div>
        <div class="bottom">
            <div class="carousel slide slide-right" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ url('assets/frontend/images/slide-right/slide03.jpg') }}"/>
                    </div>
                    <div class="item">
                        <img src="{{ url('assets/frontend/images/slide-right/slide02.jpg') }}"/>
                    </div>
                    <div class="item">
                        <img src="{{ url('assets/frontend/images/slide-right/slide01.jpg') }}"/>
                    </div>
                </div>
            </div>

            {{--<div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/kien-thuc-tai-chinh.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.dautu') }}"><img class="img-title-03" src="{{ url('assets/frontend/images/title-service-03.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <h4><img src="{{ url('assets/frontend/images/icon-mo-khoa-kien-thuc.png')}}"/>CÙNG HSG MỞ KHÓA KIẾN THỨC QLTC</h4>
                    <p class="p-service">Chúng ta thảo luận rất nhiều về kinh tế nhưng đôi khi lại bỏ qua những điều cơ bản. Những gì <b>HOÀNG SANG GROUP</b> chia sẻ hy vọng sẽ giúp bạn cấu trúc lại kiến thức kinh tế của mình.</p>
                    <a class="view-more" href="{{ route('frontend.dautu') }}">Tìm hiểu thêm</a>
                </div>
            </div>
            <div class="item-service">
                <img class="img-service" src="{{ url('assets/frontend/images/tuyen-dung.png')}}"/>
                <div class="cover-title">
                    <a href="{{ route('frontend.tuyendung') }}"><img class="img-title-04" src="{{ url('assets/frontend/images/title-service-04.png')}}"/></a>
                    <p class="date-author right-p">Được viết bởi: ông Lê Hoàng Thái Sang (CEO)</p>
                </div>
                <div class="cover-content-item">
                    <h4><img src="{{ url('assets/frontend/images/icon-khoi-nghiep-dam-me.png')}}"/>CÙNG HSG KHỞI NGHIỆP ĐAM MÊ</h4>
                    <p class="p-service">Hiện tại HOÀNG SANG GROUP đang tìm kiếm những ứng viên có niềm đam mê với lĩnh vực tài chính. Chúng tôi sẽ rất hạnh phúc khi có được sự hợp tác của các bạn.</p>
                    <a class="view-more" href="{{ route('frontend.tuyendung') }}">Tìm hiểu thêm</a>
                </div>
            </div>--}}
        </div>
    </div>
</div>
<div class="second-bottom">
    <img class="img-slogan" src="{{ url('assets/frontend/images/bg-title.png')}}"/>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/td01.jpg')}}">
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>TẦM NHÌN CỦA HSG</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                Hội tụ niềm đam mê và nuôi dưỡng khát vọng, tài năng để tìm kiếm sự đột phá nhằm nâng cao lợi ích, sự trường tồn cho khách hàng..
                <br>
                Chính vì vậy, khách hàng sẽ tưởng thưởng chúng ta bằng doanh số, lợi nhuận dẫn đầu và sự tăng trưởng bền vững
            </p>
        </div>
    </div>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/td02.jpg')}}">
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>SỨ MỆNH CỦA HSG</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                HSG là một hệ thống tích hợp và đồng bộ gồm các công ty hoạt động trong các lĩnh vực bất động sản, thương mại điện tử, sản xuất kinh doanh và tài chính nhằm tạo dựng một cuộc sống tốt đẹp hơn cho mọi người đồng thời không ngừng gia tăng giá trị cho cổ đông.
            </p>
        </div>
    </div>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/td03.jpg')}}">
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>GIÁ TRỊ CỐT LÕI</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                “Đoàn kết và Hợp tác”<br>
                “Tận tâm và Uy tín”<br>
                “Sáng tạo và Đổi mới”<br>
                “Lợi nhuận và hiệu quả”<br>
                “Chuyên nghiệp và tiêu chuẩn hoá”<br>
                Là những giá trị cốt lỗi làm nền tảng góp phần đưa HSG trở thành một tập đoàn đa quốc gia.

            </p>
        </div>
    </div>
    <div class="item-thong-diep">
        <div class="left">
            <img src="{{ url('assets/frontend/images/td04.jpg')}}">
        </div>
        <div class="right">
            <div class="cover-p-thong-diep">
                <img class="phay-left" src="{{ url('assets/frontend/images/phay-left.png')}}"/>
                <p>ĐỊNH HƯỚNG CHIẾN LƯỢC</p>
                <img class="phay-right" src="{{ url('assets/frontend/images/phay-right.png')}}"/>
            </div>
            <p class="p-content-thong-diep">
                Trở thành Tập đoàn đa ngành, lớn mạnh ổn định bền vững<br>
                “Lấy đầu tư để tăng tốc phát triển ”<br>
                “Lấy nhân tố con người làm hạt nhân“<br>
                “Lấy công nghệ thông tin là công cụ quan trọng”<br>
                “Lấy lợi ích của khách hàng là cốt lõi”<br>
            </p>
        </div>
    </div>
</div>
@stop
