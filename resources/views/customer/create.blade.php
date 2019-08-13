@extends('layouts.master')
@push('css')

<style type="text/css">
    #image-preview {
      width: 200px;
      height: 200px;
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
                            <strong>Create Customer</strong><small> Form</small>
                        </div>
                        <div class="col-md-6">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('all.customer')}}">Back</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body card-block">
                <form id="createCustomer" action="{{route('store.customer')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="name" placeholder="Name" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="name" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="email" placeholder="Email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="phone" class=" form-control-label">Phone No:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="phone" placeholder="Phone number" name="phone" class="form-control">
                                </div> 
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="shop_or_company" class=" form-control-label">Shop/company</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="shor_or_company" placeholder="Shop_or_company" name="shop_or_company" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="experience" class=" form-control-label">Bank holder(opt)</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="bank_holder" placeholder="Bank_holder" name="bank_holder" class="form-control">
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="bank_branch" class=" form-control-label">Bank branch(opt)</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="bank_branch" placeholder="Bank_branch" name="bank_branch" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="bank_account" class=" form-control-label">Bank account(opt)</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="bank_account" placeholder="Bank_account" name="bank_account" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class=" form-control-label">Address</label>
                            <textarea id="address" placeholder="Customer Address" name="address" class="form-control"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success btn-block">Save change</button>
                    </form>
                    <div style="display:none;" class="col-sm-12 mt-1 errorMsg">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill"></span> <span class="ErrorMessage"></span> 
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

        $('#createCustomer').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
          

        var name = $('#name').val();
        var city = $('#email').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var banck_holder = $('#banck_holder').val();
        var banck_brance = $('#banck_brance').val();
        var banck_account = $('#banck_account').val();
        var shor_or_company = $('#shor_or_company').val();
        
         $.ajax({
            url:url,
            type:method,
            data: $(this).serialize(),
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
                    var banck_holder = $('#bank_holder').val('');
                    var banck_brance = $('#bank_brance').val('');
                    var banck_account = $('#bank_account').val('');
                    var shor_or_company = $('#shor_or_company').val(''); 
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
    })  
</script>
  
@endpush