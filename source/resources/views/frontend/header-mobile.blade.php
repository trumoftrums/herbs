<div class="header-mobile">
    <div class="menu-header-mobile">
        <div class="dropdown">
                <span class="icon-menu" data-toggle="dropdown">
                    <img src="{{ url('assets/frontend/images/icon-menu-mobile.png')}}"/>
                </span>
            <ul class="dropdown-menu">
                <span class="close-menu"> <img src="{{ url('assets/frontend/images/close-icon-white.png')}}"/> </span>
                <ul id="nav-mobile">
                    <li class="parent"><a href="{{ route('frontend.home') }}">Trang Chủ</a></li>
                    <li class="parent"><a href="{{ route('frontend.gioithieu') }}">Giới Thiệu</a></li>
                    <li class="parent"><a href="{{ route('frontend.sanpham') }}">Sản Phẩm</a></li>
                    <li class="parent has-child"><a href="#">Dự Án</a></li>
                    <li>
                        <ul>
                            <li class="child"><a href="{{ route('frontend.home') }}">BUB HEABS</a></li>
                            <li class="child"><a href="{{ route('frontend.home') }}">GREEN HEABS</a></li>
                            <li class="child"><a href="{{ route('frontend.home') }}">TREVAL HEABS</a></li>
                            <li class="child"><a href="{{ route('frontend.home') }}">GROU HEABS</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="{{ route('frontend.phanphoi') }}">Phân Phối</a></li>
                    <li class="parent has-child"><a href="#">Tin Tức</a></li>
                    <li>
                        <ul>
                            <li class="child"><a href="{{ route('frontend.tintuc', [1]) }}">Tin Doanh Nghiệp</a></li>
                            <li class="child"><a href="{{ route('frontend.tintuc', [2]) }}">Tin Thị Trường</a></li>
                            <li class="child"><a href="{{ route('frontend.tintuc', [3]) }}">Tin Bài Thuốc</a></li>
                        </ul>
                    </li>
                    <li class="parent"><a href="{{ route('frontend.tudienduoclieu') }}">Từ Điển Dược Liệu</a></li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="logo-mobile">
        <a href="{{ route('frontend.home') }}"><img class="logo-hsg" src="{{ url('assets/frontend/images/logo.png')}}"/></a>
    </div>
</div>