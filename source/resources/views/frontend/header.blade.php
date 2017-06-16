<img class="bg-all" src="{{ url('assets/frontend/images/bg-all.png')}}"/>
<div class="header">
    <div class="header-top">
        <a class="logo" href="/">
            <img src="{{ url('assets/frontend/images/logo.png')}}"/>
        </a>
        <div class="social-search">
            <div class="social">
                <p class="p-hotline">{{\Vanguard\Providers\AppServiceProvider::trans('abc')}}: 19009220</p>
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
                            <a href="{{Request::url().'?lang=en'}}"><img src="{{ url('assets/frontend/images/en_flag.png')}}"/></a>
                            <a href="{{Request::url().'?lang=vi'}}"><img src="{{ url('assets/frontend/images/vi_flag.png')}}"/></a>
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
        <a href="{{ route('frontend.home') }}?lang={{$lang}}">TRANG CHỦ</a>
        <a href="{{ route('frontend.gioithieu') }}?lang={{$lang}}">GIỚI THIỆU </a>
        <a href="#">SẢN PHẨM</a>
        <div class="dropdown">
            <button class="dropbtn">DỰ ÁN</button>
            <div class="dropdown-content">
                @foreach($listProjects as $it)
                    <a href="{{ route('frontend.duan', [$it->id, str_slug($it->tenDuAn, '-')]) }}?lang={{$lang}}">{{$it->tenDuAn}}</a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('frontend.phanphoi') }}?lang={{$lang}}">PHÂN PHỐI</a>
        <div class="dropdown">
            <button class="dropbtn">TIN TỨC</button>
            <div class="dropdown-content">
                <a href="/tin-doanh-nghiep/1?lang={{$lang}}">TIN DOANH NGHIỆP</a>
                <a href="/tin-thi-truong/2?lang={{$lang}}">TIN THỊ TRƯỜNG</a>
                <a href="/tin-thi-truong/3?lang={{$lang}}">TIN BÀI THUỐC</a>
            </div>
        </div>
        <a href="{{ route('frontend.tudienduoclieu') }}?lang={{$lang}}">TỪ ĐIỂN DƯỢC LIỆU</a>
    </div>
</div>