@extends('admin.layout.index')
@section('title','Add Bu - Category')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">BU
                    <small>Info</small>
                </h1>
            </div>
            <!--hien thi thanh cong-->
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
            <!-- /.col-lg-12 -->
            <div class="col-sm-9">
                <div class="white-box">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Name</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="{{ $bu->name }}" name="name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Code</label>
                            <div class="col-sm-3">
                                <input class="form-control" value="{{ $bu->code }}" type="text" name="code">
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Category</label>
                            <div class="col-sm-3">
                                <select name="bucategory_id" class="form-control">
                                    @foreach(@$bucategory as $value)
                                    <option {{ ($bu->bucategory_id == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('bucategory_id') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Address</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" value="{{ $bu->address }}" name="address">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Tax</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="{{ $bu->tax }}" name="tax">
                                <span class="text-danger">{{ $errors->first('tax') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Follow</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="{{ $bu->follow }}" name="follow">
                                <span class="text-danger">{{ $errors->first('follow') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Email</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="email" value="{{ $bu->mail }}" name="mail">
                                <span class="text-danger">{{ $errors->first('mail') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Phone</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" value="{{ $bu->phone }}" name="phone">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Remark</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" type="text" name="remark">{{ $bu->remark }}</textarea>
                                <span class="text-danger">{{ $errors->first('remark') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection