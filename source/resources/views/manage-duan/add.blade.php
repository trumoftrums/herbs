@extends('layouts.app')
<?php
$title = "THÊM DƯỢC LIỆU";
if($edit){
    $title = "SỬA DƯỢC LIỆU";
}
?>
@section('page-title',$title)

@section('content')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            QUẢN LÝ DỰ ÁN
            <img class="icon-bread" src="{{ url('assets/img/icon-next.png') }}"/>
            <span class="sp-bread">{{$title}}</span>
        </h1>
    </div>
</div>
    <style>
        .admin-dict-slide-Item{
            width: 100%;
            text-align: left;
            min-height: 50px;
        }
        .admin-dict-slide-Item input{
            width: 33%;
            float: left;
            margin-top: 80px;
        }
        .admin-dict-slide-Item img{
            margin-left: 20px;
            margin-top: 20px;
        }

    </style>

    @include('partials.messages')
    @if ($edit)
        {!! Form::open(['route' => ['duanadmin.update', $dict['id']], 'method' => 'PUT', 'id' => 'news-form','enctype' => 'multipart/form-data']) !!}
    @else
        {!! Form::open(['route' => 'duanadmin.add','method' => 'POST', 'id' => 'news-form', 'enctype' => 'multipart/form-data']) !!}
    @endif
    {{--<form enctype="multipart/form-data" method="post" action="{{ route('dictadmin.add') }}" >--}}
    {{--<input type="hidden" value="{{csrf_token()}}" name="_token">--}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Tên Dự Án</label>
                        <input type="text" class="form-control" name="tenDuAn" placeholder="Tên Dự Án" value="{{ $edit ? $dict['tenDuAn'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea name="moTa" rows="5"  class="form-control">{{ $edit ? $dict['moTa'] : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Khoa Học</label>
                        <input type="text" class="form-control" name="tenKhoaHoc" placeholder="Tên Khoa Học" value="{{ $edit ? $dict['tenKhoaHoc'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Thời gian triển khai</label>
                        <input type="text" class="form-control" name="thoiGianTrienKhai" placeholder="Thởi gian triển khai" value="{{ $edit ? $dict['thoiGianTrienKhai'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Dự kiến hoàn thành</label>
                        <input type="text" class="form-control" name="duKienHoanThanh" placeholder="Dự kiến hoàn thành" value="{{ $edit ? $dict['duKienHoanThanh'] : '' }}">
                    </div>

                    <div class="form-group">
                        <label for="name">Thành phần hóa học</label>
                        <input type="text" class="form-control" name="thanhPhanHoaHoc" placeholder="Thành phần hóa học" value="{{ $edit ? $dict['thanhPhanHoaHoc'] : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Tác dụng</label>
                        <textarea type="text" class="form-control ckeditor" name="tacDung">{{ $edit ? $dict['tacDung'] : '' }}</textarea>
                    </div>
                    <?php
                    if(!empty($dict['slideIMGs'])){
                        $IMGs = json_decode($dict['slideIMGs'],true);
                        //$IMGs = json_decode($IMGs,true);

                    }
                    ?>
                    <div class="form-group">
                        <label for="display_name">Slide hình ảnh</label>
                        <div class="admin-dict-slide-Item">

                            <input type="file" class="form-control fileIMG" id="slideIMG_1" name="slideIMG1">

                            <img alt="Preview hình ảnh 1" src="<?php if($edit && !empty($IMGs[0])) echo  url($IMGs[0]); ?>" id="slideIMG1" width="150" height="150"/>

                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="file" class="form-control fileIMG"  id="slideIMG_2" name="slideIMG2">
                            <img  alt="Preview hình ảnh 2" src="<?php if($edit && !empty($IMGs[1])) echo  url($IMGs[1]); ?>" id="slideIMG2" width="150" height="150"/>
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="file" class="form-control fileIMG"  id="slideIMG_3" name="slideIMG3">
                            <img  alt="Preview hình ảnh 3" src="<?php if($edit && !empty($IMGs[2])) echo  url($IMGs[2]); ?>" id="slideIMG3" width="150" height="150"/>
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="file" class="form-control fileIMG"  id="slideIMG_4" name="slideIMG4">
                            <img  alt="Preview hình ảnh 4" src="<?php if($edit && !empty($IMGs[3])) echo  url($IMGs[3]); ?>" id="slideIMG4" width="150" height="150"/>
                        </div>
                        <div class="admin-dict-slide-Item">

                            <input type="file" class="form-control fileIMG"  id="slideIMG_5" name="slideIMG5">
                            <img  alt="Preview hình ảnh 5" src="<?php if($edit && !empty($IMGs[4])) echo  url($IMGs[4]); ?>" id="slideIMG5" width="150" height="150"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block bt-hsg">
                <i class="fa fa-save"></i>
                {{ $edit ? "Cập Nhật" : "Tạo Mới" }}
            </button>
        </div>
    </div>
    {{--</form>--}}
    {!! Form::close() !!}
    <script type="application/javascript" >

        function readURL(input,idIMG) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+idIMG).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fileThumb").change(function(){
            readURL(this,"thumb");
        });
        $("#fileThumbDetail").change(function(){
            readURL(this,"thumb_detail");
        });
        $(".fileIMG").change(function(){
            var id = $(this).attr("name");
            readURL(this,id);
        });
    </script>
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/ckeditor/ckeditor.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\NewsRequestEdit', '#news-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Invest\NewsRequest', '#news-form') !!}
    @endif

@stop