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
                <form id="acceptAdvanceSalaryForm" action="{{route('accept.advance.salary')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="name" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" name="emp_id" id="emp_id">
                                        <option value="">Select Employee name</option>
                                        @foreach ($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <label for="salary_amount" class=" form-control-label">Salary Amount:</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text"  id="salary_amount" placeholder="Salary Amount" name="salary_amount" class="form-control">
                                </div> 
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-2">
                                <label for="month" class=" form-control-label">Month</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" name="month" id="month">
                                    <option value="">Select  month of advance salary</option>
                                    <option value="January">January</option>
                                    <option value="Fabruary">Fabruary</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="Septembar">Septembar</option>
                                    <option value="Octiobar">Octiobar</option>
                                    <option value="Novembar">Novembar</option>
                                    <option value="Decembar">Decembar</option>                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                                <div class="row no-gutters">
                                    <div class="col-md-2">
                                        <label for="year" class="form-control-label">Year:</label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text"  id="year" placeholder="Year" name="year" class="form-control">
                                    </div> 
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success btn-block">Save change</button>
                    </form>
                    <div style="display:none;" class="col-sm-12 mt-1 errorMsg">
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-danger"><strong>Error</strong></span><span class="ErrorMessage text-danger"></span> 
                        </div>
                    </div>
                    <span class="duplicateErrorMsg"></span>
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
        $('#acceptAdvanceSalaryForm').on('submit',function(event){
        event.preventDefault();
        var url = $(this).attr('action');
        var method = $(this).attr('method');
        var name = $('#emp_id').val();
        var salary_amount = $('#salary_amount').val();
        var month = $('#month').val();
        var year = $('#year').val();
        
         $.ajax({
            url:url,
            type:method,
            data: $(this).serialize(),
            dataType:'json',
            success:function(data){
                console.log(data);
                var errors = data.errorMsg;
                {{--  var dupError = data.duplicateError;  --}}
                if($.isEmptyObject(data.errorMsg)){
                        $('.errorMsg').hide(); 
                        $('.successMsg').show();
                        var name = $('#emp_id').val('');
                        var salary_amount = $('#salary_amount').val('');
                        var month = $('#month').val('');
                        var year = $('#year').val(''); 
                        $('.message').html(data.successMsg);        
                }else{

                    
                    $('.successMsg').hide(); 
                    $('.errorMsg').show();
                    $('.ErrorMessage').html(errors); 
                      {{-- var AllError = "";
                    $.each(errors,function(key, error){
                        AllError +=error + "<br/>";
                    }) 
                    console.log(AllError);
                    $('.ErrorMessage').html(AllError); --}}
                }
            }
        });   
        
    });
})    
</script>
  
@endpush