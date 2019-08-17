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
    <div class="row">
        <div class="container">
            <a class="btn btn-success btn-sm ml-3 mb-1" href="{{route('today.expanse')}}">Today all expanses</a>
        </div>
        
    </div>
    <!-- Header-->
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Expanses Section</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a class="btn btn-info btn-sm" href="{{route('create.expanse')}}">Add Expanse</a></li>
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
                                <strong class="card-title">All Expanses Of {{date('F')}} (Current Month)</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Srl No:</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentMonthExpanses as $expanse)
                                            <tr class="text-center">
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$loop->index +1}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$expanse->description}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$expanse->date}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$expanse->amount}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm mt-1" href="{{route('details.expanse',$expanse->id)}}">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach                                      
                                    </tbody>
                                </table>
                            </div>
                        </div> -
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
    
    jQuery(document).ready(function($) {
        $('#bootstrap-data-table-export').DataTable({
            ordering:false,
            select: false
        });
    })
    
</script>
@endpush