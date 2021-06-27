@extends('layouts.adminTemplate')
@section('page-title', 'Add Course')
@section('content')

<div class="content">

<style type="text/css">

 .label-on-left {
   padding-top: 15px;
 }

</style>

@include('layouts.error-sucess-messages')

 <div class="container-fluid">

     <div class="row"> 

         <div class="col-md-12">

             <div class="card">

                    <div class="back-btn text-right">

                        <a class="btn btn-rose btn-fill" href="{{ url('admin/courses') }}">Back<div class="ripple-container"></div></a>

                    </div>

                <form method="post" action="{{route('courses.store')}}" enctype="multipart/form-data" id="edit-form">

                     {{ csrf_field() }}

                     <div class="card-content">

                         <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Department</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         @php
                                            $old = old('department');
                                         @endphp
                                         <select class="form-control" name="department" required="">
                                             <option value="">Select Department</option>
                                             @foreach($data['departments'] as $dt)
                                             <option value="{{$dt->id}}" @if($old==$dt->id) selected @endif>{{$dt->name}}</option>
                                             @endforeach
                                         </select>
                                         @if ($errors->has('department'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Category</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         @php
                                            $old = old('category');
                                         @endphp
                                         <select class="form-control" name="category" required="">
                                             <option value="">Select Category</option>
                                             @foreach($data['category'] as $cat)
                                             <option value="{{$cat->id}}" @if($old==$cat->id) selected @endif>{{$cat->name}}</option>
                                             @endforeach
                                         </select>
                                         @if ($errors->has('category'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Name</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="name" placeholder="Enter name" required="" value="{{old('name')}}">
                                         @if ($errors->has('name'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                               <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Duration</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="duration" placeholder="Enter duration" required="" value="{{old('duration')}}">
                                         @if ($errors->has('duration'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('duration') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                               <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Course Fee</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="course_fee" placeholder="Enter course fee" required="" value="{{old('course_fee')}}">
                                         @if ($errors->has('course_fee'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('course_fee') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Exam Board</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="exam_board" placeholder="Enter exam board" required="" value="{{old('exam_board')}}">
                                         @if ($errors->has('exam_board'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('exam_board') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-12">
                                <label class="col-sm-2 label-on-left">Description</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <textarea name="description" class="form-control" rows="4" cols="130" id="ckeditor1" required=""></textarea>
                                         @if ($errors->has('description'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                             <div class="col-md-6"> <br>
                                 <label class="col-sm-3 label-on-left">Image</label>
                                <div class="card-profile" style="text-align: left;">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ url('public/images/placeholder.jpg') }}" style="height: 100px; width: 135px;" alt="..." class="img">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail " style="height: 100px; width: 135px;"></div>
                                            <div class="change-img-btn">
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Upload image</span>
                                                    <span class="fileinput-exists">Change</span> 
                                                    <input type="file" name="image" accept="image/*" id="upload"  onchange="return ValidateFileUpload()" required="" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                            <span class="error_image error"></span>
                                        </div>
                                </div>
                            </div>
                         </div>

                         <div class="row text-center">

                             <button class="btn btn-rose btn-fill" type="submit">Save</button>

                         </div>
                     </div>

                  </form>
             </div>

         </div> 

     </div>

 </div>

</div>



<script type="text/javascript">

CKEDITOR.replace( 'ckeditor1'); 
CKEDITOR.allowedContent = true;

$(document).ready(function(){

$('#manufacturer').change(function(){

    var manufacturer = $(this).val();

    if(manufacturer!=''){

        $.ajax({

           type:"GET",

           url:"{{url('admin/get-model-list')}}?manufacturer_id="+manufacturer,

           success:function(res){ 

            if(res){

                $("#model_id").empty();

                $('#model_id').selectpicker('refresh');

                $("#model_id").append('<option value=""> {{ trans('Choose model')}}</option>');

                $("#serial_number").empty();

                $('#serial_number').selectpicker('refresh');

                $("#serial_number").append('<option value=""> {{ trans('Choose model first')}}</option>');

                $.each(res,function(key,value){

                    $("#model_id").append('<option value="'+key+'">'+value+'</option>');

                });

                $('#model_id').selectpicker('refresh');

           

            }else{

               $("#model_id").empty();

               $("#model_id").append('<option value=""> {{ trans('Choose manufacturer first')}}</option>');

                $('#model_id').selectpicker('refresh');



              $("#serial_number").empty();

              $("#serial_number").append('<option value=""> {{ trans('Choose model first')}}</option>');

              $('#serial_number').selectpicker('refresh');

               

            }

           }

        });



    }else{



          $("#model_name").empty();

          $("#model_name").append('<option value=""> {{ trans('Choose manufacturer first')}}</option>');

          $('#model_name').selectpicker('refresh');



            $("#serial_number").empty();

          $("#serial_number").append('<option value=""> {{ trans('Choose model first')}}</option>');

          $('#serial_number').selectpicker('refresh');

    }      

   });





$('#model_id').change(function(){

    var model_id = $(this).val();

    if(model_id!=''){

        $.ajax({

           type:"GET",

           url:"{{url('admin/get-serial-number-list')}}?model_id="+model_id,

           success:function(res){ 

            if(res){

                $("#serial_number").empty();

                $('#serial_number').selectpicker('refresh');

                $("#serial_number").append('<option value=""> {{ trans('Choose serial number')}}</option>');

                $.each(res,function(key,value){

                    $("#serial_number").append('<option value="'+key+'">'+value+'</option>');

                });

                $('#serial_number').selectpicker('refresh');

           

            }else{

               $("#serial_number").empty();

               $("#serial_number").append('<option value=""> {{ trans('Choose model first')}}</option>');

                $('#serial_number').selectpicker('refresh');

               

            }

           }

        });



    }else{



          $("#model_name").empty();

          $("#model_name").append('<option value=""> {{ trans('Choose manufacturer first')}}</option>');

          $('#model_name').selectpicker('refresh');

    }      

   });





});

</script>





@endsection