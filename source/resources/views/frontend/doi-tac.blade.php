@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">GIỚI THIỆU</p>
        <p class="title-after">ĐỐI TÁC CỦA CHÚNG TÔI</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        HSG xây dựng mối quan hệ hợp tác với các đối tác uy tín hàng đầu Việt Nam nhằm mang đến cho khách hàng những sản phẩm và dịch vụ tài chính tối ưu nhất, để từ đó khách hàng có thể dành tâm trí vào những việc quan trọng khác trong cuộc sống của mình.
        Với mục đích phát triển không ngừng để đáp ứng được nhu cầu tài chính ngày càng cao của khách hàng, chúng tôi luôn chào đón những đối tác tiềm năng khác. Vui lòng liên hệ  với chúng tôi để hiểu thêm về quyền lợi và điều kiện hợp tác.
    </p>
    <div class="doi-tac">
        <div class="cover-title-dau-tu">
            <h3 class="title-item-dau-tu">GIẢI PHÁP ĐẦU TƯ</h3>
        </div>
        <div class="branch-dau-tu">
            <img src="{{ url('assets/frontend/images/icon-about-bds.png')}}"/>
            <img src="{{ url('assets/frontend/images/icon-about-ipo.png')}}"/>
            <img src="{{ url('assets/frontend/images/icon-about-tmdt.png')}}"/>
            <img src="{{ url('assets/frontend/images/icon-about-chan-nuoi.png')}}"/>
            <img src="{{ url('assets/frontend/images/icon-about-khoi-nghiep.png')}}"/>
        </div>
    </div>
    <div class="doi-tac">
        <div class="cover-title-dau-tu">
            <h3 class="title-item-dau-tu">ĐỐI TÁC ĐẦU TƯ</h3>
        </div>
    </div>
@stop
