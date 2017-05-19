@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">TIN TỨC</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="kien-thuc-tai-chinh-detail">
        <div class="detail-news-left">
            <div class="header-news-detail">
                <img class="img-header-detail" src="{{ url($news->thumb)}}"/>
                <h4>{{$news->title}}</h4>
                <span>Ngày đăng: {{date_format(date_create($news->created_at),"d/m/Y")}}</span>
            </div>
            <?php echo $news->description; ?>
        </div>
        <div class="list-news-related-right">
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">Bài viết cùng thể loại</p>
            </div>
            <div class="list-news-right">
                @foreach($listNewsRelated as $item)
                <div class="item-list-news">
                    <img class="avatar-list-news" src="{{ url($item->thumb)}}"/>
                    <div class="item-list-right">
                        <a href="{{ route('frontend.kienthuctaichinh.detail', [$item->id, str_slug($item->title, '-')]) }}" class="a-title-item-right">{{$item->title}}</a>
                        <span>Ngày đăng: {{date_format(date_create($item->created_at),"d/m/Y")}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
