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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><strong>(Page Map)</strong> -> Sales Report(Home)</a></li>
          <li class="breadcrumb-item"><a  href="#">All Selling Details of Current Month {{date('F')}}</a></li>
          <li class="breadcrumb-item"><a  href="#">  All Salling Report Of {{$currentMonthBuyerCustomerExactBuyDetails->date}} (Customer wise)</strong></a></li>
          <li class="breadcrumb-item"><a class="activate" href="#"> <strong> Current month particular Bustomer Buying details By Date ({{$currentMonthBuyerCustomerExactBuyDetails->date}})</strong></a></li>
        </ol>
    </nav>
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
                        <li>Current month customer wise buying details (-> {{date('F')}}) Date <strong>{{$currentMonthBuyerCustomerExactBuyDetails->date}}</strong></li>
                        <li><a class="btn btn-info btn-sm btn-s" href="{{route('current.month.datewise.all.buyer.customer', $currentMonthBuyerCustomerExactBuyDetails->date)}}">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="col-md-12 col-lg-12">
            <div class="animated fadeIn">
            <div class="customer-details border-primary">
               <p class="mb-0" style="font-size:14px;">Customer Name : {{$currentMonthBuyerCustomerExactBuyDetails->name}}</p>  
               <p class="mb-0" style="font-size:14px;">Customer Email : {{$currentMonthBuyerCustomerExactBuyDetails->email}}</p>  
               <p class="mb-0" style="font-size:14px;">Customer Address : {{$currentMonthBuyerCustomerExactBuyDetails->address}}</p>  
            </div>
            </div><!-- .animated -->
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="saling-details-table">
                <div class="card">
                    <div class="card-header">
                        <h5>Sold Products Details</h5>
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
                            @foreach ($currentMonthBuyerCustomerExactBuyDetails->confirmProducts as $confirmProducts)
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