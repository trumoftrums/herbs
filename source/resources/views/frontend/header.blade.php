<img class="bg-all" src="{{ url('assets/frontend/images/bg-all.png')}}"/>
<div class="header">
    <div class="header-top">
        <a class="logo" href="/">
            <img src="{{ url('assets/frontend/images/logo.png')}}"/>
        </a>
        <div class="social-search">
            <div class="social">
                <p class="p-hotline">HOTLINE: 19009220</p>
                <div class="cover-social">
                    <p class="p-follow">follow us</p>
                    <div class="cover-icon-social">
                        {{--<img class="img-line line-left" src="{{ url('assets/frontend/images/line.png')}}"/>--}}
                        <div class="social-a">
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-fb.png')}}"/></a>
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-twitter.png')}}"/></a>
                            <a href="#"><img src="{{ url('assets/frontend/images/icon-p.png')}}"/></a>
                            <a style="border-right: none;" href="#"><img src="{{ url('assets/frontend/images/icon-in.png')}}"/></a>
                        </div>
                        {{--<img class="img-line line-right" src="{{ url('assets/frontend/images/line.png')}}"/>--}}
                        <div class="cover-lang">
                            <a href="#"><img src="{{ url('assets/frontend/images/en_flag.png')}}"/></a>
                            <a href="#"><img src="{{ url('assets/frontend/images/vi_flag.png')}}"/></a>
                        </div>
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
        <a href="#">SẢN PHẨM</a>
        <div class="dropdown">
            <button class="dropbtn">DỰ ÁN</button>
            <div class="dropdown-content">
                @foreach($listProjects as $it)
                    <a href="{{ route('frontend.duan', [$it->id, str_slug($it->tenDuAn, '-')]) }}">{{$it->tenDuAn}}</a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('frontend.phanphoi') }}">PHÂN PHỐI</a>
        <div class="dropdown">
            <button class="dropbtn">TIN TỨC</button>
            <div class="dropdown-content">
                <a href="/tin-doanh-nghiep/1">TIN DOANH NGHIỆP</a>
                <a href="/tin-thi-truong/2">TIN THỊ TRƯỜNG</a>
                <a href="/tin-thi-truong/3">TIN BÀI THUỐC</a>
            </div>
        </div>
        <a href="{{ route('frontend.tudienduoclieu') }}">TỪ ĐIỂN DƯỢC LIỆU</a>
    </div>
</div>