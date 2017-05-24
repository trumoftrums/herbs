<!DOCTYPE html>
<html lang="en">
<head>
    <title>Herbs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="{{ url('assets/frontend/images/logo.png')}}" sizes="32x32" />
    {!! HTML::script('assets/frontend/js/jquery.min.js') !!}
    {!! HTML::script('assets/frontend/js/bootstrap.min.js') !!}
    {!! HTML::style('assets/frontend/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/frontend/css/style_herbs.css?version=1.0') !!}
    {!! HTML::style('assets/frontend/css/media_screen.css') !!}
    {!! HTML::style('assets/frontend/css/slideshow.css') !!}
    {!! HTML::style('assets/frontend/css/phanphoi.css') !!}
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
<body>
<div class="container-fluid">
    @include('frontend.header-mobile')
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
    jQuery(document).ready(function () {
        jQuery('.carousel[data-type="multi"] .item').each(function () {
            var next = jQuery(this).next();
            if (!next.length) {
                next = jQuery(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo(jQuery(this));
            for (var i = 0; i < 2; i++) {
                next = next.next();
                if (!next.length) {
                    next = jQuery(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });
        $("#nav-mobile .has-child").click(
            function () {
                $(this).next('li').children('ul').toggle('fast');
                if (!$(this).children('a').hasClass('act')) {
                    $(this).children('a').addClass('act');
                    $(this).children('a').css("background", "url({{ url('assets/frontend/images/icon-arrow-down.png')}}) #fffbce no-repeat 95% 50%")
                } else {
                    $(this).next('li').children('ul').hide();
                    $(this).children('a').removeClass('act');
                    $(this).children('a').css("background", "url({{ url('assets/frontend/images/icon-arrow-right.png')}}) #fffbce no-repeat 95% 50%")
                }
                return false;
            });

    });
</script>
</body>
</html>