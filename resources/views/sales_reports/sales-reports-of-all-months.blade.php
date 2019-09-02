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
          <li class="breadcrumb-item"><a class="activate" href="#"> <strong> Sales Report Of All Months  </strong>(Month Wise)</a></li>
        </ol>
    </nav>
    <div class="breadcrumbs">
        <div class="row">
            
        
        <div class="col-sm-12">
            <div class="col-md-10 col-lg-10">
            <div class="page-header float-left">
                <div class="page-title">
                   <div class="row">
                       <div class="col-md-5 col-lg-12">
                            <h1>Sales report of all month is here  (<strong>Year {{$year}}</strong>)</h1>
                            
                       </div>
                        {{-- <div class="col-md-5 col-lg-3">
                            <div class="total-sale-of-this-month">
                                <h1>Total Sale Of this Month: <span class="text-danger">{{
                                    number_format($currentMonthTotalSale, 2, )}}</span></h1>
                           </div> 
                          
                       </div>  --}}
                   </div>
                </div>
            </div>
            </div>
            <div class="col-md-2 col-lg-2">

            
        <div class="col-sm-2 col-md-12 col-lg-12 text-right">
            <div class="page-header text-right">
                <div class="page-title text-right">
                    <a href="{{route('salesReport')}}" class="btn btn-sm btn-info float-right mt-2">Back</a>
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
                            @foreach ($allMonth as $month)
                            <div class="col-md-2 mr-3">
                                <a class="btn btn-success btn-sm" href="{{route('particular.month.wise.all.selling.date',$month->month)}}">All Selling Details of <span class="text-color"><strong> {{$month->month}}</strong></span> </a>
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