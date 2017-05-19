@extends('layouts.app')

@section('page-title', trans('app.users'))

@section('content')
    <style>
        .btnOwn {
            padding: 0px 3px;
            font-size: 12px;
            cursor: auto;
        }

        .att-item {
            width: 100px;
            height: 100px;
            float: left;
            margin: 5px;
            border: 1px solid #0a6b3d;
        }
        .tab-search{
            margin-top: 20px;
        }

    </style>
    {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >--}}
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                QUẢN LÝ TÀI LIỆU
                <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
                <span class="sp-bread">DANH SÁCH TÀI LIỆU </span>
            </h1>
        </div>
    </div>
    <div class="row">
        <a href="{{ route('docs.tai-lieu.add') }}" class="btn btn-success" id="add-tai-lieu">
            <i class="glyphicon glyphicon-plus"></i>
            Thêm tài liệu
        </a>
    </div>
    @include('partials.messages')

    <div class="row tab-search">

        <form method="GET" action="" accept-charset="UTF-8" id="users-form">
            <div class="col-md-2">
                <b style="color:#056839">Chi nhánh</b>
                <select id="idBranch" class="form-control" name="idBranch">
                    <option value="all" @if($crBranch == 'all') selected @endif>-- Tất cả --</option>
                    @foreach($listBranch as $item)
                        <option value="{{$item->id}}"
                                @if($crBranch == $item->id) selected @endif >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <b style="color:#056839">Dự án</b>
                <select id="idProject" class="form-control" name="idProject">
                    <option value="all">-- Tất cả --</option>

                </select>
            </div>
            <div class="col-md-2">
                <b style="color:#056839">Trạng Thái</b>
                <select id="status" class="form-control" name="status">
                    <option value="all" @if($crStatus == 'all') selected @endif>-- Tất cả --</option>
                    <option value="AC" @if($crStatus == 'AC') selected @endif >Actived</option>
                    <option value="IA" @if($crStatus == 'IA') selected @endif>InActived</option>
                    <option value="DE" @if($crStatus == 'DE') selected @endif>Deleted</option>
                </select>
            </div>
            <div class="col-md-2">
                <b>&nbsp;</b><br>
                <input type="submit" value="Search" class="btn btn-success"/>
            </div>
        </form>
    </div>
    <div class="table-responsive top-border-table" id="users-table-wrapper">
        <table class="table">
            <thead>
            <th>STT</th>
            <th>Chi nhánh</th>
            <th>Dự án</th>
            <th>Tên tài liệu</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th class="text-center">ACTION</th>
            </thead>
            <tbody>
            <?php if (count($data)){
            $i = 0;
            foreach ($data as $doc){?>

            <tr>
                <td>{{ ++$i}}</td>
                <td>{{$doc->branchName}}</td>
                <td>{{ $doc->nameProject}}</td>
                <td>{{ $doc->nameFile}}</td>
                <td>{{ $doc->created_at}}</td>
                <td>
                    @if($doc->status == 'AC')
                        <button type="button" class="btn btn-success btnOwn">Actived</button>
                    @elseif($doc->status == 'IA')
                        <button type="button" class="btn btn-warning btnOwn">InActived</button>
                    @elseif($doc->status == 'DE')
                        <button type="button" class="btn btn-danger btnOwn">Deleted</button>

                    @endif
                </td>
                <td class="text-center">

                    <?php if(isset($doc->image)){?>

                    &nbsp;<a href="/{{$doc->image}}" target="_blank" class="btn btn-success btn-circle" title="Download"
                             data-toggle="tooltip" data-placement="top">
                        <i class="glyphicon glyphicon-download"></i>
                    </a>
                        @if($doc->status != 'DE')
                    <a href="{{ route('docs.tai-lieu.edit', $doc->id) }}" class="btn btn-success btn-circle edit" title="Sửa"
                       data-toggle="tooltip" data-placement="top" data-method="GET">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>

                    <a href="{{ route('docs.tai-lieu.delete', $doc->id) }}" class="btn btn-danger btn-circle" title="Xóa"
                       data-toggle="tooltip"
                       data-placement="top"
                       data-method="DELETE"
                       data-confirm-title="Xác nhận"
                       data-confirm-text="Bạn có muốn xóa?"
                       data-confirm-delete="Xác nhận">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>
                        @endif
                    <?php }?>

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
    <script type="application/javascript">
        $( document ).ready(function() {
            getProjects(true);
        });
        $("#idBranch").change(function () {
            getProjects(false);

        });
        function getProjects(isFirst) {
            var vl = $("#idBranch").val();
            $.ajax({
                url: "{{route('docs.get-project')}}",
                dataType: "json",
                cache: false,
                type: 'post',
                data:{idBranch: vl},
                success: function (data) {
                    $('#idProject').html("");
                    $('#idProject').append($('<option>', {
                        value: "all",
                        text: "-- Tất cả --"
                    }));
                    if(data.result){


                        for(var i=0;i<data.data.length;i++){

                            $('#idProject').append($('<option>', {
                                value: data.data[i].id,
                                text: data.data[i].nameProject
                            }));
                        }
                        <?php if(isset($crProject) && !empty($crProject)){?>
                        if(isFirst){
                            $("#idProject").val("{{$crProject}}");
                        }
                        <?php }?>


                    }
                },
                error: function () {

                }
            });
        }

    </script>
@stop


