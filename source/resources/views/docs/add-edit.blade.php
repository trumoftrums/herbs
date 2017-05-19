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
    form{
        text-align: left;
        width: 100%;
    }
    .form-row{
        margin-top: 5px;
    }
    .form-control-doc {
        display: block;
        /* width: 100%; */
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;

        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    #imgThumbnail img{
        border: 1px solid #1D8967;
    }
</style>
{{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" >--}}
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ TÀI LIỆU
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">THÊM TÀI LIỆU MỚI</span>

        </h1>
    </div>
</div>

@include('partials.messages')

<div class="cover-invest-admin1" >
<form action="" id="formDoc" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <?php if(isset($idDoc)){ ?>
    <input type="hidden" name="id" value="{{$idDoc}}" />
    <?php }?>
    <div class="form-row">
        <b style="color:#056839">Chi nhánh</b>
        <select id="idBranch" class="form-control-doc" name="idBranch">
            <option value="" >-- Chọn chi nhánh --</option>
            @foreach($listBranch as $item)
                <option value="{{$item->id}}"  @if(isset($data['idBranch']) && $data['idBranch'] == $item->id) selected @endif  >{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-row">
        <b style="color:#056839">Dự án</b>
        <select id="idProject" class="form-control-doc" name="idProject">
            <option value="">-- Chọn dự án --</option>

        </select>
    </div>
    <div class="form-row">
        <b style="color:#056839">Loại hình đại diện </b>
        <select id="thumbnail" class="form-control-doc" name="thumbnail">
            <option value="">-- Chọn hình đại diện --</option>
            @foreach($listIcon as $item)
                <option value="{{$item['thumbnail']}}"  @if(isset($data['thumbnail']) && $data['thumbnail'] == $item['thumbnail']) selected @endif  >{{$item['fileType']}}</option>
            @endforeach
        </select>
        <div id="imgThumbnail"></div>

    </div>
    <div class="form-row">
        <b style="color:#056839">Tên tài liệu</b>
        <input type="text" class="form-control-doc"  value="<?php if(isset($data['nameFile'])) echo $data['nameFile']; ?>" id="nameFile" name="nameFile" />
    </div>
    <?php if(isset($data['image'])) { ?>
    <div class="form-row">
        <b style="color:#056839">File tài liệu đang sử dụng </b>
        <a  class="form-control-doc" target="_blank" href="/{{$data['image']}}"  >{{$data['nameFile']}}</a>
    </div>
    <?php }?>
    <div class="form-row">
        <b style="color:#056839">Upload file tài liệu <?php if(isset($data['image'])) echo 'mới'; ?></b>
        <input class="form-control-doc" type="file" name="fileDoc" value=""  />
    </div>
    <div class="form-row">

        <input  type="submit"   class=" btn btn-success" value="Lưu"/>
    </div>


</form>
</div>
@stop

@section('scripts')
    <script type="application/javascript">
        $("#formDoc").submit(function (event) {
            var branch = $("#idBranch").val();
            var prj = $("#idProject").val();
            var nameFile = $("#nameFile").val();

            if(nameFile =="" || branch =="" || prj==""){
                alert("Vui lòng chọn điền đầy dủ thông tin bắt buộc");
                event.preventDefault();
            }

        });

        $( document ).ready(function() {
            getProjects(true);
        });
        $("#idBranch").change(function () {
            getProjects(false);

        });
        $("#thumbnail").change(function () {
            var vl = $("#thumbnail").val();
            if(vl ==""){
                $("#imgThumbnail").html('');
            }else{
                $("#imgThumbnail").html('<img src="/'+vl+'" />');
            }


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
                        <?php if(isset($data['idProject']) && !empty($data['idProject'])){?>
                        if(isFirst){
                            $("#idProject").val("{{$data['idProject']}}");
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
