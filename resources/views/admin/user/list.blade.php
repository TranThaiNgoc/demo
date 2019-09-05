@extends('admin.layout.index')
@section('title','User')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách thể loại
                </h1>
            </div>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
			@foreach($errors->all() as $err)
				{{$err}}<br>
			@endforeach
			</div>
            @endif
            @if(session('thongbao'))
			<div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
            @if(session('thongbaoloi'))
			<div class="alert alert-danger">
				{{ session('thongbaoloi') }}
			</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th width="10%">Tên thành viên</th>
                        <th width="10%">Địa chỉ email</th>
                        <th width="10%">Thời gian</th>
                        <th width="10%">Sửa</th>
                        <th width="10%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($users as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ date('d-m-Y', strtotime($user->updated_at)) }}</td>
                        <td class="center"><i class="fas fa-edit"></i><a href="{{ route('admin.user.edit', ['id'=>$user->id])}}"> Sửa</a></td>
                        <td class="center"><i class="fas fa-trash-alt"></i> <a href="{{ route('admin.user.delete', ['id'=>$user->id])}}" onclick="return confirm('Bạn muốn xóa thành viên này ?')">Xóa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop