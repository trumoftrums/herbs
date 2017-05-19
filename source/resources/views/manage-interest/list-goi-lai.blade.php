@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')
<style>
    .btnOwn {
        padding: 0px 3px;
        font-size: 12px;
        cursor: auto;
    }

</style>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">GÓI LÃI SUẤT</span>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('interest.goi_lai.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Tạo gói lãi suất mới
        </a>
    </div>
    <div class="col-md-5"></div>
    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <select id="status" class="form-control" name="status">
                <option value="All" @if($statusCurr == 'All') selected @endif>Tất cả</option>
                <option value="AC" @if($statusCurr == 'AC') selected @endif >Active</option>
                {{--<option value="IA" @if($statusCurr == 'IA') selected @endif>Inactive</option>--}}
                <option value="DE" @if($statusCurr == 'DE') selected @endif>Deleted</option>
            </select>
        </div>
    </form>
</div>

<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
            <th>GÓI LÃI</th>
            <th>LÃI SUẤT (%)</th>
            <th>LÃI KÉP</th>
            <th>MỨC PHẠT</th>
            <th>TRẠNG THÁI</th>
            <th class="text-center">ACTION</th>
        </thead>
        <tbody>
            @if (count($listGoiLai))
                @foreach ($listGoiLai as $gl)
                    <tr>
                        <td>{{ $gl->typeName }}</td>
                        <td>{{ $gl->interest}} %</td>
                        <td>@if($gl->allowCompInterest == '1') Có @else Không @endif </td>
                        <td>
                            <ul style="padding: 0px;list-style: none">
                                <li><p style="margin-bottom: 3px"><b style="color:#056839">Mức phạt 1:</b><br> Từ tháng thứ  {{$gl->finalInvest[0]['fr']}} - đến tháng thứ {{$gl->finalInvest[0]['to']}} => Phạt {{$gl->finalInvest[0]['vl']}} %</p></li>
                                <li><p style="margin-bottom: 3px"><b style="color:#056839">Mức phạt 2:</b><br>  Từ tháng thứ  {{$gl->finalInvest[1]['fr']}} - đến tháng thứ {{$gl->finalInvest[1]['to']}} => Phạt {{$gl->finalInvest[1]['vl']}} %</p></li>
                                <li><p style="margin-bottom: 3px"><b style="color:#056839">Mức phạt 3:</b><br>  Từ tháng thứ  {{$gl->finalInvest[2]['fr']}} - đến tháng thứ {{$gl->finalInvest[2]['to']}} => Phạt {{$gl->finalInvest[2]['vl']}} %</p></li>
                            </ul>
                        </td>
                        <td>
                            @if($gl->status == 'AC') <button type="button" class="btn btn-success btnOwn">Active</button>
                            @elseif($gl->status == 'IA') <button type="button" class="btn btn-warning btnOwn">Inactive</button>
                            @elseif($gl->status == 'DE') <button type="button" class="btn btn-danger btnOwn">Delete</button> @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('interest.goi_lai.edit', $gl->id) }}" class="btn btn-primary btn-circle edit" title="Edit"
                                    data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="{{ route('interest.goi_lai.delete', $gl->id) }}" class="btn btn-danger btn-circle" title="Delete"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-method="DELETE"
                                    data-confirm-title="Xác nhận"
                                    data-confirm-text="Bạn có muốn xóa?"
                                    data-confirm-delete="Xác nhận">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><em>Chưa có dữ liệu.</em></td>
                </tr>
            @endif
        </tbody>
    </table>

    {!! $listGoiLai->render() !!}
</div>

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
