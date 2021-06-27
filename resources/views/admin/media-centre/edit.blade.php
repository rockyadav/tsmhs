@extends('layouts.adminTemplate')
@section('page-title', 'Edit Media Centre')
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

                        <a class="btn btn-rose btn-fill" href="{{ url('admin/media-centre')}}">Back<div class="ripple-container"></div></a>

                    </div>

                    <form method="post" action="{{url('admin/media-centre-update')}}" class="save-form" enctype="multipart/form-data" id="edit-form">

                     {{ csrf_field() }}

                     <div class="card-content">
                        <div class="card-content">
                         <div class="row"> 
                          <input type="hidden" name="rowId" required="" value="{{$data['detail']->id}}">

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Title</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="title" placeholder="Enter Title" value="{{$data['detail']->title}}">
                                         @if ($errors->has('title'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                 <label class="col-sm-3 label-on-left">Type</label>
                                  <div class="col-sm-9">
                                      <div class="form-group label-floating is-empty">
                                          <label class="control-label"></label>
                                             <select class="selectpicker" data-style="select-with-transition" title="Choose Type*" data-size="7" name="type"  required="">
                                              <option value="" disabled>Choose Type</option>
                                                  <option value="image"@if($data['detail']->type=="image")selected @endif>Image</option>
                                                  <option value="video"  @if($data['detail']->type=="video")selected @endif >Video</option>
                                             </select>
                                            @if ($errors->has('type'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                         @endif   
                                      </div>
                                  </div>
                             </div>
                          
                          
                            <div class="col-md-6 img1"> 
                                <label class="col-sm-3 label-on-left">Image</label>
                                <div class="card-profile" style="text-align: left;">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                            @if($data['detail']->image!="")
                                                <img src="{{ url('public/images/media-centre/'.$data['detail']->image) }}" style="height: 100px; width: 135px;" alt="..." class="img">
                                            @else  <img src="{{ url('public/images/placeholder.jpg') }}" style="height: 100px; width: 135px;" alt="..." class="img">
                                            @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail " style="height: 100px; width: 135px;"></div>
                                            <div class="change-img-btn">
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Change image</span>
                                                    <span class="fileinput-exists">Change</span> 
                                                    <input type="file" name="image" accept="image/*" id="upload"  onchange="return ValidateFileUpload()" />
                                                </span>
                                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                            <span class="error_image error"></span>
                                        </div>
                                </div>
                            </div>
                          
                             <div class="col-md-6 video_link">
                                <label class="col-sm-3 label-on-left">Video link</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text" class="form-control" name="video_link" placeholder="Enter Vidoe Link" value="{{$data['detail']->video_link}}">
                                          @if ($errors->has('video_link'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('video_link') }}</strong>
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
 if( $('select[name=type] option:selected').val() == 'video' ) {
      $('.video_link').show();
      $('.img1').hide();
    }else{
       $('.img1').show();
       $('.video_link').hide();
    }
  
    $('select[name=type]').change(function(){
    if( $('select[name=type] option:selected').val() == 'video' ) {
      $('.video_link').show();
      $('.img1').hide();
    }else{
       $('.img1').show();
       $('.video_link').hide();
    }

  });

    if( $('select[name=type] option:selected').val() == 'video' ) {
      $('select[name="video_link"]').attr('required',true);
    }else{
       $('select[name="video_link"]').attr('required', false);
    }

    if( $('select[name=type] option:selected').val() == 'image' ) {
      $('select[name="image"]').attr('required',true);
    }else{
       $('select[name="image"]').attr('required', false);
    }
</script>


@endsection