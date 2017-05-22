<div class="header">
    <div class="header-top">
        <a class="logo" href="/">

            {{ HTML::image('assets/frontend/images/logo.png', '', array()) }}
        </a>
        <div class="social-search">
            <div class="social">
                <p class="p-hotline">HOTLINE: 0000000000</p>
                <div class="cover-social">
                    <p class="p-follow">follow us</p>
                    <div class="cover-icon-social">
                        {{ HTML::image('assets/frontend/images/line.png', '', array('class'=>'img-line line-left')) }}

                        <div class="social-a">

                            <a href="#">{{HTML::image('assets/frontend/images/icon-fb.png', '', array())}}</a>
                            <a href="#">{{HTML::image('assets/frontend/images/icon-twitter.png', '', array())}}</a>
                            <a href="#">{{HTML::image('assets/frontend/images/icon-p.png', '', array())}}</a>
                            <a href="#">{{HTML::image('assets/frontend/images/icon-in.png', '', array())}}</a>
                        </div>

                        {{HTML::image('assets/frontend/images/line.png', '', array('class'=>'img-line line-right'))}}
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
        <a href="index.html">TRANG CHỦ</a>
        <a href="gioithieu.html">GIỚI THIỆU </a>
        <a href="#news">SẢN PHẨM</a>
        <div class="dropdown">
            <button class="dropbtn">DỰ ÁN</button>
            <div class="dropdown-content">
                <a href="#">{{HTML::image('assets/frontend/images/sub-menu-01.png', '', array())}}/></a>
                <a href="#">{{HTML::image('assets/frontend/images/sub-menu-02.png', '', array())}}/></a>
                <a href="#">{{HTML::image('assets/frontend/images/sub-menu-03.png', '', array())}}/></a>
                <a href="#">{{HTML::image('assets/frontend/images/sub-menu-04.png', '', array())}}/></a>
            </div>
        </div>
        <a href="phanphoi.html">PHÂN PHỐI</a>
        <a href="tin-tuc.html">TIN TỨC</a>
        <a href="tu-dien-duoc-lieu.html">TỪ ĐIỂN DƯỢC LIỆU</a>
    </div>
</div>