@extends('admin.layout.index')
@section('title','User')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thành viên
                    <small>{{ $user->name }}</small>
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
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Nhập tên thành viên">
                    </div>
                    <div class="form-group">
                    	<label>Địa chỉ email</label>
                    	<input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="nhập email" disabled="">
                    </div>
                    <div class="form-group">
                    	<label>Số điện thoại</label>
                    	<input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="nhập số điên thoại">
                    </div>
                    <div class="form-group">
                    	<label>Địa chỉ</label>
                    	<input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="nhập địa chỉ">
                    </div>
                    <div class="form-group">
                    	<label>Mật khẩu mới</label>
                    	<input type="password" name="passwordre" class="form-control" placeholder="nhập mật khẩu mới">
                    </div>
                    @if(Auth::id() != $user->id)
                    <div class="form-group">
                    	<label>Quyền truy cập</label>
                    	<div style="margin:5px 0;">
							@foreach(config('master_admin.quyen') as $key => $value)
							<input class="form-group" {{ in_array($key , json_decode($user->roles)) ? 'checked="checked"' : '' }} type="checkbox" name="roles[]" value="{{ $key }}" id="role_{{ $value }}">
							<label for="role_{!! $key !!}">{{ $value }}</label>
							<br>
							@endforeach
						</div>
                    </div>
                    @endif

					<button type="submit" class="btn btn-primary">Sửa thành viên</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop