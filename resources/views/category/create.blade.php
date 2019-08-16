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
                            <strong>Create Supplier</strong><small> Form</small>
                        </div>
                        <div class="col-md-6">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('all.category')}}">Back</a>
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
                    <form id="createCategory" action="{{route('add.category')}}" method="POST">
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
                                    <label for="parent_category_id" class=" form-control-label">Parent Category:</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="parent_category_id" class="form-control form-control-sm" id="parent_category_id">
                                        <option value="">Select Parent category</option>
                                        @foreach ($mainCategory as $categroy)
                                        <option value="{{$categroy->id}}">{{$categroy->name}}</option>
                                        @endforeach 
                                    </select>
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

        $('#createCategory').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        console.log(url+"<br/>"+method+"<br/>"+ $(this).serialize());
          

        var name = $('#name').val();
        var parent_category_id = $('#parent_category_id').val();
        
      
        
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
                    var name = $('#name').val('');
                    var parent_category_id = $('#parent_category_id').val('');
                    $('.message').html(data.successMsg);
                }else{
                     $('.successMsg').hide(); 
                     $('.errorMsg').show(); 
                    $('.ErrorMessage').html(errors);
                }
            }
        });   
        
    }); 
}); 

   
</script>
  
@endpush