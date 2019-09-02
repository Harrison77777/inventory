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
          <li class="breadcrumb-item"><a  href="#">Sales Report Of All Months (Month Wise)
            </a></li>
          <li class="breadcrumb-item"><a  href="#">All Selling Details of  {{$month->month}}</a></li>
          <li class="breadcrumb-item"><a class="activate" href="#"> <strong> All Salling Report Of {{$date}} </strong>(Customer wise)</strong></a></li>
        </ol>
    </nav>
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1><strong>All Salling Report Of {{$date}} </strong>(Customer wise)</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="row justify-content-end">
                <div class="yesterday-all-sale mt-2">
                   
                </div>
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                           
                            <li>Total Sale: <span class="showTotal text-danger"></span> TK. ({{$date}})</li>
                            <li><a class="btn btn-info btn-sm btn-s" href="{{route('particular.month.wise.all.selling.date',$month->month)}}">Back</a></li>
                        </ol>
                    </div>
                </div> 
            </div>           
        </div>
    </div>
    <div class="content">
        <div class="col-md-12 col-lg-12">
            <div class="animated fadeIn">
                @php
                $TotalSaleAmountOfThisDate = 0;  
                @endphp
            
              @foreach ($AllBuyerCustomersOfThisDate as $customer)
              <a class="text-dark" href="{{route('perticular.month.particular.date.wise.customer.buying.details',$customer->id)}}">
              <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="customer-name">
                                <div class="row">
                                    @php
                                        $totalQuantiy = 0;
                                        $totalPrice = 0;
                                        
                                    @endphp
                                    <div class="col-md-3 col-lg-3">Customer Name: {{$customer->name}} </div>
                                    @foreach ($customer->confirmProducts as $confirmProduct)
                                    @php
                                    $totalQuantiy = $totalQuantiy + $confirmProduct->quantity;  
                                    $totalPrice = $totalPrice + $confirmProduct->quantity * $confirmProduct->product->price;
                                    @endphp
                                    @endforeach
                                    <div class="col-md-3 col-lg-3">Total products: {{$totalQuantiy}}</div>
                                    <div class="col-md-3 col-lg-3">Total Amount: <span class="text-danger">{{number_format($totalPrice,2,".",",")}}</span> TK.</div> 
                                    <div class="col-md-3 col-lg-3">Bill Created Time : {{$customer->created_at}} </div> 
                                </div>
                                @php
                                $TotalSaleAmountOfThisDate = $TotalSaleAmountOfThisDate+$totalPrice;
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
                </a>
              @endforeach
              
               <input class="total" type="hidden" value="{{$final = $TotalSaleAmountOfThisDate }}">   
                 
              
            </div><!-- .animated -->
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
<script>

        jQuery(document).ready(function($) {
            var total = $('.total').val();
            $('.showTotal').html(total);
        })
</script>
@endpush