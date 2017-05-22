@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-after title-after-only">LIÊN HỆ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="kien-thuc-tai-chinh-detail">
        <div class="detail-news-left">
            <p class="p-about-header">
                HSG luôn tiếp thu mọi ý kiến đóng góp của Khách hàng để ngày càng hoàn thiện dịch vụ của Chúng tôi. Bên cạnh đó Chúng tôi luôn chào đón những Khách hàng có nhu cầu hợp tác với HSG.
            </p>
            <div class="kien-thuc-tai-chinh hoi-dap">
                <img class="img-header-tuyen-dung" src="{{ url('assets/frontend/images/img-lien-he.png')}}"/>
                <div class="form-tuyen-dung">
                    <div class="item-form">
                        <input class="inp-td" name="email" placeholder="Nhập email của bạn">
                        <input class="inp-td inp-right" name="email" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="item-form">
                        <textarea class="area-desc area-contact" placeholder="Nhập nội dung tin nhắn"></textarea>
                    </div>
                    <div class="item-form">
                        <input class="inp-sub" type="submit" value="gửi tin">
                    </div>
                </div>
            </div>
        </div>
        <div class="list-news-related-right">
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Liên hệ online</p>
            </div>
            <div class="list-news-right">
                <p class="p-contact"><img src="{{ url('assets/frontend/images/icon-skype-contact.png')}}"/> hoangsanggroup</p>
                <p class="p-contact"><img src="{{ url('assets/frontend/images/icon-email-contact.png')}}"/> cskh@hoangsanggroup.com</p>
                <p class="p-contact"><img src="{{ url('assets/frontend/images/icon-phone-contact.png')}}"/> 0868888829</p>
            </div>
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Hotline ban lãnh đạo</p>
            </div>
            <div class="list-news-right">
                <ul class="abc">
                    <li><p class="cha"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Tổng Giám Đốc</p>
                        <ul>
                            <li><p class="con"><i class="fa fa-male" aria-hidden="true"></i> Lê Hoàng Thái Sang</p></li>
                            <li><p class="con"><i class="fa fa-phone-square" aria-hidden="true"></i> 097 7777 929</p></li>
                        </ul>
                    </li>
                    <li><p class="cha"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Phó Tổng Giám Đốc</p>
                        <ul>
                            <li><p class="con"><i class="fa fa-male" aria-hidden="true"></i> Nguyễn Đăng Tuấn</p></li>
                            <li><p class="con"><i class="fa fa-phone-square" aria-hidden="true"></i> 0937 885 175</p></li>
                        </ul>
                    </li>
                    <li><p class="cha"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> Trưởng Ban Cố Vấn</p>
                        <ul>
                            <li><p class="con"><i class="fa fa-male" aria-hidden="true"></i> Đỗ Thế Trường</p></li>
                            <li><p class="con"><i class="fa fa-phone-square" aria-hidden="true"></i> 0909 774 775</p></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop
