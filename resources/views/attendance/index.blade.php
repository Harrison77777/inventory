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
                    <h1>Manage Attendance</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a class="btn btn-info btn-sm" href="{{route('current.month.attendance', $currentMonth)}}">All Attendance of current Month</a></li>
                        <li class="active"><a class="btn btn-info btn-sm" href="{{route('take.attendance')}}">Take Attendance</a></li>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong class="card-title">All Employees Attendance Of Today</strong>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="card-title text-right">Today: {{$date}}</strong>
                                    </div>
                                </div>                                
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>photo</th>
                                            <th>Presend/Absence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendances as $attendance)
                                            <tr class="text-center">
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$attendance->employee->name}}
                                                    </h6>
                                                </td> 
                                                <td>
                                                    <img height="40" width="50" src="{{asset('storage/employeesPhoto/'.$attendance->employee->photo)}}" alt="">
                                                </td>  
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$attendance->attend}} {!!$attendance->attend == "Present" ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-times-circle text-danger"></i>'!!} 
                                                    </h6>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </form>                                    
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
        function deleteCategoryAlert(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
              
              swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {

                 event.preventDefault();
                 document.getElementById('deleteCategoryForm-'+id).submit();

                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                  )
                }
              })
        }
    jQuery(document).ready(function($) {
        $('#bootstrap-data-table-export').DataTable({
            ordering:false,
            select: false
        });
    })
</script>
@endpush