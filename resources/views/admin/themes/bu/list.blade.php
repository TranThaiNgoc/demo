@extends('admin.layout.index')
@section('title','List Bu')
@section('content')

<!-- /row -->
<ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#add">Add</a></li>
    <li class="active"><a data-toggle="tab" href="#list">List</a></li>
</ul>

<div class="row">
    @if(session('info'))
    <div class="col-12 alert alert-warning">
        {{ session('info') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="col-12 alert alert-danger">
        @foreach($errors->all() as $err)
        {{ $err }}<br>
        @endforeach
    </div>
    @endif
</div>

<div class="tab-content">
    <div class="row tab-pane fade" id="add">
        <div class="col-sm-9">
            <div class="white-box">
                <div>
                    <form class="form-horizontal" action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Name</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <label class="col-sm-1 control-label">Code</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="code">
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            </div>
                            <label class="col-sm-1 control-label">Category</label>
                            <div class="col-sm-3">
                                <select name="bucategory_id" class="form-control">
                                    @foreach(@$bucategory as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('bucategory_id') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Address</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="address">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>
                            <label class="col-sm-1 control-label">Tax</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="tax">
                                <span class="text-danger">{{ $errors->first('tax') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Follow</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="follow">
                                <span class="text-danger">{{ $errors->first('follow') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Email</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="email" name="mail">
                                <span class="text-danger">{{ $errors->first('mail') }}</span>
                            </div>
                            <label class="col-sm-1 control-label">Phone</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="phone">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Remark</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" type="text" name="remark"></textarea>
                                <span class="text-danger">{{ $errors->first('remark') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-md-offset-10">
                                <button type="submit" class="btn btn-info btn-block">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab-pane fade in active" id="list">
        <div class="col-sm-12">
            @foreach($bu as $b)

            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title" style="text-align: center;">{{$b->name}}</h3>
                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Produce</label>
                        <div class="col-sm-6">
                            <h3 class="text-right"><span class="counter text-success">{{ count($b->produce) }}</span></h3>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-6 col-form-label">Produce Line</label>
                        <div class="col-sm-6">
                            <h3 class="text-right"><span class="counter text-success">{{ count($b->proline) }}</span></h3>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Remark</label>
                        <div class="col-sm-10">
                            {{$b->remark}}
                        </div>
                    </div>

                    <div class="form-group row text-center">
                        <a class="btn btn-warning" href="{{ route('bu.edit', ['id'=>$b->id]) }}">Info</a>
                        <a class="btn btn-danger" href="{{ route('bu.delete', ['id'=>$b->id]) }}">Delete</a>
                        <a class="btn btn-info" href="{{ route('bu.detail', ['id'=>$b->id]) }}">Detail</a>
                        <a class="btn btn-info" href="{{ route('bu.chart',['id'=>$b->id]) }}">Report</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /.row -->
@endsection