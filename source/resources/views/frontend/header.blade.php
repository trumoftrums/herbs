<img class="bg-all" src="{{ url('assets/frontend/images/bg-all.png')}}"/>
<div class="header">
    <div class="header-top">
        <a class="logo" href="/">
            <img src="{{ url('assets/frontend/images/logo.png')}}"/>
        </a>
        <div class="social-search">
            <div class="social">
                <p class="p-hotline">HOTLINE: 0000000000</p>
                <div class="cover-social">
                    <p class="p-follow">follow us</p>
                    <div class="cover-icon-social">
                        <img class="img-line line-left" src="{{ url('assets/frontend/images/line.png')}}"/>
                        <div class="social-a">
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-fb.png')}}"/></a>
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-twitter.png')}}"/></a>
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-p.png')}}"/></a>
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-in.png')}}"/></a>
                        </div>
                        <img class="img-line line-right" src="{{ url('assets/frontend/images/line.png')}}"/>
                    </div>
                </div>
            </div>
            <div class="search">
                <input type="text" class="inp-search">
                <input type="submit" class="bt-search" value="Tìm">
            </div>
        </div>
    </div>
    <div class="menu-top">
        <a href="{{ route('frontend.home') }}">TRANG CHỦ</a>
        <a href="{{ route('frontend.gioithieu') }}">GIỚI THIỆU </a>
        <a href="{{ route('frontend.sanpham') }}">SẢN PHẨM</a>
        <div class="dropdown">
            <button class="dropbtn">DỰ ÁN</button>
            <div class="dropdown-content">
                <a href="#">GREEN HEABS</a>
                <a href="#">BUB HEABS</a>
                <a href="#">TREVAL HEABS</a>
                <a href="#">GROU HEABS</a>
            </div>
        </div>
        <a href="{{ route('frontend.phanphoi') }}">PHÂN PHỐI</a>
        <div class="dropdown">
            <button class="dropbtn">TIN TỨC</button>
            <div class="dropdown-content">
                <a href="{{ route('frontend.tintuc', [1]) }}">TIN DOANH NGHIỆP</a>
                <a href="{{ route('frontend.tintuc', [2]) }}">TIN THỊ TRƯỜNG</a>
                <a href="{{ route('frontend.tintuc', [3]) }}">TIN BÀI THUỐC</a>
            </div>
        </div>
        <a href="{{ route('frontend.tudienduoclieu') }}">TỪ ĐIỂN DƯỢC LIỆU</a>
    </div>
</div>