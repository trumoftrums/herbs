@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ĐẦU TƯ VÀO HSG
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">HOÀN VỐN ĐẦU TƯ</span>
            </h1>
        </div>
    </div>

    @include('partials.messages')
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="cover-invest">
        <div class="cover-line">
            <div class="ele-div">
                <span class="sp-up">Yêu cầu kết thúc hợp đồng</span>
                <select class="select-inp" name="investID" id="investID">
                    <option value="">Chọn hợp đồng đầu tư</option>
                    <?php
                        if(!empty($datas)){
                            $i =1;
                            foreach ($datas as $v){
                                echo '<option value="'.$v->id.'">Hợp đồng '.$v->investCode.' ['.$v->actStartDate.' : '.number_format($v->money,0,".",",").$v->currency.']</option>';
                                $i++;
                            }
                        }
                    ?>
                </select>
            </div>
            {{--<div class="ele-div">--}}
                {{--<input type="submit" class="inp-sub bt-end-contract" value="Tính thống kê kết thúc HĐ"/>--}}
            {{--</div>--}}
        </div>
        <h4 class="h4-title">BẢNG THỐNG KÊ</h4>
        <div class="cover-line no-mar-bottom">
            <label class="lb-line" id="actStartDate">Ngày đầu tư:</label>
            <label class="lb-line" id="ngayNhanLai">Ngày nhận lợi nhuận:</label>
            <label class="lb-line" id="ngayDaoHan">Ngày đáo hạn:</label>
            <label class="lb-line" id="taiDauTu">Tái đầu tư: không</label>
        </div>
        <div class="cover-line no-mar-bottom">
            <label class="lb-2">Số tiền đầu tư: <b id="money"></b></label>
            <label class="lb-2">Số lợi nhuận thời điểm hiện tại: <b id="tongLai"></b></label>
            <label class="lb-2">Số tiền phạt hoàn vốn trước kỳ hạn: <b id="tienPhat"></b></label>
            <label class="lb-2">Tổng tiền khi hoàn vốn (Tiền gốc + Lợi nhuận - Tiền phạt): <b id="tongTien"></b></label>
        </div>
        <div class="cover-note">
            <p>* Sau khi nhận được yêu cầu hoàn vốn Công Ty sẽ có nhân viên xác nhận yêu cầu trực tiếp qua điện thoại và email cá nhân của Quý Khách.</p>
            <p>* Yêu cầu kết thúc hợp đồng sẽ trở thành biên bản kết thúc hợp đồng gửi đến Quý khách qua email.</p>
            <p>* Sau khi Quý Khách xác nhận nội dung biên bản kết thúc hợp đồng là chính xác qua Email hoặc điện thoại thì tiền sẽ được hoàn lại cho Quý Khách sau 24h.</p>
        </div>
        <div class="cover-line">
            <input type="submit" class="inp-sub" value="Gửi yêu cầu"/>
        </div>
    </div>
</form>
    <script type="application/javascript">
        var dataArr = [];
        <?php

            foreach ($datas as $v){
                echo 'dataArr['.$v->id.'] = [];';
                echo 'dataArr['.$v->id.'][0] ="'.$v->actStartDate.'";';
                echo 'dataArr['.$v->id.'][1] ="'.$v->ngayNhanLai.'";';
                echo 'dataArr['.$v->id.'][2] ="'.date("Y-m-d").'";';
                if($v->taiDauTu ==1){
                    echo 'dataArr['.$v->id.'][3] ="Có";';
                }else{
                    echo 'dataArr['.$v->id.'][3] ="Không";';
                }

                echo 'dataArr['.$v->id.'][4] ='.$v->money.';';
                $percentPhat = 0;
                $tongTien = 0;
                if(!empty($v->trade)){
                    $tongTien = $v->trade[0]['tongTien'];
                    echo 'dataArr['.$v->id.'][5] ='.($v->trade[0]['tongTien'] - $v->money).';';

                    $tienPhat = json_decode($v->tienPhat,true);
                    $tday = date("Y-m-d");

                    foreach ($tienPhat as $tp){
                        $frDate = date("Y-m-d",strtotime($v->actStartDate.' +'.$tp['fr'].' months' ));
                        $toDate = date("Y-m-d",strtotime($v->actStartDate.' +'.$tp['to'].' months' ));
//var_dump($frDate);var_dump($toDate);var_dump($tday);
                        if($tday>=$frDate && $tday <= $toDate){
                            $percentPhat = $tp['vl'];
//                            var_dump($frDate);var_dump($toDate);var_dump($tday);exit();
                            break;
                        }

                    }
                }else{
                    echo 'dataArr['.$v->id.'][5] ='.$v->money.';';
                }


                $tongTienPhat = $percentPhat * $v->money/100;
                echo 'dataArr['.$v->id.'][6] ='.$tongTienPhat.';';
                echo 'dataArr['.$v->id.'][7] ='.($tongTien -$tongTienPhat ).';';
                echo 'dataArr['.$v->id.'][8] ="'.$v->currency.'";';
                echo 'dataArr['.$v->id.'][9] ='.$percentPhat.';';
            }
        ?>
        $( "#investID" ).change(function() {
            var id = $( "#investID" ).val();
            calculateInvest(id);
        });
        function calculateInvest(id){
            if(id!=""){
                var dt = dataArr[id];
                $("#actStartDate").html("Ngày đầu tư: "+dt[0]);
                $("#ngayNhanLai").html("Ngày nhận lãi: "+dt[1]);
                $("#ngayDaoHan").html("Ngày đáo hạn: "+dt[2]);
                $("#taiDauTu").html("Tái đầu tư: "+dt[3]);
                $("#money").html((dt[4]+"").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' '+dt[8]);
                $("#tongLai").html((dt[5]+"").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' '+dt[8]);
                $("#tienPhat").html((dt[6]+"").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' '+dt[8] + " ("+dt[9]+"% vốn đầu tư)");
                $("#tongTien").html((dt[7]+"").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' '+dt[8]);

            }else{
                $("#actStartDate").html("Ngày đầu tư: ");
                $("#ngayNhanLai").html("Ngày nhận lãi: ");
                $("#ngayDaoHan").html("Ngày đáo hạn: ");
                $("#taiDauTu").html("Tái đầu tư: ");
                $("#money").html("");
                $("#tongLai").html("");
                $("#tienPhat").html("");
                $("#tongTien").html("");
            }
        }
        $( document ).ready(function() {
            <?php
                if(!empty($investID)){
                    echo '$("#investID").val('.$investID.');';
                    echo 'calculateInvest('.$investID.');';
                }
            ?>
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
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\UpdateRoleRequest', '#role-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\CreateRoleRequest', '#role-form') !!}
    @endif
@stop