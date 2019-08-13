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
                    <h1>Details page</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{Auth::user()->role == 1 ? 'Super Admin': 'Admin'}} <strong>{{Auth::user()->username}}</strong></li>
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
                        <h5>Customer details of {{$customer->name}}</h5>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-sm float-right" href="{{route('all.customer')}}">Back</a>
                    </div>                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Name :: {{$customer->name}}</h5>
                            <h5>Email :: {{$customer->email}}</h5>
                            <h5>Phone :: {{$customer->phone}}</h5>
                            <h5>Bank Holder :: {{$customer->bank_holder ? $customer->bank_holder : 'N/A'}}</h5>
                            <h5>Bank Branch :: {{$customer->bank_branch ? $customer->bank_branch : 'N/A'}}</h5>
                            <h5>Bank Account :: {{$customer->bank_account ? $customer->bank_account : 'N/A'}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <p>Address :: {{$customer->address}}</p>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
    
@endpush