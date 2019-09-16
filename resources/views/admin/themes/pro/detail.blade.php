@extends('admin.layout.index')
@section('title')
@section('name', $pro->name)
@endsection
@section('content')

<!-- /row -->
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#info">Info</a></li>
    <li><a data-toggle="tab" href="#proline">Produce Line</a></li>
    <li><a data-toggle="tab" href="#varcost">Variable Cost</a></li>
    <li><a data-toggle="tab" href="#fixcost">Fixed Cost</a></li>
    <li><a data-toggle="tab" href="#revenue">Revenue</a></li>
    <li><a data-toggle="tab" href="#profit">Profit</a></li>
</ul>

<div class="row">
    @if(session('success'))
    <div class="col-lg-9 alert alert-success">
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
                <div>
                    <form class="form-horizontal"
                        action="{{ url('produce/edit-produce',['bu' => $bu->id, 'id' => $pro->id]) }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Name</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="name" value="{{ $pro->name }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Code</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="code" value="{{ $pro->code }}">
                                <span class="text-danger">{{ $errors->first('code') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Category</label>
                            <div class="col-sm-3">
                                <select name="procategory_id" class="form-control">
                                    @foreach(@$procategory as $value)
                                    <option {{ ($pro->procategory_id == $value->id) ? 'selected' : '' }}
                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('procategory_id') }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Address</label>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="address" value="{{ $pro->address }}">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label">Follow</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="follow" value="{{ $pro->follow }}">
                                <span class="text-danger">{{ $errors->first('follow') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Email</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="email" name="mail" value="{{ $pro->mail }}">
                                <span class="text-danger">{{ $errors->first('mail') }}</span>
                            </div>

                            <label class="col-sm-1 control-label">Phone</label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="phone" value="{{ $pro->phone }}">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-1 control-label">Remark</label>
                            <div class="col-sm-11">
                                <textarea class="form-control" type="text" name="remark">{{ $pro->remark }}</textarea>
                                <span class="text-danger">{{ $errors->first('remark') }}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <table>
                                    <td><button type="submit" class="btn btn-info">Save</button></td>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="proline">
        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#addproduce">Add Produce Line</a></li>
            <li class="active"><a data-toggle="tab" href="#prolist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addproduce">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('produce/add-proline', ['bu'=>$bu->id,'id' => $pro->id]) }}"
                                    method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Name</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name"
                                                value="{{ old('name') }}">
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Code</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="code"
                                                value="{{ old('code') }}">
                                            <span class="text-danger">{{ $errors->first('code') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Category</label>
                                        <div class="col-sm-3">
                                            <select name="prolinecategory_id" class="form-control">
                                                @foreach(@$prolinecategory as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('prolinecategory_id') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Address</label>
                                        <div class="col-sm-11">
                                            <input class="form-control" type="text" name="address"
                                                value="{{ old('address') }}">
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Follow</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="follow"
                                                value="{{ old('follow') }}">
                                            <span class="text-danger">{{ $errors->first('follow') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Email</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="email" name="mail"
                                                value="{{ old('mail') }}">
                                            <span class="text-danger">{{ $errors->first('mail') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Phone</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="phone"
                                                value="{{ old('phone') }}">
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
                                            <span class="text-danger">{{ $errors->first('remark') }}</span>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$proline as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->code }}</td>
                                                <td>
                                                    @foreach(@$prolinecategory as $procate)
                                                    {{ ($value->prolinecategory_id == $procate->id) ? $procate->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $value->follow }}</td>
                                                <td>
                                                    <a href="{{ route('edit.proline',['bu'=>$bu->id,'pro'=>$pro->id,'id'=>$value->id]) }}"
                                                        class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('delete.proline',['bu'=>$bu->id,'id'=>$value->id]) }}"
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
            <li><a data-toggle="tab" href="#prolinevarcost">Produce Line Variable Cost</a></li>
            <li class="active"><a data-toggle="tab" href="#varcostlist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addvarcost">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('produce/add-variable',['bu' => $bu->id, 'id' => $pro->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Produce</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name" value="{{ $pro->name }}"
                                                disabled="">
                                        </div>

                                        <label class="col-sm-1 control-label">Item</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="item"
                                                value="{{ old('item') }}">
                                            <span class="text-danger">{{ $errors->first('item') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Doc Num</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="docnum"
                                                value="{{ old('docnum') }}">
                                            <span class="text-danger">{{ $errors->first('docnum') }}</span>
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
                                            <span class="text-danger">{{ $errors->first('itemcategory_id') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="costcategory_id" class="form-control">
                                                @foreach(@$costcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('costcategory_id') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Qty</label>
                                        <div class="col-sm-3">
                                            <table style="width: 100%">
                                                <td>
                                                    <input class="form-control" type="number" name="qty"
                                                        style="width: 70px">
                                                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                                                </td>
                                                <td>
                                                    <select name="unit_id" class="form-control">
                                                        @foreach(@$unit as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                                                </td>
                                            </table>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="cost"
                                                value="{{ old('cost') }}">
                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
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

                @if(isset($total_prolinevarcost))
                <div class="row tab-pane fade" id="prolinevarcost">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_prolinevarcost,0,',','.') }} đ</code></h2>
                                
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
                                                <th>Docnum</th>
                                                <th>Itemcategory</th>
                                                <th>Costcategory</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$prolinevarcost as $value)
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
                                                    @foreach(@$costcart as $cart)
                                                    {{($cart->id==$value->costcategory_id) ? $cart->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ $value->qty }}</td>
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
                @endif

                <div class="row tab-pane fade in active" id="varcostlist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_provarcost,0,',','.') }} đ</code></h2>
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
                                            @foreach(@$provarcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{ ($value->itemcategory_id == $item->id) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($costcart as $cost)
                                                    {{ ($value->costcategory_id == $cost->id) ? $cost->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('produce.delete.variable',['bu' => $bu->id,'id'=> $value->id]) }}"
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
            <li><a data-toggle="tab" href="#prolinefixcost">Produce Line Variable Cost</a></li>
            <li class="active"><a data-toggle="tab" href="#fixcostlist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addfixcost">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('produce/add-fixed', ['bu' => $bu->id, 'id' => $pro->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Produce</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="name" value="{{ $pro->name }}"
                                                disabled="">
                                        </div>

                                        <label class="col-sm-1 control-label">Item</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="item"
                                                value="{{ old('item') }}">
                                            <span class="text-danger">{{ $errors->first('item') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Doc Num</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="text" name="docnum"
                                                value="{{ old('docnum') }}">
                                            <span class="text-danger">{{ $errors->first('docnum') }}</span>
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
                                            <span class="text-danger">{{ $errors->first('itemcategory_id') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost Cat.</label>
                                        <div class="col-sm-3">
                                            <select name="costcategory_id" class="form-control">
                                                @foreach(@$costcart as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">{{ $errors->first('costcategory_id') }}</span>
                                        </div>

                                        <label class="col-sm-1 control-label">Date</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="date" name="date"
                                                value="{{ old('date') }}">
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Qty</label>
                                        <div class="col-sm-3">
                                            <table style="width: 100%">
                                                <td>
                                                    <input class="form-control" type="number" name="qty"
                                                        style="width: 70px">
                                                    <span class="text-danger">{{ $errors->first('qty') }}</span>
                                                </td>
                                                <td>
                                                    <select name="unit_id" class="form-control">
                                                        @foreach(@$unit as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">{{ $errors->first('unit_id') }}</span>
                                                </td>
                                            </table>
                                        </div>

                                        <label class="col-sm-1 control-label">Cost</label>
                                        <div class="col-sm-3">
                                            <input class="form-control" type="number" name="cost"
                                                value="{{ old('cost') }}">
                                            <span class="text-danger">{{ $errors->first('cost') }}</span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label">Remark</label>
                                        <div class="col-sm-11">
                                            <textarea class="form-control" type="text"
                                                name="remark">{{ old('remark') }}</textarea>
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
                @if(isset($total_prolinefixcost))
                <div class="row tab-pane fade" id="prolinefixcost">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_prolinefixcost,0,',','.') }} đ</code></h2>
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
                                            @foreach(@$profixcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{ ($value->itemcategory_id == $item->id) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($costcart as $cost)
                                                    {{ ($value->costcategory_id == $cost->id) ? $cost->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('produce.delete.variable',['bu' => $bu->id,'id'=> $value->id]) }}"
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
                @endif
                <div class="row tab-pane fade in active" id="fixcostlist">
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
                                                <th>Item</th>
                                                <th>Item Cat.</th>
                                                <th>Cost Cat.</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$profixcost as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{ ($value->itemcategory_id == $item->id) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach(@$costcart as $cost)
                                                    {{ ($value->costcategory_id==$cost->id) ? $cost->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->total,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('produce.delete.fixed',['bu' => $bu->id, 'id' => $value->id]) }}"
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
            <li><a data-toggle="tab" href="#prolinerevenue">Produce Line Revenue</a></li>
            <li class="active"><a data-toggle="tab" href="#revenuelist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addrevenue">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('produce/add-revenue', ['bu' => $bu->id, 'id'=> $pro->id]) }}"
                                    method="post">
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
                @if(isset($total_prolinerevenue))
                <div class="row tab-pane fade" id="prolinerevenue">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Total: <code>{{ number_format($total_prolinerevenue,0,',','.') }} đ</code></h2>
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
                                            @foreach(@$prolinerevenue as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>
                                                    @foreach(@$itemcart as $item)
                                                    {{($item->id==$value->cart_item) ? $item->name : ''}}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
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
                @endif
                <div class="row tab-pane fade in active" id="revenuelist">
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
                                                <th>Amount</th>
                                                <th>Action</th>
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
                                                    {{ ($item->id == $value->cart_item) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('produce.delete.revenue',['bu' => $bu->id,'id'=> $value->id]) }}"
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
            <li><a data-toggle="tab" href="#prolineprofitshare">Produce Profit Share</a></li>
            <li class="active"><a data-toggle="tab" href="#profitsharelist">List</a></li>
        </ul>
        <div class="form-group">
            <div class="tab-content">
                <div class="row tab-pane fade" id="addprofitshare">
                    <div class="col-sm-9">
                        <div class="white-box">
                            <div>
                                <form class="form-horizontal"
                                    action="{{ url('produce/add-profix', ['bu'=>$bu->id,'id'=>$pro->id]) }}"
                                    method="POST">
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
                @if(isset($total_prolinefitshare))
                <div class="row tab-pane fade" id="prolineprofitshare">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                @foreach(@$prolinefitshare as $value)
                                <h2> Profit: <code>{{ number_format($value->total,0,',','.') }} đ</code></h2>
                                @php
                                break;
                                @endphp
                                @endforeach
                                <h2> Profit Share: <code>{{ number_format($total_prolinefitshare,0,',','.') }} đ</code>
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
                                                <th>Docnum</th>
                                                <th>Item</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; ?>
                                            @foreach(@$prolinefitshare as $value)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{ $value->item }}</td>
                                                <td>{{ $value->docnum }}</td>
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
                @endif
                <div class="row tab-pane fade in active" id="profitsharelist">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h2> Profit: <code>{{ number_format(Session('total_amount'),0,',','.') }} đ</code></h2>
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
                                                <th>Category</th>
                                                <th>Profit Share</th>
                                                <th>Action</th>
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
                                                    {{ ($item->id == $value->cart_item) ? $item->name : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ number_format($value->amount,0,',','.') }} đ</td>
                                                <td>
                                                    <a href="" class="btn btn-warning">Detail</a>
                                                    <a href="{{ route('produce.delete.profix',['bu'=>$bu->id, 'id'=>$value->id]) }}"
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

<!-- /.row -->
@endsection