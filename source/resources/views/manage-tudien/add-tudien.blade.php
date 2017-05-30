@extends('layouts.app')
<?php
$title = "THÊM DƯỢC LIỆU";
if($edit){
    $title = "SỬA DƯỢC LIỆU";
}
?>
@section('page-title',$title)

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ TỪ ĐIỂN DƯỢC LIỆU
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">{{$title}}</span>
        </h1>
    </div>
</div>
    <style>
        .admin-dict-slide-Item{
            width: 100%;
            text-align: left;
            min-height: 50px;
        }
        .admin-dict-slide-Item input{
            width: 48%;
            float: left;
        }

    </style>

    @include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['dictadmin.update', $dict['id']], 'method' => 'PUT', 'id' => 'news-form','enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'dictadmin.add','method' => 'POST', 'id' => 'news-form', 'enctype' => 'multipart/form-data']) !!}
    @endif
    {{--<form enctype="multipart/form-data" method="post" action="{{ route('dictadmin.add') }}" >--}}
    {{--<input type="hidden" value="{{csrf_token()}}" name="_token">--}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Tên Dược Liệu</label>
                        <input type="text" class="form-control" name="tenDuocLieu" placeholder="Tên Dược Liệu" value="{{ $edit ? $dict['tenDuocLieu'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="moTa" rows="5"  class="form-control">{{ $edit ? $dict['moTa'] : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Khoa Học</label>
                        <input type="text" class="form-control" name="tenKhoaHoc" placeholder="Tên Khoa Học" value="{{ $edit ? $dict['tenKhoaHoc'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Đồng Nghĩa</label>
                        <input type="text" class="form-control" name="tenDongNghia" placeholder="Tên Đồng Nghĩa" value="{{ $edit ? $dict['tenDongNghia'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Khác</label>
                        <input type="text" class="form-control" name="tenKhac" placeholder="Tên Khác" value="{{ $edit ? $dict['tenKhac'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="display_name">Hình đại diện</label>
                        <input type="file" id="file" name="thumb">
                    </div>
                    <div class="form-group">
                        <label for="name">Bộ phận sinh thái</label>
                        <input type="text" class="form-control" name="phanBoSinhThai" placeholder="Bộ phận sinh thái" value="{{ $edit ? $dict['phanBoSinhThai'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Bộ phận sử dụng</label>
                        <input type="text" class="form-control" name="boPhanSuDung" placeholder="Bộ phận sử dụng" value="{{ $edit ? $dict['boPhanSuDung'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Thành phần hóa học</label>
                        <input type="text" class="form-control" name="thanhPhanHoaHoc" placeholder="Thành phần hóa học" value="{{ $edit ? $dict['thanhPhanHoaHoc'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Tác dụng</label>
                        <textarea type="text" class="form-control ckeditor" name="tacDung">{{ $edit ? $dict['tacDung'] : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Bài thuốc</label>
                        <textarea name="baiThuoc" class="form-control ckeditor">{{ $edit ? $dict['baiThuoc'] : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="display_name">Slide hình ảnh</label>
                        <div class="admin-dict-slide-Item">

                            <input type="text" class="form-control" name="slideIMG[1][name]" placeholder="Tên hình ảnh 1" value="">
                            <input type="file" class="form-control" id="slideIMG_1" name="slideIMG1">
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="text" class="form-control" name="slideIMG[2][name]" placeholder="Tên hình ảnh 2" value="">
                            <input type="file" class="form-control"  id="slideIMG_2" name="slideIMG2">
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="text" class="form-control" name="slideIMG[3][name]" placeholder="Tên hình ảnh 3" value="">
                            <input type="file" class="form-control"  id="slideIMG_3" name="slideIMG3">
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="text" class="form-control" name="slideIMG[4][name]" placeholder="Tên hình ảnh 4" value="">
                            <input type="file" class="form-control"  id="slideIMG_4" name="slideIMG4">
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="text" class="form-control" name="slideIMG[5][name]" placeholder="Tên hình ảnh 5" value="">
                            <input type="file" class="form-control"  id="slideIMG_5" name="slideIMG5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block bt-hsg">
                <i class="fa fa-save"></i>
                {{ $edit ? "Cập Nhật" : "Tạo Mới" }}
            </button>
        </div>
    </div>
    {{--</form>--}}
    {!! Form::close() !!}
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/ckeditor/ckeditor.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\NewsRequestEdit', '#news-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\NewsRequest', '#news-form') !!}
    @endif

@stop