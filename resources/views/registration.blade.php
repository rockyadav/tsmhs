<!DOCTYPE html>
<html>
   <head>
      <title>Student Registration</title>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon"  type="image/png"  href="{{url('public/uploads/fav.png')}}">
      <script type="text/javascript">
         var base_url = "{{url('/')}}";
         
      </script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="row" style="background-color: #f98d00;">
         <div class="offset-3 col-md-8">
            <img src="{{url('public/front-assets/images/logo.png')}}" style="width: 75%;">
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               @if(Session::has('error'))
               <div class="alert alert-danger text-center">
                  <button data-dismiss="alert" class="close" type="button">X</button>
                  <strong>Error!</strong> {{ Session::get('error') }}
               </div>
               @endif
               @if(Session::has('success'))
               <div class="alert alert-success text-center">
                  <button data-dismiss="alert" class="close" type="button">X</button>
                  <strong>Success!</strong> {{ Session::get('success') }}
               </div>
               @endif
            </div>
         </div>
      </div>
      <?php
         error_reporting(0);
         ?>
      @php
      $session = 0;
      if(session()->get('setEligibility'))
      {
      $eligible = session()->get('setEligibility');
      $session = 1;
      }
      @endphp
      @if($session)
      <div class="container polaroid">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
              <form method="post" action="{{url('registrationAction')}}" enctype="multipart/form-data">
                  {{ csrf_field() }} 
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">First Name<span style="color: red">*</span></label>
                           <input type="text" name="first_name" class="form-control" required="" value="{{old('first_name')}}">
                           @if ($errors->has('first_name'))
                           <span class="error-block">
                           <strong>{{ $errors->first('first_name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Last Name<span style="color: red">*</span></label>
                           <input type="text" name="last_name" class="form-control" required="" value="{{old('last_name')}}">
                           @if ($errors->has('last_name'))
                           <span class="error-block">
                           <strong>{{ $errors->first('last_name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Mobile<span style="color: red">*</span></label>
                           <input type="text" name="mobile" class="form-control" required="" value="{{old('mobile')}}">
                           @if ($errors->has('mobile'))
                           <span class="error-block">
                           <strong>{{ $errors->first('mobile') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Alternate Mobile</label>
                           <input type="text" name="alt_mobile" class="form-control" value="{{old('alt_mobile')}}">
                           @if ($errors->has('alt_mobile'))
                           <span class="error-block">
                           <strong>{{ $errors->first('alt_mobile') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Email</label>
                           <input type="email" name="email" class="form-control" value="{{old('email')}}">
                           @if ($errors->has('email'))
                           <span class="error-block">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">DOB</label>
                           <input type="date" name="dob" class="form-control" value="{{old('dob')}}">
                           @if ($errors->has('dob'))
                           <span class="error-block">
                           <strong>{{ $errors->first('dob') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Nationality</label>
                           <select name="nationality" class="form-control">
                              <option value="">Select Nationality</option>
                              <option value="Kenyan" selected >Kenyan</option>
                              <option value="Non Kenyan" @if (Input::old('nationality') == 'Non Kenyan') selected @endif>Non Kenyan</option>
                           </select>
                           @if ($errors->has('nationality'))
                           <span class="error-block">
                           <strong>{{ $errors->first('nationality') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">National ID Number<span style="color: red">*</span></label>
                           <input type="text" name="national_id" class="form-control" required="" value="{{old('national_id')}}">
                           @if ($errors->has('national_id'))
                           <span class="error-block">
                           <strong>{{ $errors->first('national_id') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Town</label>
                           <select name="town" id="town_id" class="form-control">
                              <option value="">Select town</option>
                              @foreach($state as $st)
                              <option value="{{$st->id}}" @if(Input::old('town') == $st->id) selected @endif>{{$st->name}}</option>
                              @endforeach
                           </select>
                           @if ($errors->has('town'))
                           <span class="error-block">
                           <strong>{{ $errors->first('town') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Parent's Profession</label>
                           <select name="father_profession" class="form-control" >
                              <option value="">Select Parent profession</option>
                              <option value="Business" selected >Business</option>
                              <option value="Farmer">Farmer</option>
                              <option value="Govt Job">Govt Job</option>
                              <option value="Pvt Job">Pvt Job</option>
                              <option value="Hustler">Hustler</option>
                              <option value="Retired">Retired</option>
                              <option value="Other">Other</option>
                           </select>
                           @if ($errors->has('father_profession'))
                           <span class="error-block">
                           <strong>{{ $errors->first('father_profession') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Guardian Name</label>
                           <input type="text" name="guardian_name" class="form-control" value="{{old('guardian_name')}}">
                           @if ($errors->has('guardian_name'))
                           <span class="error-block">
                           <strong>{{ $errors->first('guardian_name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Guardian Mobile</label>
                           <input type="text" name="guardian_mobile" class="form-control" value="{{old('guardian_mobile')}}">
                           @if ($errors->has('guardian_mobile'))
                           <span class="error-block">
                           <strong>{{ $errors->first('guardian_mobile') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <h5> Course selection:</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Preferred Intake<span style="color: red">*</span></label>
                           <select name="preferred_intake" class="form-control" required="">
                              <option value="">Select preferred intake</option>
                              <option value="Jan/Feb" @if(Input::old('preferred_intake') == 'Jan/Feb') selected @endif>Jan/Feb</option>
                              <option value="May/Jun" selected >May/Jun</option>
                              <option value="Sept/Oct" @if(Input::old('preferred_intake') == 'Sept/Oct') selected @endif>Sept/Oct</option>
                           </select>
                           @if ($errors->has('preferred_intake'))
                           <span class="error-block">
                           <strong>{{ $errors->first('preferred_intake') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Campus Of Study<span style="color: red">*</span></label>
                           <select name="campus_of_study" class="form-control" required="">
                              <option value="">Select campus of study</option>
                              <option value="Main Campus-Thika" @if(Input::old('campus_of_study') == 'Main Campus-Thika') selected @endif>Main Campus-Thika</option>
                              <option value="Kitui" @if(Input::old('campus_of_study') == 'Kitui') selected @endif>Kitui</option>
                              <option value="Kisumu" @if(Input::old('campus_of_study') == 'Kisumu') selected @endif>Kisumu</option>
                              <option value="Mombasa" @if(Input::old('campus_of_study') == 'Mombasa') selected @endif>Mombasa</option>
                           </select>
                           @if ($errors->has('campus_of_study'))
                           <span class="error-block">
                           <strong>{{ $errors->first('campus_of_study') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Mode Of Study<span style="color: red">*</span></label>
                           <select name="mode_of_study" class="form-control" required="">
                              <option value="">Select mode of study</option>
                              <option value="Regular Classes" selected >Regular Classes</option>
                              <option value="Evening Classes" @if(Input::old('mode_of_study') == 'Evening Classes') selected @endif>Evening Classes</option>
                              <option value="Weekend Classes" @if(Input::old('mode_of_study') == 'Weekend Classes') selected @endif>Weekend Classes</option>
                              <option value="Distance learning" @if(Input::old('mode_of_study') == 'Distance learning') selected @endif>Distance learning</option>
                           </select>
                           @if ($errors->has('mode_of_study'))
                           <span class="error-block">
                           <strong>{{ $errors->first('mode_of_study') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">KCSE Grade</label>
                           <input type="text" name="kcse_grade" id="kcse_grade" class="form-control" required="" value="{{$eligible['grade']}}" disabled="">
                           @if ($errors->has('kcse_grade'))
                           <span class="error-block">
                           <strong>{{ $errors->first('kcse_grade') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Diploma/Certificate</label>
                           <select name="education_level" class="form-control" required="" disabled="">
                              @if(count($category)>0)
                               @foreach($category as $c)
                               <option value="{{$c->id}}" @if($eligible['category_id']==$c->id) selected @endif>{{$c->name}}</option>
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
                     
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Intrested Course  @if($session==1) <span style="font-size: 12px;"><a href="javascript:void(0)" data-toggle="modal" data-target="#eligibilityModal"> Edit</a></span>@endif</label>
                           <select name="intrested_course" id="intrested_course" class="form-control" required="" disabled="">
                           @if(count($courses)>0 && $session==1)
                           @foreach($courses as $cr)
                           <option value="{{$cr->id}}" @if($eligible['course_id']==$cr->id) selected @endif>{{$cr->name}}</option>
                           @endforeach
                           @endif
                           </select>
                           @if ($errors->has('intrested_course'))
                           <span class="error-block">
                           <strong>{{ $errors->first('intrested_course') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Secondary School Name</label>
                           <input type="text" name="secondary_school_name" class="form-control" value="{{old('secondary_school_name')}}">
                           @if ($errors->has('secondary_school_name'))
                           <span class="error-block">
                           <strong>{{ $errors->first('secondary_school_name') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Upload KCSE Transcript<span style="color: red">*</span></label>
                           <input type="file" name="kcse_marksheet" id="kcse_marksheet" class="form-control" required="">
                           @if ($errors->has('kcse_marksheet'))
                           <span class="error-block">
                           <strong>{{ $errors->first('kcse_marksheet') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label class="user-label">Upload your Picture</label>
                           <input type="file" name="your_picture" id="your_picture" class="form-control" >
                           @if ($errors->has('your_picture'))
                           <span class="error-block">
                           <strong>{{ $errors->first('your_picture') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row"></div>
                  <div class="row">
                     <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" style="background-color:#f98d00;border-color: #fff;">Submit</button>
                     </div>
                  </div>
              </form>
            </div>
        </div>
      </div>
      @endif
      <!-- The Eligibility Modal -->
      <div class="modal" id="eligibilityModal">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">  @if($session==1) Are you Sure! @else Check Your Eligibility! @endif</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <form method="post" action="{{url('set-eligibility')}}">
                  <!-- Modal body -->
                  {{csrf_field()}}
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="user-label">Select your KCSE Mean Grade</label>
                        <select name="grade" id="KCSEMeanGrade" class="form-control" required="">
                           <option value="">Select KCSE Mean Grade</option>
                           @if(count($grade)>0)
                           @foreach($grade as $g)
                           <option value="{{$g->grade}}" @if($eligible['grade']==$g->grade) selected @endif>{{$g->grade}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="user-label">Diploma/Certificate</label>
                        <select name="category_id" id="category" class="form-control" required="">
                           <option value="">Select Level</option>
                           @if(count($category)>0)
                           @foreach($category as $c)
                           <option value="{{$c->id}}" @if($eligible['category_id']==$c->id) selected @endif>{{$c->name}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                     <div class="form-group">
                        <label class="user-label">Select Course</label>
                        <select name="course_id" id="courses" class="form-control" required="">
                           <option value="">Select Category First</option>
                           @if(count($courses)>0 && $session==1)
                           @foreach($courses as $cr)
                           <option value="{{$cr->id}}" @if($eligible['course_id']==$cr->id) selected @endif>{{$cr->name}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                     @if($session==1)
                     <button type="button" class="btn btn-info" data-dismiss="modal" style="background-color:#f98d00; border-color: #fff;">Yes, I am!</button>
                     <button type="submit" class="btn btn-info" style="background-color:#f98d00; border-color: #fff;">Not Sure</button>
                     @else
                     <button type="submit" class="btn btn-info" style="background-color:#f98d00; border-color: #fff;">Submit</button>
                     @endif
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="{{url('public/front-assets/js/custom.js?time='.time())}}"></script>
      <script type="text/javascript">
         $(document).ready(function(){          
           $('#kcse_grade').keyup(function(){
           var  grade = $(this).val();
           if(grade!=''){
               $.ajax({
                  type:"GET",
                  url:"{{url('get_course_list')}}?grade_id="+grade,
                  success:function(res){ 
                   //console.log(res);
                   if(res){
                       $("#intrested_course").empty();
                       $("#intrested_course").append('<option value="" disabled> {{ trans('Please enter your grade.')}}</option>');
         
                       $.each(res,function(key,value){
                           $("#intrested_course").append('<option value="'+value.id+'">'+value.name+'</option>');
                       });
         
                   }else{
                      $("#intrested_course").empty();
                      $("#intrested_course").append('<option value=""> {{ trans('Courses not found')}}</option>');
                   
                   }
                  }
               });
         
           }else{
         
                 $("#intrested_course").empty();
                 $("#intrested_course").append('<option value=""> {{ trans('Please enter your grade')}}</option>');
         
           }      
          });
         
         $('#country_id').change(function(){
           var country = $(this).val();
           if(country!=''){
               $.ajax({
                  type:"GET",
                  url:"{{url('get_state_list')}}?country_id="+country,
                  success:function(res){ 
                   console.log(res);
                   if(res){
                       $("#town_id").empty();
                       $("#town_id").append('<option value="" disabled> {{ trans('Choose town')}}</option>');
         
                       $.each(res,function(key,value){
                           $("#town_id").append('<option value="'+value.id+'">'+value.name+'</option>');
                       });
         
                   }else{
                      $("#town_id").empty();
                      $("#town_id").append('<option value=""> {{ trans('Choose country first')}}</option>');
                   
                   }
                  }
               });
         
           }else{
         
                 $("#town_id").empty();
                 $("#town_id").append('<option value=""> {{ trans('Choose country first')}}</option>');
         
           }      
          });
         });
      </script> 
   </body>
</html>