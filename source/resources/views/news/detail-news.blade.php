@extends('layouts.app')

@section('page-title', 'Tin tức')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                TIN TỨC
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            </h1>
        </div>
    </div>

<div class="row">
    <div class="kien-thuc-tai-chinh">
        <h1 class="h1-title-news-user">{{$news->title}}</h1>
        <span class="date-news">Đăng bởi Trung Tran - {{date_format(date_create($news->created_at),"d/m/Y")}}</span>
        <?php echo $news->description; ?>
    </div>
</div>
@stop

