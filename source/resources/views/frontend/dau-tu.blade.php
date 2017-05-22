@extends('layouts.frontend')

@section('page-title', 'HSG')

@section('content')
    <div class="title-header">
        <p class="title-root">{{$title}}</p>
        {{--<p class="title-after">{{$title}}</p>--}}
        <span class="span-date-update">Được cập nhật mới nhất: 15/03/2017</span>
    </div>
    <p class="p-about-header">
        Khi kiếm tiền là động lực chính, bạn sẽ có thêm quyết tâm học hỏi những kinh nghiệm của người thành công. Một cách phổ biến đó là thuê cố vấn tài chính. Nhưng nếu bạn chưa thể tìm ra ai đó đủ năng lực, HSG đưa ra một số kiến thức về kiến thức đầu tư tài chính cho bạn tham khảo. Hy vọng bạn sẽ quyết định được mục tiêu đầu tư chính xác nhất.
    </p>
    <div class="kien-thuc-tai-chinh">
        @if(count($listNews) > 0)
        @foreach($listNews as $item)
        <div class="item-news">
            <div class="hover-item">
                <div class="cover-zoom">
                    <a href="{{ route('frontend.kienthuctaichinh.detail', [$item->id, str_slug($item->title, '-')]) }}"><img src="{{ url('assets/frontend/images/icon-zoom.png')}}"></a>
                    <a class="detail" href="{{ route('frontend.kienthuctaichinh.detail', [$item->id, str_slug($item->title, '-')]) }}">Xem Chi Tiết</a>
                </div>
            </div>
            <img class="thumb-item-news" src="{{ url($item->thumb)}}"/>
            <div class="content-item-news">
                <div class="title-item-news">
                    <h4>{{$item->title}}</h4>
                    <span>Ngày đăng: {{date_format(date_create($item->created_at),"d/m/Y")}}</span>
                </div>
                <p class="summary-item-news"><?php echo implode(' ', array_slice(explode(' ', $item->summary), 0, 31)) ?>...</p>
            </div>
        </div>
        @endforeach
        @else
            <p style="font-style: italic">Đang cập nhật thông tin...</p>
        @endif
        <div class="paging-news">
            {!! $listNews->render() !!}
        </div>
    </div>
@stop
