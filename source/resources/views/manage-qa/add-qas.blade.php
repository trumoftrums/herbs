@extends('layouts.app')

@section('page-title', trans('app.add_user'))

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ HỎI ĐÁP
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">THÊM HỎI ĐÁP MỚI</span>
        </h1>
    </div>
</div>

    @include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['qaadmin.update', $qa->id], 'method' => 'PUT', 'id' => 'news-form']) !!}
    @else
        {!! Form::open(['route' => 'qaadmin.add', 'id' => 'news-form']) !!}
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="description">Câu hỏi</label>
                        <textarea name="question" rows="2" class="form-control">{{ $edit ? $qa->question : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Trả lời</label>
                        <textarea name="answer" class="form-control ckeditor">{{ $edit ? $qa->answer : '' }}</textarea>
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
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\QARequest', '#news-form') !!}

@stop