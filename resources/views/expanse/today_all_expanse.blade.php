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
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Today All Expanses</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a class="btn btn-info btn-sm" href="{{route('all.expanse')}}">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div  class="col-sm-10 offset-1">
        @if (Session::has('successMsg'))
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> <span class="message">{{session('successMsg')}}</span> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="content">
        <div class="col-md-12 col-lg-12">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card">
                            <div class="card-header">
                                <div class="col-md-6">
                                    <strong class="card-title">All Expanses Of {{date('d/m/Y')}} (Today)</strong>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong>Total Amount: </strong>{{number_format($totalAmount, 2)}} TK
                                </div>                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Description</th>
                                            <th>Serial No:</th>
                                            <th>Month</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($todayExpanses->count() > 0)
                                        @foreach ($todayExpanses as $expanse)
                                            <tr class="text-center">
                                                <td>
                                                    <h6 class="text-muted">
                                                        {{$loop->index +1 }}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted">
                                                        {{$expanse->description}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted">
                                                        {{$expanse->month}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted">
                                                        {{$expanse->date}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="text-muted">
                                                        TK:- {{$expanse->amount}}
                                                    </h6>
                                                </td>
                                            </tr>
                                        @endforeach 
                                        @else
                                        <tr class="text-center">
                                            <td class="text-center" colspan="5"><strong>Today yet to expanse</strong> </td>
                                        </tr>                                        
                                        @endif                                     
                                    </tbody>
                                </table>
                            </div>
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
<script>

</script>
@endpush