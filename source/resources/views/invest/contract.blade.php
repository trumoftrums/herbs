@extends('layouts.app')

@section('page-title', trans('app.roles'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ĐẦU TƯ VÀO HSG
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">HỢP ĐỒNG ĐẦU TƯ</span>
        </h1>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
@include('partials.messages')
<style>
    #tien-trinh-dau-tu {
        overflow: auto;
    }

    #tien-trinh-dau-tu table td, th {
        text-align: right;
        border: 1px solid #d1d1d1;
        padding-right: 3px;
        min-width: 170px;
    }

</style>
<script type="application/javascript">
    var option = {
        scales: {
            yAxes:[{
                stacked:true,
                gridLines: {
                    display:true,
                    color:"rgba(255,99,132,0.2)"
                }
            }],
            xAxes:[{
                gridLines: {
                    display:false
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    return "Lãi: " + tooltipItem.yLabel+"tr";
                }
            }
        },
        responsive: true,
        maintainAspectRatio: this.maintainAspectRatio,
        legend: {display: false}
    };
    function createChart(idChart,labelsArr,dataArr){
        var canvas = document.getElementById(idChart);
        var data = {
            labels: labelsArr,
            datasets: [
                {
                    label: "Lãi",
                    backgroundColor: "#06743f",
                    borderColor: "#06743f",
                    borderWidth: 0,
                    hoverBackgroundColor: "#06b25f",
                    hoverBorderColor: "#06b25f",
                    data: dataArr
                }
            ]
        };
        Chart.Bar(canvas,{
            data:data,
            options:option
        });
    }

    //        Chart.Bar(canvas2,{
    //            data:data,
    //            options:option
    //        });
</script>
<?php
if(!empty($datas)){
    $i =1;
    foreach ($datas as $v){
?>

<div class="cover-contract">
    <div class="cover-line-contract">
        <h5 class="h5-title-contract"><img src="{{ url('assets/img/icon-contract.png') }}"/>HỢP ĐỒNG {{$v->investCode}} <?php
            switch ($v->status){
                case "NE": echo "<b style='color: red;'>( Đang chờ duyệt )</b>"; break;
                case "AC": echo "<b style='color: green;'>( Đã duyệt )</b>"; break;
                case "RF": echo "<b style='color: orange;'>( Đang yêu cầu hoàn vốn )</b>"; break;
                default : echo "<b style='color: grey;'>( Không hoạt động )</b>"; break;
            }
        ?>:</h5>
    </div>
    <div class="cover-line-contract">
        <p class="item-in-contract-div">NGÀY BẮT ĐẦU: <span><?php if(!empty($v->actStartDate)) echo $v->actStartDate; else echo $v->estStartDate;?></span></p>
        <p class="item-in-contract-div">NGÀY KẾT THÚC: <span><?php if(!empty($v->actEndDate)) echo $v->actEndDate; else echo $v->estEndDate;?></span></p>
        <p class="item-in-contract-div">SỐ TIỀN ĐẦU TƯ: <span><?php echo number_format($v->money,0,".",","); ?> VND</span></p>
        <p class="item-in-contract-div">LỢI NHUẬN: <span><?php echo $v->interest ?>%</span></p>
        <p class="item-in-contract-div">LỢI NHUẬN BIẾN ĐỘNG: <span><?php echo $v->further ?>%</span></p>
    </div>
    <div class="cover-line-contract">
        <h4 class="h4-title-chart">BIỂU ĐỒ THỐNG KÊ LỢI NHUẬN</h4>
        <div class="chart-contract">
            {{--<img src="{{ url('assets/img/img-chart.png') }}"/>--}}
            <canvas id="myChart{{$i}}"></canvas>
            <script type="application/javascript">
                var labelsArr =[]; var dataArr =[];

                <?php
                    $ngaybatDau = $v->actStartDate;
                    if(empty($ngaybatDau)) $ngaybatDau =  $v->estStartDate;
                    $k = 0;
                    $contentHTML = '<table cellpadding="5" cellspacing="5" style="width: 100%" ><thead><th></th>';
                    $bodyHTML = array();
                    $bodyHTML[0] = "<tr><td><b>Tổng đầu tư</b></td>";
                    $bodyHTML[1] = "<tr><td><b>Lợi nhuận</b></td>";
                    $bodyHTML[2] = "<tr><td><b>Lợi nhuận tái đầu tư</b></td>";
                    $bodyHTML[3] = "<tr><td><b>Lợi nhuận được trả</b></td>";
                    $bodyHTML[4] = "<tr><td><b>Lợi nhuận đã thanh toán</b></td>";
                    foreach ($v->ketQuaChiTiet as $th){
//                        var_dump($th);
//                        var_dump($v->trade);exit();
                        $k++;
                        echo 'labelsArr.push("'.date("Y-m-d",strtotime($ngaybatDau. " + $k month")).'");';
                        echo 'dataArr.push('.round($th['tienlai']/1000000,2).');';
                        $contentHTML .= '<th>Tháng thứ ' . $k . '</th>';
                        $bodyHTML[0] .= '<td>' . number_format($th['tongTienDauTu'],0,".",",") . '</td>';
                        $bodyHTML[1] .= '<td>' . number_format($th['tienlai'],0,".",",") . '</td>';
                        $bodyHTML[2] .= '<td>' . number_format($th['gop'],0,".",",") . '</td>';
                        $bodyHTML[3] .= '<td>' . number_format($th['conlai'],0,".",",") . '</td>';
                        $isok = false;

                        if(!empty($v->trade)){
                            foreach ($v->trade as $trade){
                                if($trade['status'] == \Vanguard\InvestTrade::STATUS_ACTIVED && $trade['investSeq'] == $k){
                                    $isok =true;
                                    break;
                                }
                            }
                        }
                        if($isok){
                            $bodyHTML[4] .= '<td><img src="'.url('assets/img/button_ok.png').'" height="20" width="20" alt="ok" title="Đã thanh toán" /></td>';
                        }else{
                            $bodyHTML[4] .= '<td></td>';
                        }


                    }
                    $contentHTML .= '</thead>';
                    $contentHTML .= '<tbody>';
                    for ($j = 0; $j < count($bodyHTML); $j++) {
                        $contentHTML .= $bodyHTML[$j];
                    }
                    $contentHTML .= '</tbody></table>';
                ?>
            createChart("myChart{{$i}}",labelsArr,dataArr);
            </script>

        </div>
    </div>
    <div class="transfer-history" id="tien-trinh-dau-tu">
        <h5 class="h5-title-contract">TIẾN TRÌNH ĐẦU TƯ</h5>

        <?php echo $contentHTML;?>


    </div>
    <div class="transfer-history">
        <h5 class="h5-title-contract">LỊCH SỬ GIAO DỊCH</h5>
        <?php if(!empty($v->trade)){ foreach ($v->trade as $trade){
            if(empty($trade['soTienLai'])) {


        ?>
        <p class="p-history">* Ngày {{$trade['ngayGD']}}: {{$trade['noiDungGD']}} {{number_format($trade['tongTien'],0,".",",")}} {{$trade['loaiTien']}}. Tổng số tiền đầu tư {{number_format($trade['tongDauTu'],0,".",",")}} {{$trade['loaiTien']}}.  Tổng số tiền hiện có {{number_format($trade['tongTien'],0,".",",")}} {{$trade['loaiTien']}}</p>

        <?php }else{?>
        <p class="p-history">* Ngày {{$trade['ngayGD']}}: {{$trade['noiDungGD']}} {{number_format($trade['soTienLai'],0,".",",")}} {{$trade['loaiTien']}}. Tái đầu tư {{number_format($trade['soTienLai'],0,".",",")}} {{$trade['loaiTien']}}. Tổng số tiền đầu tư {{number_format($trade['tongDauTu'],0,".",",")}} {{$trade['loaiTien']}}. Tổng số tiền hiện có {{number_format($trade['tongTien'],0,".",",")}} {{$trade['loaiTien']}}</p>
        <?php }}}?>
    </div>

    <div class="cover-line-contract">
        {{--<input class="inp-sub bt-first" value="XEM LỊCH SỬ GIAO DỊCH">--}}
        <input class="inp-sub bt-second" onclick="xemHD({{$v->id}});" type="submit" value="XEM TÀI LIỆU">
        <input class="inp-sub bt-third " value="HOÀN VỐN ĐẦU TƯ" type="submit" onclick="hoanvon({{$v->id}});">
    </div>
</div>
<?php $i++;}}?>
<script type="application/javascript">
    function hoanvon(id){
        window.location = "/hoan-von/refund-invest/?investID="+id;
    }
    function  xemHD(id) {
        var url = "{{ route('invest.documents',"")}}/"+id;
        window.location = url;
    }
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