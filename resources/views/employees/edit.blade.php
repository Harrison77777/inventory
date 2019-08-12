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
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Employee Update</strong><small> Form</small>
                        </div>
                        <div class="col-md-6">
                                <a class="btn btn-primary btn-sm float-right" href="{{route('employees')}}">Back</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body card-block">
                <form id="updateEmployeeForm"  action="{{route('employee.update',$employee->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="{{$employee->name}}" id="name" placeholder="Name" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="phone" class=" form-control-label">Phone No:</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="{{$employee->phone}}" id="phone" placeholder="Phone number" name="phone" class="form-control">
                                </div> 
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="city" class=" form-control-label">City</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="{{$employee->city}}" id="city" placeholder="city" name="city" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="experience" class=" form-control-label">Exparience</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="{{$employee->experience}}" id="experience" placeholder="experience" name="experience" class="form-control">
                                </div> 
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="salary" class=" form-control-label">Salary</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="text" value="{{$employee->salary}}" id="salary" placeholder="salary" name="salary" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class=" form-control-label">Address</label>
                            <textarea id="address" name="address" class="form-control">{{$employee->address}}</textarea>
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

        $('#updateEmployeeForm').on('submit',function(event){
        event.preventDefault();
        
        var url = $(this).attr('action');
       

        var name = $('#name').val();
        var city = $('#city').val();
        var address = $('#address').val();
        var phone = $('#phone').val();
        var salary = $('#salary').val();
        var experience = $('#experience').val();
         $.ajax({
            url:url,
            type:'post',
            data: $(this).serialize(),
            dataType:'json',
            success:function(data){
                console.log(data);
                var errors = data.errorMsg;
                if($.isEmptyObject(data.errorMsg)){
                    $('.errorMsg').hide(); 
                    $('.successMsg').show(); 
                    $('.message').html(data.successMsg);
                }else{
                     $('.successMsg').hide(); 
                     $('.errorMsg').show(); 
                    $.each(errors,function(key, error){
                        $('.ErrorMessage').html(error);
                    }) 
                }
            }
        });   
        
    });
    })
</script>
  
@endpush