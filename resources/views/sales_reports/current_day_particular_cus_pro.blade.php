@extends('layouts.master')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<style>
        .customer-name {
            height: 60px;
            border: 1px solid aquamarine;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-self: center;
            font-size: 13px;
            margin-top: 7px;
            padding: 0px 12px;
        }
        .customer-name:hover{
            border: 0px solid green; 
            border: 1px solid green; 
            background: ghostwhite;
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
                    <h1>Sales Report</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li>Particular customer buying details of <strong>{{$todayBuyerCustomerExactBuyDetails->date == date('d-m-Y') ? "(Today) " : ""}}</strong>
                         {{$todayBuyerCustomerExactBuyDetails->date}}   
                        </li>
                        <li><a class="btn btn-info btn-sm btn-s" href="{{route('salesReport')}}">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="col-md-12 col-lg-12">
            <div class="animated fadeIn">
            <div class="customer-details border-primary">
               <p class="m-0" style="font-size:14px; ">Customer Name : {{$todayBuyerCustomerExactBuyDetails->name}}</p>  
               <p class="m-0" style="font-size:14px;">Customer Email : {{$todayBuyerCustomerExactBuyDetails->email}}</p>  
               <p class="m-0" style="font-size:14px;">Customer Address : {{$todayBuyerCustomerExactBuyDetails->address}}</p>  
            </div>
            </div><!-- .animated -->
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="saling-details-table">
                <div class="card">
                    <div class="card-header">
                        <h5>Saling Products Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Product name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $grandTotal = 0; @endphp
                            @foreach ($todayBuyerCustomerExactBuyDetails->confirmProducts as $confirmProducts)
                                <tr class="text-center">
                                    <td>{{$confirmProducts->product->name}}</td>
                                    <td>{{$confirmProducts->product->brand}}</td>
                                    <td>{{$confirmProducts->product->category->name}}</td>
                                    <td class="text-center"><img height="40" width="40" src="{{asset('storage/product/'.$confirmProducts->product->photo)}}" alt=""></td>
                                    <td>{{number_format($confirmProducts->product->price) }}</td>
                                    <td>{{$confirmProducts->quantity}}</td>
                                    <td>{{number_format($confirmProducts->quantity * $confirmProducts->product->price) }}</td>
                                    @php $grandTotal =$grandTotal + $confirmProducts->quantity * $confirmProducts->product->price @endphp
                                </tr> 
                                @endforeach
                                <tr class="text-right">
                    <td colspan="7">
                        <h4>
                            <strong>Total price: </strong> <span class="text-danger">{{number_format($grandTotal).'.00' }}</span>  
                        <h4> 
                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')

@endpush