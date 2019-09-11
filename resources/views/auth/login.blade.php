@extends('layouts.admin.master_login')
@section('title')
login
@endsection
@section('content')
    <div class="login-box">
        <div class="login-logo" style="text-align: center;">
            <h1 style="font-family: Garamond">Finance System</h1>
            <h5>(Demo version)</h5>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                
                @if(session('info'))
                    <div class="alert alert-danger">
                        {{ session('info') }}
                    </div>
                @endif

                <div class="form-group{{ $errors->has('email') ? ' has-feedback' : '' }}">
                    <input type="text" class="form-control" placeholder="Login email" name="email" value="{{ old('email') }}" autofocus>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-feedback' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                @if ($errors->any())
                    <br/>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('error'))
               <br />
                    <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
                    <br>
                    <a href="{{ url('register') }}"> Register an admin account? Click Here</a>
                </div>
            </form>
        </div>
    </div>
@endsection
