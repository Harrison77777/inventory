@extends('layouts.master')
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="{{asset('application_css_js/toastr.min.css')}}">
<style>
    .paginate_button {
        color: red;
        padding: 0px 4px!important;
        background: red;
    }
    input.qty {
        height: 27px;
        width: 50px;
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
    tbody.showAllPropareProducts form {
        width: 50px;
    }
    
    .margin {
        margin-left: -4px;
    }
</style>
@endpush
 @section('content')
 <div id="right-panel" class="right-panel">
{{--  Hidden input field for geting all prepare products  --}}
<input class="getPrepareProductsUrl" type="hidden" value="{{route('get.all.prepare.products')}}">
{{--  Hidden input field for geting all prepare products  --}}
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
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="heading">
                            <h5 class="mb-1">Customer information</h5>
                        </div>
                        <form method="POST" action="{{route('confirm.product')}}">
                            @csrf
                            <div class="customer-info-area border p-2 rounded" >
                                <div class="form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <label for="name"> Name :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input placeholder="Customer name" value="{{old('name')}}" type="text" name="name" class=" form-control form-control-sm">
                                            <p class="text-danger mb-0">{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <label for="email">E-Mail  :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input placeholder="Customer e-mail" value="{{old('email')}}" type="text" name="email" class=" form-control form-control-sm">
                                            <p class="text-danger mb-0">{{$errors->first('email')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row no-gutters">
                                        <div class="col-md-2">
                                            <label for="address"> Address :</label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea name="address" class=" form-control form-control-sm m-0" placeholder="Customer address" id="address" cols="15" rows="2">{{old('address')}}</textarea>
                                            <p class="text-danger mb-0">{{$errors->first('address')}}</p>
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
                                               <th>Del</th>
                                                <th>Pro Name</th>
                                                <th>Brand</th>
                                                <th>Cat</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody class="showAllPropareProducts">
                                            <tr>
                                                
                                                <td>Name</td>
                                            
                                                <td>Brand</td>
                                            
                                                <td>Category</td>
                                                <td class="qty-area">
                                                   
                                                    <input class=" qty form-control form-control-sm" type="number" name='quantiy'> 
                                                        <a class="btn-sm btn-info btn ml-2 btn-s" href=""><i class="fa fa-plus"></i></a>
                                                </td>
                                                <td>price</td>
                                                <td>Total price</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                            <div class="total-amount-section border text-right clearfix pr-1 py-1">
                                <h6 class="float-right">Total : <span class="text-danger total-amount"></span>  TK.</h6><br>
                                <h6 class="float-right">Vat : <span class="text-danger">10%</span>  TK.</h6><br>
                                <h6 class="float-right">Grand Total : <span class="text-danger grand-total">10%</span>  TK.</h6>
                            </div>
                            <div class="create-invoice-button-area">
                                <button type="submit" class="btn btn-success btn-sm">Create Invoice</button>
                            </div>                          
                        </form>
                    </div>
                    <div class="col-md-6">
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
                                                        <a
                                                         class="btn btn-sm prepareProduct btn-success" data-id="{{$product->id}}" href="{{route('prepare.to.sale')}}"><i class="ti ti-shopping-cart-full"></i>
                                                        </a>
                                                    </h6>                                               
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
    </div> <!-- .content <-->
    <a href=""></a>
</div><!-- /#right-panel -->
@endsection
@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="{{asset('application_css_js/toastr.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
       
    jQuery(document).ready(function($) {

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $(document).on('click', '.prepareProduct', function(event){
            event.preventDefault();
            var url = $(this).attr('href');
            var productId = $(this).data('id');
            $.ajax({
                url:url,
                type:'post',
                data:{productId:productId},
                dataType:'json',
                success:function(data){
                    getAllPropareProducts();
                    if($.isEmptyObject(data.errorMsg)){
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": true,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "100",
                            "hideDuration": "1000",
                            "timeOut": "1000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        Command: toastr["success"](data.successMsg)
                        
                    }else{
                        toastr.options = {
                            "closeButton":true,
                            "debug": false,
                            "newestOnTop":true,
                            "progressBar":true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates":false,
                            "onclick": null,
                            "showDuration": "100",
                            "hideDuration": "1000",
                            "timeOut": "1000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                        Command: toastr["error"](data.errorMsg) 
                    }
                }
            })
          })
        

          function getAllPropareProducts(){
              var getProductUrl = $('.getPrepareProductsUrl').val();
              $.ajax({
                  url: getProductUrl,
                  type:'get',
                  dataType:'json',
                  success:function(data){
                      var allPrepareProducts = data.prepareProducts;
                      
                      var showProducts = '';
                      var totalPrice = 0;
                       $.each(allPrepareProducts, function(key,prepareProduct){
                        showProducts +=  '<tr>';
                        showProducts += '<td>';
                        showProducts +='<a class="btn btn-danger btn-sm btn-s pb-1 deleteProductFormPos" data-id="'+prepareProduct.id+'" href="{{route('del.pro.from.pos')}}"> x </a>';
                        showProducts +='</td>'; 
                        showProducts += '<td>'+prepareProduct.product.name+'</td>';
                        showProducts +=  '<td>'+prepareProduct.product.brand+'</td>';   
                        showProducts += '<td>'+prepareProduct.product.category.name+'</td>';
                        showProducts +=  '<td  class="qty-area">';

                showProducts +='<form class="updateQuantityForm" method="POST" action="{{route('update.quantity')}}">';
                showProducts +='@csrf';
                showProducts += '<input id="id" type="hidden" class="id" name="id" value="'+prepareProduct.id+'">'; 
                showProducts += '<div class="row margin">';
                showProducts += '<input value="'+prepareProduct.quantity+'" id="qty" name="qty" class=" qty form-control form-control-sm" type="text" name="qty">'; 
                 {{-- showProducts +='<input class="btn-sm btn-success btn" value="+" type="submit">'; --}}
                  
                showProducts +='</div>';
                     
                showProducts += '</form>';
                showProducts += '<button type="button" class="btn-sm btn-success btn btn-s" ><i class="fa fa-plus"></i></button>';
               
                showProducts += '</td>';
                showProducts +='<td>'+parseInt(prepareProduct.product.price).toLocaleString()+'</td>';
                showProducts += '<td>'+parseInt(prepareProduct.product.price * prepareProduct.quantity).toLocaleString()+'</td>';
                showProducts += '</tr>';
                totalPrice = totalPrice + prepareProduct.product.price * prepareProduct.quantity;
                 
                        }) 
                      $('.showAllPropareProducts').html(showProducts);  
                      $('.total-amount').html(parseInt(totalPrice).toLocaleString()+'.00'); 
                     
                      $('.grand-total').html(parseInt(totalPrice * 0.10 + totalPrice).toLocaleString()+'.00');
                       
                  }
              });
          }
          getAllPropareProducts();

          $(document).on("blur", ".updateQuantityForm", function(e){
            e.preventDefault();
              
              var url = $(this).attr('action');
              var method = $(this).attr('method');
              $.ajax({
                  url:url,
                  type:method,
                  data:$(this).serialize(),
                  dataType:'json',
                  success:function(data){
                      getAllPropareProducts();
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "100",
                        "hideDuration": "1000",
                        "timeOut": "1000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                      Command: toastr["success"](data.successMsg)                    
                  }
              }); 
              
          })

           $(document).on('click', '.deleteProductFormPos',function(event){
              event.preventDefault();
              var proId = $(this).data('id');
              var url = $(this).attr('href');
              $.ajax({
                  url:url,
                  type:'POST',
                  data:{proId:proId},
                  dataType:'json',
                  success:function(data){
                    getAllPropareProducts();
                     toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "100",
                        "hideDuration": "1000",
                        "timeOut": "1000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                      Command: toastr["success"](data.successMsg)
                  }
              });
          }); 
          

        $('#bootstrap-data-table-export').DataTable({
            ordering:false,
            select: false
        });
    })
    
</script>
@endpush