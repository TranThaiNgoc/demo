@extends('admin.layout.index')
@section('title','User')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Thêm</small>
                </h1>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{$err}}<br>
                @endforeach
            </div>
            @endif
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
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group">
                    	<label>Tên thành viên</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên thành viên">
                    </div>
                    <div class="form-group">
                    	<label>Địa chỉ email</label>
                    	<input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="nhập email">
                    </div>
                    <div class="form-group">
                    	<label>Số điện thoại</label>
                    	<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="nhập số điên thoại">
                    </div>
                    <div class="form-group">
                    	<label>Địa chỉ</label>
                    	<input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="nhập địa chỉ">
                    </div>
                    <div class="form-group">
                    	<label>Mật khẩu</label>
                    	<input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="nhập số mật khẩu">
                    </div>
                    <div class="form-group">
                        <label>Quyền truy cập</label>
                        <div style="margin:5px 0;">
                            @foreach(config('master_admin.quyen') as $key => $value)
                            <input class="form-group" type="checkbox" name="roles[]" value="{{ $key }}" id="role_{{ $value }}">
                            <label for="role_{!! $key !!}">{{ $value }}</label>
                            <br>
                            @endforeach
                        </div>
                    </div>

					<button type="submit" class="btn btn-primary">Thêm thành viên</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop