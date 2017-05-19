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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ ĐẦU TƯ
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">DANH SÁCH HỢP ĐỒNG ĐẦU TƯ</span>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
    <div class="col-md-3">
        <b style="color:#056839">Search Theo Ngày</b>
        <div class="input-group custom-search-form">
            <input type="text" class="form-control datepicker" name="search" value="{{ Input::get('search') }}" placeholder="Chọn ngày...">
            <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="search-users-btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                @if (Input::has('search') && Input::get('search') != '')
                    {{--<a href="{{ route('interest.list-hop-dong-dau-tu') }}" class="btn btn-success" type="button" >
                        <span class="glyphicon glyphicon-cloud-download"> Download</span>
                    </a>--}}
                    <a href="{{ route('interest.list-hop-dong-dau-tu') }}" class="btn btn-danger" type="button" >
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                @endif
                </span>
        </div>
    </div>
        <div class="col-md-3"></div>
    <div class="col-md-2">
        <b style="color:#056839">Gói Đầu Tư</b>
        <select id="goi-dau-tu" class="form-control" name="goi_dau_tu">
            <option value="All" @if($idGoiDauTuCurr == 'All') selected @endif>-- Tất cả --</option>
            @foreach($listTypeInvest as $item)
                <option value="{{$item->id}}" @if($idGoiDauTuCurr == $item->id) selected @endif >{{$item->typeName}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <b style="color:#056839">Nhà Đầu Tư</b>
        <select id="nha-dau-tu" class="form-control" name="nha_dau_tu">
            <option value="All" @if($idUserCurr == 'All') selected @endif>-- Tất cả --</option>
            @foreach($listUser as $item)
                <option value="{{$item->id}}" @if($idUserCurr == $item->id) selected @endif >{{$item->username}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <b style="color:#056839">Trạng Thái</b>
        <select id="status" class="form-control" name="status">
            <option value="All" @if($statusCurr == 'All') selected @endif>-- Tất cả --</option>
            <option value="NE" @if($statusCurr == 'NE') selected @endif >New</option>
            <option value="AC" @if($statusCurr == 'AC') selected @endif >Active</option>
            <option value="IA" @if($statusCurr == 'IA') selected @endif>Inactive</option>
            <option value="AC" @if($statusCurr == 'RF') selected @endif >Y/C hoàn vốn</option>
            <option value="IA" @if($statusCurr == 'CO') selected @endif>Đã hoàn vốn</option>
            <option value="DE" @if($statusCurr == 'DE') selected @endif>Deleted</option>
        </select>
    </div>
    </form>
</div>

<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
            <th>NHÀ ĐẦU TƯ</th>
            <th>GÓI ĐẦU TƯ</th>
            <th>SỐ TIỀN</th>
            <th>LÃI SUẤT</th>
            <th>NG TẠO</th>
            <th>NG KÍCH HOẠT</th>
            <th>NG KẾT THÚC</th>
            <th>CÁCH NHẬN LÃI</th>
            <th>TRẠNG THÁI</th>
            <th class="text-center">ACTION</th>
        </thead>
        <tbody>
            @if (count($listHopDong))
                @foreach ($listHopDong as $hd)
                    <tr>
                        <td>{{ $hd->username }}</td>
                        <td>{{ $hd->typeName}}</td>
                        <td>{{ $hd->money}}</td>
                        <td>{{ $hd->interest }} %</td>
                        <td>{{ $hd->estStartDate}}</td>
                        <td>{{ $hd->actStartDate}}</td>
                        <td>{{ $hd->actEndDate}}</td>
                        <td>{{ $hd->interestMethod}}</td>
                        <td>
                            @if($hd->status == 'AC') <button type="button" class="btn btn-success btnOwn">Active</button>
                            @elseif($hd->status == 'NE') <button type="button" class="btn btn-info btnOwn">New</button>
                            @elseif($hd->status == 'IA') <button type="button" class="btn btn-warning btnOwn">Inactive</button>
                            @elseif($hd->status == 'RF') <button type="button" class="btn btn-warning btnOwn">Yêu cầu hoàn vốn</button>
                            @elseif($hd->status == 'CO') <button type="button" class="btn btn-warning btnOwn">Đã hoàn vốn</button>
                            @elseif($hd->status == 'DE') <button type="button" class="btn btn-danger btnOwn">Delete</button> @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('interest.hop-dong-dau-tu.update', $hd->id) }}" class="btn btn-success btn-circle edit" title="Active"
                               data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-ok-sign"></i>
                            </a>
                            <a href="{{ route('interest.hop-dong-dau-tu.edit', $hd->id) }}" class="btn btn-primary btn-circle edit" title="Edit"
                                    data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="{{ route('manage-interest.documents.list', $hd->id) }}" class="btn btn-success btn-circle edit" title="Attachments"
                               data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>

                            <a href="{{ route('interest.hop-dong-dau-tu.delete', $hd->id) }}" class="btn btn-danger btn-circle" title="Delete"
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

    {!! $listHopDong->render() !!}
</div>
<script>
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
</script>
@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
        $("#goi-dau-tu").change(function () {
            $("#users-form").submit();
        });
        $("#nha-dau-tu").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
