@extends('layouts.adminTemplate')
@section('page-title', 'Website Image')
@section('content') 

<style type="text/css">
.form-group input[type=file] {
    opacity: 1 !important;
    position: relative !important;
}
td {
    padding: 5px;
}
</style>
<div class="content">
<div class="container-fluid">

<div class="row">
 @include('layouts.error-sucess-messages')
<div class="col-md-12">
<div class="card">
    <div class="card-header card-header-icon" data-background-color="">
        <i class="material-icons">assignment</i>
    </div>    
    <div class="card-content">
        <h4 class="card-title">Image Upload</h4>
        <div class="row">
          <div class="col-md-12 text-center">
            <form method="post" action="{{url('upload-image')}}" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="col-md-offset-4 col-md-4" style="border: 1px solid; padding-top: 27px; margin-bottom: 10px;">
                    <div class="form-group">
                      <label class="form-control">Logo Image (200*80, Format :png)</label>
                      <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-control">Login Image (1248*831, Format :jpg,jpeg)</label>
                      <input type="file" name="background" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-sm">Submit</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-2 col-md-10">
            <table border="1">
              <tr>
              <td>
                  <label>Logo Image</label>
              </td>
              <td>
              <img src="{{url('public/assets/image/new_logo.png?t='.time())}}" style="width: 200px;height: 60px;" >
              </td>
              </tr>
              <tr>
              <td>
              <label>Login Screen Image</label>
              </td>
              <td>
              <img src="{{url('public/assets/image/test.jpg?t='.time())}}" style="width: 500px;height: 200px;">
              </td>
              </tr>
            </table>
          </div>
        </div>
    </div>
    <!-- end content-->
</div>
<!--  end card  -->
</div>
<!-- end col-md-12 -->
</div>
<!-- end row -->
</div>
</div>
@endsection
