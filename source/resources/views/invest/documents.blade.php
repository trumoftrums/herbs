@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')
    <style>
        .btnOwn {
            padding: 0px 3px;
            font-size: 12px;
            cursor: auto;
        }
        .att-item{
            width: 100px;
            height: 100px;
            float: left; margin: 5px;
            border: 1px solid #0a6b3d;
        }

    </style>
    {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >--}}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ĐẦU TƯ VÀO HSG
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">DANH SÁCH TÀI LIỆU CỦA HỢP ĐỒNG ĐẦU TƯ {{$invest['investCode']}}</span>
            </h1>
        </div>
    </div>

    @include('partials.messages')

    <div class="table-responsive top-border-table" id="users-table-wrapper">
        <table class="table">
            <thead>
            <th>STT</th>
            <th>Tên tài liệu</th>
            <th>Loại tài liệu</th>
            <th>Loại file</th>
            <th>Ngày upload</th>

            <th class="text-center"></th>
            </thead>
            <tbody>
            <?php if (count($listDocs)){
            $i = 0;
            foreach ($listDocs as $doc){?>

            <tr>
                <td>{{ ++$i}}</td>
                <td><a href="/{{ $doc['filepath'] }}" target="_blank" title="Click to view"> {{ $doc['filename']}} </a></td>
                <td>{{ $doc['type']}}</td>
                <td></td>
                <td>{{ $doc['updated_at']}}</td>

                <td class="text-center">
                    <a href="/{{$doc['filepath']}}" class="btn btn-success btn-circle download" target="_blank" title="Click to Download"
                       data-toggle="tooltip" data-placement="top">
                        <i class="glyphicon glyphicon-download"></i>
                    </a>

                </td>
            </tr>
            <?php }}else{?>
            <tr>
                <td colspan="6"><em>Chưa có dữ liệu.</em></td>
            </tr>

            <?php }?>
            </tbody>
        </table>
    </div>
@stop

@section('scripts')
    <script type="application/javascript">

    </script>
@stop
