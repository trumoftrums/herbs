@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')
<style>
    .btnOwn {
        padding: 0px 3px;
        font-size: 12px;
        cursor: auto;
    }
    .att-item{
        width: 100px;
        height: 100px;
        float: left; margin: 5px;
        border: 1px solid #0a6b3d;
    }

</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">QUẢN LÝ TRẢ LÃI </span>
        </h1>
    </div>
</div>

@include('partials.messages')
<div class="row tab-search">
    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
        <div class="col-md-2">
            <b style="color:#056839">Từ Ngày</b>
            <div class="input-group custom-search-form">
                <input type="text" class="form-control datepicker" name="fromDate" value="{{$fromDate}}" placeholder="Chọn ngày...">

            </div>
        </div>
        <div class="col-md-2">
            <b style="color:#056839">Đến Ngày</b>
            <div class="input-group custom-search-form">
                <input type="text" class="form-control datepicker" name="toDate" value="{{$toDate}}" placeholder="Chọn ngày...">

            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <b style="color:#056839">Gói Đầu Tư</b>
            <select id="goi-dau-tu" class="form-control" name="goi_dau_tu">
                <option value="all" @if($idGoiDauTuCurr == 'all') selected @endif>-- Tất cả --</option>
                @foreach($listTypeInvest as $item)
                    <option value="{{$item->id}}" @if($idGoiDauTuCurr == $item->id) selected @endif >{{$item->typeName}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <b style="color:#056839">Trạng Thái</b>
            <select id="status" class="form-control" name="status">
                <option value="all" @if($statusCurr == 'all') selected @endif>-- Tất cả --</option>
                <option value="NE" @if($statusCurr == 'NE') selected @endif >Chưa thanh toán</option>
                <option value="AC" @if($statusCurr == 'AC') selected @endif >Đã thanh toán</option>
                <option value="PE" @if($statusCurr == 'IA') selected @endif>Tạm khóa</option>
                <option value="CA" @if($statusCurr == 'RF') selected @endif >Đã hủy</option>
                <option value="DE" @if($statusCurr == 'DE') selected @endif>Đã xóa</option>
            </select>
        </div>
        <div class="col-md-2">
            <b>&nbsp;</b><br>
            <input type="submit" value="Search" class="btn btn-success"/>
        </div>
    </form>
</div>
<script>
    $(".datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
</script>
<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
        <th>STT</th>
        <th>Mã hợp đồng</th>
        <th>Gói đầu tư</th>
        <th>Tên khách hàng</th>
        <th>Tiền lãi</th>
        <th>Ngày trả lãi</th>
        <th>Thông tin ngân hàng</th>
        <th>Trạng thái</th>
        <th class="text-center">ACTION</th>
        </thead>
        <tbody>
        <?php if (count($data)){
            $i = 0;
            foreach ($data as $doc){?>

                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{$doc->investCode}}</td>
                    <td>{{ $doc->typeName}}</td>
                    <td>{{ $doc->first_name." ".$doc->last_name }}</td>
                    <td>{{ number_format($doc->soTienLai,0,".",",").' '.$doc->loaiTien }}</td>
                    <td>{{ $doc->ngayGD}}</td>
                    <td>Tên Ngân hàng: <br>Chi nhánh: <br>STK: <br>Chủ thẻ: <br></td>
                    <td>
                        @if($doc->tradeStatus == 'AC') <button type="button" class="btn btn-success btnOwn">Đã thanh toán</button>
                        @elseif($doc->tradeStatus == 'NE') <button type="button" class="btn btn-warning btnOwn">Chưa thanh toán</button>
                        @elseif($doc->tradeStatus == 'DE') <button type="button" class="btn btn-danger btnOwn">Đã xóa</button>
                        @elseif($doc->tradeStatus == 'CA') <button type="button" class="btn btn-danger btnOwn">Đã Hủy</button>
                        @elseif($doc->tradeStatus == 'PE') <button type="button" class="btn btn-danger btnOwn">Tạm khóa</button>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($doc->tradeStatus == 'AC')
                            <?php if(isset($doc->filepath)){?>

                            &nbsp;<a  href="/{{$doc->filepath}}"  target="_blank"  class="btn btn-success btn-circle btnXemHoaDon" title="Xem hóa đơn"
                                     data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <?php }?>
                        @else


                            <a   href="{{ route('interest.quan-ly-tra-lai.thanhtoan',$doc->tradeID) }}"    class="btn btn-success btn-circle btnThanhToan" title="Thanh toán"
                               data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            {{--<a href="{{ route('interest.quan-ly-tra-lai.huy',$doc->tradeID) }}"  class="btn btn-danger btn-circle" title="Hủy trả lãi"--}}
                               {{--data-toggle="tooltip"--}}
                               {{--data-placement="top"--}}
                               {{--data-method="DELETE"--}}
                               {{--data-confirm-title="@lang('app.please_confirm')"--}}
                               {{--data-confirm-text="Bạn có chắc chắn muốn hủy giao dịch này"--}}
                               {{--data-confirm-delete="YES">--}}
                                {{--<i class="glyphicon glyphicon-trash"></i>--}}
                            {{--</a>--}}

                            {{--<a href="{{ route('interest.quan-ly-tra-lai.khoa',$doc->tradeID) }}"   class="btn btn-danger btn-circle" title="Khóa thanh toán"--}}
                               {{--data-toggle="tooltip"--}}
                               {{--data-placement="top"--}}
                               {{--data-method="DELETE"--}}
                               {{--data-confirm-title="@lang('app.please_confirm')"--}}
                               {{--data-confirm-text="Bạn có chắc chắn muốn khóa giao dịch này"--}}
                               {{--data-confirm-delete="YES">--}}
                                {{--<i class="glyphicon glyphicon-trash"></i>--}}
                            </a>

                        @endif

</td>
</tr>
<?php }}else{?>
<tr>
<td colspan="6"><em>Chưa có dữ liệu.</em></td>
</tr>

<?php }?>
</tbody>
</table>
</div>
@stop


