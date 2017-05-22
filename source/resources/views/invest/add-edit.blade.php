@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')
    <style>
        .slider, .slider.slider-horizontal {
            width: 100%;
            float: left;
            margin-bottom: 15px;
            margin-top: 2px;
        }

        #custom-handle {
            width: 3em;
            height: 1.6em;
            top: 50%;
            margin-top: -.8em;
            text-align: center;
            line-height: 1.6em;
        }

        .h4-title {
            text-transform: uppercase;
        }

        #tien-trinh-dau-tu {
            overflow: auto;
        }

        #tien-trinh-dau-tu table td, th {
            text-align: right;
            border: 1px solid #d1d1d1;
            padding-right: 3px;
        }
    </style>
    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <script>


    </script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ĐẦU TƯ VÀO HSG
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">ĐẦU TƯ</span>
            </h1>
        </div>
    </div>

    @include('partials.messages')
    <form action="" method="post" id="createInvest" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <?php
        if (isset($investID) && !empty($investID)) {
            echo '<input type="hidden" name="id" value="' . $investID . '" />';
        }
        ?>
        <div class="cover-invest">
            <div class="cover-line">
                <div class="ele-div">
                    <span class="sp-up">Ngày bắt đầu</span>
                    <input type="text" id="estStartDate" name="estStartDate" readonly class="datepicker inp-text"
                           value="<?php if (isset($dataInvest)) echo $dataInvest['estStartDate']; else echo date("Y-m-d");?>"/>
                </div>
                <div class="ele-div">
                    <span class="sp-up">Loại tiền</span>
                    <select class="select-inp" name="currency">
                        <option value="VND">VNĐ</option>
                    </select>
                </div>
                <div class="ele-div">
                    <span class="sp-up">Nhập số tiền muốn đầu tư</span>
                    <input name="money" maxlength="15" class="inp-text onlynumber autonumber"
                           value="<?php if (isset($dataInvest)) echo number_format($dataInvest['money'], 0, ".", ",");?>"/>
                </div>
                <div class="ele-div">
                    <span class="sp-up">Chọn kỳ hạn đầu tư</span>
                    <select class="inp-text" name="investTypeID" id="investTypeID">
                        <option value=""></option>
                        <?php
                        if (!empty($listIVT)) {

                            foreach ($listIVT as $ivt) {
                                $selected = "";
                                if (isset($dataInvest) && $ivt->id == $dataInvest['investTypeID']) {
                                    $selected = ' selected ="selected" ';
                                }

                                echo '<option ' . $selected . ' value="' . $ivt->id . '">' . $ivt->typeName . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="cover-line">
                <div class="ele-div-2">
                    <span class="sp-line">Lợi nhuận</span>
                    <input name="interest" readonly class="inp-text"
                           value="<?php if (isset($dataInvest)) echo $dataInvest['interest'] . "%"; ?>"/>
                </div>
                <div class="ele-div-2">
                    <span class="sp-line">Lợi nhuận biên động</span>
                    <input name="further" readonly class="inp-text"
                           value="<?php if (isset($dataInvest)) echo $dataInvest['further'] . "%"; ?>"/>
                </div>
                <div class="ele-div-2">
                    <span class="sp-line">Áp dụng lợi nhuận kép:</span>
                    <label class="rad-lk radio-inline"><input disabled type="radio" value="1"
                                                              name="isCompInterest" <?php if (isset($dataInvest) && $dataInvest['isCompInterest'] == 1) echo "checked"; ?>>Có</label>
                    <label class="rad-lk radio-inline"><input disabled
                                                              <?php if (!isset($dataInvest) || (isset($dataInvest) && $dataInvest['isCompInterest'] == 0)) echo "checked"; ?> type="radio"
                                                              value="0" name="isCompInterest">Không</label>
                </div>
            </div>
            <div class="cover-line" id="sliderNote">
                <p class="p-line">TÁI ĐẦU TƯ (đây là phần trăm trích từ lãi hàng tháng hoặc hàng kỳ của bạn tự chọn nhập
                    vào vốn ban đầu)</p>
            </div>
            <div class="slider">
                <div id="slider">
                    <div id="custom-handle" class="ui-slider-handle"></div>

                </div>
                <input type="hidden" name="compInterestPercent"
                       value="<?php if (isset($dataInvest)) echo $dataInvest['compInterestPercent']; ?>"
                       id="compInterestPercent"/>
            </div>
            <div class="cover-line">
                <span class="sp-line">HÌNH THỨC NHẬN LỢI NHUẬN:</span>
                <label class="radio-inline"><input type="radio" value="Cuối kỳ"
                                                   <?php if (!isset($dataInvest) || (isset($dataInvest) && $dataInvest['interestMethod'] == 'Cuối kỳ')) echo "checked"; ?> name="interestMethod">Cuối
                    kỳ</label>
                <label class="radio-inline"><input type="radio" value="Hàng tháng"
                                                   <?php if (isset($dataInvest) && $dataInvest['interestMethod'] == 'Hàng tháng') echo "checked"; ?>  name="interestMethod">Hàng
                    tháng</label>
            </div>
            <h4 class="h4-title">Tiến trình đầu tư</h4>
            <script type="application/javascript">
                function formatNumber(vl, dec, group) {

                    return (Math.round(vl, dec) + "").replace(/\B(?=(\d{3})+(?!\d))/g, group);
                }
                function createTienTrinh(data) {

                    if (data != null && data.length > 0) {
                        var contentHTML = '<table cellpadding="5" cellspacing="5" style="width: 100%" ><thead><th></th>';
                        var bodyHTML = [];
                        bodyHTML[0] = "<tr><td><b>Tổng đầu tư</b></td>";
                        bodyHTML[1] = "<tr><td><b>Lợi nhuận</b></td>";
                        bodyHTML[2] = "<tr><td><b>Lợi nhuận tái đầu tư</b></td>";
                        bodyHTML[3] = "<tr><td><b>Lợi nhuận được trả</b></td>";

                        for (var i = 0; i < data.length; i++) {
                            contentHTML += '<th>Tháng thứ ' + (i + 1) + '</th>';
                            bodyHTML[0] += '<td>' + formatNumber(data[i][0], 0, ",") + '</td>';
                            bodyHTML[1] += '<td>' + formatNumber(data[i][1], 0, ",") + '</td>';
                            bodyHTML[2] += '<td>' + formatNumber(data[i][2], 0, ",") + '</td>';
                            bodyHTML[3] += '<td>' + formatNumber(data[i][1] - data[i][2], 0, ",") + '</td>';
                        }

                        contentHTML += '</thead>';
                        contentHTML += '<tbody>';
                        for (var j = 0; j < bodyHTML.length; j++) {
                            contentHTML += bodyHTML[j];
                        }
                        contentHTML += '</tbody></table>';
                        $("#tien-trinh-dau-tu").html(contentHTML);


                    }


                }

            </script>
            <div class="cover-line no-mar-bottom" id="tien-trinh-dau-tu">
                <span>Vui lòng điền đầy đủ số tiền đầu tư và gói đầu tư....</span>
            </div>
            <h4 class="h4-title">BẢNG TỒNG KẾT</h4>
            <div class="cover-line no-mar-bottom">
                <label class="lb-line" id="tk_estStartDate">Ngày đầu tư:</label>
                <label class="lb-line" id="tk_nextPayment">Ngày nhận lợi nhuận: </label>
                <label class="lb-line" id="tk_estEndDate">Ngày đáo hạn: </label>
                <label class="lb-line" id="tk_isCompInterest">Tái đầu tư: Không</label>
            </div>
            <div class="cover-line">
                <label class="lb-2">Số tiền đầu tư:<b id="tk_money"></b></label>
                <label class="lb-2" id="tk_interest"></label>
                <label class="lb-2">Tổng tiền thực lãnh (Tiền gốc + Lợi nhuận + Lợi nhuận biến động): <b
                            id="tk_finalMoney"></b></label>
            </div>
            {{--<div class="cover-line">--}}
            {{--<input type="submit" class="inp-sub" value="Xem hợp đồng"/>--}}
            {{--</div>--}}
            <h4 class="h4-title">HÌNH THỨC THANH TOÁN VỐN ĐẦU TƯ</h4>
            <div class="cover-line">
                <div class="cover-line-common cover-line-left">
                    <h5 class="h5-title"><input
                            <?php if (!isset($dataInvest) || (isset($dataInvest) && $dataInvest['paymentType'] == 'DIRECT')) echo "checked"; ?> type="radio"
                            name="paymentType" value="DIRECT">CHUYỂN TIỀN TRỰC TIẾP TẠI VĂN PHÒNG</h5>
                    <span class="sp-add">Địa chỉ: 02, Phạm Văn Đồng, P. Linh Đông, Q. Thủ Đức, Tp.HCM</span>
                    <span class="sp-add">Hotline: 0970 7777 929 - Email: cskh@hoangsanggroup.vn</span>
                    <div class="cover-p">
                        <p>* Khi chọn hình thức này Quý khách sẽ làm Hợp đồng trực tiếp tại Công ty.</p>
                        <p>* Quý khách sẽ nhận được bảng thống kê đảm bảo lợi nhuận.</p>
                        <p>(Mọi thông tin chi tiết sẽ được Chuyên viên của HSG hỗ trợ tư vấn cho Quý khách)</p>
                    </div>
                    {{--<input type="submit" class="inp-sub" value="Hoàn thành"/>--}}
                </div>
                <div class="cover-line-common cover-line-right">
                    <h5 class="h5-title"><input
                            <?php if ((isset($dataInvest) && $dataInvest['paymentType'] == 'ONLINE')) echo "checked"; ?> name="paymentType"
                            type="radio" value="ONLINE">CHUYỂN TIỀN TRỰC TUYẾN</h5>
                    <div class="cover-bank">
                        <img src="{{ url('assets/img/img-bank.png') }}"/>
                        <img src="{{ url('assets/img/img-bank.png') }}"/>
                        <img src="{{ url('assets/img/img-bank.png') }}"/>
                        <img src="{{ url('assets/img/img-bank.png') }}"/>
                        <img src="{{ url('assets/img/img-bank.png') }}"/>
                    </div>
                    <h5 class="h5-bank">Tài khoản ngân hàng ... của HSG</h5>
                    <div class="cover-bank-info">
                        <span>Chủ TK : Cty TNHH ĐT& CN Hoàng Sang Group</span>
                        <span>Chi nhánh NH: Kha Vạn Cân, Thủ Đức, Tp HCM</span>
                    </div>
                    <h5 class="h5-bank">Upload biên lai(Ủy nhiệm chi)</h5>
                    <input name="paymentReceipt" class="upload-file" type="file"/>
                    <div class="cover-p">
                        <p>* Khi chọn hình thức này Quý khách cần đợi 5 - 10 phút cho hệ thống xác nhận.</p>
                        <p>* Quý khách sẽ nhận Hợp Đồng niêm phong sau 5 ngày từ ngày Quý khách đầu tư.</p>
                        <p>* Nhân viên của HSG sẽ gọi điện trực tiếp đến Quý Khách để xác nhận.</p>
                    </div>
                </div>
            </div>
            <div class="cover-inp">
                <input type="submit" class="inp-sub-comp" value="Hoàn thành"/>
            </div>
        </div>
    </form>
    <script type="application/javascript">
        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
        $(".onlynumber").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
//        console.log(e.keyCode);
            if ($.inArray(e.keyCode, [8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
        $('input.autonumber').keyup(function (event) {

            // skip for arrow keys
            if (event.which >= 37 && event.which <= 40) return;

            // format number
            $(this).val(function (index, value) {
                var nvl = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                calInterest(nvl);
                return nvl;
            });
        });
        $("#investTypeID").change(function () {
            getInvestType();
        });
        var currentInvestType = null;
        function calInterest(money) {
//        console.log(currentInvestType);
            if (money == null) {
                money = $("input[name='money']").val();
            }

            if (currentInvestType !== null) {
                if (currentInvestType.allowCompInterest) {
                    $("input[name='isCompInterest']").removeAttr("disabled");
                } else {
                    $("input[name='isCompInterest']").attr("disabled", "disabled");
                }
                $("input[name='interest']").val(currentInvestType.interest + " %");
                if (money !== null && money != "" && money != "undefined") {
                    var currency = $("select[name='currency']").val();
                    $("#tk_money").html(money + " " + currency);
                    money = parseFloat(money.replace(/\D/g, ""));
                    var interest = parseFloat(money * currentInvestType.interest / (currentInvestType.period * 100));


                    var bd = $("input[name='further']").val();
                    bd = parseFloat(bd.replace(" %", ""));
                    var finalMoney = 0;

                    var isCompInterest = $('input[name=isCompInterest]:checked', '#createInvest').val();
                    var compInterestPercent = $('#slider').data('slider').getValue();
                    if (isCompInterest == 1) {
                        $("#tk_interest").html("Số tiền lãi tháng đầu tiên:<b>" + (Math.round(interest, 0) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " " + currency + "</b>");
                        var ciTongDauTu = money;

                        var ciTongLai = 0;
                        var tienTrinh = [];
                        for (var i = 0; i < currentInvestType.period; i++) {
                            var th = [];
                            var laiThang = parseFloat(ciTongDauTu * currentInvestType.interest / (currentInvestType.period * 100));
                            var ciTaiDauTu = parseFloat(laiThang * compInterestPercent / 100);
                            th.push(ciTongDauTu);
                            th.push(laiThang);
                            th.push(ciTaiDauTu);
                            tienTrinh.push(th);

                            ciTongDauTu += ciTaiDauTu;
                            ciTongLai += laiThang - ciTaiDauTu;
//                        console.log("Lai Thang: "+laiThang);console.log("tai Dau Tu: "+ciTaiDauTu);console.log("Tong Dau Tu: "+ciTongDauTu);

                        }
                        finalMoney = ciTongDauTu + ciTongLai + money * bd / 100;
                        createTienTrinh(tienTrinh);
                    } else {
                        $("#tk_interest").html("Số tiền lãi hàng tháng :<b>" + (Math.round(interest, 0) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " " + currency + "</b>");
                        finalMoney = parseFloat(money + interest * parseInt(currentInvestType.period) + money * bd / 100);
                        var tienTrinh = [];
                        for (var i = 0; i < currentInvestType.period; i++) {
                            var th = [];
                            th.push(money);
                            th.push(interest);
                            th.push(0);
                            tienTrinh.push(th);

                        }
                        createTienTrinh(tienTrinh);

                    }
                    $("#tk_finalMoney").html((Math.round(finalMoney, 0) + "").replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " " + currency);

                    var interestMethod = $('input[name=interestMethod]:checked', '#createInvest').val();
                    var estStartDate = $("#estStartDate").val();
                    var arrStartDate = estStartDate.split("-");
                    var StartDate = new Date(arrStartDate[0], arrStartDate[1], arrStartDate[2]);
                    var EndDate = StartDate;
                    EndDate.setMonth(EndDate.getMonth() + currentInvestType.period);
                    var estEndDate = EndDate.getFullYear() + "-" + ('0' + EndDate.getMonth()).slice(-2) + "-" + ('0' + EndDate.getDate()).slice(-2);
                    if (interestMethod == "Cuối kỳ") {

                        $("#tk_nextPayment").html("Ngày nhận lãi: " + estEndDate);

                    } else {
                        $("#tk_nextPayment").html("Ngày nhận lãi: " + arrStartDate[2] + " hàng tháng");
                    }
                    $("#tk_estEndDate").html("Ngày đáo hạn: " + estEndDate);
                    $("#tk_estStartDate").html("Ngày đầu tư: " + estStartDate);


                } else {

                    $("#tk_nextPayment").html("Ngày nhận lãi: ");
                    $("#tk_estStartDate").html("Ngày đầu tư: ");
                    $("#tk_estEndDate").html("Ngày đáo hạn: ");
                    $("#tk_money").html("");
                    $("#tk_interest").html("");
                    $("#tk_finalMoney").html("");
                    $("#tien-trinh-dau-tu").html('<span>Vui lòng điền đầy đủ số tiền đầu tư và gói đầu tư....</span>');
                }


            } else {
                $("#tk_money").html("");
                $("#tk_interest").html("");
                $("#tk_finalMoney").html("");
                $("#tien-trinh-dau-tu").html('<span>Vui lòng điền đầy đủ số tiền đầu tư và gói đầu tư....</span>');
            }
        }
        Date.prototype.addDays = function (days) {
            var dat = new Date(this.valueOf());
            dat.setDate(dat.getDate() + days);
            return dat;
        }


        function getInvestType() {
            var date = $("#estStartDate").val();
            $("#tk_estStartDate").html("Ngày đầu tư: " + date);

            var cvl = $("#investTypeID").val();

            $.ajax({
                url: '/getInvestType',
                dataType: "json",
                cache: false,
                type: 'post',
                data: {
                    cvl: cvl
                },
                beforeSend: function (xhr) {

//                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
                },
                success: function (data) {
                    if (data.result) {
                        currentInvestType = data.data;
                        calInterest();
                    }

                },
                error: function () {

                }
            });
        }
        $(document).ready(function () {

            var handle = $("#custom-handle");

            $("#slider").slider({
                min: 0,
                max: 100,
                value: <?php if (isset($edit) && $edit) echo $dataInvest['compInterestPercent']; else echo '100';?>,
                step: 10,
                animate: false,
                create: function () {
                    var pc = $(this).slider("value");
                    handle.text(pc + " %");
                },
                slide: function (event, ui) {
                    handle.text(ui.value);

                },
                change: function (e, ui) {
                    console.log(ui.value);
                },
                stop: function (event, ui) {
                    console.log(ui.value);
                }
            });
            $('#slider').slider().on('slideStop', function (ev) {
                var newVal = $('#slider').data('slider').getValue();
                $("#compInterestPercent").val(newVal);
                calInterest();
            });


            <?php if (!isset($dataInvest) || $dataInvest['isCompInterest'] == 0) {
            echo '$( "div .slider" ).css("display","none");$( "div #sliderNote" ).css("display","none");';
        }
            ?>


            <?php if (isset($edit) && $edit) {
            echo 'getInvestType();';

        } else {
            echo 'getBienDong();';
        }?>


        });
        $("#estStartDate").change(function () {

            getBienDong();
        });
        //isCompInterest

        $('input[type=radio][name=isCompInterest]').change(function () {
            var vl = $('input[name=isCompInterest]:checked', '#createInvest').val();
            if (vl == 1) {
                $("div .slider").css("display", "inline-block");
                $("div #sliderNote").css("display", "inline-block");
                $("#tk_isCompInterest").html("Tái đầu tư: Có");
            } else {
                $("div .slider").css("display", "none");
                $("div #sliderNote").css("display", "none");
                $("#tk_isCompInterest").html("Tái đầu tư: Không");
            }
            calInterest();
        });

        $('input[type=radio][name=interestMethod]').change(function () {
            getNgayTraLai();


        });
        function getNgayTraLai() {
            var interestMethod = $('input[name=interestMethod]:checked', '#createInvest').val()
            var estStartDate = $("#estStartDate").val();
            var arrStartDate = estStartDate.split("-");
            var StartDate = new Date(arrStartDate[0], arrStartDate[1], arrStartDate[2]);
            var EndDate = StartDate;
            EndDate.setMonth(EndDate.getMonth() + currentInvestType.period);
            var estEndDate = EndDate.getFullYear() + "-" + ('0' + EndDate.getMonth()).slice(-2) + "-" + ('0' + EndDate.getDate()).slice(-2);
            if (interestMethod == "Cuối kỳ") {

                $("#tk_nextPayment").html("Ngày nhận lãi: " + estEndDate);

            } else {
                $("#tk_nextPayment").html("Ngày nhận lãi: " + arrStartDate[2] + " hàng tháng");
            }
        }
        function getBienDong() {
            var date = $("#estStartDate").val();
//        $("#tk_estStartDate").html("Ngày đầu tư: "+date);
            $.ajax({
                url: '/getBienDong',
                dataType: "json",
                cache: false,
                type: 'post',
                data: {
                    date: date
                },
                beforeSend: function (xhr) {

//                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
                },
                success: function (data) {
                    if (data.result) {
                        var vl = data.data + " %";
                        $("input[name='further']").val(vl);
                        calInterest();
                    }
                },
                error: function () {

                }
            });
        }
        //    $( "#createInvest" ).submit(function( event ) {
        //        $("#compInterestPercent").val($("#slider").attr("value"));
        //        $( "#createInvest" ).submit();
        //    });

    </script>

@stop
@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('assets/css/bootstrap-slider.css') !!}
@stop
@section('scripts')
    {!! HTML::script('assets/js/bootstrap-slider.js') !!}
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {{--    {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\CreateInvestRequest', '#createInvest') !!}--}}
@stop