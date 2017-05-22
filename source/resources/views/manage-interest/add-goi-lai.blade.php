@extends('layouts.app')

@section('page-title', trans('app.add_user'))

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">TẠO GÓI LÃI</span>
        </h1>
    </div>
</div>

@include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['interest.goi_lai.update', $goiLai->id], 'method' => 'PUT', 'id' => 'goi-lai-form']) !!}
    @else
        {!! Form::open(['route' => 'interest.goi_lai.add', 'id' => 'goi-lai-form']) !!}
    @endif
<div class="cover-invest-admin1">
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line">NHẬP KỲ HẠN</span>
            <input type="text" class="inp-text" name="ki_han" value="{{ $edit ? $goiLai->period : '' }}"/>
            <div class="cover-check">
                <label class="rad-lk radio-inline">
                    <input type="radio" value="m" @if($edit) {@if($goiLai->unit == "m")  checked @endif} @else checked @endif name="radio-kihan">Tháng</label>
                <label class="rad-lk radio-inline">
                    <input type="radio" value="Y" @if($edit) {@if($goiLai->unit == "Y")  checked @endif} @endif name="radio-kihan">Năm</label>
            </div>
        </div>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line">LÃI SUẤT ÁP DỤNG CHO KỲ HẠN</span>
            <input type="text" class="inp-text" name="lai_suat" value="{{ $edit ? $goiLai->interest : '' }}"/> <span class="sp-percent"> %</span>
        </div>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line">CHO PHÉP LÃI KÉP: </span>
            <div class="cover-check">
                <label class="rad-lk radio-inline">
                    <input type="radio" value="1" @if($edit) {@if($goiLai->allowCompInterest == "1")  checked @endif} @else checked @endif checked name="radio-laikep">Có</label>
                <label class="rad-lk radio-inline">
                    <input type="radio" value="0" @if($edit) {@if($goiLai->allowCompInterest == "0")  checked @endif} @endif name="radio-laikep">Không</label>
            </div>
        </div>
    </div>
    <div class="cover-line-new">
        <h5 class="h5-phat-hoan-von">PHẠT HOÀN VỐN TRƯỚC KỲ HẠN</h5>
    </div>
    <div class="cover-line">
        <p class="p-muc-phat">Mức phạt 1:</p>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line has-width">Từ tháng: </span>
            <input type="text" class="inp-text" name="month-fr-01" value="{{ $edit ? $goiLai->finalInvest[0]['fr'] : '' }}"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Đến tháng: </span>
            <input type="text" class="inp-text" name="month-to-01" value="{{ $edit ? $goiLai->finalInvest[0]['to'] : '' }}"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Mức phạt: </span>
            <input type="text" class="inp-text" name="percent-01" value="{{ $edit ? $goiLai->finalInvest[0]['vl'] : '' }}"/><span class="sp-percent"> %</span>
        </div>
    </div>
    <div class="cover-line">
        <p class="p-muc-phat">Mức phạt 2:</p>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line has-width">Từ tháng: </span>
            <input type="text" class="inp-text" name="month-fr-02" value="{{ $edit ? $goiLai->finalInvest[1]['fr'] : '' }}"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Đến tháng: </span>
            <input type="text" class="inp-text" name="month-to-02" value="{{ $edit ? $goiLai->finalInvest[1]['to'] : '' }}"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Mức phạt: </span>
            <input type="text" class="inp-text" name="percent-02" value="{{ $edit ? $goiLai->finalInvest[1]['vl'] : '' }}"/><span class="sp-percent"> %</span>
        </div>
    </div>
    <div class="cover-line">
        <p class="p-muc-phat">Mức phạt 3:</p>
    </div>
    <div class="cover-line">
        <div class="ele-div">
            <span class="sp-line has-width">Từ tháng: </span>
            <input type="text" class="inp-text" name="month-fr-03" value="{{ $edit ? $goiLai->finalInvest[2]['fr'] : '' }}"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Đến tháng: </span>
            <input type="text" class="inp-text" name="month-to-03" value="{{ $edit ? $goiLai->finalInvest[2]['to'] : '' }}"/>
        </div>
        <div class="ele-div">
            <span class="sp-line has-width">Mức phạt: </span>
            <input type="text" class="inp-text" name="percent-03" value="{{ $edit ? $goiLai->finalInvest[2]['vl'] : '' }}"/><span class="sp-percent"> %</span>
        </div>
    </div>
    <div class="cover-line">
        <input type="submit" class="inp-sub" value="Lưu gói mới"/>
    </div>
</div>
    {!! Form::close() !!}
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\InvestTypeRequest', '#goi-lai-form') !!}
@stop