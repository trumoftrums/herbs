<div class="header-mobile">
    <div class="menu-header-mobile">
        <div class="dropdown">
                <span class="icon-menu" data-toggle="dropdown">
                    <img src="{{ url('assets/frontend/images/icon-menu-mobile.png')}}"/>
                </span>
            <ul class="dropdown-menu">
                <span class="close-menu"> <img src="{{ url('assets/frontend/images/close-icon-white.png')}}"/> </span>
                <ul id="nav-mobile">
                    <li class="parent has-child"><a href="#">Giới thiệu</a></li>
                    <li>
                        <ul>
                            <li class="child"><a href="{{ route('frontend.hosocongty') }}">Hồ sơ công ty</a></li>
                            <li class="child"><a href="{{ route('frontend.nhansu') }}">Nhân sự</a></li>
                            <li class="child"><a href="{{ route('frontend.doitac') }}">Đối tác của chúng tôi</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="{{ route('frontend.giaiphapdautu') }}">Giải pháp đầu tư</a></li>
                    <li class="parent has-child"><a href="#">Kiến thức tài chính</a></li>
                    <li>
                        <ul>
                            <li class="child"><a href="{{ route('frontend.dautu') }}">Đầu tư</a></li>
                            <li class="child"><a href="{{ route('frontend.quanlytaichinhcanhan') }}">Quản lý tài chính cá nhân</a></li>
                        </ul>
                    </li>
                    <li class="parent has-child"><a href="#">Quan hệ nhà đầu tư</a></li>
                    <li>
                        <ul>
                            <li class="child"><a href="{{ route('frontend.baocaotaichinh') }}">Báo cáo tài chính</a></li>
                            <li class="child"><a href="{{ route('frontend.hoidap') }}">Hỏi đáp</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="{{ route('frontend.tuyendung') }}">Tuyển dụng</a></li>
                    <li class="parent"><a href="{{ route('frontend.lienhe') }}">Liên hệ</a></li>
                </ul>
                <a href="http://private.hoangsanggroup.com" target="_blank" class="private-page">
                    <img src="{{ url('assets/frontend/images/icon-user-page.png')}}"> Văn phòng cá nhân
                </a>
            </ul>
        </div>
    </div>
    <div class="logo-mobile">
        <a href="{{ route('frontend.home') }}"><img class="logo-hsg" src="{{ url('assets/frontend/images/logo-not-slogan.png')}}"/></a>
    </div>
</div>