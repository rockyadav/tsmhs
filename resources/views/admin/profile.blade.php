@extends('layouts.adminTemplate')
@section('page-title','Update Profile')
@section('content')
<style type="text/css">
    .help-block{
        color: red; 
    } 
</style>
<div class="content">
  @if ($message = Session::get('success') || $message = Session::get('error'))
  @include('layouts.error-sucess-messages')
  @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">  
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">perm_identity</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Update Profile</h4>
                        <form method="post" action="{{url('admin/profile-update')}}" onsubmit="return pasCheck()">
                            {{csrf_field()}}  
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <label class="control-label">Name</label>
                                        <input type="hidden" class="form-control" name="rowid" required="" value="{{$data['user']->id}}">
                                        <input type="text" class="form-control txt_Space" name="first_name"  value="{{$data['user']->first_name}}" required="">
                                        </div>
                                        @if ($errors->has('first_name')) 
                                          <span class="help-block">
                                              <strong>{{ $errors->first('first_name') }}</strong>
                                          </span>
                                        @endif 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                        <label class="control-label">Last Name</label>
                                        <input type="text" class="form-control txt_Space" name="last_name" required="" value="{{$data['user']->last_name}}">
                                    </div>
                                    @if ($errors->has('last_name')) 
                                          <span class="help-block">
                                              <strong>{{ $errors->first('last_name') }}</strong>
                                          </span>
                                    @endif 
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="number" class="form-control" name="mobile" required="" value="{{$data['user']->mobile}}">
                                    </div>
                                    @if ($errors->has('mobile')) 
                                          <span class="help-block">
                                              <strong>{{ $errors->first('mobile') }}</strong>
                                          </span>
                                    @endif 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group label-floating{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label class="control-label">Email Id</label>
                                        <input type="email" class="form-control" name="email" required="" value="{{$data['user']->email}}">
                                    </div>
                                    @if ($errors->has('email')) 
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                    @endif  
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control pass" name="password" >
                                        <span class="pass1"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Confirm Password</label>
                                        <input type="password" class="form-control con-pass" name="con-password" >
                                        <span class="errorpass pass2"></span>
                                    </div>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-rose pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle">
                            @if($data['user']->picture!='')
                            <img src="{{url('public/assets/photos/'.$data['user']->picture)}}" alt="image">
                            @else 
                            <img src="{{url('public')}}/assets/img/placeholder.jpg" alt="...">
                            @endif
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                        <div class="card-content">
                            <h4 class="card-title">{{$data['user']->first_name.' '.$data['user']->last_name}}</h4>
                            <p class="description">{{$data['user']->aboutme}}</p>
                        </div>
                        <div>
                            <form id="change-image" action="{{url('admin/change-image')}}" method="post" enctype="multipart/form-data"> 
                                {{csrf_field()}}
                                <span class="btn btn-round btn-rose btn-file"> 
                                    <span class="fileinput-new">Change Photo</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" class="image-change" name="image" required=""/>
                                    <input type="hidden" name="rowid" required="" value="{{$data['user']->id}}" />
                                </span>                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    
  function pasCheck(){
      var pass  = $('.pass').val();
      var cpass = $('.con-pass').val();

      if(pass!="")
        {
          if(pass.length<6){
            $('.pass1').html('<span style="color:red;">Password length must be greater then 5 characters</span>');
            return false;
          }else{
            $('.pass1').html(' ');
          }
          if(pass.length>10){
            $('.pass1').html('<span style="color:red;">Password length must be smaller then 10 characters</span>');
            return false;
          }
        }
      if(pass!=cpass){
        $('.errorpass').html('<span style="color:red;">Password not match!</span>');
        return false;
      }
 
  }
 
  jQuery('.txt_Space').keyup(function () { 
    this.value = this.value.replace(/[^a-zA-Z ]/g,'');
    });
   
   $('.image-change').change(function(){
            $('#change-image').submit();
        });

</script>



@endsection