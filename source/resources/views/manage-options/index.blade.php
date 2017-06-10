@extends('layouts.app')
<?php
$title = "QUản lý thông tin";
?>
@section('page-title',$title)

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ THÔNG TIN

        </h1>
    </div>
</div>

    @include('partials.messages')
    {!! Form::open(['route' => ['options.update'], 'method' => 'PUT', 'id' => 'news-form','enctype' => 'multipart/form-data']) !!}

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="description">Giới thiệu</label>
                        <textarea name="gioi-thieu" class="form-control ckeditor">{{json_decode($data['gioi-thieu']['value'],true)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Lịch sử hình thành</label>
                        <textarea name="lich-su-hinh-thanh" class="form-control ckeditor">{{json_decode($data['lich-su-hinh-thanh']['value'],true)}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="thong-tin-cong-ty">Thông tin công ty</label>
                        <textarea name="thong-tin-cong-ty" class="form-control ckeditor">{{json_decode($data['thong-tin-cong-ty']['value'],true)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="hinh-anh-hoat-dong">Hình ảnh hoạt động</label>
                        <input type="hidden" name="hinh-anh-hoat-dong" id="filesIMG" value=''/>
                        <div id="fileuploader" name="hinh-anh-hoat-dong">Upload</div>
                    </div>

                    <script>
                        $(document).ready(function()
                        {
                            var IMGs = [];
                            $("#fileuploader").uploadFile({
                                url:"{{route('uploadsmng.upload')}}",
                                fileName:"myfile",
                                dragDrop: true,
                                returnType: "json",
                                showDelete: true,
                                acceptFiles:"image/*",
                                showPreview:true,
                                previewHeight: "100px",
                                previewWidth: "100px",
                                deleteCallback: function (data, pd) {
                                    for (var i = 0; i < data.length; i++) {
                                        $.post("{{route('uploadsmng.delete')}}", {op: "delete",name: data[i]},
                                            function (resp,textStatus, jqXHR) {
                                                var vl = $("#filesIMG").val();
                                                vl = vl.replace(resp,"");
                                                $("#filesIMG").val(vl);
                                            });
                                    }
                                    pd.statusbar.hide(); //You choice.

                                },
                                onSuccess:function(files,data,xhr,pd)
                                {

                                    $("#filesIMG").val($("#filesIMG").val()+JSON.stringify(data));

                                },
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block bt-hsg">
                <i class="fa fa-save"></i>
                Tạo Mới
            </button>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
    {!! HTML::style('assets/css/uploadfile.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/ckeditor/ckeditor.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}

    {!! HTML::script('assets/js/jquery.uploadfile.min.js') !!}


@stop