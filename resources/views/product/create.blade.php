@extends('layouts.master')
@push('css')

<style type="text/css">
    #image-preview {
      width: 180px;
      height: 120px;
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      color: #ecf0f1;
    }
    #image-preview input {
      line-height: 200px;
      font-size: 20px;
      position: absolute;
      opacity: 0;
      z-index: 10;
    }
    #image-preview label {
      position: absolute;
      z-index: 5;
      opacity: 0.8;
      cursor: pointer;
      background-color: #bdc3c7;
      width: 200px;
      height: 50px;
      font-size: 20px;
      line-height: 50px;
      text-transform: uppercase;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      text-align: center;
    }
    </style>
@endpush
 @section('content')
 <div id="right-panel" class="right-panel">

    <!-- Header-->
    @include('partials.dashboard-header')
    <!-- Header-->

    <div class="content">
        <div style="display:none;" class="col-sm-12 successMsg">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> <span class="message">You successfully read this important alert message.</span> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Create Supplier</strong><small> Form</small>
                        </div>
                        <div class="col-md-6">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('all.product')}}">Back</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body card-block">
                    
                    <form id="createProduct" action="{{route('add.product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="name" class=" form-control-label">Name:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="name" placeholder="Name" name="name" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="brand" class=" form-control-label">Brand:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="brand" placeholder="Product brand" name="brand" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="price" class=" form-control-label">Vendor Price:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="vendor_price" placeholder="Vendor price" name="vendor_price" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="price" class=" form-control-label">Sale Price:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="price" placeholder="Sale price" name="price" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="quantity" class=" form-control-label">Quantity:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="quantity" placeholder="Product quantity" name="quantity" class="form-control form-control-sm">
                                </div> 
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="storage_no" class="form-control-label">Storage No:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="storage_no" placeholder="Storage No" name="storage_no" class="form-control form-control-sm">
                                </div> 
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="type" class=" form-control-label">Supplier Name:</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="supplier_id" class="form-control form-control-sm" id="supplier_id">
                                        <option value="">Select supplier this product supplier</option>
                                        @foreach ($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="type" class=" form-control-label">Category Name:</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="category_id" class="form-control form-control-sm" id="category_id">
                                            <option value="">Select this product category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        {{--  <div class="form-group">
                            <label for="address" class=" form-control-label m-0">Address</label>
                            <textarea id="address" placeholder="Customer Address" name="address" class="form-control form-control-sm"></textarea>
                            <label for="shop_address" class="form-control-label m-0">Shop Address</label>
                            <textarea id="shop_address" placeholder="Shop Address" name="shop_address" class="form-control form-control-sm"></textarea>
                        </div>  --}}
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">Choose Photo</label>
                            <input type="file" name="photo" accept="image/*" id="image-upload" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-1">Save change</button>
                    </form>
                    <div class="row">
                        <div style="display:none;" class="col-sm-12 errorMsg">
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill"></span> <span class="ErrorMessage"></span> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->
@endsection
@push('js')
<script src="{{asset('application_css_js/jquery.uploadPreview.min.js')}}"></script>
<script>

 jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.successMsg').hide();

  $('#createProduct').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
          

        var name = $('#name').val();
        var brand = $('#brand').val();
        var category_id = $('#category_id').val();
        var supplier_id = $('#supplier_id').val();
        var vendor_price = $('#vendor_price').val();
        var price = $('#price').val();
        var storage_no = $('#storage_no').val();
        var quantity = $('#quantity').val();
        var imageUpload = $('#image-upload').val(); 
      
        
         $.ajax({
            url:url,
            type:method,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType:'json',
            success:function(data){
                console.log(data);
                var errors = data.errorMsg;
                if($.isEmptyObject(data.errorMsg)){
                    $('.errorMsg').hide(); 
                    $('.successMsg').hide(300);
                    $('.successMsg').show(300);
                    var name = $('#name').val('');
                    var brand = $('#brand').val('');
                    var category_id = $('#category_id').val('');
                    var supplier_id = $('#supplier_id').val('');
                    var vendor_price = $('#vendor_price').val('');
                    var price = $('#price').val('');
                    var storage_no = $('#storage_no').val('');
                    var quantity = $('#quantity').val('');
                     var imageUpload = $('#image-upload').val(''); 
                    $('.message').html(data.successMsg);
                }else{
                     $('.successMsg').hide(500); 
                     $('.errorMsg').show(200); 
                     var AllError = "";
                    $.each(errors,function(key, error){
                        AllError +=error + "<br/>";
                    }) 
                    console.log(AllError)
                    $('.ErrorMessage').html(AllError );
                }
            }
        });   
        
    }); 

    $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label"
      });
})
   
</script>
  
@endpush