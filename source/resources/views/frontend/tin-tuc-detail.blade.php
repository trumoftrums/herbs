@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/banner-news.jpg')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="cover-menu-tab">
                <div class="cover-tab-cate">
                    <ul>
                        <li><a href="#">TẤT CẢ</a> </li>
                        <li><a href="#">CÂY THUỐC</a> </li>
                        <li><a href="#">BÀI THUỐC</a> </li>
                        <li><a href="#">CHUẨN ĐOÁN</a> </li>
                    </ul>
                </div>
                <div class="cover-title title-news">
                    <h3 class="title-herbs">TIN DOANH NGHIỆP</h3>
                </div>
            </div>
            <div class="detail-nes">
                <h2 class="title-news-detail">7 loại thảo dược thông thường tốt cho não bộ</h2>
                <span class="sp-date">08:00 - ngày 30/04/2017</span>
                <img class="img-detail" src="{{ url('assets/frontend/images/img-news-detail.png')}}"/>
                <div class="single-main-content" id="content_detail">
                    <div style="text-align: justify;"><font face="Arial" size="2"><b>(VTC News) – Tỏi, hương nhu, húng quế,… là một số loại thảo dược thông thường rất có lợi cho sức khỏe não bộ như cải thiện trí nhớ, sự tập trung của não bộ.</b></font></div><div style="text-align: justify;"><font face="Arial" size="2"><b><br></b></font></div><div style="text-align: justify;"><font face="Arial" size="2">Não bộ là hệ thống xử lý trung tâm của con người, nếu não bộ không hoạt động thì con người cũng gần như đã chết.&nbsp;</font><span style="font-family: Arial; font-size: small;">Não bộ khỏe mạnh có nghĩa là bộ não đó có khả năng tập trung, suy nghĩ hợp lý, ghi nhớ các sự kiện, kế hoạch, học tập... bình thường. <br><br>Nếu các chức năng này không bình thường do một số thiếu sót hoặc hư hỏng trong não, nó có thể dẫn đến những biến chứng sức khỏe nghiêm trọng, cản trở sinh hoạt hàng ngày của bạn.</span></div><div style="text-align: justify;"><span style="font-family: Arial; font-size: small;"><br></span></div><div style="text-align: justify;"><font face="Arial" size="2"><table style="margin:auto;" align="center" border="0" cellpadding="3" cellspacing="3" width="1"><tbody><tr><td><img src="http://image.vtc.vn/files/f1/2016/05/28/7-loai-thao-duoc-thong-thuong-tot-cho-nao-bo-0.jpg" alt="Não bộ là hệ thống xử lý trung tâm của con người, nếu não bộ không hoạt động thì con người cũng gần như đã chết" title="Não bộ là hệ thống xử lý trung tâm của con người, nếu não bộ không hoạt động thì con người cũng gần như đã chết" height="300" hspace="3" border="1" vspace="3" width="480"></td></tr><tr><td style="font-family:Arial; font-size:10pt;color:#002060;" align="center"><i>Não bộ là hệ thống xử lý trung tâm của con người, nếu não bộ không hoạt động thì con người cũng gần như đã chết</i>&nbsp;</td></tr></tbody></table><br></font></div><div style="text-align: justify;"><font face="Arial" size="2">Sức khỏe não bộ con người có xu hướng xấu đi theo tuổi tác, đặc biệt là do chăm sóc không đúng cách. Vì vậy, một lối sống lành mạnh, năng động là rất cần thiết để não bộ khỏe mạnh. Ngoài ra, chế độ ăn uống là một yếu tố quan trọng ảnh hưởng đến sức khỏe não bộ.&nbsp;</font></div><div style="text-align: justify;"><font face="Arial" size="2"><br></font></div><div style="text-align: justify;"><font face="Arial" size="2">Sự kết hợp về mặt thể chất, chế độ ăn uống lành mạnh cho não, và sự tương tác <a href="http://vtc.vn/xa-hoi.2.0.html">xã hội</a> rất có lợi cho việc tăng cường sức khỏe não bộ. Sau đây là một số loại<i> thảo dược</i> thông thường rất có lợi cho sức khỏe não bộ mà ai cũng nên biết.</font></div><div style="text-align: justify;"><font face="Arial" size="2"><b><br></b></font></div><div style="text-align: justify;"><font face="Arial" size="2"><b>Tỏi</b></font></div><div style="text-align: justify;"><font face="Arial" size="2"><br></font></div><div style="text-align: justify;"><font face="Arial" size="2">Tỏi là một loại thảo dược rất dễ dàng tìm thấy trong nhà bếp của chúng ta. Các nghiên cứu đã chỉ ra rằng tỏi có thể loại bỏ các chất béo tích tụ trong động mạch, giúp máu lưu thông lên não tốt hơn. Hơn nữa, tỏi cũng có thể ngăn chặn sự hình thành các cục máu đông trong não.</font></div><div style="text-align: justify;"><font face="Arial" size="2"><br></font></div><div style="text-align: justify;"><font face="Arial" size="2"><b><table style="margin:auto;" align="center" border="0" cellpadding="3" cellspacing="3" width="1"><tbody><tr><td><img src="http://image.vtc.vn/files/f1/2016/05/28/7-loai-thao-duoc-thong-thuong-tot-cho-nao-bo-1.jpg" alt="Tỏi có thể loại bỏ các chất béo tích tụ trong động mạch, giúp máu lưu thông lên não tốt hơn" title="Tỏi có thể loại bỏ các chất béo tích tụ trong động mạch, giúp máu lưu thông lên não tốt hơn" height="320" hspace="3" border="1" vspace="3" width="480"></td></tr><tr><td style="font-family:Arial; font-size:10pt;color:#002060;" align="center"><i>Tỏi có thể loại bỏ các chất béo tích tụ trong động mạch, giúp máu lưu thông lên não tốt hơn</i>&nbsp;</td></tr></tbody></table><br></b></font></div>                                                        <div class="signature"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <h5 class="title-news-khac">Tin tức khác</h5>
            <div class="cover-list-related">
                <div class="item-news-tab">
                    <img src="{{ url('assets/frontend/images/img-item-small.png')}}"/>
                    <div class="cover-co-item">
                        <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                    </div>
                </div>
                <div class="item-news-tab">
                    <img src="{{ url('assets/frontend/images/img-item-small.png')}}"/>
                    <div class="cover-co-item">
                        <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                    </div>
                </div>
                <div class="item-news-tab">
                    <img src="{{ url('assets/frontend/images/img-item-small.png')}}"/>
                    <div class="cover-co-item">
                        <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                    </div>
                </div>
                <div class="item-news-tab">
                    <img src="{{ url('assets/frontend/images/img-item-small.png')}}"/>
                    <div class="cover-co-item">
                        <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                    </div>
                </div>
                <div class="item-news-tab">
                    <img src="{{ url('assets/frontend/images/img-item-small.png')}}"/>
                    <div class="cover-co-item">
                        <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                    </div>
                </div>
                <div class="item-news-tab">
                    <img src="{{ url('assets/frontend/images/img-item-small.png')}}"/>
                    <div class="cover-co-item">
                        <a href="#">TÁC DỤNG ÍT BIẾT CỦA CÂY TRỨNG CÁ KHÔNG PHẢI AI CŨNG BIẾT</a>
                        <span class="date-sp">08:00 - ngày 30/04/2017</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">HOẠT ĐỘNG XÃ HỘI</h4>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
            </div>
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">FANPAGE</h4>
                <div class="item-qa">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook/">Facebook</a></blockquote></div>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item.png')}}"/></a>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item2.png')}}"/></a>
                </div>
            </div>
        </div>
    </div>
@stop
