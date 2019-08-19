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
                    <h1>Take Attendance Section</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a class="btn btn-info btn-sm" href="{{route('attendance')}}">Back</a></li>
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
        @if (Session::has('errorMsg'))
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Error</span> <span class="message">{{session('errorMsg')}}</span> 
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
                    <form action="{{route('insert.attendance')}}" method="POST">
                        @csrf
                       <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Categories</strong>
                            </div>
                            
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>photo</th>
                                            <th>Attendance Date</th>
                                            <th>Attendances</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr class="text-center">
                                                <td><h6 class="mt-2 text-muted">{{$employee->name}}</h6></td>
                                                <td>
                                                    <img height="40" width="50" src="{{asset('storage/employeesPhoto/'.$employee->photo)}}" alt="">
                                                </td>
                                                <td><h6 class="mt-2 text-muted">{{$date}}</h6></td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                    <input type="radio" required name="attendance[{{$employee->id}}]" value="Present"> Present
                                                    <input type="radio" required name="attendance[{{$employee->id}}]" value="Absence"> Absence
                                                    </h6>
                                                </td>
                                            </tr>                                                
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            <input class="btn btn-success" type="submit" value="Submit">
                        </form>
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