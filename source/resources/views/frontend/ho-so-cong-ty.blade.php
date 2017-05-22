@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">GIỚI THIỆU</p>
        <p class="title-after">HỒ SƠ CÔNG TY</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        Hoạt động của HSG tập trung vào những việc đảm bảo tạo ra lợi nhuận cho khách hàng. Đây là tôn chỉ và nền tảng để chúng tôi xây dựng thương hiệu, sản phẩm và dịch vụ. Chúng tôi cung cấp những giải pháp đầu tư và quản lí tài sản tốt nhất để từ đó khách hàng có thể yên tâm đầu tư vào những gì thật sự ý nghĩa.
    </p>
    <div class="about-up">
        <div class="item-about">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">TỒNG QUAN VỀ HSG</h3>
            </div>
            <p>- Được thành lập vào năm 2014 là Công ty TNHH một thành viên tư vấn luật

                và được cấp phép giấy chứng nhận đăng ký kinh doanh số 3702286676 ngày

                15/07/2014 bởi Sở kế hoạch và đầu tư TP HCM cho đến đăng ký thay đổi lần

                thứ nhất theo luật doanh nghiệp vào năm 2016 thành công ty TNHH đầu tư

                và công nghệ Hoàng Sang.</p>
            <p>- Với quy mô vốn điều lệ ban đầu là 12.000.000.000 cùng 20 cán bộ công

                nhân viên, đến nay tổng vốn điều lệ đã đạt 29.000.000.000 và tổng số lượng

                cán bộ công nhân viên lên tới 543 người.</p>
            <p>- Với phương châm hiện nay, HoangSang Group luôn đổi mới, sáng tạo, và áp

                dụng công nghệ hiện đại cùng với chiến lược mở rộng thị trường để phát

                triển trở thành một tập đoàn đa ngành từ BĐS đến các lĩnh vực tài chính,

                thương mại điện tử, nông nghiệp- chăn nuôi, các dự án quỹ đầu tư khởi

                nghiệp hay thị trường IPO là nhưng lĩnh vực mà công ty định hướng là mũi

                nhọn, tạo vị thế trên thị trường không chỉ trong nước mà còn vươn ra thị

                trường khu vực Đông Nam Á.</p>
        </div>
        <div class="item-about item-right">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">NHỮNG ƯU ĐIỂM NỔI BẬT CỦA HSG</h3>
            </div>
            <p>1. Trên cương vị là CEO, Ông Lê Hoàng Thái Sang, người sáng lập công

                ty đã luôn tiên phong trong việc chủ động đưa ra những sách lược và

                khảng định năng lực trên thị trường kinh doanh trong và ngoài nước</p>
            <p>2. Cam kết mang đến cho khách hàng trong nước và quốc tế những giải pháp và dịch vụ đẳng cấp quốc tế</p>
            <p>3. Nhờ truyền thống kinh doanh và cơ cấu tổ chức tinh gọn hiệu quả nên chúng tôi có thể rất linh hoạt và đáp ứng một cách nhanh chóng trước những nhu cầu của khách hàng và điều kiện thị trường không ngừng thay đổi</p>
            <p>4. Tiêu chuẩn và phong cách làm việc chất lượng quốc tế kết hợp với sự am hiểu sâu sắc thị trường và mối quan hệ kinh doanh đa dạng trong nước</p>
            <p>5. Kinh nghiệm, năng lực và mối quan hệ kinh doanh được củng cố nhờ phát huy lợi thế là đối tác của Ngân hàng cổ phần EximBank và Công ty thảo dược HERBS.</p>
        </div>
    </div>
    <div class="about-up">
        <div class="item-about">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">ĐỐI TÁC CỦA HSG</h3>
            </div>
            <div class="cover-logo-dt">
                <div class="logo-dt">
                    <img src="{{ url('assets/frontend/images/logo-sacombank.png')}}"/>
                </div>
                <div class="logo-dt">
                    <img src="{{ url('assets/frontend/images/logo-eximbank.png')}}"/>
                </div>
                <div class="logo-dt">
                    <img src="{{ url('assets/frontend/images/logo-herbs.png')}}"/>
                </div>
            </div>
        </div>
        <div class="item-about item-right">
            <div class="cover-title-item-about">
                <h3 class="title-item-about">TRỤ SỞ CHÍNH CỦA HSG</h3>
            </div>
            <ul>
                <li><img src="{{ url('assets/frontend/images/icon-about-address.png')}}"/><span>02, Phạm Văn Đồng, P. Linh Đông, Q. Thủ Đức, Tp.HCM</span></li>
                <li><img src="{{ url('assets/frontend/images/icon-about-phone.png')}}"/><span>0868888829</span></li>
                <li><img src="{{ url('assets/frontend/images/icon-about-email.png')}}"/><span>cskh@hoangsanggroup.com</span></li>
            </ul>
        </div>
    </div>
@stop
