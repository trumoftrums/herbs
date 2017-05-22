@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">QUAN HỆ NHÀ ĐẦU TƯ</p>
        <p class="title-after">BÁO CÁO TÀI CHÍNH</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        HSG luôn công khai và báo cáo về tình hình tài sản, vốn chủ sở hữ và công nợ cũng như tình hình tài chính, kết quả kinh doanh, tình hình lưu chuyển tiền tệ và khà năng sinh lời hàng kỳ hàng quý của Chúng tôi. Điều này sẽ giúp cho Khách hàng đánh giá, phân tích và dự đoán tình hình tài chính, kết quà hoạt động của Chúng tôi.
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
                        <a href="http://private.hoangsanggroup.com/docsview/detail-du-an/{{$citem->id}}">{{$citem->nameProject}}</a>
                        <span>{{date_format(date_create($citem->created_at),"d/m/Y")}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
@stop
