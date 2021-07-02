@extends('layouts.adminTemplate')
@section('page-title', 'Edit Campus')
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
                        <a class="btn btn-rose btn-fill" href="{{ url('admin/campus')}}">Back<div class="ripple-container"></div></a>
                    </div>
                    <form method="post" action="{{url('admin/campus-update')}}" class="save-form" enctype="multipart/form-data" id="edit-form">
                     {{ csrf_field() }}
                     <div class="card-content">
                        <div class="card-content">
                         <div class="row"> 
                          <input type="hidden" name="rowId" required="" value="{{$campus->id}}"> 
                             <div class="col-md-12">
                                <label class="col-sm-2 label-on-left">Name</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="name" placeholder="Enter name" required="" value="{{$campus->name}}">
                                         @if ($errors->has('name'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-12">
                                <label class="col-sm-2 label-on-left">Address</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                        <textarea name="address" class="form-control" rows="4" cols="130" id="ckeditor1">{{$campus->address}}</textarea>
                                         @if ($errors->has('address'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('address') }}</strong>
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