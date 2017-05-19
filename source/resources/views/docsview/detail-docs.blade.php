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
    .item-doc{
        width: 30%;
        float: left;
        border: 1px solid #056839;
    }
    .item-doc img{
        width: 40%;
        float: left;
        border: 1px solid #056839;
    }
    .item-doc .cover-item-doc{
        width: 50%;
        float: left;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DANH SÁCH TÀI LIỆU CÔNG TY
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">DỰ ÁN [{{$data[0]['nameProject']}}]</span>
            </h1>
        </div>
    </div>

    @include('partials.messages')
    <div class="doi-tac cong-bo-thong-tin">
        @foreach($data as $item)
            <div class="item-doc">
                <img class="thumb-congbothongtin" src="/<?php if(!empty($item['thumbnail'])) echo $item['thumbnail'];else echo $item['image'];  ?>"/>
                <div class="cover-item-doc">
                    <span> Tên file: {{$item['nameFile']}}</span> <br>
                    <span> Loại file: {{$item['fileType']}}</span><br>
                    <span> Kích thướt file: {{number_format($item['fileSize'],0,".",",")}} {{$item['sizeUnit']}}</span><br>
                    <a href="/{{$item['image']}}" target="_blank" >Download</a>
                </div>
            </div>
        @endforeach
    </div>
@stop