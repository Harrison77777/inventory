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
                            <strong>Add Admin</strong><small> Form</small>
                        </div>
                        
                    </div>
                    <div style="display:none;" class="col-sm-12 mt-1 errorMsg">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill"></span> <span class="ErrorMessage"></span> 
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                <form id="createUser" action="{{route('add.user')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="username" class=" form-control-label">Username</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="username" placeholder="Username" name="username" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="email" placeholder="Email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="role" class=" form-control-label">Role</label>
                                </div>
                                <div class="col-md-10">
                                  <select class=" form-control form-control-sm" name="role" id="role">
                                      <option value="">Select admin role</option>
                                      <option value="1">Super Admin</option>
                                      <option value="2">Admin</option>
                                      <option value="3">Checker</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="password" class=" form-control-label">Password</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="password" placeholder="Password" name="password" class="form-control">
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="confirmation_password" class=" form-control-label">Confirm password</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="confirmation_password" placeholder="Confirm Password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                        </div>
                       
                        <button type="submit" class="btn btn-success btn-block">Save change</button>
                    </form>
                    {{--  <div style="display:none;" class="col-sm-12 mt-1 errorMsg">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill"></span> <span class="ErrorMessage"></span> 
                        </div>
                    </div>  --}}
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

        $('#createUser').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
          

        var username = $('#name').val();
        var eamil = $('#email').val();
        var role = $('#role').val();
        var password = $('#password').val();
        var confirm_password = $('#confirmation_password').val();
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
                    var username = $('#name').val();
                    var eamil = $('#email').val();
                    var role = $('#role').val();
                    var password = $('#password').val();
                    var confirm_password = $('#confirmation_password').val();
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