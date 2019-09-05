@extends('layouts.master')
@push('css')

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
                            <strong>Change Password</strong><small> Form</small>
                        </div>
                        <div class="col-md-6">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('profile.show')}}">Back</a>
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
                    <form id="changePassword" action="{{route('change.password')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="old_password" class=" form-control-label">Old password:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="password"  id="old_password" placeholder="Old password" name="old_password" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="password" class=" form-control-label">New password:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="password"  id="old_password" placeholder="New password" name="password" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="password_confirmation" class=" form-control-label">Confirm password:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="password"  id="password_confirmation" placeholder="Confirm password" name="password_confirmation" class="form-control form-control-sm">
                                </div>
                            </div>
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

        $('#changePassword').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var old_password = $('#old_password').val();
        var password = $('#password').val();
        var password_confirmation = $('#password_confirmation').val();
         $.ajax({
            url:url,
            type:method,
            data: $(this).serialize(),
            dataType:'json',
            success:function(data){
                console.log(data);
                var errors = data.errorMsg;
                if($.isEmptyObject(data.errorMsg)){
                    console.log(data.successMsg);
                    $('.errorMsg').hide(); 
                    $('.successMsg').show();
                    var old_password = $('#old_password').val('');
                    var password = $('#password').val('');
                    var password_confirmation = $('#password_confirmation').val('');
                    $('.message').html(data.successMsg);
                }else{
                     $('.successMsg').hide(); 
                     $('.errorMsg').show(); 
                    $('.ErrorMessage').html(errors + '<br/>');

                }
            }
        });          
    }); 
}); 

   
</script>
  
@endpush