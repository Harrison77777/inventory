@extends('layouts.master')
@push('css')
    
@endpush
 @section('content')
 <div id="right-panel" class="right-panel">

    <!-- Header-->
    @include('partials.dashboard-header')
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Admin</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Admin User Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        @if (Session::has('successMsg'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> {{session('successMsg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div> 
        @endif
      
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Admin Register</strong><small> Form</small>
                </div>
                <div class="card-body card-block">
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username" class=" form-control-label">Username</label>
                            <input type="text" id="username" placeholder="username" name="username" class="form-control">
                            <span class="text-danger">{{$errors->first('username')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="email" class=" form-control-label">Email address</label>
                            <input type="text" id="email" placeholder="Email address" name="email" class="form-control">
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="role" class=" form-control-label">Admin Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="">Select Role</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Admin</option>
                                <option value="3">Checker</option>
                            </select>
                            
                            <span class="text-danger">{{$errors->first('role')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">Password</label>
                            <input type="password" name="password" id="street" placeholder="Password" class="form-control">
                            <span class="text-danger">{{$errors->first('password')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="street" class=" form-control-label">Confirm password</label>
                            <input type="password" name="password_confirmation" id="street" placeholder="Confirm password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Save change</button>
                    </form>
                </div>
            </div>
        <div class="col-md-12 col-lg-12">
        
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
    
@endpush
