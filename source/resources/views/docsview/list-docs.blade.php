<?php
/**
 * Created by PhpStorm.
 * User: LeeThong
 * Date: 5/2/2017
 * Time: 11:57 AM
 */
?>
@extends('layouts.app')

@section('page-title', trans('app.roles'))
<style>
    .p-about-header{
        margin-top: 10px !important;
    }
    .thumb-congbothongtin{
        float: left;
        width: 33%;
        margin-right: 1%;
    }
    .cover-list-item-congbo{
        float: left;
        width: 66%;
    }
    .item-congbothongtin{
        float: left;
        width: 100%;
        margin-bottom: 10px;
        border: 1px solid #056839;
    }
    .item-congbothongtin-download{
        float: left;
        width: 50%;
        margin: 5px 0px;
        text-align: left;
    }
    .item-congbothongtin-download img{
        float: left;
        width: 35px;
        margin-right: 5px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH SÁCH TÀI LIỆU CÔNG TY
            </h1>
        </div>
    </div>

    @include('partials.messages')
    <p class="p-about-header">
        HSG luôn công khai và báo cáo về tình hình tài sản, vốn chủ sở hữ và công nợ cũng như tình hình tài chính, kết
        quả kinh doanh, tình hình lưu chuyển tiền tệ và khà năng sinh lời hàng kỳ hàng quý của Chúng tôi. Điều này sẽ
        giúp cho Khách hàng đánh giá, phân tích và dự đoán tình hình tài chính, kết quà hoạt động của Chúng tôi.
    </p>
    <div class="doi-tac cong-bo-thong-tin">
        @foreach($listBranch as $item)
            <div class="item-congbothongtin item01">
                <img class="thumb-congbothongtin" src="{{ url($item->thumbBranch)}}"/>
                <div class="cover-list-item-congbo">
                    @foreach($item->listProject as $citem)
                        <div class="item-congbothongtin-download">
                            <img src="{{ url('assets/frontend/images/icon-file-tai-chinh.png')}}"/>
                            <div class="cover-congbothongtin-right">
                                <a href="{{route("docsview.detail-du-an",$citem->id)}}">{{$citem->nameProject}}</a>
                                <span>{{date_format(date_create($citem->created_at),"d/m/Y")}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@stop