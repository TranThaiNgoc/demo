@extends('admin.layout.index')
@section('title','Detail Bu')
@section('content')
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#info">Info</a></li>
    <li><a data-toggle="tab" href="#produce">Produce</a></li>
    <li><a data-toggle="tab" href="#varcost">Variable Cost</a></li>
    <li><a data-toggle="tab" href="#fixcost">Fixed Cost</a></li>
    <li><a data-toggle="tab" href="#revenue">Revenue</a></li>
    <li><a data-toggle="tab" href="#profit">Profit</a></li>
</ul>

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
                    <form action="{{ url('admin/bu/edit', ['id' => $bu->id]) }}" method="post">
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

                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <table>
                                    <td><button type="submit" class="btn btn-info" id="myWish">Save</button>
                                    </td>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="produce">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#addproduce">Add Produce</a></li>
            <li class="active"><a data-toggle="tab" href="#prolist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addproduce">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('admin/bu/add-produce', ['id' => $bu->id]) }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Name</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Code</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="code"
                                                value="{{ old('code') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Category</label>
                                        <div class="col-sm-3">
                                            <select name="procategory_id" class="form-control">
                                                @foreach(@$procategory as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Address</label>
                                        <div class="col-sm-11">
                                            <input class="form-control" type="text" name="address"
                                                value="{{ old('address') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Follow</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="follow"
                                                value="{{ old('follow') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Email</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="email" name="mail"
                                                value="{{ old('mail') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Phone</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2 col-md-offset-10">
                                            <button type="submit" class="btn btn-info btn-block">Add
                                                Product</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row tab-pane fade in active" id="prolist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ route('admin.bu.export.produce',['id'=>$bu->id]) }}"
                                    class="btn btn-default btn-block">Export</a>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('admin.bu.pdf.produce', ['id'=>$bu->id]) }}" class="btn btn-default btn-block">PDF</a>
                            </div>
                            <form action="{{ url('admin/bu/import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="col-md-2">
                                    <input type="file" name="select_file" class="form-control">
                                    <input type="submit" value="Import" class="form-control">
                                    <span class="text-danger">{{ $errors->first('select_file') }}</span>
                                </div>
                            </form>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Category</th>
                                                <th>Follow</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$produce as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->code }}</td>
                                                <td>
                                                    @foreach(@$procategory as $pro)
                                                    {{ ($value->procategory_id == $pro->id) ? $pro->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $value->follow }}</td>
                                                <td>
                                                    <a href="{{ route('edit.produce', ['bu' => $bu->id,'id' => $value->id]) }}"
                                                        class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('delete.produce',['id' => $value->id]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete ?')">
                                                        Delete</a>
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
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="varcost">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#addvarcost">Add Cost</a></li>
            <li><a data-toggle="tab" href="#provarcost">Produce Variable Cost</a></li>
            <li class="active"><a data-toggle="tab" href="#varcostlist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addvarcost">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('admin/bu/add-variable', ['id' => $bu->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">BU</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name" value="{{ $bu->name }}"
                                                disabled="">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Item</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="item"
                                                value="{{ old('item') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Doc Num</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="docnum"
                                                value="{{ old('docnum') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Item Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="itemcategory_id" class="form-control">
                                                @foreach(@$itemcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="costcategory_id" class="form-control">
                                                @foreach(@$costcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Qty</label>
                                        <div class="col-sm-3">
                                            <table style="width: 100%">
                                                <td>
                                                    <input class="form-control" type="number" name="qty"
                                                        style="width: 70px">
                                                </td>
                                                <td>
                                                    <select name="unit_id" class="form-control">
                                                        @foreach(config('master.unit') as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </table>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="cost"
                                                value="{{ old('cost') }}">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
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

                <div class="row tab-pane fade" id="provarcost">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_provarcost,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="#"
                                    class="btn btn-default btn-block">Export</a>

                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Doc Num</th>
                                                <th>Item Cart</th>
                                                <th>Cost Cart</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$provarcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>{{ $value->docnum }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{($item->id==$value->itemcategory_id) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach(@$costcart as $cost)
                                                    {{($cost->id==$value->costcategory_id) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ date('Y-m-d',strtotime($value->created_at)) }}</td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
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

                <div class="row tab-pane fade in active" id="varcostlist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_buvarcost,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Item Cat.</th>
                                                <th>Cost Cat.</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$buvarcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{ ($item->id==$value->itemcategory_id) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach(@$costcart as $cart)
                                                    {{ ($cart->id==$value->costcategory_id) ? $cart->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('delete.variable',['id'=>$value->id]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete ?')">
                                                        Delete</a>
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
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="fixcost">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#addfixcost">Add Cost</a></li>
            <li><a data-toggle="tab" href="#profixcost">Produce Variable Cost</a></li>
            <li class="active"><a data-toggle="tab" href="#fixcostlist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addfixcost">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal" action="{{ url('admin/bu/add-fixed',['id' => $bu->id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">BU</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name" value="{{ $bu->name }}"
                                                disabled="">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Item</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="item"
                                                value="{{ old('item') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Doc Num</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="docnum"
                                                value="{{ old('docnum') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Item Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="itemcategory_id" class="form-control">
                                                @foreach(@$itemcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="costcategory_id" class="form-control">
                                                @foreach(@$costcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Qty</label>
                                        <div class="col-sm-3">
                                            <table style="width: 100%">
                                                <td>
                                                    <input class="form-control" type="number" name="qty"
                                                        style="width: 70px">
                                                </td>
                                                <td>
                                                    <select name="unit_id" class="form-control">
                                                        @foreach(config('master.unit') as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </table>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="cost"
                                                value="{{ old('cost') }}">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
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

                <div class="row tab-pane fade" id="profixcost">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_profixcost,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Category</th>
                                                <th>Follow</th>
                                                <th>Cost</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$profixcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>{{ $value->docnum }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{($item->id==$value->itemcategory_id) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach(@$costcart as $cost)
                                                    {{($cost->id==$value->costcategory_id) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ date('Y-m-d',strtotime($value->created_at)) }}</td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
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

                <div class="row tab-pane fade in active" id="fixcostlist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_bufixcost,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Item Cat.</th>
                                                <th>Cost Cat.</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$bufixcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{ ($item->id==$value->itemcategory_id) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach(@$costcart as $cart)
                                                    {{ ($cart->id==$value->costcategory_id) ? $cart->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('delete.fixed',['id'=>$value->id]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete ?')">
                                                        Delete</a>
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
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="revenue">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#addrevenue">Add Revenue</a></li>
            <li><a data-toggle="tab" href="#prorevenue">Produce Revenue</a></li>
            <li class="active"><a data-toggle="tab" href="#revenuelist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addrevenue">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('admin/bu/add-revenue', ['id'=> $bu->id]) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">BU</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name" value="{{ $bu->name }}"
                                                disabled="">
                                        </div>

                                        <label class="col-sm-1 control-label">Doc Num</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="docnum"
                                                value="{{ old('docnum') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="cart_item" class="form-control">
                                                @foreach(@$itemcart as $value)
                                                <option value={{ $value->id }}>{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Name</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Amount</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="amount"
                                                value="{{ old('amount') }}">
                                        </div>

                                        <label class="col-sm-1 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
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

                <div class="row tab-pane fade" id="prorevenue">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_prorevenue,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Cat.</th>
                                                <th>Docnum</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$prorevenue as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{($item->id==$value->cart_item) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
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

                <div class="row tab-pane fade in active" id="revenuelist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_burevenue,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Cat.</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$burevenue as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{ ($item->id==$value->cart_item) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('delete.revenue', ['id' => $value->id]) }}"
                                                        class="btn btn-danger">Delete</a>
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
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="profit">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#addprofitshare">Add Profit Share</a></li>
            <li><a data-toggle="tab" href="#proprofitshare">Produce Profit Share</a></li>
            <li class="active"><a data-toggle="tab" href="#profitsharelist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addprofitshare">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('admin/bu/add-profit',['id' => $bu->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">BU</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" value="{{ $bu->name }}" disabled="">
                                        </div>
                                        <label class="col-sm-1 control-label">Name</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                        <label class="col-sm-1 control-label">Doc Num</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="docnum"
                                                value="{{ old('docnum') }}">
                                            <span class="text-danger">{{ $errors->first('docnum') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="cart_item" class="form-control">
                                                @foreach(@$itemcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('amountcart_item') }}</span>
                                        </div>
                                        <label class="col-sm-1 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <label class="col-sm-1 control-label">Percent</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="percent"
                                                value="{{ old('percent') }}">
                                            <span class="text-danger">{{ $errors->first('percent') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Amount</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="amount"
                                                value="{{ session('total_amount') }}">
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
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

                <div class="row tab-pane fade" id="proprofitshare">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                @foreach(@$proprofitshare as $value)
                                <h2> Profit: <code></code>{{ number_format($value->total,0,',','.') }} đ</h2>
                                @php
                                break;
                                @endphp
                                @endforeach
                                <h2> Profit Share: <code>{{ number_format($total_profitshare,0,',','.') }} đ</code></h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Item</th>
                                                <th>Documen</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$proprofitshare as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{($item->id==$value->cart_item)?$item->name:''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
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

                <div class="row tab-pane fade in active" id="profitsharelist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Profit: <code>{{ number_format($total_amount,0,',','.') }} đ</code></h2>
                                <h2> Profit Share: <code>{{ number_format($total_buprofitshare,0,',','.') }} đ</code>
                                </h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <a href="" class="btn btn-default btn-block">Export</a>
                            </div>
                        </div>
                        <br>
                        <div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover" id="dataTables1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Profit Share</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$buprofitshare as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{($item->id == $value->cart_item) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('delete.profix',['id' => $value->id]) }}"
                                                        class="btn btn-danger">Delete</a>
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
            </div>
        </div>
    </div>

</div>
@endsection