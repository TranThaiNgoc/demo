@extends('admin.layout.index')
@section('title','Update Bu - Prolinecategory')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">BU-Proline Category
                    <small>Update </small>
                </h1>
            </div>
            <!--hien thi thanh cong-->
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-lg-9" style="padding-bottom:120px">
                <form action="" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group">
                        <label>Add</label>
                        <input type="text" class="form-control" name="name" value="{{ $prolinecategory->name }}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <textarea name="remark" id="remark" cols="30" class="form-control" rows="10">{{ $prolinecategory->remark }}</textarea>
                        <span class="text-danger">{{ $errors->first('remark') }}</span>
                    </div>
					<button type="submit" class="btn btn-primary">Update Bu Proline Category</button>
					<input type="reset" class="btn btn-default" value="reset" readonly>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection