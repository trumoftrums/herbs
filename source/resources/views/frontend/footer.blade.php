<div class="slider-top">
    <div class="cover-title">
        <h3 class="title-herbs">VIDEO NỔI BẬT</h3>
    </div>
    <div class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="40000" id="fruitscarousel2">
        <div class="carousel-inner">
            <?php if(!empty($listVideos)){
                $no =1;
                foreach ($listVideos as $vd){
                $actived = "";
                if($no==1) $actived = "active";
              ?>
            <div class="item item-herbs {{$actived}}">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="cover-media">
                        {{--<iframe width="100%" height="220" src="https://www.youtube.com/embed/ZhNsnqmnKBQ" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<video width="100%" height="220"  controls>--}}
                            {{--<source src="{{url('upload/videos/cay-thuoc-chua-ung-thu.mp4')}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                        {{--</video>--}}
                        <a href="{{route("frontend.viewVideo",[$vd->id])}}" class="fancybox fancybox.iframe" ><img src="{{url($vd->thumbnail)}}" height="220" width="100%"/> </a>

                    </div>
                    <a title="{{$vd->title}}" class="title-slide fancybox fancybox.iframe" href="{{route("frontend.viewVideo",[$vd->id])}}">
                        <?php echo implode(' ', array_slice(explode(' ', $vd->title), 0, 5)) ?>...
                    </a>
                    <span>30/04/2017</span>
                    <hr class="hr-line">
                    <?php echo implode(' ', array_slice(explode(' ', $vd->summary), 0, 28)) ?>...
                </div>
            </div>
            <?php $no++;}}?>
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
            <li><a href="#"> > Viên uống giảm cân</a> </li>
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
            <li><a href="{{ route('frontend.tintuc', [1]) }}?lang={{$lang}}"> > Tin của Herbs</a> </li>
            <li><a href="{{ route('frontend.tintuc', [2]) }}?lang={{$lang}}"> > Tin thị trường</a> </li>
            <li><a href="{{ route('frontend.tintuc', [3]) }}?lang={{$lang}}"> > Tin bài thuốc</a> </li>
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
        {{--<div id="google_translate_element" style="float:right; margin-right: 20px"></div>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'vi', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
            }
        </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>--}}
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function() {
        $("a.fancybox").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none',
            type :'iframe'
        });

    });

</script>