@extends('layouts.master')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<style>
    .paginate_button {
        color: red;
        padding: 0px 4px!important;
        background: red;
    }
    .total-sale-of-this-month h1 {border: 2px solid green;text-align: center;}
    .text-color{
        color:navy;
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
          <li class="breadcrumb-item"><a href="#">  Sales Report Of All Months (Month Wise)</a></li>
          <li class="breadcrumb-item"><a class="activate" href="#"> <strong> All Selling Details of {{$month}} </strong>(Date Wise)</a></li>
        </ol>
    </nav>
    <div class="breadcrumbs">
        <div class="row">
            
        
        <div class="col-sm-12">
            <div class="col-md-10 col-lg-10">
            <div class="page-header float-left">
                <div class="page-title">
                   <div class="row">
                       <div class="col-md-5 col-lg-7">
                            <h1>All Selling Details of {{$month}} (Date wise)</h1>
                       </div>
                       <div class="col-md-5 col-lg-5">
                           <div class="total-sale-of-this-month">
                                <h1>
                                    Total Sale Of this Month: 
                                    <span class="text-danger">
                                        {{number_format($perticularMonthTotalSale, 2, )}}
                                    </span>
                                </h1>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
            </div>
            <div class="col-md-2 col-lg-2">

            
        <div class="col-sm-2 col-md-12 col-lg-12 text-right">
            <div class="page-header text-right">
                <div class="page-title text-right">
                    <a href="{{route('sales.reports.of.all.month')}}" class="btn btn-sm btn-info float-right mt-2">Back</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="content">
        <div class="col-md-12 col-lg-12">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($MonthWiseAllSellingDates as $date)
                            <div class="col-md-2 mr-2">
                                <a class="btn btn-success btn-sm" href="{{route('particular.month.particular.month.wise.all.customer',$date->date)}}">Sales Details of <span class="text-color"><strong> {{$date->date}}</strong></span> </a>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

@endpush