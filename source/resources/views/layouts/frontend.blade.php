<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page-title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/assets/frontend/images/not-slogan.png" />
    {{ HTML::style('/assets/frontend/css/bootstrap.min.css') }}
    {{ HTML::style('/assets/frontend/css/style_herbs.css') }}
    {{ HTML::style('/assets/frontend/css/media_screen.css') }}
    {{ HTML::script('/assets/frontend/js/jquery.min.js', array('type' => 'text/javascript')) }}
    {{ HTML::script('/assets/frontend/js/bootstrap.min.js', array('type' => 'text/javascript')) }}
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
<div class="container-fluid">
    {{ HTML::image('assets/frontend/images/bg-all.png', '', array('class' => 'bg-all')) }}
    @include('frontend.header')

    @yield('content')
    @include('frontend.footer')
</div>
<script type="text/javascript">
    $('#home-slider').on('slide.bs.carousel', function (e) {

        var slideFrom = $(this).find('.active').index();
        var slideTo = $(e.relatedTarget).index();

        $('.list-group-item').eq(slideFrom).removeClass('active');
        $('.list-group-item').eq(slideTo).addClass('active');

    });
</script>
<script>
    jQuery(document).ready(function() {

        jQuery('.carousel[data-type="multi"] .item').each(function(){
            var next = jQuery(this).next();
            if (!next.length) {
                next = jQuery(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo(jQuery(this));

            for (var i=0;i<2;i++) {
                next=next.next();
                if (!next.length) {
                    next = jQuery(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });

    });
</script>
</body>
</html>