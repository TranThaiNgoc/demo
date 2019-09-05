@extends('admin.layout.index')
@section('title','Danh sách thể loại')
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
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên thể loại</th>
                        <th>Thời gian</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($categories as $category)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ date('d-m-Y',strtotime($category->created_at)) }}</td>
                        <td class="center"><i class="fas fa-edit"></i><a href="{{ route('admin.categories.edit', ['id'=>$category->id])}}"> Sửa</a></td>
                        <td class="center"><i class="fas fa-trash-alt"></i> <a href="{{ route('admin.categories.delete', ['id'=>$category->id])}}" onclick="return confirm('Bạn muốn xóa thể loại này ?')">Xóa</a></td>
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