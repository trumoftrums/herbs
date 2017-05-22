@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')
    <style>
        .btnOwn {
            padding: 0px 3px;
            font-size: 12px;
            cursor: auto;
        }

        .att-item {
            width: 100px;
            height: 100px;
            float: left;
            margin: 5px;
            border: 1px solid #0a6b3d;
        }
        #hoadon-table-wrapper img, object{
            width: auto;
            height: auto;
            border: 1px solid #dddddd;
        }

    </style>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                QUẢN LÝ ĐẦU TƯ
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">QUẢN LÝ TRẢ LÃI </span>
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">THANH TOÁN LÃI HÀNG THÁNG [{{$investCode}}] </span>
            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="table-responsive top-border-table" id="hoadon-table-wrapper">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="div-thanhtoan-item">
                    <label> Mã Hợp Đồng </label>
                    <input type="text" maxlength="10" disabled name="investID" value="{{$investCode}}" />
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                </div>
                <div class="div-thanhtoan-item">
                    <label> Ngày trả lãi </label>
                    <input type="text" maxlength="10" disabled name="investID" value="{{$data['ngayGD']}}" />
                    <input type="hidden" name="investSeq" value="{{$data['investSeq']}}" />
                </div>
                <div class="div-thanhtoan-item">
                    <label> Tên khách hàng </label>
                    <input type="text"  disabled name="tenKH" value="{{$data['first_name'].' '.$data['last_name']}}" />

                </div>
                <div class="div-thanhtoan-item">
                    <label> Số tiền thanh toán </label>
                    <input type="text"  disabled name="soTienLai" value="{{$data['soTienLai']}}" />
                </div>
                <div class="div-thanhtoan-item">
                    <label> Hóa đơn trả lãi </label>
                    <input type="file" name="hoaDon" value=""/>
                </div>
                <div class="div-thanhtoan-item">

                    <input type="submit"  value="Thanh toán"/>
                </div>
            </form>

     </div>
@stop


