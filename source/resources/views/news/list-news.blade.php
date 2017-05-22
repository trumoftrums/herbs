@extends('layouts.app')

@section('page-title', 'Tin tức')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                TIN TỨC
            </h1>
        </div>
    </div>

<div class="row">
    <div class="kien-thuc-tai-chinh">
        @if(count($listNews) > 0)
        @foreach($listNews as $item)
        <div class="item-news">
            <div class="hover-item">
                <div class="cover-zoom">
                    <a href="{{ route('newsuser.detail', [$item->id, str_slug($item->title, '-')]) }}"><img src="{{ url('assets/img/icon-zoom.png') }}"></a>
                    <a class="detail" href="{{ route('newsuser.detail', [$item->id, str_slug($item->title, '-')]) }}">Xem Chi Tiết</a>
                </div>
            </div>
            <img class="thumb-item-news" src="{{$item->thumb}}"/>
            <div class="content-item-news">
                <div class="title-item-news">
                    <h4>{{$item->title}}</h4>
                    <span>Đăng bởi Trung Tran - {{date_format(date_create($item->created_at),"d/m/Y")}}</span>
                </div>
                <p class="summary-item-news">
                    {{$item->summary}}
                </p>
            </div>
        </div>
        @endforeach
            @else
            <p>Đang cập nhật thông tin...</p>
        @endif
    </div>
</div>
    <script type="text/javascript">
        (function ($) {
            $(function () {
                $( ".item-news" ).hover(function() {
                    $( this ).children(":first").fadeIn('fast');
                }, function(){
                    $(this).children(":first").fadeOut('fast');
                });
            });
        })(jQuery);
    </script>
@stop

