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
                        <h5>Product details of {{$product->name}}</h5>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-sm float-right" href="{{route('all.product')}}">Back</a>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Product Name :: <span class=" h6 text-muted">{{$product->name}}</span></h6>
                            <h6>Category Name :: <span class=" h6 text-muted">{{$product->category->name}}</span></h6>
                            <h6>Brand Name :: <span class=" h6 text-muted">{{$product->brand}}</span></h6>
                            <h6>Supplier Name :: <span class=" h6 text-muted">{{$product->supplier->name}}</span></h6>
                            <h6>Vandor Price :: <span class=" h6 text-muted">{{$product->vendor_price}}</span></h6>
                            <h6>Sale Price :: <span class=" h6 text-muted">{{$product->price}}</span></h6>
                            <h6>Storage No :: <span class=" h6 text-muted">{{$product->storage_no}}</span></h6>
                        </div>
                        <div class="col-md-6 text-center">
                            <img class="rounded" height="350" width="300" src="{{asset('storage/product/'.$product->photo)}}" alt="">   
                        </div> 
                    </div>
                    {{--  <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <p><strong>Address</strong>  :: {{$supplier->address}}</p>
                            <p><strong>Shop Address</strong>  :: {{$supplier->shop_address}}</p>
                        </div>
                    </div>  --}}
                   
                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
    
@endpush