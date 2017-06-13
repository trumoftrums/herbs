<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('assets/img/icons/logo-not.png') }}" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ url('assets/img/icons/logo-not.png') }}" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/logo-not.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ url('assets/img/icons/logo-not.png') }}" sizes="16x16" />
    <meta name="application-name" content="{{ settings('app_name') }}"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="{{ url('assets/img/icons/logo-not.png') }}" />
    <script>
        window.intercomSettings = {
            app_id: "sulvmxck"
        };
    </script>
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/sulvmxck';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>
    {{-- For production, it is recommended to combine following styles into one. --}}
    {!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}

    {!! HTML::style('assets/css/bootstrap.min.css') !!}
    {!! HTML::style('assets/css/font-awesome.min.css') !!}
    {!! HTML::style('assets/css/metisMenu.css') !!}
    {!! HTML::style('assets/css/sweetalert.css') !!}
    {!! HTML::style('assets/css/bootstrap-social.css') !!}
    {!! HTML::style('assets/css/app.css') !!}


    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('dashboard') }}" style="padding: 7px 0 0 0;">
                    <img src="{{ url('assets/img/logo-admin.png') }}" height="40" alt="{{ settings('app_name') }}">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse">
                <a href="#" id="sidebar-toggle" class="btn">
                    <i class="navbar-icon fa fa-bars icon"></i>
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                            <img alt="image" class="img-circle avatar" src="{{ Auth::user()->present()->avatar }}">
                            {{ Auth::user()->present()->name }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="fa fa-user"></i>
                                    Trang cá nhân
                                </a>
                            </li>
                            @if (config('session.driver') == 'database')
                                <li>
                                    <a href="{{ route('profile.sessions') }}">
                                        <i class="fa fa-list"></i>
                                        Phiên làm việc
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('auth.logout') }}">
                                    <i class="fa fa-sign-out"></i>
                                    Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @include('partials.sidebar')

    <div id="page-wrapper">
        <div class="container-fluid">
            @yield('content')
            <div class="footer">
                <div class="left">
                    <p><b>GREENHERBSJSC.COM Bản quyền @2013 Greenherbsjsc </b></p>
                    <p>Địa chỉ: 05, Einstein, P. Bình Thọ, Q. Thủ Đức, Tp.HCM</p>
                    <p>Hotline: 19009220 - Email: cskh@greenherbsjsc.com</p>
                </div>

            </div>
        </div>
    </div>

    {{-- For production, it is recommended to combine following scripts into one. --}}
    {{--{!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}--}}
    {!! HTML::script('assets/js/bootstrap.min.js') !!}
    {!! HTML::script('assets/js/metisMenu.min.js') !!}
    {!! HTML::script('assets/js/sweetalert.min.js') !!}
    {!! HTML::script('assets/js/delete.handler.js') !!}
    {!! HTML::script('assets/plugins/js-cookie/js.cookie.js') !!}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
    {!! HTML::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! HTML::script('assets/js/as/app.js') !!}
    @yield('scripts')
</body>
</html>
