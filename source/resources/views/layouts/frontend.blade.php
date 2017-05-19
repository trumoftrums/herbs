<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hoang Sang Group</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="{{ url('assets/frontend/images/logo-not.png')}}" sizes="32x32" />
    {!! HTML::script('assets/frontend/js/jquery.min.js') !!}
    {!! HTML::script('assets/frontend/js/bootstrap.min.js') !!}
    {!! HTML::style('assets/frontend/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/frontend/css/style_hsg.css?version=1.0') !!}
    {!! HTML::style('assets/frontend/css/media_screen.css') !!}
    <script>
        window.intercomSettings = {
            app_id: "sulvmxck"
        };
    </script>
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/sulvmxck';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>

</head>
<body>
<div class="container-fluid">
    @include('frontend.header-mobile')
    @include('frontend.sidebar')
    <div class="content-right">
        @yield('content')
        @include('frontend.footer')
    </div>
</div>
<script type="text/javascript">
    (function ($) {
        $(function () {
            $("#nav .has-child").click(
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
            $(".li-question").click(
                function () {
                    $(this).next('li').children('div').toggle('fast');
                    if (!$(this).children('p').hasClass('act')) {
                        $(this).children('p').addClass('act');
                        $(this).children('p').css("background", "url({{ url('assets/frontend/images/icon-arrow-down.png')}}) no-repeat 98% 50% #fff")
                    } else {
                        $(this).children('p').removeClass('act');
                        $(this).children('p').css("background", "url({{ url('assets/frontend/images/icon-arrow-right.png')}}) no-repeat 98% 50% #fff")
                    }

                    return false;
                });
            $( ".item-news" ).hover(function() {
                $( this ).children(":first").fadeIn('fast');
            }, function(){
                $(this).children(":first").fadeOut('fast');
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
    })(jQuery);
</script>
</body>
</html>