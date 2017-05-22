@extends('layouts.app')
<?php
$title = "Thêm Category";
if($edit){
    $title = "Sửa Category";
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
            QUẢN LÝ CATEGORY
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">THÊM CATEGORY MỚI</span>
        </h1>
    </div>
</div>

    @include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['catnewadmin.update', $cat->id], 'method' => 'PUT', 'id' => 'news-form','enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'catnewadmin.add', 'id' => 'news-form', 'enctype' => 'multipart/form-data']) !!}
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Tên Category</label>
                        <input type="text" class="form-control" name="nameCategory" placeholder="Tên category" value="{{ $edit ? $cat->nameCategory : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Loại tin đăng</label>
                        <select class="form-control" name="type" id="type">
                            <option value="" >Click chọn loại tin</option>
                            @foreach($listTypeNews as $item)
                                <option value="{{$item->idType}}" @if($edit) @if($cat->type == $item->idType)  selected @endif @endif>{{$item->nameType}}</option>
                            @endforeach
                        </select>
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