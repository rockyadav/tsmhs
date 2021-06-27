@extends('layouts.adminTemplate')
@section('page-title', 'Add Cluster Requirement')
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

                        <a class="btn btn-rose btn-fill" href="{{ url('admin/cluster-requirement') }}">Back<div class="ripple-container"></div></a>

                    </div>

                <form method="post" action="{{route('cluster-requirement.store')}}" enctype="multipart/form-data">

                     {{ csrf_field() }}

                     <div class="card-content">

                         <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">Grade</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="grade" placeholder="Enter grade" required="" value="{{old('grade')}}">
                                         @if ($errors->has('grade'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('grade') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                           <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">Category</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <select class="selectpicker" data-style="select-with-transition" title="Choose category" data-size="7" name="category" id="category" data-live-search="true" required="true">
                                             <option value="" >Choose Category </option>
                                             @foreach($data['category'] as $c)
                                             <option value="{{$c->id}}" >{{$c->name}}</option>
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
                        </div>

                         <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">Course</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                        <select class="selectpicker" data-style="select-with-transition" title="Choose course" data-size="7" name="course" id="courses" data-live-search="true" required="true">
                                         @if ($errors->has('course'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('course') }}</strong>
                                            </span>
                                         @endif
                                        </select>
                                     </div>
                                 </div>
                            </div>
                       
                        <div class="col-md-12">
                            <label class="col-sm-1 label-on-left">Description</label>
                             <div class="col-sm-11">
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