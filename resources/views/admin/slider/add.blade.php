@extends('layouts.adminTemplate')
@section('page-title', 'Add Slider')
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
                        <a class="btn btn-rose btn-fill" href="{{ url('admin/slider') }}">Back<div class="ripple-container"></div></a>
                    </div>
                <form method="post" action="{{route('slider.store')}}" enctype="multipart/form-data" id="edit-form">
                     {{ csrf_field() }}
                     <div class="card-content">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-sm-4 label-on-left">Select Campus</label>
                                 <div class="col-sm-8">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <select name="campus" id="campus" class="form-control" required>
                                            <option value=""> Select Campus</option>
                                              @if(count($data['campuses'])>0)
                                                @foreach($data['campuses'] as $camp)
                                                    <option value="{{$camp->id}}">{{$camp->name}}</option>
                                                @endforeach
                                              @endif
                                        </select>
                                         @if ($errors->has('campus'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('campus') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                             <div class="col-md-6"> <br>
                                 <label class="col-sm-3 label-on-left">Image </label>
                                <div class="card-profile" style="text-align: left;">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{ url('public/images/placeholder.jpg') }}" style="height: 100px; width: 135px;" alt="..." class="img">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail " style="height: 100px; width: 135px;"></div>
                                            <p>(Size : 1920x716)</p>
                                            <div class="change-img-btn">
                                                <span class="btn btn-primary btn-round btn-file">
                                                    <span class="fileinput-new">Upload image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image" accept="image/*" id="upload" required="" />
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

@endsection