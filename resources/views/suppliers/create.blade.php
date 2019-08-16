@extends('layouts.master')
@push('css')

<style type="text/css">
    #image-preview {
      width: 180px;
      height: 140px;
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      color: #ecf0f1;
    }
    #image-preview input {
      line-height: 200px;
      font-size: 200px;
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
                                <a class="btn btn-primary btn-sm float-right" href="{{route('all.supplier')}}">Back</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body card-block">
                    <div class="row">
                        <div style="display:none;" class="col-sm-12 errorMsg">
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                <span class="badge badge-pill"></span> <span class="ErrorMessage"></span> 
                            </div>
                        </div>
                    </div>
                    <form id="createSupplier" action="{{route('store.supplier')}}" method="POST">
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
                                    <label for="name" class=" form-control-label">Email:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="email" placeholder="Email" name="email" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="payment_way" class=" form-control-label">Payment Way:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="payment_way" placeholder="Payment way" name="payment_way" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="phone" class=" form-control-label">Phone No:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="phone" placeholder="Phone number" name="phone" class="form-control form-control-sm">
                                </div> 
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="type" class=" form-control-label">Supplier Type:</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="type" class="form-control form-control-sm" id="type">
                                        <option value="">Select supplier type</option>
                                        <option value="1">Main Importer</option>
                                        <option value="2">Distributor</option>
                                        <option value="3">Sub-Dealer</option>
                                    </select>
                                </div> 
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="address" class=" form-control-label m-0">Address</label>
                            <textarea id="address" placeholder="Customer Address" name="address" class="form-control form-control-sm"></textarea>
                            <label for="shop_address" class="form-control-label m-0">Shop Address</label>
                            <textarea id="shop_address" placeholder="Shop Address" name="shop_address" class="form-control form-control-sm"></textarea>
                        </div>
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">Choose Photo</label>
                            <input type="file" name="photo" accept="image/*" id="image-upload" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-1">Save change</button>
                    </form>
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

        $('#createSupplier').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
          

        var name = $('#name').val();
        var city = $('#email').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var shop_address = $('#shop_address').val();
        var address = $('#address').val();
        var payment_way = $('#payment_way').val();
        var type = $('#type').val();
      
        
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
                    $('.successMsg').show();
                    var name = $('#name').val('');
                    var city = $('#email').val('');
                    var address = $('#address').val('');
                    var phone = $('#phone').val('');
                    var shop_address = $('#shop_address').val('');
                    var address = $('#address').val('');
                    var payment_way = $('#payment_way').val('');
                    var type = $('#type').val('');
                    $('.message').html(data.successMsg);
                }else{
                     $('.successMsg').hide(); 
                     $('.errorMsg').show(); 
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