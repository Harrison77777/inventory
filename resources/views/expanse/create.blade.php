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
            <div class="alert art alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> <span class="message">You successfully read this important alert message.</span> 
                
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Add New Expanse</strong><small> Form</small> <br>
                            <strong>Date</strong><small> {{date('d/m/Y')}}</small> 
                        </div>
                        <div class="col-md-6">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('all.expanse')}}">Back</a>
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
                    <form id="createExpanse" action="{{route('add.expanse')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="description" class=" form-control-label">Description:</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea   name="description" id="description" placeholder="Expanse description" cols="30" rows="4" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="amount" class=" form-control-label">Amount:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="amount" placeholder="Expanse amount" name="amount" class="form-control form-control-sm">
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
        $('#createExpanse').on('submit',function(event){
        event.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        console.log(url+"<br/>"+method+"<br/>"+ $(this).serialize());
        var description = $('#description').val();
        var amount = $('#amount').val();
        
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
                    $('.errorMsg').hide(500); 
                    $('.successMsg').hide(500);
                    $('.successMsg').show(500);
                    var description = $('#description').val('');
                    var amount = $('#amount').val('');
                    $('.message').html(data.successMsg);
                }else{
                    $('.successMsg').hide(500); 
                     $('.errorMsg').show(300); 
                     var AllError = "";
                    $.each(errors,function(key, error){
                        AllError +=error + "<br/>";
                    }) 
                    console.log(AllError)
                    $('.ErrorMessage').html(AllError);
                }
            }
        });   
        
    }); 
}); 

   
</script>
  
@endpush