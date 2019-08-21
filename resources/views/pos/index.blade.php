@extends('layouts.master')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<style>
    .paginate_button {
        color: red;
        padding: 0px 4px!important;
        background: red;
    }
    input.qty {
        height: 27px;
        width: 49px;
    }
    td.qty-area {
        display: flex;
        justify-content: center;
        align-items: center;
        align-self: center;
    }
    .btn-s {
        padding: 0px;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 5px;
        padding-right: 5px;
        border-radius: 2px;
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
                        <h1>Point of sale (POS)</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        {{--  <ol class="breadcrumb text-right">
                            <li class="active"><a class="btn btn-info btn-sm" href="{{route('create.product')}}">Add Product</a></li>
                        </ol>  --}}
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
                    <div class="col-md-5">
                        <div class="heading">
                            <h5 class="mb-1">Customer information</h5>
                        </div>
                        <form action="">
                            <div class="customer-info-area border p-2 rounded" >
                                <div class="form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <label for="name"> Name :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input placeholder="Customer name" type="text" name="name" class=" form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <label for="email">E-Mail  :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input placeholder="Customer e-mail" type="text" name="email" class=" form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <label for="address"> Address :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="address" class=" form-control form-control-sm m-0" placeholder="Customer address" id="address" cols="15" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="added-product-area-pos">
                                <div class="added-heading">
                                    <h5 class="my-2">All added product for saling</h5>
                                </div>
                                <div class="added-product-table">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Pro Name</th>
                                                <th>Brand</th>
                                                <th>Cat</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Toyota Crolla</td>
                                            
                                                <td>Toyota</td>
                                            
                                                <td>Car</td>
                                                <td class="qty-area">
                                                   
                                                    <input  class=" qty form-control form-control-sm" type="number" name='quantiy'> 
                                                        <a class="btn-sm btn-info btn ml-2 btn-s" href=""><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td>2000.00</td>
                                                <td>2000.00</td>
                                            </tr>
                                            <tr>
                                                <td>Toyota Crolla</td>
                                            
                                                <td>Toyota</td>
                                            
                                                <td>Car</td>
                                                <td class="qty-area">
                                                   
                                                    <input  class=" qty form-control form-control-sm" type="number" name='quantiy'> 
                                                        <a class="btn-sm btn-info btn ml-2 btn-s" href=""><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td>2000.00</td>
                                                <td>2000.00</td>
                                            </tr>
                                            <tr>
                                                <td>Toyota Crolla</td>
                                            
                                                <td>Toyota</td>
                                            
                                                <td>Car</td>
                                                <td class="qty-area">
                                                   
                                                    <input  class=" qty form-control form-control-sm" type="number" name='quantiy'> 
                                                        <a class="btn-sm btn-info btn ml-2 btn-s" href=""><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td>2000.00</td>
                                                <td>2000.00</td>
                                            </tr>
                                            <tr>
                                                <td>Toyota Crolla</td>
                                            
                                                <td>Toyota</td>
                                            
                                                <td>Car</td>
                                                <td class="qty-area">
                                                   
                                                    <input  class=" qty form-control form-control-sm" type="number" name='quantiy'> 
                                                        <a class="btn-sm btn-info btn ml-2 btn-s" href=""><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td>2000.00</td>
                                                <td>2000.00</td>
                                            </tr>
                                            <tr>
                                                <td>Toyota Crolla</td>
                                            
                                                <td>Toyota</td>
                                            
                                                <td>Car</td>
                                                <td class="qty-area">
                                                   
                                                    <input  class=" qty form-control form-control-sm" type="number" name='quantiy'> 
                                                        <a class="btn-sm btn-info btn ml-2 btn-s" href=""><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td>2000.00</td>
                                                <td>2000.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                            <div class="create-invoice-button-area">
                                <button type="submit" class="btn btn-success btn-sm">Create Invoice</button>
                            </div>                          
                        </form>
                    </div>
                    <div class="col-md-7">
                       <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Products</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Quantity</th>
                                            <th>Photo</th>
                                            <th>Sale Price</th>
                                            <th>Add Pos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="text-center">
                                               
                                                <td><h6 class="mt-2 text-muted">{{$product->name}}</h6></td> 
                                                  
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$product->brand}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$product->quantity}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <img width="50" height="40" src="{{asset('storage/product/'.$product->photo)}}" alt="">
                                                </td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        {{$product->price}}
                                                    </h6>
                                                </td>
                                                <td>
                                                    <h6 class="mt-2 text-muted">
                                                        <a class="btn btn-sm btn-success" href="{{$product->id}}"><i class="ti ti-shopping-cart-full"></i></a>
                                                    </h6>
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
        function deleteProductrAlert(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
              })
              
              swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {

                 event.preventDefault();
                 document.getElementById('deleteProductForm-'+id).submit();

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