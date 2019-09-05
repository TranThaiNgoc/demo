@extends('admin.layout.index')
@section('title','Cấu hình hệ thống')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cấu hình website
                </h1>
            </div>
            <!--hien thi thanh cong-->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(session('thongbaoloi'))
                <div class="alert alert-danger">
                    {{session('thongbaoloi')}}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-9" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group">
                        <label>Logo website</label>
                        <input type="file" name="logo_website">
                        <img width="30%" src="{{ isset($configuration->logo_website) ? $configuration->logo_website : '' }}">
                        <span class="text-danger">{{ $errors->first('logo_website') }}</span>
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <span class="text-green">(1280x768)</span>
                        <input type="file" name="banner">
                        <img width="30%" src="{{ isset($configuration->banner) ? $configuration->banner : '' }}">
                        <span class="text-danger">{{ $errors->first('banner') }}</span>
                    </div>
					<button type="submit" class="btn btn-primary">Cập nhật cấu hình hệ thống</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop