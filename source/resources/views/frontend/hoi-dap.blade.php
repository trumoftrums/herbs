@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">QUAN HỆ NHÀ ĐẦU TƯ</p>
        <p class="title-after">HỎI ĐÁP</p>
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <div class="kien-thuc-tai-chinh-detail">
        <div class="detail-news-left">
            <p class="p-about-header">
                HSG luôn hỗ trợ và giải đáp tất cả thắc mắc của Khách hàng về các Quỹ Đầu Tư của Chúng tôi một cách chi tiết nhất.
            </p>
            <div class="kien-thuc-tai-chinh hoi-dap">
                <ul>
                    @foreach($listQA as $item)
                    <li class="li-question">
                        <img src="{{ url('assets/frontend/images/icon-question.png')}}"/>
                        <p class="p-question">
                            {{$item->question}}
                        </p>
                    </li>
                    <li>
                        <div class="div-answer">
                            <?php echo $item->answer; ?>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="list-news-related-right">
            <div class="cover-p-title-list-news">
                <p class="p-title-list-news">TIN TỨC MỚI NHẤT</p>
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
