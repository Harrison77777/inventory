@extends('layouts.master')
@push('css')
    <style>
            .pro-img {
                background: gray;
                padding: 1px;
            }
    </style>
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
                    <h1>Details page</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{Auth::user()->role == 1 ? 'Super Admin': 'Admin' }} <strong>{{Auth::user()->username}}</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-6">
                        <h5>Profile details of {{Auth::user()->username}}</h5>
                    </div>
                    <div class="col-md-6">
                        <a class="btn  btn-sm float-right" href="{{route('show.change.password.form')}}">Change Password</a>
                    </div>
                    
                </div>
                <div class="card-body">
                        <div class="col-md-12 text-left">
                                 <img class="rounded pro-img" height="200" width="150" src="{{asset('image/default.png')}}" alt="">  
                        </div> 

                        <div class="col-md-12">
                            <h6 class="mt-3">Username :: <span class=" h6 text-muted">{{Auth::user()->username}}</span></h6>
                            <h6>Email :: <span class=" h6 text-muted">{{Auth::user()->email}}</span></h6>
                            <h6>Role :: @if (Auth::user()->role == 1)
                                            Super Admin
                                            @elseif (Auth::user()->role == 2)
                                            Admin
                                            @else
                                             Checker   
                                        @endif 
                            </h6>
                            
                        </div>
                        
                    
                    
                   
                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
    
@endpush