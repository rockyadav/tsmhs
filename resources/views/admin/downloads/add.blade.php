@extends('layouts.adminTemplate')
@section('page-title', 'Add Download File')
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
                        <a class="btn btn-rose btn-fill" href="{{ url('admin/downloads') }}">Back<div class="ripple-container"></div></a>
                    </div>
                <form method="post" action="{{route('downloads.store')}}" enctype="multipart/form-data" id="edit-form">
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
                                 <label class="col-sm-3 label-on-left">Select File</label>
                                <div class="card-profile" style="text-align: left;">
                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                        <div class="change-img-btn">
                                           <input type="file" name="pdf_file" required="" />
                                        </div>
                                  <div class="uploadExtensionError" style="display: none; color:red;">Only pdf|docx|doc|xlsx|xls allowed!</div>
                                   </div>
                                </div>
                            </div>
                         <div class="row text-center">
                             <button class="btn btn-rose btn-fill" id='submit' type="submit">Save</button>
                         </div>
                     </div>
                  </form>
             </div>
         </div> 
     </div>
 </div>
</div>
<script>
    $('#submit').click(function(event) {
        var val = $('input[type=file]').val().toLowerCase();
        var regex = new RegExp("(.*?)\.(pdf|docx|doc|xlsx|xls)$");
        if(!(regex.test(val))) {
            $('.uploadExtensionError').show();
            event.preventDefault();
        }
    });
</script>
@endsection