@extends('layouts.app')

@section('page-title', trans('app.dashboard'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Xin chào <?= Auth::user()->username ?: Auth::user()->first_name ?>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <a href="{{ route('invest.hop_dong') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <p class="p-title-dash"></p>
                    </div>
                    <p class="lead">Hợp đồng đầu tư</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('invest.hop_dong') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <p class="p-title-dash">

                        </p>
                    </div>
                    <p class="lead">Ngày nhận lãi</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('invest.hop_dong') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <p class="p-title-dash p-title-dash-money"></p>
                    </div>
                    <p class="lead">Tổng tiền đầu tư</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('leadergroup') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-cogs fa-fw"></i>
                    </div>
                    <p class="lead">Ban lãnh đạo HSG</p>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <a href="{{ route('profile') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <p class="lead">Thông tin cá nhân</p>
                </div>
            </div>
        </a>
    </div>
    @if (config('session.driver') == 'database')
        <div class="col-md-3">
            <a href="{{ route('profile.sessions') }}" class="panel-link">
                <div class="panel panel-default dashboard-panel panel-user">
                    <div class="panel-body">
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <p class="lead">Phiên làm việc</p>
                    </div>
                </div>
            </a>
        </div>
    @endif
    <div class="col-md-3">
        <a href="{{ route('profile.activity') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-list-alt"></i>
                    </div>
                    <p class="lead">Lịch sử</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('auth.logout') }}" class="panel-link">
            <div class="panel panel-default dashboard-panel panel-user">
                <div class="panel-body">
                    <div class="icon">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <p class="lead">Đăng xuất</p>
                </div>
            </div>
        </a>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Biểu đồ</div>
            <div class="panel-body">
                <div class="cover-chart-user">
                    <div class="in-cover-div">
                        <!-- TradingView Widget BEGIN -->
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js">
                            {
                                "showChart": true,
                                "locale": "en",
                                "width": "100%",
                                "height": "700",
                                "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                                "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                                "gridLineColor": "rgba(233, 233, 234, 1)",
                                "scaleFontColor": "rgba(218, 221, 224, 1)",
                                "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                                "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                                "symbolActiveColor": "rgba(242, 250, 254, 1)",
                                "tabs": [
                                {
                                    "title": "Equities",
                                    "symbols": [
                                        {
                                            "s": "INDEX:SPX",
                                            "d": "The Standard&Poor's Index"
                                        },
                                        {
                                            "s": "INDEX:IUXX",
                                            "d": "NQ100"
                                        },
                                        {
                                            "s": "INDEX:DOWI",
                                            "d": "Dow30"
                                        },
                                        {
                                            "s": "INDEX:NKY",
                                            "d": "Nikkei 225 Index"
                                        },
                                        {
                                            "s": "NASDAQ:AAPL",
                                            "d": "APPLE INC"
                                        },
                                        {
                                            "s": "NASDAQ:GOOG",
                                            "d": "Google"
                                        }
                                    ]
                                },
                                {
                                    "title": "Commodities",
                                    "symbols": [
                                        {
                                            "s": "CME_MINI:ES1!",
                                            "d": "Emini"
                                        },
                                        {
                                            "s": "CME:E61!",
                                            "d": "Euro"
                                        },
                                        {
                                            "s": "COMEX:GC1!",
                                            "d": "Gold"
                                        },
                                        {
                                            "s": "NYMEX:CL1!",
                                            "d": "Light Crude Oil Futures"
                                        },
                                        {
                                            "s": "NYMEX:NG1!",
                                            "d": "Natural Gas Futures"
                                        },
                                        {
                                            "s": "CBOT:ZC1!",
                                            "d": "Corn Futures"
                                        }
                                    ]
                                },
                                {
                                    "title": "Bonds",
                                    "symbols": [
                                        {
                                            "s": "CME:GE1!",
                                            "d": "Eurodollar"
                                        },
                                        {
                                            "s": "CBOT:ZB1!",
                                            "d": "T-Bond"
                                        },
                                        {
                                            "s": "CBOT:UD1!",
                                            "d": "Ultra T-Bond"
                                        },
                                        {
                                            "s": "EUREX:GG1!",
                                            "d": "Euro Bund"
                                        },
                                        {
                                            "s": "EUREX:II1!",
                                            "d": "Euro BTP"
                                        },
                                        {
                                            "s": "EUREX:HR1!",
                                            "d": "Euro BOBL"
                                        }
                                    ]
                                },
                                {
                                    "title": "Forex",
                                    "symbols": [
                                        {
                                            "s": "FX:EURUSD"
                                        },
                                        {
                                            "s": "FX:GBPUSD"
                                        },
                                        {
                                            "s": "FX:USDJPY"
                                        },
                                        {
                                            "s": "FX:USDCHF"
                                        },
                                        {
                                            "s": "FX:AUDUSD"
                                        },
                                        {
                                            "s": "FX:USDCAD"
                                        }
                                    ]
                                }
                            ]
                            }
                        </script>
                        <!-- TradingView Widget END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Tin tức mới nhất</div>
            <div class="panel-body">

            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script>
        var labels = {!! json_encode(array_keys($activities)) !!};
        var activities = {!! json_encode(array_values($activities)) !!};
    </script>
    {!! HTML::script('assets/js/chart.min.js') !!}
    {!! HTML::script('assets/js/as/dashboard-default.js') !!}
@stop