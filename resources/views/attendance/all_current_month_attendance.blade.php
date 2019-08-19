@extends('layouts.master')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<style>
    .paginate_button {
        color: red;
        padding: 0px 4px!important;
        background: red;
    }
</style>
@endpush
 @section('content')
 <div id="right-panel" class="right-panel">

    <!-- Header-->
    @include('partials.dashboard-header')
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="row">
            
        
        <div class="col-sm-6">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>All Attendance of Current Month {{(date('F'))}}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            <div class="page-header text-right">
                <div class="page-title text-right">
             
                        <a href="{{route('attendance')}}" class="btn btn-sm btn-info mt-2">Back</a>
                    
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
                            @foreach ($dates as $date)
                            <div class="col-md-3">
    <a class="btn btn-success btn-sm" href="{{route('datewise.attendance',$date->date)}}">Attendance of {{$date->date}}</a>
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