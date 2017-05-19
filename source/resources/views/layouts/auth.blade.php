<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title') | {{ settings('app_name') }}</title>

    {!! HTML::style("assets/css/bootstrap.min.css") !!}
    {!! HTML::style("assets/css/font-awesome.min.css") !!}
    {!! HTML::style("assets/css/app.css") !!}
    {!! HTML::style("assets/css/bootstrap-social.css") !!}

    @yield('header-scripts')
    <script>
        window.intercomSettings = {
            app_id: "sulvmxck"
        };
    </script>
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/sulvmxck';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>

</head>
<body class="auth">

    <div class="container">

        @yield('content')

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>@lang('app.copyright') © - {{ settings('app_name') }} {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    {!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}
    {!! HTML::script('assets/js/bootstrap.min.js') !!}
    {!! HTML::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! HTML::script('assets/js/as/app.js') !!}
    {!! HTML::script('assets/js/as/btn.js') !!}

    @yield('scripts')
</body>
</html>
