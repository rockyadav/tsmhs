@extends('layouts.adminTemplate')
@section('page-title', 'Add News')
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
                        <a class="btn btn-rose btn-fill" href="{{ url('admin/news') }}">Back<div class="ripple-container"></div></a>
                    </div>
                <form method="post" action="{{route('news.store')}}" enctype="multipart/form-data" id="edit-form">
                     {{ csrf_field() }}
                     <div class="card-content">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Title</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="title" placeholder="Enter Title" required="" value="{{old('title')}}">
                                         @if ($errors->has('title'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">News Date</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="date"  class="form-control" name="news_date" placeholder="Enter News Date" required="" value="{{old('news_date')}}">
                                         @if ($errors->has('news_date'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('news_date') }}</strong>
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
                                            <p>(Size : 870x439)</p>
                                            <div class="change-img-btn">
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Upload image</span>
                                                    <span class="fileinput-exists">Change</span> 
                                                    <input type="file" name="image" accept="image/*" required="" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                            <span class="error_image error"></span>
                                        </div>
                                </div>
                            </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Link Title</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="link_title" placeholder="Enter Link Title" value="{{old('link_title')}}">
                                         @if ($errors->has('link_title'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('link_title') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                 <label class="col-sm-3 label-on-left">Link File</label>
                                <div class="card-profile" style="text-align: left;">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="change-img-btn">
                                           <input type="file" name="link_file"/>
                                        </div>
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
</script>
@endsection