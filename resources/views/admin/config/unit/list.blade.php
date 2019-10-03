@extends('admin.layout.index')
@section('title','List Unit')
@section('content')
<ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#add">Add</a></li>
    <li class="active"><a data-toggle="tab" href="#list">List</a></li>
</ul>


<div class="row">
    <!--hien thi thanh cong-->
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
</div>

<div class="tab-content">
    <div class="row tab-pane fade" id="add">
        <div class="col-sm-6">
            <div class="white-box">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Add</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <textarea name="remark" id="remark" cols="30" class="form-control"
                            rows="10">{{ old('remark') }}</textarea>
                        <span class="text-danger">{{ $errors->first('remark') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <form>
            </div>
        </div>
    </div>

    <div class="row tab-pane fade in active" id="list">
        <div class="col-sm-9">
            <div class="white-box">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach(@$unit as $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{!! $value->remark !!}</td>
                                <td>
                                    <a href="{{ route('admin.unit.edit', ['id'=>$value->id])}}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="{{ route('admin.unit.delete', ['id'=>$value->id])}}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete ?')"> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection