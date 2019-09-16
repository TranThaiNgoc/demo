@extends('admin.layout.index')
@section('title','BU - Info')
@section('content')
<div class="row">
    @if(session('success'))
    <div class="col-lg-9 alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="col-lg-9 alert alert-danger" id="success-danger">
        <button type="button" class="close" data-dismiss="danger">x</button>
        {{ session('error') }}
    </div>
    @endif
</div>
<div class="tab-content">
    <div class="row tab-pane fade in active" id="info">
        <div class="col-sm-9">
            <div class="white-box">
                <div class="form-horizontal">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Name</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name" value="{{ $bu->name }}">
                            </div>

                            <label class="col-sm-1 control-label">Code</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="code" value="{{ $bu->code }}">
                            </div>

                            <label class="col-sm-1 control-label">Category</label>
                            <div class="col-sm-3">
                                <select name="bucategory_id" class="form-control">
                                    @foreach(@$bucategory as $value)
                                    <option {{ ($value->id == $bu->bucategory_id) ? 'selected' : '' }}
                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Address</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="address" value="{{ $bu->address }}">
                            </div>

                            <label class="col-sm-1 control-label">Tax</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="tax" value="{{ $bu->tax }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Follow</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="follow" value="{{ $bu->follow }}">
                            </div>

                            <label class="col-sm-1 control-label">Email</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="email" name="mail" value="{{ $bu->mail }}">
                            </div>

                            <label class="col-sm-1 control-label">Phone</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="phone" value="{{ $bu->phone }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Remark</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" type="text" name="remark">{{ $bu->remark }}</textarea>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <table>
                                    <td><button type="submit" class="btn btn-info" id="myWish">Save</button>
                                    </td>
                                </table>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection