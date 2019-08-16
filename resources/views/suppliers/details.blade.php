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
                        <h5>Supplier details of {{$supplier->name}}</h5>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-sm float-right" href="{{route('all.supplier')}}">Back</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Name :: <span class=" h6 text-muted">{{$supplier->name}}</span></h6>
                            <h6>Email :: <span class=" h6 text-muted">{{$supplier->email}}</span></h6>
                            <h6>Phone :: <span class=" h6 text-muted">{{$supplier->phone}}</span></h6>
                            <h6>Payment Way :: <span class=" h6 text-muted">{{$supplier->payment_way}}</span></h6>
                            
                           @if ($supplier->type == 1)
                           <h6>Supplier type :: <span class=" h6 text-muted">Main supplier</span></h6>
                            @elseif($supplier->type == 2)
                            <h6>Supplier type :: <span class=" h6 text-muted">Distributor</span></h6>
                            @elseif ($supplier->type == 3)
                            <h6>Supplier type :: <span class=" h6 text-muted">Sub-dealer</span></h6>
                           @endif
                      
                        </div>
                        <div class="col-md-6 text-center">
                            <img class="rounded" height="350" width="300" src="{{asset('storage/supplier/'.$supplier->photo)}}" alt="">   
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <p><strong>Address</strong>  :: {{$supplier->address}}</p>
                            <p><strong>Shop Address</strong>  :: {{$supplier->shop_address}}</p>
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