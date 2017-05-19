@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')
    <style>
        .slider, .slider.slider-horizontal{
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
    </style>
    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >
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
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="cover-invest">
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-up">Ngày bắt đầu</span>
            <input type="text" id="estStartDate" name="estStartDate" readonly class="datepicker inp-text" value="<?php echo date("Y-m-d");?>"/>
        </div>
        <div class="ele-div">
            <span class="sp-up">Loại tiền</span>
            <select class="select-inp" name="currency">
                <option value="VND">VNĐ</option>
            </select>
        </div>
        <div class="ele-div">
            <span class="sp-up">Nhập số tiền muốn đầu tư</span>
            <input name="money" maxlength="15" class="inp-text onlynumber autonumber"/>
        </div>
        <div class="ele-div">
            <span class="sp-up">Chọn kỳ hạn đầu tư</span>
            <select class="inp-text" name="investTypeID" id="investTypeID">
                <option value=""></option>
                <?php
                    if(!empty($listIVT)){

                        foreach ($listIVT as $ivt){
                            echo '<option value="'.$ivt->id.'">'.$ivt->typeName.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="cover-line">
        <div class="ele-div-2">
            <span class="sp-line">Lãi suất</span>
            <input name="interest" readonly class="inp-text"/>
        </div>
        <div class="ele-div-2">
            <span class="sp-line">Lãi suất biên động</span>
            <input name="further" readonly class="inp-text"/>
        </div>
        <div class="ele-div-2">
            <span class="sp-line">Áp dụng lãi kép:</span>
            <label class="rad-lk radio-inline"><input disabled type="radio" value="1" name="isCompInterest">Có</label>
            <label class="rad-lk radio-inline"><input disabled checked type="radio" value="0" name="isCompInterest">Không</label>
        </div>
    </div>
    <div class="cover-line" id = "sliderNote" >
        <p class="p-line">TÁI ĐẦU TƯ (đây là phần trăm trích từ lãi hàng tháng hoặc hàng kỳ của bạn tự chọn nhập vào vốn ban đầu)</p>
    </div>
    <div class="slider">
        <div id="slider">
            <div id="custom-handle" class="ui-slider-handle"></div>

        </div>
        <input type="hidden" name="compInterestPercent" value="0" id="compInterestPercent"/>
    </div>
    <div class="cover-line">
        <span class="sp-line">HÌNH THỨC NHẬN LÃI:</span>
        <label class="radio-inline"><input type="radio" value="Cuối kỳ" checked name="interestMethod">Cuối kỳ</label>
        <label class="radio-inline"><input type="radio" value="Hàng tháng" name="interestMethod">Hàng tháng</label>
    </div>
    <h4 class="h4-title">BẢNG TỒNG KẾT</h4>
    <div class="cover-line no-mar-bottom">
        <label class="lb-line" id="tk_estStartDate">Ngày đầu tư: <?php echo date("Y-m-d");?></label>
        <label class="lb-line" id="tk_nextPayment">Ngày nhận lãi: </label>
        <label class="lb-line" id="tk_estEndDate">Ngày đáo hạn: </label>
        <label class="lb-line" id="tk_isCompInterest">Tái đầu tư: Không</label>
    </div>
    <div class="cover-line">
        <label class="lb-2">Số tiền đầu tư:<b id="tk_money"></b></label>
        <label class="lb-2">Số tiền lãi hàng tháng :<b id="tk_interest"></b></label>
        <label class="lb-2">Tổng tiền khi đáo hạn (Tiền gốc + Lãi suất + Lãi biến động): <b id="tk_finalMoney"></b></label>
    </div>
    <div class="cover-line">
        <input type="submit" class="inp-sub" value="Xem hợp đồng"/>
    </div>
    <h4 class="h4-title">HÌNH THỨC THANH TOÁN VỐN ĐẦU TƯ</h4>
    <div class="cover-line">
        <div class="cover-line-common cover-line-left">
            <h5 class="h5-title"><input checked type="radio" name="paymentType" value="DIRECT">CHUYỂN TIỀN TRỰC TIẾP TẠI VĂN PHÒNG</h5>
            <span class="sp-add">Địa chỉ: 02, Phạm Văn Đồng, P. Linh Đông, Q. Thủ Đức, Tp.HCM</span>
            <span class="sp-add">Hotline: 0970 7777 929 - Email: cskh@hoangsanggroup.vn</span>
            <div class="cover-p">
                <p>* Khi chọn hình thức này Quý khách sẽ làm Hợp đồng trực tiếp tại Công ty.</p>
                <p>* Quý khách sẽ nhận được bảng thống kê đảm bảo lợi nhuận.</p>
                <p>(Mọi thông tin chi tiết sẽ được Chuyên viên của HSG hỗ trợ tư vấn cho Quý khách)</p>
            </div>
            <input type="submit" class="inp-sub" value="Hoàn thành"/>
        </div>
        <div class="cover-line-common cover-line-right">
            <h5 class="h5-title"><input name="paymentType" type="radio" value="ONLINE">CHUYỂN TIỀN TRỰC TUYẾN</h5>
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
            <input type="submit" class="inp-sub" value="Hoàn thành"/>
        </div>
    </div>
</div>
</form>
<script type="application/javascript">
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $(".onlynumber").keydown(function(e) {
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
    $('input.autonumber').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            var nvl = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            calInterest(nvl);
            return nvl;
        });
    });
    $( "#investTypeID" ).change(function() {
        getInvestType();
    });
    var currentInvestType = null;
    function calInterest(money){
//        console.log(currentInvestType);
        if(money == null){
            money = $( "input[name='money']" ).val();
        }

        if(currentInvestType !== null){
            if(currentInvestType.allowCompInterest){
                $( "input[name='isCompInterest']" ).removeAttr("disabled");
            }else{
                $( "input[name='isCompInterest']" ).attr("disabled","disabled");
            }
            $( "input[name='interest']" ).val(currentInvestType.interest+" % / năm");
            if(money !== null && money != "" && money != "undefined"){
                var currency = $( "select[name='currency']" ).val();
                $( "#tk_money" ).html(money+" "+currency);
                money = parseFloat(money.replace(/\D/g,""));
//                console.log(money);
                var interest = parseFloat(Math.round(money*currentInvestType.interest/1200));

                $( "#tk_interest" ).html((interest+"").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+" "+currency);
                var bd = $( "input[name='further']" ).val();
                bd = parseFloat(bd.replace(" %",""));
//                console.log(interest*parseInt(currentInvestType.period));
//                console.log(money*bd/100);
                var finalMoney = parseFloat(Math.round(money + interest*parseInt(currentInvestType.period) + money*bd/100));
                $( "#tk_finalMoney" ).html((finalMoney+"").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+" "+currency);

            }else{
//                $( "input[name='money']" ).val((currentInvestType.minMoney+"").replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $( "#tk_money" ).html("");
                $( "#tk_interest" ).html("");
                $( "#tk_finalMoney" ).html("");
            }


        }else{
            $( "#tk_money" ).html("");
            $( "#tk_interest" ).html("");
            $( "#tk_finalMoney" ).html("");
        }
    }
    function  getInvestType() {
        var cvl = $( "#investTypeID" ).val();
        $.ajax({
            url: '/getInvestType',
            dataType: "json",
            cache: false,
            type: 'post',
            data: {
                cvl: cvl
            },
            beforeSend: function(xhr){

//                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
            },
            success: function (data) {
                if(data.result){
                    currentInvestType = data.data;
                    calInterest();
                }

            },
            error: function () {

            }
        });
    }
    $( document ).ready(function() {
        var handle = $( "#custom-handle" );
        $( "#slider" ).slider({
            min: 0,
            max: 100,
            value: 0,
            step:10,
            create: function() {
                var pc =$( this ).slider( "value" );
                handle.text( pc+" %" );
            },
            slide: function( event, ui ) {
                 handle.text( ui.value );

            }

        });


        $( "div .slider" ).css("display","none");
        $( "div #sliderNote" ).css("display","none");
        getBienDong();

    });
    $( "#estStartDate" ).change(function() {

        getBienDong();
    });
    //isCompInterest

    $('input[type=radio][name=isCompInterest]').change(function() {
        var vl = $('input[name=isCompInterest]:checked', '#createInvest').val();
        if(vl==1){
            $( "div .slider" ).css("display","inline-block");
            $( "div #sliderNote" ).css("display","inline-block");
            $("#tk_isCompInterest").html("Tái đầu tư: Có");
        }else{
            $( "div .slider" ).css("display","none");
            $( "div #sliderNote" ).css("display","none");
            $("#tk_isCompInterest").html("Tái đầu tư: Không");
        }
    });

    $('input[type=radio][name=interestMethod]').change(function() {
        var vl = $('input[name=interestMethod]:checked', '#createInvest').val();
        if(vl=="ONETIME"){

        }else{

        }


    });
    function getBienDong(){
        var date = $( "#estStartDate" ).val();
        $("#tk_estStartDate").html("Ngày đầu tư: "+date);
        $.ajax({
            url: '/getBienDong',
            dataType: "json",
            cache: false,
            type: 'post',
            data: {
                date: date
            },
            beforeSend: function(xhr){

//                        xhr.setRequestHeader('X-CSRF-TOKEN', token);
            },
            success: function (data) {
                if(data.result){
                    var vl = data.data + " %";
                    $("input[name='further']").val(vl);
                }
            },
            error: function () {

            }
        });
    }
    $( "#createInvest" ).submit(function( event ) {
        $("#compInterestPercent").val($("#slider").attr("value"));
        $( "#createInvest" ).submit();
    });

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