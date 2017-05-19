@extends('layouts.app')

@section('page-title', trans('app.add_user'))

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">LÃI SUẤT BIẾN ĐỘNG</span>
        </h1>
    </div>
</div>

    @include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['interest.lai_bien_dong.update', $biendong->id], 'method' => 'PUT', 'id' => 'lai-bien-dong-form']) !!}
    @else
        {!! Form::open(['route' => 'interest.lai_bien_dong.add', 'id' => 'lai-bien-dong-form']) !!}
    @endif

    <div class="cover-invest-admin">
        <h5 class="h5-title">TỔNG KẾT ĐẠI HỘI CỔ ĐÔNG LẦN THỨ 5, CHO RA LÃI XUẤT BIÊN ĐỘNG NHƯ SAU:</h5>
        <div class="cover-line">
            <div class="ele-div">
                <span class="sp-up">Từ ngày</span>
                <input type="text" id="datepicker1" readonly class="inp-text" name="fr" value="{{ $edit ? $biendong->fr : '' }}"/>
            </div>
            <div class="ele-div">
                <span class="sp-up">Đến ngày</span>
                <input type="text" id="datepicker2" readonly class="inp-text" name="to" value="{{ $edit ? $biendong->to : '' }}"/>
            </div>
            <div class="ele-div">
                <span class="sp-up">Lãi suất biên động</span>
                <input type="text" class="inp-text" name="interest" value="{{ $edit ? $biendong->interest : '' }}"/>
            </div>
        </div>
        <div class="cover-line">
            <input type="submit" class="inp-sub" value="Cập nhật & Lưu"/>
        </div>
    </div>
    {!! Form::close() !!}
<script>
    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
</script>
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\BienDongRequest', '#lai-bien-dong-form') !!}
@stop