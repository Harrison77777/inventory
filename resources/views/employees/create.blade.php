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

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add Employee</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><a class="btn btn-primary btn-sm" href="{{route('employees')}}">Back</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">

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
                    <strong>Employee Register</strong><small> Form</small>
                </div>
                <div class="card-body card-block">
                    <form id="addEmployeeForm" class="addEmployeeForm" action="{{route('store.employee')}}"     method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class=" form-control-label">Name</label>
                            <input type="text" value="{{old('name')}}" id="name" placeholder="Name" name="name" class="form-control">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            
                            <label for="email" class=" form-control-label">Email address</label>
                            <input type="text" id="email" value="{{old('email')}}" placeholder="Email address" name="email" class="form-control">
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone" class=" form-control-label">Phone number</label>
                            <input type="text" value="{{old('phone')}}" id="phone" placeholder="Phone number" name="phone" class="form-control">
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="city" class=" form-control-label">City</label>
                            <input type="text" value="{{old('city')}}" id="city" placeholder="city" name="city" class="form-control">
                            <span class="text-danger">{{$errors->first('city')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="experience" class=" form-control-label">Exparience</label>
                            <input type="text" value="{{old('exparience')}}" id="experience" placeholder="experience" name="experience" class="form-control">
                            <span class="text-danger">{{$errors->first('experience')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="salary" class=" form-control-label">Salary</label>
                            <input type="text" value="{{old('salary')}}" id="salary" placeholder="salary" name="salary" class="form-control">
                            <span class="text-danger">{{$errors->first('salary')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="address" class=" form-control-label">Address</label>
                            <textarea id="address" placeholder="Email address" name="address" class="form-control"></textarea>
                            <span class="text-danger">{{$errors->first('address')}}</span>
                        </div>
                        
                        {{--  <div class="form-group">
                            <label for="photo" class=" form-control-label">Employee photo</label>
                            <input  type="file" id="photo" accept="image/*" name="photo" class="form-control">
                            <span class="text-danger">{{$errors->first('photo')}}</span>
                        </div>  --}}

                        <div id="image-preview">
                            <label for="image-upload" id="image-label">Choose Photo</label>
                            <input type="file" name="photo" accept="image/*" id="image-upload" />
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
        $('#addEmployeeForm').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
        var type = $(this).attr('method');

        var name = $('#name').val();
        var email = $('#email').val();
        var city = $('#city').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var salary = $('#salary').val();
        var experience = $('#experience').val();
        var photo = $('#image-upload').val();

        form = $('#addEmployeeForm');
         $.ajax({
            url:url,
            type:type,
            data: new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            dataType:'json',
            success:function(data){
                var errors = data.errorMsg;
                if($.isEmptyObject(data.errorMsg)){
                    $('.errorMsg').hide(500); 
                    $('.successMsg').hide(500);
                    $('.successMsg').show(500);
                    $('.message').html(data.successMsg);
                    var name = $('#name').val('');
                    var email = $('#email').val('');
                    var city = $('#city').val('');
                    var address = $('#address').val('');
                    var phone = $('#phone').val('');
                    var salary = $('#salary').val('');
                    var experience = $('#experience').val('');
                    var photo = $('#image-upload').val(''); 
                }else{
                     $('.successMsg').hide(500); 
                     $('.errorMsg').show(500); 
                    $.each(errors,function(key, error){
                        $('.ErrorMessage').html(error);
                    }) 
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