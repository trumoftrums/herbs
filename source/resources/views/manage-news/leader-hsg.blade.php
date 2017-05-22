@extends('layouts.app')

@section('page-title', "Ban lãnh đạo HSG")

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            BAN LÃNH ĐẠO HSG
        </h1>
    </div>
</div>
    <div class="row">
        <div class="kien-thuc-tai-chinh">
            <div class="leader-left">
                <img src="{{ url('assets/frontend/images/leader1.png')}}"/>
            </div>
            <div class="leader-right">
                <h3 class="h3-first">Hotline Ban Lãnh Đạo Cấp Cao HSG</h3>
                <img src="{{ url('assets/frontend/images/leader2.png')}}"/>
                <h3>Hotline Ban Quản Lý Bộ Phận HSG</h3>
                <img src="{{ url('assets/frontend/images/leader3.png')}}"/>
            </div>
        </div>
    </div>
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/ckeditor/ckeditor.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}

@stop