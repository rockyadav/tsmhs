@extends('layouts.adminTemplate')

@section('page-title', 'Student details')

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

                        <a class="btn btn-rose btn-fill" href="{{ url('admin/admissions')}}">Back<div class="ripple-container"></div></a>

                    </div>

                    <form method="post" action="{{url('admin/admission-update')}}" enctype="multipart/form-data" id="myForm">
                     {{ csrf_field() }}
                     <div class="card-content">
                        <div class="card-content">
                            <div class="row">
                        <div class="col-md-12">
                            <h5><b>Personal Details:</b></h5>
                         </div>
                      </div>
                         <div class="row"> 
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">First Name</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="first_name" placeholder="Enter first name" required="" value="{{$details->first_name}}">
                                         @if ($errors->has('first_name'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Last Name</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="last_name" placeholder="Enter last name" required="" value="{{$details->last_name}}">
                                         @if ($errors->has('last_name'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>


                        <div class="row"> 
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Mobile</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="mobile" placeholder="Enter mobile" required="" value="{{$details->mobile}}">
                                         @if ($errors->has('mobile'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Alternate Mobile</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="alt_mobile" value="{{ $details->alt_mobile == '' ? 'N/A' :$details->alt_mobile}}">
                                         @if ($errors->has('alt_mobile'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('alt_mobile') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Email</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="email"  value="{{ $details->email == '' ? 'N/A' :$details->email}}">
                                         @if ($errors->has('email'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">DOB</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="date"  class="form-control" name="dob" placeholder="Enter dob" required="" value="{{$details->dob}}">
                                         @if ($errors->has('dob'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Nationality</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                          <select name="nationality" class="form-control">
                                              <option value="">Select Nationality</option>
                                <option value="Kenyan" @if($details->nationality == 'Kenyan') selected @endif >Kenyan</option>
                                              <option value="Non Kenyan" @if($details->nationality == 'Non Kenyan') selected @endif>Non Kenyan</option>
                                           </select>
                                         @if ($errors->has('nationality'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">National ID Number</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="national_id" placeholder="Enter national id" required="" value="{{$details->national_id}}">
                                         @if ($errors->has('national_id'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('national_id') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Town</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                          <select name="town" id="town_id" class="form-control">
                                          <option value="">Select town</option>
                                          @foreach($state as $st)
                                          <option value="{{$st->id}}" @if($details->town== $st->id) selected @endif>{{$st->name}}</option>
                                          @endforeach
                                       </select>
                                         @if ($errors->has('town'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('town') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Parent's Profession</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                          <select name="father_profession" class="form-control" >
                                              <option value="">Select Parent profession</option>
                                              <option value="Business" selected >Business</option>
                                              <option value="Farmer" @if($details->father_profession== 'Farmer') selected @endif>Farmer</option>
                                              <option value="Govt Job" @if($details->father_profession== 'Govt Job') selected @endif >Govt Job</option>
                                              <option value="Pvt Job" @if($details->father_profession== 'Pvt Job') selected @endif>Pvt Job</option>
                                              <option value="Hustler" @if($details->father_profession== 'Hustler') selected @endif>Hustler</option>
                                              <option value="Retired" @if($details->father_profession== 'Retired') selected @endif>Retired</option>
                                              <option value="Other" @if($details->father_profession== 'Other') selected @endif>Other</option>
                                           </select>
                                         @if ($errors->has('father_profession'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('father_profession') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Guardian Name</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="guardian_name" placeholder="Enter guardian name" value="{{ $details->guardian_name == '' ? 'N/A' :$details->guardian_name}}">
                                         @if ($errors->has('guardian_name'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('guardian_name') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                             <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Guardian Mobile</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text"  class="form-control" name="guardian_mobile" placeholder="Enter guardian mobile"  value="{{ $details->guardian_mobile == '' ? 'N/A' :$details->guardian_mobile}}">
                                         @if ($errors->has('guardian_mobile'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('guardian_mobile') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12">
                            <h5><b> Course selection:</b></h5>
                         </div>
                      </div>



                             <div class="row">
                               <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Preferred Intake</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                          <select name="preferred_intake" class="form-control" required="">
                                              <option value="">Select preferred intake</option>
                                              <option value="Jan/Feb" @if($details->preferred_intake == 'Jan/Feb') selected @endif>Jan/Feb</option>
                                              <option value="May/Jun" @if($details->preferred_intake == 'May/Jun') selected @endif >May/Jun</option>
                                              <option value="Sept/Oct" @if($details->preferred_intake == 'Sept/Oct') selected @endif>Sept/Oct</option>
                                           </select>
                                         @if ($errors->has('preferred_intake'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('preferred_intake') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Campus Of Study</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <select name="campus_of_study" class="form-control" required="">
                                          <option value="">Select campus of study</option>
                                          <option value="Main Campus-Thika" @if($details->campus_of_study == 'Main Campus-Thika') selected @endif>Main Campus-Thika</option>
                                          <option value="Kitui" @if($details->campus_of_study == 'Kitui') selected @endif>Kitui</option>
                                          <option value="Kisumu" @if($details->campus_of_study == 'Kisumu') selected @endif>Kisumu</option>
                                          <option value="Mombasa" @if($details->campus_of_study == 'Mombasa') selected @endif>Mombasa</option>
                                       </select>
                                         @if ($errors->has('campus_of_study'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('campus_of_study') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>


                        <div class="row">
                               <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Mode Of Study</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <select name="mode_of_study" class="form-control" required="">
                                              <option value="">Select mode of study</option>
                                              <option value="Regular Classes"  @if($details->mode_of_study == 'Evening Classes') selected @endif>Regular Classes</option>
                                              <option value="Evening Classes" @if($details->mode_of_study == 'Evening Classes') selected @endif>Evening Classes</option>
                                              <option value="Weekend Classes" @if($details->mode_of_study == 'Weekend Classes') selected @endif>Weekend Classes</option>
                                              <option value="Distance learning" @if($details->mode_of_study == 'Distance learning') selected @endif>Distance learning</option>
                                           </select>
                                         @if ($errors->has('mode_of_study'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('mode_of_study') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Campus Of Study</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                         <input type="text" name="kcse_grade" id="kcse_grade" class="form-control" required="" value="{{$details->kcse_grade}}" required="">
                                         @if ($errors->has('kcse_grade'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('kcse_grade') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>

                         <div class="row">
                               <div class="col-md-6">
                                <label class="col-sm-3 label-on-left">Diploma / Certificate</label>
                                 <div class="col-sm-9">
                                     <div class="form-group label-floating is-empty">
                                         <label class="control-label"></label>
                                           <select name="education_level" class="form-control" required="">
                                              @if(count($category)>0)
                                               @foreach($category as $c)
                                               <option value="{{$c->id}}" @if($details->education_level==$c->id) selected @endif>{{$c->name}}</option>
                                               @endforeach
                                              @endif

                                           </select>
                                         @if ($errors->has('education_level'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('education_level') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">Intrested Courses</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <select class="form-control" data-style="select-with-transition" title="Choose intrested course" data-size="7" name="intrested_course" id="intrested_course" data-live-search="true" required="true">
                                             <option value="" >Choose intrested course </option>
                                             @foreach($courses as $c)
                                             <option value="{{$c->id}}" @if($details->intrested_course==$c->id) selected @endif>{{$c->name}}</option>
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
                                <label class="col-sm-2 label-on-left">Secondary School Name</label>
                                 <div class="col-sm-10">
                                     <div class="form-group label-floating is-empty">
                                         <input type="text" name="secondary_school_name" class="form-control" required="" value="{{ $details->secondary_school_name == '' ? 'N/A' :$details->secondary_school_name}}">
                                         @if ($errors->has('secondary_school_name'))
                                             <span class="error-block">
                                            <strong>{{ $errors->first('secondary_school_name') }}</strong>
                                            </span>
                                         @endif
                                     </div>
                                 </div>
                            </div>
                        </div>
                          <div class="row">
                             <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">KCSE Transcript</label>
                                 <div class="col-sm-10">
                                     <div class="label-floating is-empty">
                                         @if($details->kcse_marksheet!="")
                                           <br>
                                         <img src="{{url('public/images/marksheet/'.$details->kcse_marksheet)}}" height="80px" width="60px">
                                         @endif
                                     </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-sm-2 label-on-left">Your Picture</label>
                                 <div class="col-sm-10">
                                     <div class="label-floating is-empty">
                                         @if($details->picture!="")
                                          <br>
                                         <img src="{{url('public/images/picture/'.$details->picture)}}" height="80px" width="60px">
                                         @endif
                                     </div>
                                 </div>
                            </div>
                         </div>
                     </div>
                </form>
             </div>
         </div> 
     </div>
 </div>
</div>
<script type="text/javascript">
    $("#myForm :input").prop("disabled", true);
</script>

@endsection