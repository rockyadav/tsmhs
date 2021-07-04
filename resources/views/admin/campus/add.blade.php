@extends('layouts.adminTemplate')
@section('page-title', 'Add Campus')
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
                    <a class="btn btn-rose btn-fill" href="{{ url('admin/campus') }}">Back<div class="ripple-container"></div></a>
                </div>
            <form method="post" action="{{route('campus.store')}}"  enctype="multipart/form-data" id="edit-form">
                 {{ csrf_field() }}
                 <div class="card-content">
                     <div class="row">
                        <div class="col-md-12">
                            <label class="col-sm-2 label-on-left">Name</label>
                             <div class="col-sm-10">
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
                         <div class="col-md-12">
                            <label class="col-sm-2 label-on-left">Address</label>
                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <textarea name="address" class="form-control" id="ckeditor1" rows="4" cols="130"></textarea>
                                     @if ($errors->has('address'))
                                         <span class="error-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                     @endif
                                 </div>
                             </div>
                        </div>
                         <div class="col-md-12"> <br>
                         <label class="col-sm-3 label-on-left">Principal's Desk</label>
                         <div class="card-profile" style="text-align: left;">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ url('public/images/placeholder.jpg') }}" style="height: 100px; width: 135px;" alt="..." class="img">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail " style="height: 100px; width: 135px;"></div>
                                    <p>(Size : 210x300)</p>
                                    <div class="change-img-btn">
                                        <span class="btn btn-primary btn-round btn-file">
                                            <span class="fileinput-new">Upload image</span>
                                            <span class="fileinput-exists">Change</span> 
                                            <input type="file" name="pimage" accept="image/*" />
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                    <span class="error_image error"></span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                            <label class="col-sm-2 label-on-left">About Principal's</label>
                             <div class="col-sm-10">
                                 <div class="form-group label-floating is-empty">
                                     <label class="control-label"></label>
                                     <textarea name="about_principal" class="form-control" id="ckeditor2" rows="4" cols="130"></textarea>
                                     @if ($errors->has('about_principal'))
                                         <span class="error-block">
                                        <strong>{{ $errors->first('about_principal') }}</strong>
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
  CKEDITOR.replace( 'ckeditor2'); 
  CKEDITOR.allowedContent = true;
</script>
@endsection