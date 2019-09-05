@extends('layouts.admin.master')
@section('title')
Business Unit: {{ $bu->name }}
@endsection
@section('content')

<!-- /row -->
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#prolist">Produce List</a></li>
    <li><a data-toggle="tab" href="#prolinelist">Proline List</a></li>
    <li><a data-toggle="tab" href="#chart">Chart</a></li>
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
                        <table width="100%" class="table table-striped table-hover" id="dataTables1" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th> 
                                    <th>Category</th>
                                    <th>Profit</th> 
                                    <th>Follow</th>                                      
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>San xuat ghe</td>
                                    <td>SX0001</td>
                                    <td>Van phong</td>
                                    <td>990088</td>
                                    <td>Nguyen Van A</td>
                                    <td>
                                        <a href="pro/1/detail" class="btn btn-warning">Detail</a>
                                    </td>                        
                                </tr>

                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="prolinelist">
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
                        <table width="100%" class="table table-striped table-hover" id="dataTables1" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th> 
                                    <th>Category</th>
                                    <th>Profit</th> 
                                    <th>Follow</th>                                      
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>San xuat ghe</td>
                                    <td>SX0001</td>
                                    <td>Van phong</td>
                                    <td>990088</td>
                                    <td>Nguyen Van A</td>
                                    <td>
                                        <a href="pro/1/detail" class="btn btn-warning">Detail</a>
                                    </td>                        
                                </tr>

                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab-pane fade" id="chart">
        1/ Bieu do cot, the hien chi phi doanh thu va loi nhuan cua BU.
        <br>
        1/ Bieu do cot, the hien chi phi doanh thu va loi nhuan giua cac produce.
        <br>
        2/ Bieu do cot, the hien chi phi doanh thu va loi nhuan giua cac proline.
    </div>
</div>
<!-- /.row -->
@endsection


