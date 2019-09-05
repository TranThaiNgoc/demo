@extends('layouts.admin.master')
@section('title')
Business Unit
@endsection
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
                    <form class="form-horizontal" action="{{ url('config/bu/add') }}" method="post"> 
                        {{ csrf_field() }}                    
                        
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Name</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name">
                            </div>

                            <label class="col-sm-1 control-label">Code</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name">
                            </div>

                            <label class="col-sm-1 control-label">Category</label>
                            <div class="col-sm-3">
                                <select class="form-control">
                                    <option>adfasf</option>
                                    <option>afasfd</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Address</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="name">
                            </div>

                            <label class="col-sm-1 control-label">Tax</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Follow</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name">
                            </div>

                            <label class="col-sm-1 control-label">Email</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="email" name="name">
                            </div>

                            <label class="col-sm-1 control-label">Phone</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Remark</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" type="text" name="remark"></textarea>
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
                        <label class="col-sm-4 col-form-label">Don Hang</label>
                        <div class="col-sm-8">
                            <h3 class="text-right"><span class="counter text-success">7</span></h3>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Time</label>
                        <div class="col-sm-8">
                            {{$b->created_at->format('d/m/Y')}} - {{$b->updated_at->format('d/m/Y')}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Remark</label>
                        <div class="col-sm-8">
                            {{$b->remark}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <a class="btn btn-warning" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                        <a class="btn btn-info" href="bu/{{ $b->id }}/detail">Detail</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- /.row -->
@endsection


