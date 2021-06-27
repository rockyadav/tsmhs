@extends('layouts.adminTemplate')
@section('page-title', 'Edit Cluster Requirement')
@section('content')

<div class="content">

<style type="text/css">

.rimg{ 

  height : 50px!important;

  width : 50px!important ;

}

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

                        <a class="btn btn-rose btn-fill" href="{{ url('admin/cluster-requirement')}}">Back<div class="ripple-container"></div></a>

                    </div>

                    <form method="post" action="{{url('admin/clusterRequirementUpdate')}}" enctype="multipart/form-data">

                     {{ csrf_field() }}

                     <div class="card-content">

                        <div class="card-content">

                         <div class="row"> 
                        <input type="hidden" name="rowId" required="" value="{{$details->id}}"> 
                               <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">Grade</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="grade" placeholder="Enter grade" required="" value="{{$details->grade}}">
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
                                             <option value="{{$c->id}}" @if($details->category_id==$c->id) selected @endif>{{$c->name}}</option>
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
                                         <label class="control-label"></label>
                                         <select class="selectpicker " data-style="select-with-transition" title="Choose course" data-size="7" name="course" id="courses" data-live-search="true" required="true">
                                             <option value="" >Choose course </option>
                                             @if(!empty($courses))
                                                @foreach($courses as $c)
                                                 <option value="{{$c->id}}" @if($details->course_id==$c->id) selected @endif>{{$c->name}}</option>
                                                @endforeach
                                             @endif
                                            </select>
                                         @if ($errors->has('course'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('course') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-sm-1 label-on-left">Description</label>
                                 <div class="col-sm-11">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <textarea name="description" class="form-control" rows="4" cols="130" id="ckeditor1" required="">{{$details->description}}</textarea>
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

                        <button class="btn btn-rose btn-fill" type="submit">Update</button>

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
</script>


@endsection