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
                        <h1>Manage Customers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><a class="btn btn-info btn-sm" href="{{route('create.customer')}}">Add Customer</a></li>
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
                                <strong class="card-title">All Customer</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Shop_or_company</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr class="text-center">
                                                <td><h6 class="mt-2 text-muted">{{$customer->name}}</h6></td>
                                                <td><h6 class="mt-2 text-muted">{{$customer->email}}</h6></td>
                                                <td><h6 class="mt-2 text-muted">{{$customer->phone}}</h6></td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$customer->shop_or_company}}
                                                    </h6>
                                                </td>  
                                                <td>
                                                    <a class="btn btn-info btn-sm mt-1" href="{{route('details.customer', $customer->id)}}">Details</a>
                                                    <button type="button" onclick="deleteCustomerAlert({{$customer->id}});" class="btn btn-danger btn-sm mt-1">Delete</button>
                                                    <form style="display:none;" id="deleteCustomerForm-{{$customer->id}}" method="POST" action="{{route('delete.customer', $customer->id)}}">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
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
        function deleteCustomerAlert(id){
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
                 document.getElementById('deleteCustomerForm-'+id).submit();

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