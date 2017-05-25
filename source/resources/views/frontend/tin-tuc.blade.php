@extends('layouts.frontend')

@section('page-title', 'HERBS')

@section('content')
    <img class="banner-page" src="{{ url('assets/frontend/images/banner-news.jpg')}}"/>
    <div class="news-herbs">
        <div class="herbs-left">
            <div class="cover-menu-tab">
                <div class="cover-tab-cate">
                    <ul>
                        <li><a href="{{ route('frontend.tintuc',$id_type).'?category=all'}}">TẤT CẢ</a> </li>
                        <?php if(!empty($listCat)){foreach ($listCat as $cat) { ?>
                        <li><a href="{{ route('frontend.tintuc',$id_type).'?category='.$cat['slug']}}">{{$cat['nameCategory']}}</a> </li>
                        <?php }}?>
                    </ul>
                </div>
                <div class="cover-title title-news">
                    <h3 class="title-herbs">{{$title}}</h3>
                </div>
                <div class="main-news">
                    <?php if(!empty($listPost)){ ?>
                    <img class="img-main-news" src="{{ url($listPost[0]['thumb'])}}"/>
                    <div class="cv-main-news">
                        <a href="{{route('frontend.detailNews', str_slug($listPost[0]['title'],'-').'-'.$listPost[0]['id'])}}"><h5 class="h5-title">{{$listPost[0]['title']}}</h5></a>
                        <span class="date-sp">{{$listPost[0]['created_at']}}</span>
                        <hr class="hr-line">
                        <p class="sum-p">{{$listPost[0]['summary']}}</p>
                        <a class="a-view" href="{{route('frontend.detailNews', str_slug($listPost[0]['title'],'-').'-'.$listPost[0]['id'])}}">XEM CHI TIẾT &raquo;</a>
                    </div>
                    <?php }?>
                </div>
                <div class="list-news">
                    <?php if(!empty($listPost)){for($i=1;$i<count($listPost);$i++){ $news = $listPost[$i];?>
                    <div class="it-news">
                        <img class="img-it" src="{{ url($news['thumb'])}}"/>
                        <a href="{{route('frontend.detailNews', str_slug($news['title'],'-').'-'.$news['id'])}}" class="p-it-news">{{$news['title']}}</a>
                        <span class="date-sp">{{$news['created_at']}}</span>
                        <hr class="hr-line">
                        <p class="sum-p">{{$news['summary']}}</p>
                        <a class="icon-more" href="{{route('frontend.detailNews', str_slug($news['title'],'-').'-'.$news['id'])}}"><img src="{{ url('assets/frontend/images/icon-more.png')}}"/></a>
                    </div>
                    <?php }}?>
                </div>

            </div>
            <div class="cover-page">
                <div class="pagination">
                    <?php if(!empty($listPost)) echo $listPost->links() ?>
                </div>
            </div>
        </div>
        <div class="herbs-right">
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">HOẠT ĐỘNG XÃ HỘI</h4>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
                <div class="item-bs">
                    <img src="{{ url('assets/frontend/images/img-bs-item.png')}}"/>
                    <div class="cover-right">
                        <a class="p-name-bs">Khai trương chi nhánh HERBS tại Huế</a>
                        <span class="sp-chucvu">30/04/2017</span>
                        <p class="sp-lh">Tưng bừng khai trương chi nhánh...</p>
                    </div>
                </div>
            </div>
            <div class="unit-herbs-right">
                <h4 class="h4-title-right">FANPAGE</h4>
                <div class="item-qa">
                    <div class="fb-page" data-href="https://www.facebook.com/facebook/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook/">Facebook</a></blockquote></div>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item.png')}}"/></a>
                </div>
                <div class="item-qa">
                    <a href="#"><img src="{{ url('assets/frontend/images/qa-item2.png')}}"/></a>
                </div>
            </div>
        </div>
    </div>
@stop
