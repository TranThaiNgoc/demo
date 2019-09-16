@extends('admin.layout.index')
@section('title','Update Status')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="white-box">
            <div>
            <!--hien thi thanh cong-->
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <!-- /.col-lg-12 -->
                <form action="" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group">
                        <label>Add</label>
                        <input type="text" class="form-control" name="name" value="{{ $status->name }}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <textarea name="remark" id="remark" cols="30" class="form-control" rows="10">{{ $status->remark }}</textarea>
                        <span class="text-danger">{{ $errors->first('remark') }}</span>
                    </div>
					<button type="submit" class="btn btn-primary">Save</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection