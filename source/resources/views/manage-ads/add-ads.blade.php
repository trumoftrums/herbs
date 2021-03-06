@extends('layouts.app')
<?php
$title = "Thêm tin tức";
if($edit){
    $title = "Sửa tin tức";
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
            QUẢN LÝ ADS
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">THÊM ADS MỚI</span>
        </h1>
    </div>
</div>

    @include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['adsadmin.update', $news->id], 'method' => 'PUT', 'id' => 'news-form','enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'adsadmin.add', 'id' => 'news-form', 'enctype' => 'multipart/form-data']) !!}
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Tên quảng cáo</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên quảng cáo" value="{{ $edit ? $news->name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" name="url" placeholder="url" value="{{ $edit ? $news->url : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="display_name">Hình ảnh</label>
                        <input type="file" id="file" name="fileimg">
                        <img src="{{$edit  && !empty($news->img) ? url($news->img) : ''}}" id="thumb" width="150" height="150"/>
                    </div>
                    <div class="form-group">
                        <label for="weight">Sắp xếp</label>
                        <input type="text" class="form-control" name="weight" placeholder="weight" value="{{ $edit ? $news->weight : '' }}">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript" >

        $( document ).ready(function() {
            <?php
                if($edit) echo 'readURL($("#file"),"thumb");';
            ?>
        });
        function readURL(input,idIMG) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+idIMG).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#file").change(function(){
            readURL(this,"thumb");
        });

    </script>
    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block bt-hsg">
                <i class="fa fa-save"></i>
                {{ $edit ? "Cập Nhật" : "Tạo Mới" }}
            </button>
        </div>
    </div>
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