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
            <span class="sp-bread">LÃI SUẤT BIẾN ĐỘNG</span>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('interest.lai_bien_dong.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Tạo lãi suất biến động
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
            <th>TỪ NGÀY</th>
            <th>ĐẾN NGÀY</th>
            <th>LÃI BIẾN ĐỘNG (%)</th>
            <th>TRẠNG THÁI</th>
            <th class="text-center">ACTION</th>
        </thead>
        <tbody>
            @if (count($listLaiBienDong))
                @foreach ($listLaiBienDong as $bd)
                    <tr>
                        <td>{{ $bd->fr }}</td>
                        <td>{{ $bd->to}}</td>
                        <td>{{ $bd->interest }} %</td>
                        <td>
                            @if($bd->status == 'AC') <button type="button" class="btn btn-success btnOwn">Active</button>
                            @elseif($bd->status == 'IA') <button type="button" class="btn btn-warning btnOwn">Inactive</button>
                            @elseif($bd->status == 'DE') <button type="button" class="btn btn-danger btnOwn">Delete</button> @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('interest.lai_bien_dong.edit', $bd->id) }}" class="btn btn-primary btn-circle edit" title="Edit"
                                    data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="{{ route('interest.lai_bien_dong.delete', $bd->id) }}" class="btn btn-danger btn-circle" title="Delete"
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

    {!! $listLaiBienDong->render() !!}
</div>

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
