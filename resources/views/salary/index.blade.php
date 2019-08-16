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
                    <h1>Salary Summary</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a class="btn btn-outline-info btn-sm" href="{{route('pay.advance.salary')}}">Pay Advance salary</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-md-12 col-lg-12">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Employees</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>salary per month</th>
                                            <th>Advance Salary</th>
                                            <th>Last month salary</th>
                                            <th>Payable Salary</th>
                                            <th>Phone no</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            
                                        
                                            <tr class="text-center">
                                                <td><h6 class="mt-2 text-muted">{{$employee->name}}</h6></td>
                                                <td><h6 class="mt-2 text-muted">{{$employee->salary}}</h6></td>
                                               
                                                    
                                                
                                                <td>
                                                   
                                                    <h6 class="mt-2 text-muted">
                                                        
                                                    </h6>
                                                    
                                                </td>
                                                
                                                <td>
                                                    <h6 class="mt-2 text-muted">N/A</h6>
                                                </td>
                                                <td><h6 class="mt-2 text-muted">#</h6></td>
                                                <td><h6 class="mt-2 text-muted">{{$employee->phone}}</h6></td>
                                                <td>
                                                    <a class="btn btn-info btn-sm mt-1" href="">Details</a>

                                                    <a class="btn btn-primary btn-sm mt-1" href="">Edit</a>

                                                    {{--  <button type="button" onclick="deleteEmployee({{$employee->id}});" class="btn btn-danger btn-sm mt-1">Delete</button>  --}}

                                                    {{--  <form style="display:none;" id="deleteForm-{{$employee->id}}" method="POST" action="{{route('employee.delete', $employee->id)}}">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>  --}}
                                                </td>
                                            </tr>
                                            
                                        @endforeach    
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
    jQuery(document).ready(function($) {
        $('#bootstrap-data-table-export').DataTable({
            ordering:false,
            select: false
        });
    })
</script>
@endpush