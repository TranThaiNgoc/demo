@extends('layouts.admin.master')
@section('title')
Produce Line: asdfsfad
@endsection
@section('content')

<!-- /row -->
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#chart">Produce List</a></li>
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
    <div class="row tab-pane fade in active" id="chart">
        1/ Bieu do cot, the hien chi phi doanh thu va loi nhuan giua cua proline.
    </div>
</div>
<!-- /.row -->
@endsection


