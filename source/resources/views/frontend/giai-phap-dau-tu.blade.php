@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-after title-after-only">GIẢI PHÁP ĐẦU TƯ</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="giai-phap cong-bo-thong-tin">
        <ul class="ul-cover-tab">
            <li class="active"><a data-toggle="tab" href="#dt01"><img src="{{ url('assets/frontend/images/icon-dt02.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt02"><img src="{{ url('assets/frontend/images/icon-dt01.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt03"><img src="{{ url('assets/frontend/images/icon-dt03.png')}}"/></a></li>
            <li><a data-toggle="tab" href="#dt04"><img src="{{ url('assets/frontend/images/icon-dt04.png')}}"/></a></li>
            <li class="final-li"><a data-toggle="tab" href="#dt05"><img src="{{ url('assets/frontend/images/icon-dt05.png')}}"/></a></li>
        </ul>

        <div class="cover-tab tab-content">
            <div id="dt01" class="tab-pane fade tab-tmdt in active">
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hệ thống hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap cover-img-ipo">
                        <img src="{{ url('assets/frontend/images/ipo-01.png')}}"/>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">biểu đồ thị trường</h4>
                    </div>
                    <div class="cover-content-giai-phap" style="overflow-y: hidden;">
                        <div class="cover-chart-market">
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js">
                                {
                                    "showChart": true,
                                    "locale": "en",
                                    "width": "100%",
                                    "height": "500",
                                    "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                                    "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                                    "gridLineColor": "rgba(233, 233, 234, 1)",
                                    "scaleFontColor": "rgba(218, 221, 224, 1)",
                                    "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                                    "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                                    "symbolActiveColor": "rgba(242, 250, 254, 1)",
                                    "tabs": [
                                    {
                                        "title": "Forex",
                                        "symbols": [
                                            {
                                                "s": "FX:EURUSD"
                                            },
                                            {
                                                "s": "FX:GBPUSD"
                                            },
                                            {
                                                "s": "FX:USDJPY"
                                            },
                                            {
                                                "s": "FX:USDCHF"
                                            },
                                            {
                                                "s": "FX:AUDUSD"
                                            },
                                            {
                                                "s": "FX:USDCAD"
                                            }
                                        ]
                                    },
                                    {
                                        "title": "Equities",
                                        "symbols": [
                                            {
                                                "s": "INDEX:SPX",
                                                "d": "The Standard&Poor's Index"
                                            },
                                            {
                                                "s": "INDEX:IUXX",
                                                "d": "NQ100"
                                            },
                                            {
                                                "s": "INDEX:DOWI",
                                                "d": "Dow30"
                                            },
                                            {
                                                "s": "INDEX:NKY",
                                                "d": "Nikkei 225 Index"
                                            },
                                            {
                                                "s": "NASDAQ:AAPL",
                                                "d": "APPLE INC"
                                            },
                                            {
                                                "s": "NASDAQ:GOOG",
                                                "d": "Google"
                                            }
                                        ]
                                    },
                                    {
                                        "title": "Commodities",
                                        "symbols": [
                                            {
                                                "s": "CME_MINI:ES1!",
                                                "d": "Emini"
                                            },
                                            {
                                                "s": "CME:E61!",
                                                "d": "Euro"
                                            },
                                            {
                                                "s": "COMEX:GC1!",
                                                "d": "Gold"
                                            },
                                            {
                                                "s": "NYMEX:CL1!",
                                                "d": "Light Crude Oil Futures"
                                            },
                                            {
                                                "s": "NYMEX:NG1!",
                                                "d": "Natural Gas Futures"
                                            },
                                            {
                                                "s": "CBOT:ZC1!",
                                                "d": "Corn Futures"
                                            }
                                        ]
                                    },
                                    {
                                        "title": "Bonds",
                                        "symbols": [
                                            {
                                                "s": "CME:GE1!",
                                                "d": "Eurodollar"
                                            },
                                            {
                                                "s": "CBOT:ZB1!",
                                                "d": "T-Bond"
                                            },
                                            {
                                                "s": "CBOT:UD1!",
                                                "d": "Ultra T-Bond"
                                            },
                                            {
                                                "s": "EUREX:GG1!",
                                                "d": "Euro Bund"
                                            },
                                            {
                                                "s": "EUREX:II1!",
                                                "d": "Euro BTP"
                                            },
                                            {
                                                "s": "EUREX:HR1!",
                                                "d": "Euro BOBL"
                                            }
                                        ]
                                    }
                                ]
                                }
                            </script>
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
                <div class="giai-phap-right">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hình ảnh hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img class="img-certificate" src="{{ url('assets/frontend/images/certificate1.png')}}"/>
                        <img class="img-certificate" src="{{ url('assets/frontend/images/certificate.png')}}"/>
                    </div>
                </div>
            </div>
            <div id="dt02" class="tab-pane fade">
                <p class="p-head-giai-phap"><b>GOLDLAND</b> là Công ty đầu tư bất động sản với vốn đầu tư lên hàng tỷ đồng. <b style="color: #d57d00;">Năm 2016 là năm Công ty mang lại lợi nhuận cao nhất 20.000.000.000</b>. Năm 2017 với nhiếu dự án sắp triển khai và bán ra thị trường hứa hẹn sẽ mang lại nguồn <b style="color: #d57d00;">doanh thu cao hơn năm 2016</b>. <b>GOLDLAND</b> luôn chào đón các đối tác muốn đầu tư vào các dự án của Chúng Tôi. Chúng tôi đảm bảo <b style="color: #d57d00;">lợi nhuận 100%.</b></p>
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">vì sao đầu tư?</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <p style="text-align: justify;line-height: 25px;">- Tại Việt Nam, thành phần khách hàng có tiềm lực và nhu cầu về nhà ở vẫn chọn BĐS là nơi để rót vốn. Báo cáo tổng quan về thị trường địa ốc của doanh nghiệp TNHH Jones Lang LaSalle Vietnam (JLL) cho biết , lượng nhà ở mở bán mới ở quý Một /2016 tại Hà Nội và TP.HCM đạt mức cao kỷ lục, sở hữu 18 .000 căn (bao gồm bất động sản , nhà thấp tầng và đất nền).</p>
                        <p style="text-align: justify;line-height: 25px;">- Chuyên gia Đinh Thế Hiển dự đoán, thị trường căn hộ Bất Động Sản từ đầu 6 tháng nay đến giờ đã thành công khi lôi kéo rất nhiều nguồn vốn trong và ngoài nước vào đây. Một phần lượng tiền đưa lên tích cóp từ hệ thống ngân hàng cũng đã được chuyển sang kênh này. Đặc biệt ở quý Một vừa mới đây , khi một vài kênh đầu tư khác không sinh lợi nhuận thì BĐS vẫn mang lại mức lợi nhuận ròng rất ổn định. Theo ông Hiển, đối với nhiều Nhà đầu tư, tín ngưỡng căn hộ vẫn là tài sản có giá trị nên mặc dù khó khăn nhưng họ vẫn lựa chọn</p>
                        <p style="text-align: justify;line-height: 25px;">- Đến với Hoàng Sang Group đội ngũ ban lãnh đạo nhiều kinh nghiệm về việc nhận định thị trường bất động sản
                        sẽ giúp vốn đầu tư được đảm bảo an toàn, dự án có tính khả thi cao, mức rủi ro 0%. Hệ thống quản lý chuyên nghiệp, đa dạng ngành nghề giúp cho lợi nhuận đều và ổn định trong dài hạn,
                        bên cạnh đó sẽ giúp gia tăng giá trị vốn gốc cho khách hàng.</p>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">thông tin chung</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            <li><p class="text-no-icon">Tên Công ty: Công ty TNHH Bất Động Sản Goldlands</p></li>
                            <li><p class="text-no-icon">Giấy phép: 0313857515</p></li>
                            <li><p class="text-no-icon">Vốn đầu tư: 50 tỷ</p></li>
                            <li><p class="text-no-icon">Website: www.goldlands.vn</p></li>
                            <li><p class="text-no-icon">Địa Chỉ:</p>
                                <ul class="add-bds">
                                    <li><i class="fa fa-location-arrow" aria-hidden="true"></i> Chi nhánh Thủ Đức:
                                        <ul>
                                            <li><i class="fa fa-home" aria-hidden="true"></i> 1148, Phạm Văn Đồng, Linh Đông, Thủ Đức</li>
                                            <li><i class="fa fa-phone-square" aria-hidden="true"></i> 0967977779</li>
                                        </ul>
                                    </li>
                                    <li><i class="fa fa-location-arrow" aria-hidden="true"></i> Chi nhánh Phú Quốc:
                                        <ul>
                                            <li><i class="fa fa-home" aria-hidden="true"></i> 119, Lý Thường Kiệt, Thị Trấn Dương Đông, Phú Quốc, Kiên Giang</li>
                                            <li><i class="fa fa-phone-square" aria-hidden="true"></i> 0982414353</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    {{--<div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">mục tiêu nam 2017</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            <li><p class="text-icon-pre">Mở 10 dự án đầu tư tung ra thị trường. Đạt doanh thu khoảng 10.000.000.000VND</p></li>
                        </ul>
                    </div>--}}
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">Lĩnh vực hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <div class="cover-lvhd">
                            <img src="{{ url('assets/frontend/images/lv1.png')}}"/>
                            <p>Phân lô bán nền</p>
                        </div>
                        <div class="cover-lvhd">
                            <img src="{{ url('assets/frontend/images/lv2.png')}}"/>
                            <p>Đầu tư xây dựng nhà ở</p>
                        </div>
                        <div class="cover-lvhd">
                            <img src="{{ url('assets/frontend/images/lv3.png')}}"/>
                            <p>Xây dựng chung cư <br> Phân phối độc quyền</p>
                        </div>
                        <div class="cover-lvhd">
                            <img src="{{ url('assets/frontend/images/lv4.png')}}"/>
                            <p>Xây dựng khu biệt <br> thự nghỉ dưỡng</p>
                        </div>
                    </div>
                </div>
                <div class="giai-phap-right">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hình ảnh hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img class="img-bds" src="{{ url('assets/frontend/images/bds01.png')}}"/>
                        <img class="img-bds" src="{{ url('assets/frontend/images/bds03.png')}}"/>
                    </div>
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">báo cáo dự án năm 2016</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            {{--<li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án khu chung cư bến đò 36 (06/2016)</a>
                                --}}{{--<a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>--}}{{--
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án đường số 8, Hiệp Bình Phước</a>
                                --}}{{--<a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>--}}{{--
                            </li>--}}
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án đường số 52, Hiệp Bình Phước</a>
                                {{--<a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>--}}
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án đường 11, Trường Thọ, Thủ Đức</a>
                                {{--<a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>--}}
                            </li>
                            <li>
                                <a href="#" class="a-muctieu a-muctieu-left">Dự án mặt tiền đường 22, Linh Đông, Thủ Đức</a>
                                {{--<a href="#" class="a-muctieu a-muctieu-right">Tải tài liệu</a>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="dt03" class="tab-pane fade tab-tmdt">
                <img src="{{ url('assets/frontend/images/img-tmdt.png')}}"style="width: 99%;margin-bottom: 30px;"/>
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hệ thống hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <p class="cover-img-vno">
                            <img src="{{ url('assets/frontend/images/img-abc.png')}}"/>
                            <span>
                                VietnamOTO.net là website rao vặt mua bán oto mới, cũ với nhiều dịch vụ hữu ích nhất dành cho khách hàng ở VN, được đầu tư mạnh mẽ từ nguồn lực từ Hoàng Sang Group, cùng với đó là chiến lược "dài hơi" hiệu quả đánh vào tâm lý thích "miễn phí" của người Việt. VietnamOTO sẽ ngày càng lớn mạnh và khẳng định vị trí trên thị trường.<br>
                                VietnamOTO với một giao diện website cực kì hiện đại, chuyên nghiệp các thao tác trên trang được thiết kế tối ưu hóa với người dùng, giúp cho dù là người lần đầu vào website này cũng dễ dàng thao tác trên trang.<br>
                                Khi đăng tin trên VietnamOTO bạn không cần phải qua nhiều thao tác phức tạp, các thao tác quản lý rất hiệu quả và dễ sử dụng. Chất lượng tin đăng là gần như không phải bàn cải, do lượng user rất đông, cùng với đội ngũ duyệt tin được đào tạo bài bản và đôi ngũ seoer sẽ giúp tin đăng của bạn được đưa tới người mua bằng nhiều hình thức tiếp cận khác nhau.
                            </span>
                        </p>
                    </div>
                    {{--<div class="cover-title-giai-phap">--}}
                        {{--<h4 class="title-giai-phap">hướng dẫn đầu tư</h4>--}}
                    {{--</div>--}}
                    {{--<div class="cover-content-giai-phap">--}}
                        {{--<img src="{{ url('assets/frontend/images/img-giai-phap-dau-tu.png')}}"/>--}}
                    {{--</div>--}}
                </div>
                <div class="giai-phap-right">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">ngành nghề hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s1.png')}}"/>
                            <p>thương mại điện tử</p>
                        </div>
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s2.png')}}"/>
                            <p>thiết kế website</p>
                        </div>
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s3.png')}}"/>
                            <p>lập trình phần mềm</p>
                        </div>
                        <div class="item-branch">
                            <img src="{{ url('assets/frontend/images/img-s4.png')}}"/>
                            <p>gia công robot</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dt04" class="tab-pane fade tab-cnsx">
                <img src="{{ url('assets/frontend/images/img-cnsx.png')}}"style="width: 99%;margin-bottom: 30px;"/>
                <div class="giai-phap-left">
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">ngành nghề hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <p>- “Cửa nhôm” không còn là cụm từ xa lạ trong các thiết kế hiện đại thời thượng, phần lớn các công trình xây dựng hiện nay cũng đều có sự góp mặt của vật liệu nhôm kính. Nhờ  đặc tính bền vững cao đựợc gia công tinh tế cửa nhôm đang dần trở thành lựa chọn tin dùng hàng đầu trong các công trình xây dựng văn phòng, cao ốc, nhà ở hiện nay.</p>
                        <p>- Sự góp phần của thương hiệu cửa nhôm Toàn Cầu phần nào lý giải tại sao sản phẩm này được ưa chuộng trên thị trường hiện nay như vậy. Những ưu điểm dưới đây cũng khẳng định đẳng cấp vượt trội mà viec làm cửa nhôm đem lại trong xây dựng ngày nay:</p>
                        <p>+ Cửa nhôm được sản xuất trên dây chuyền hiện đại bằng hợp kim nhôm cao cấp được gia công tỉ mỉ, tinh tế tạo ra các sản phẩm tuyệt vời có độ bền cao, hạn chế tối đa độ cong vênh hay va đập.</p>
                        <p>+ Cửa nhôm được sản xuất trên dây chuyền hiện đại bằng hợp kim nhôm cao cấp được gia công tỉ mỉ, tinh tế tạo ra các sản phẩm tuyệt vời có độ bền cao, hạn chế tối đa độ cong vênh hay va đập.</p>
                        <p>+ Thiết kế mẫu mã đa dạng, màu sắc phong phú đáp ứng được yêu cầu của mọi công trình.
                            Lắp đặt cửa nhôm có khả năng cách âm, cách nhiệt tốt giúp nâng cao hiệu quả chất lượng cuộc sống đặc biệt là trong thành phố lớn tấp nập ồn ào có thể làm ảnh hưởng đến hiệu quả công việc cũng như chất lượng cuộc sống, chính vì vậy việc sử dụng cửa nhôm cao cấp là lựa chọn hoàn hảo của các gia chủ hiện nay.</p>
                        <p>+ Cửa nhôm kính độ bền lớn có khả năng chống ôxi hóa, không bị mối mọt, không bị gỉ sét hay hao mòn theo thời gian, chống chọi tốt với điều kiện môi truờng thời tiết khí hậu bên ngoài. Điều này giúp người dùng tiết kiệm tối đa được chi phí sửa chữa bảo dưỡng.</p>
                        <p>+ Thiết kế an toàn với bề mặt đựợc sơn tĩnh điện cao cấp theo công nghệ mới có khả năng chống trầy xước, tia cực tím. Có tính thẩm mỹ cao với nhiều màu sắc và phong cách khác nhau giúp tạo điểm nhấn về trang trí.</p>
                        <p>+ Cửa nhôm dễ dàng thuận tiện trong việc vận chuyển, lắp đặt nhờ vào đặc tính kết cấu siêu nhẹ, làm giảm tải trọng của công trình đặc biệt là những công trình lớn.</p>
                        <p>+ Dễ dàng vệ sinh lau chùi, không mất nhiều thời gian công sức, bền đẹp với thời gian.
                            Trong quá trình thi công cửa nhôm kính có khả năng kết hợp với nhiều loại kính hoa văn, màu sắc khác nhau cùng bộ phụ kiện tạo điểm nhấn, sự sang trọng, tăng tính thẩm mỹ cho thiết kế.</p>
                        <p>+ Với đặc tính không thấm nước cửa nhôm rất thích hợp và đang dần thay thế cho cửa gỗ trong các thiết kế nhà tắm, đảm bảo tính ứng dụng cao mà vẫn tạo đựơc sự hài hòa sang trọng trong kiến trúc.</p>
                        <p>+ Cửa nhôm cao cấp được sử dụng hầu hết trong các văn phòng công ty, tòa nhà cao tầng, nhà hàng, khách sạn vì có thể dễ dàng tận dụng tối đa nguồn ánh sáng mặt trời giúp tiết kiệm điện năng. Đây được coi là giải pháp kinh tế hoàn hảo.</p>
                        <p>+ Chi phí giá thành làm cửa nhôm kính cũng không quá đắt đỏ, chỉ ngang bằng thậm chí là tiết kiệm hơn những loại cửa khác nhưng điều quan trọng đó là tính ứng dụng lâu dài mà vẫn đảm bảo thẩm mỹ, đáp ứng đựợc nhu cầu và lựa chọn của người dùng trong điều kiện kinh tế thị trường còn nhiều khó khăn.</p>
                        <p>+ Trên đây chỉ là những ưu điểm ứng dụng nổi bật của cửa nhôm trong xây dựng, chỉ với ngần ấy tác dụng cũng đã đủ lý giải cho sự lên ngôi của cửa nhôm kính cao cấp trong cuộc sống hiện đại và đặc biệt làm cửa nhôm kính tại hà nội ngày càng phổ biến. Sự ứng dụng phổ biến rộng khắp dần thay thế cho các loại cửa truyền thống đã phần nào chứng minh được niềm tin của người tiêu dùng đối với các tiết kế cửa nhôm – một trong những bộ phận quan trọng quyết định thẩm mỹ của ngôi nhà, công trình, từ lắp đặt đến thi công cửa nhôm kính một cách hoàn hảo.</p>
                    </div>
                    {{--<div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">thông tin chung</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <ul class="ul-muctieu">
                            <li><p class="text-no-icon">Tên Công ty:</p></li>
                            <li><p class="text-no-icon">Năm thành lập:</p></li>
                            <li><p class="text-no-icon">Giấy phép:</p></li>
                            <li><p class="text-no-icon">Vốn đầu tư:</p></li>
                            <li><p class="text-no-icon">Đối tác:</p></li>
                            <li><p class="text-no-icon">Liên lạc:</p></li>
                            <li><p class="text-no-icon">Địa Chỉ:</p></li>
                        </ul>
                    </div>--}}
                    {{--<div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hướng dẫn đầu tư</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img src="{{ url('assets/frontend/images/img-giai-phap-dau-tu.png')}}"/>
                    </div>--}}
                </div>
                <div class="giai-phap-right">
                    {{--<div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">biểu đồ hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img src="{{ url('assets/frontend/images/chart01-cnsx.png')}}"/>
                        --}}{{--<img src="{{ url('assets/frontend/images/chart02-cnsx.png')}}"/>--}}{{--
                    </div>--}}
                    <div class="cover-title-giai-phap">
                        <h4 class="title-giai-phap">hình ảnh hoạt động</h4>
                    </div>
                    <div class="cover-content-giai-phap">
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx02.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx03.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx06.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx01.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx07.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx08.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx09.jpg')}}"/>
                        <img class="img-item-cnsx" src="{{ url('assets/frontend/images/anhsx04.jpg')}}"/>
                    </div>
                </div>
            </div>
            <div id="dt05" class="tab-pane fade">
                <p class="p-head-giai-phap"><b>GOLDLAND</b> là Công ty đầu tư bất động sản với vốn đầu tư lên hàng tỷ đồng. <b style="color: #d57d00;">Năm 2016 là năm Công ty mang lại lợi nhuận cao nhất 50.000.000.000</b>. Với mong muốn tạo bước nhảy cho các Doanh nghiệp nhỏ, cá nhân tài năng có những ý tưởng sáng tạo. HSG có quỹ khởi nghiệp hỗ trợ lên đến 1 tỷ để cụ thể hóa những ý tưởng thành hiện thực. Với điều này HSG hy vọng sẽ thúc đẩy sự phát triển của thị trường Việt Nam sánh ngang tầm quốc tế.</p>
                <div class="content-img">
                    <img src="{{ url('assets/frontend/images/img_kn.png')}}"/>
                </div>
            </div>
        </div>
    </div>
@stop
