<div class="slider-top">
    <div class="cover-title">
        <h3 class="title-herbs">VIDEO NỔI BẬT</h3>
    </div>
    <div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="40000" id="fruitscarousel2">
        <div class="carousel-inner">
            <?php if(!empty($listVideos)){
                foreach ($listVideos as $vd){

              ?>
            <div class="item active item-herbs">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/cay-thuoc-chua-ung-thu.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                        <a href="{{route("frontend.viewVideo",[$vd->id])}}" class="fancybox" ><img src="{{$vd->thumbnail}}" height="220" width="100%"/> </a>

                    </div>
                    <a class="title-slide fancybox" href="{{route("frontend.viewVideo",[$vd->id])}}">{{$vd->title}}</a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <p><?php echo $vd->summary ?></p>
                </div>
            </div>
            <?php }}?>
            {{--<div class="item item-herbs">--}}
                {{--<div class="col-md-3 col-sm-4 col-xs-12">--}}
                    {{--<div class="cover-media">--}}
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/Mbq0aYXMMH0" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/cay-thuoc-chua-gan.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                    {{--</div>--}}
                    {{--<a class="title-slide" href="#">Khỏe trẻ đẹp cùng chuối sức khỏe</a>--}}
                    {{--<span>30/04/2017</span>--}}
                    {{--<hr class="hr-line">--}}
                    {{--<p>Cây thuốc chữa bệnh về gan, kể cả ung thư thời kì cuối, Tôi tên là Hòa, sống ở thị trấn Lộc Linh khoảng một năm trước đây sức khỏe của tôi bỗng suy giảm,da bắt đầu vàng, bụng chướng, ăn uống không được ngon…</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item item-herbs">--}}
                {{--<div class="col-md-3 col-sm-4 col-xs-12">--}}
                    {{--<div class="cover-media">--}}
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/xk-nyoiFdng" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/cay-thuoc-tang-cuong-sinh-ly-phai-manh.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                    {{--</div>--}}
                    {{--<a class="title-slide" href="#">Cây Bách Bệnh - Tăng cường sinh lý phái mạnh</a>--}}
                    {{--<span>30/04/2017</span>--}}
                    {{--<hr class="hr-line">--}}
                    {{--<p>Theo y học cổ truyền, cây bách bệnh vị đắng, tính mát, có tác dung thanh nhiệt, tiêu viêm, thường dùng cho tiểu tiện ra máu, ăn không tiêu, đầy hơi, chướng bụng...</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item item-herbs">--}}
                {{--<div class="col-md-3 col-sm-4 col-xs-12">--}}
                    {{--<div class="cover-media">--}}
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/AxIUG5QJR2Q" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/co-muc.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                    {{--</div>--}}
                    {{--<a class="title-slide" href="#">Những bài thuốc dân gian từ cây cỏ</a>--}}
                    {{--<span>30/04/2017</span>--}}
                    {{--<hr class="hr-line">--}}
                    {{--<p>Xưa có câu, nam dược trị nam nhân để chỉ ra nguồn dược liệu từ ngay chính cây cỏ xung quanh là rất lớn và hiệu quả trong việc điều trị các chứng bệnh. Nay có rất nhiều cây cỏ mọc hoang ở nhiều nơi như cỏ Mực (cỏ nhọ nồi) cũng có thể trị được rất nhiều chứng bệnh bổ ích</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item item-herbs">--}}
                {{--<div class="col-md-3 col-sm-4 col-xs-12">--}}
                    {{--<div class="cover-media">--}}
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/xk-nyoiFdng" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/cay-thuoc-tang-cuong-sinh-ly-phai-manh.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                    {{--</div>--}}
                    {{--<a class="title-slide" href="#">Cây Bách Bệnh - Tăng cường sinh lý phái mạnh</a>--}}
                    {{--<span>30/04/2017</span>--}}
                    {{--<hr class="hr-line">--}}
                    {{--<p>Theo y học cổ truyền, cây bách bệnh vị đắng, tính mát, có tác dung thanh nhiệt, tiêu viêm, thường dùng cho tiểu tiện ra máu, ăn không tiêu, đầy hơi, chướng bụng...</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item item-herbs">--}}
                {{--<div class="col-md-3 col-sm-4 col-xs-12">--}}
                    {{--<div class="cover-media">--}}
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/AxIUG5QJR2Q" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/co-muc.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                    {{--</div>--}}
                    {{--<a class="title-slide" href="#">Những bài thuốc dân gian từ cây cỏ</a>--}}
                    {{--<span>30/04/2017</span>--}}
                    {{--<hr class="hr-line">--}}
                    {{--<p>Xưa có câu, nam dược trị nam nhân để chỉ ra nguồn dược liệu từ ngay chính cây cỏ xung quanh là rất lớn và hiệu quả trong việc điều trị các chứng bệnh. Nay có rất nhiều cây cỏ mọc hoang ở nhiều nơi như cỏ Mực (cỏ nhọ nồi) cũng có thể trị được rất nhiều chứng bệnh bổ ích</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <a class="left carousel-control" href="#fruitscarousel2" data-slide="prev"><img src="{{ url('assets/frontend/images/arrow-left.png')}}"/></a>
        <a class="right carousel-control" href="#fruitscarousel2" data-slide="next"><img src="{{ url('assets/frontend/images/arrow-right.png')}}"/></a>
    </div>
    <div class="div-bt-view-more">
        <a href="#"><img src="{{ url('assets/frontend/images/bt-more-vid.png')}}"/></a>
    </div>
    <div class="doi-tac">
        <img src="{{ url('assets/frontend/images/nh1.jpg')}}"/>
        <img src="{{ url('assets/frontend/images/nh2.jpg')}}"/>
        <img src="{{ url('assets/frontend/images/nh3.jpg')}}"/>
        <img src="{{ url('assets/frontend/images/nh4.jpg')}}"/>
    </div>
</div>
<div class="footer">
    <div class="menu-footer">
        <ul class="item-footer">
            <p class="p-title-ul">GIỚI THIỆU</p>
            <li><a href="#"> > Lịch sử hình thành</a> </li>
            <li><a href="#"> > Đội ngũ nhân viên</a> </li>
            <li><a href="#"> > Cơ sở vật chất</a> </li>
            <li><a href="#"> > Đội ngũ bác sĩ</a> </li>
        </ul>
        <ul class="item-footer">
            <p class="p-title-ul">SẢN PHẨM</p>
            <li><a href="#"> > Viên nan tâm thống</a> </li>
            <li><a href="#"> > Siro trị mất ngủ</a> </li>
            <li><a href="#"> > Viên uống giảm cân, đẹp dat</a> </li>
            <li><a href="#"> > Siro Thuần linh chi</a> </li>
        </ul>
        <ul class="item-footer">
            <p class="p-title-ul">PHÂN PHỐI</p>
            <li><a href="#"> > Miền Bắc</a> </li>
            <li><a href="#"> > Miền Trung</a> </li>
            <li><a href="#"> > Miền Nam</a> </li>
            <li><a href="#"> > Cả nước</a> </li>
        </ul>
        <ul class="item-footer">
            <p class="p-title-ul">TIN TỨC</p>
            <li><a href="#"> > Sản phẩm mới nhất</a> </li>
            <li><a href="{{ route('frontend.tintuc', [1]) }}"> > Tin của Herbs</a> </li>
            <li><a href="{{ route('frontend.tintuc', [2]) }}"> > Tin thị trường</a> </li>
            <li><a href="{{ route('frontend.tintuc', [3]) }}"> > Tin bài thuốc</a> </li>
        </ul>
        <ul class="item-footer">
            <p class="p-title-ul">HỎI ĐÁP</p>
            <li><a href="#"> > Vị thuốc</a> </li>
            <li><a href="#"> > Bài thuốc</a> </li>
            <li><a href="#"> > Bác sĩ</a> </li>
            <li><a href="#"> > Địa điểm</a> </li>
        </ul>
        <ul class="item-footer">
            <p class="p-title-ul">TUYỂN DỤNG</p>
            <li><a href="#"> > Herbs tuyển dung</a> </li>
            <li><a href="#"> > Quy trình tuyển dung</a> </li>
            <li><a href="#"> > Hồ sơ cần có</a> </li>
            <li><a href="#"> > Phúc lợi tại Herbs</a> </li>
        </ul>
        <ul class="item-footer last-item-footer">
            <div class="cover-social-footer">
                <a href="#"><img src="{{ url('assets/frontend/images/footer-icon01.png')}}"/></a>
                <a class="icon02" href="#"><img src="{{ url('assets/frontend/images/footer-icon02.png')}}"/></a>
                <a class="icon03" href="#"><img src="{{ url('assets/frontend/images/footer-icon03.png')}}"/></a>
                <a class="icon04" href="#"><img src="{{ url('assets/frontend/images/footer-icon04.png')}}"/></a>
            </div>
            <p class="hotline-footer">HOTLINE: 19009220</p>
        </ul>
    </div>
</div>
<div class="cover-footer">
    <div class="footer-bt">
        <a class="logo-footer" href="#"><img src="{{ url('assets/frontend/images/logo.png')}}"/></a>
        <div class="cover-address-footer">
            <p class="p-right">GREENHERBSJSC.COM Bản quyền @2013 Greenherbsjsc</p>
            <p>Địa chỉ: 05, Einstein, P. Bình Thọ, Q. Thủ Đức, Tp.HCM</p>
            <p>Hotline: 19009220 - Email: cskh@greenherbsjsc.com</p>
        </div>
        <div id="google_translate_element" style="float:right; margin-right: 20px"></div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'vi', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
            }
        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function() {
        $(".fancybox").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });
    });

</script>