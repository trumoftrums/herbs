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
    form{
        text-align: left;
        width: 100%;
    }
</style>
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >--}}
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">DANH SÁCH TÀI LIỆU CỦA HỢP ĐỒNG ĐẦU TƯ {{$invest['investCode']}}</span>
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">Upload tài liệu</span>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="cover-invest-admin1" >
<form action="" id="formDoc" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <div class="cover-line">
        <span class="sp-up">Loại tài liệu</span>
        <select name="type" id="typeDoc">
            <option value="">Chọn loại tài liệu </option>
            <option value="Nộp tiền">Hóa đơn nộp tiền</option>
            <option value="Trả lãi">Hóa đơn trả lãi </option>
            <option value="Hoàn vốn">Hóa đơn hoàn vốn</option>
            <option value="Khác">Tài liệu khác</option>
        </select>
    </div>
    <div class="cover-line">

        <input name="investID" id ="fileDoc" type="hidden" value="{{$invest['id']}}"/>
    </div>
    <div class="cover-line">
    <input type="file" name="investDoc" />
    </div>
    <div class="cover-line">

        <input class="inp-sub" type="submit"  value="Upload"/>
    </div>


</form>
</div>
    <script type="application/javascript" >
        $("#formDoc").submit(function (event) {
            var type = $("#typeDoc").val();
            var f = $("#fileDoc").val();
            if(type =="" || f==""){
                alert("Vui lòng chọn loại và file tài liệu");
                event.preventDefault();
            }

        });
    </script>
@stop

@section('scripts')
    <script type="application/javascript">

    </script>
@stop
