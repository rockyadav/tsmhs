@extends('layouts.frontTemplate')
@section('page-title', 'Home')
@section('content')
<!--Slider Area Start-->
<div class="slider-area slider-two">
    <div class="preview-2">
        <div id="nivoslider" class="slides"> 
        @if(count($data['sliders'])>0)
        @php
          $i=0;
        @endphp
        @foreach($data['sliders'] as $slider)
        @php
          $i++;
        @endphp
             <img src="{{url('public/images/slider/'.$slider->image)}}" alt="responsive image" title="#slider-1-caption{{$i}}">
         @endforeach
         @endif
        </div> 
    </div>
</div>
<!--End of Slider Area-->

<!-- registration form start -->
    <div class="col-lg-4 col-sm-12 col-xs-12 rg-form">
        <div class="rg-form-box">
            <h5 class="rg-title">Register Now</h5>
        <div class="tab-content" id="home_registration_form">
            <!-- tab pane 1 -->
            <div class="tab-pane active" id="menu1">
                <form method="post" action="{{url('student-registration')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control checkname" placeholder="First Name" id="fname" required="" value="{{old('first_name')}}">
                        @if ($errors->has('first_name'))
                           <span class="error-block">
                           <strong>{{ $errors->first('first_name') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control checkname" placeholder="Last Name" id="lname" required="" value="{{old('last_name')}}">
                        @if ($errors->has('last_name'))
                           <span class="error-block">
                           <strong>{{ $errors->first('last_name') }}</strong>
                           </span>
                        @endif
                   </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email ID" id="email" required="" value="{{old('email')}}">
                        @if ($errors->has('email'))
                           <span class="error-block">
                           <strong>{{ $errors->first('email') }}</strong>
                           </span>
                        @endif
                   </div>
                    <div class="form-group">
                        <input type="text" name="mobile" class="form-control numbersOnly" placeholder="Phone Number" id="tmobile" required="" value="{{old('mobile')}}">
                        @if ($errors->has('mobile'))
                           <span class="error-block">
                           <strong>{{ $errors->first('mobile') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="form-group">
                        @php
                            $grade_id = old('grade');
                        @endphp
                        <select name="grade" id="KCSEMeanGrade" class="form-control" required="">
                           <option value="">Select KCSE Mean Grade</option>
                           @if(count($data['grade'])>0)
                           @foreach($data['grade'] as $g)
                           <option value="{{$g->grade}}" @if($grade_id==$g->grade) selected @endif>{{$g->grade}}</option>
                           @endforeach
                           @endif
                        </select>
                        @if ($errors->has('grade'))
                           <span class="error-block">
                           <strong>{{ $errors->first('grade') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="form-group">
                        @php
                            $category_id = old('category');
                        @endphp
                        <select name="category" id="category" class="form-control" required="">
                           <option value="">Select Level</option>
                           @if(count($data['category'])>0)
                           @foreach($data['category'] as $c)
                           <option value="{{$c->id}}" @if($category_id==$c->id) selected @endif>{{$c->name}}</option>
                           @endforeach
                           @endif
                        </select>
                        @if ($errors->has('category'))
                           <span class="error-block">
                           <strong>{{ $errors->first('category') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="form-group">
                        @php
                            $course_id = old('course');
                        @endphp
                        <select name="course" id="courses" class="form-control" required="">
                           <option value="">Select Category First</option>
                           @if(count($data['courses'])>0)
                           @foreach($data['courses'] as $cr)
                           <option value="{{$cr->id}}" @if($course_id==$cr->id) selected @endif>{{$cr->name}}</option>
                           @endforeach
                           @endif
                        </select>
                        @if ($errors->has('course'))
                           <span class="error-block">
                           <strong>{{ $errors->first('course') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="form-group">             
                        <div class="new_btn_custom text-center">
                                <button type="Submit" style="width: 110px;font-size: 14px;" class="btn btn-default" id="mysubmitbtn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Tab panes end -->
        </div>
    </div>
<!-- registration form end -->

<!--Fun Factor Area Start-->
<div class="fun-factor-area trophy">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-fun-factor">
                    <img src="{{url('public/front-assets/trophy/trophy.png')}}">
                    <h4>Teachers</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-fun-factor">
                    <img src="{{url('public/front-assets/trophy/trophy.png')}}">
                    <h4>Members</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-fun-factor">
                    <img src="{{url('public/front-assets/trophy/trophy.png')}}">
                    <h4>Courses</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Fun Factor Area-->

<!--About Area Start--> 
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="about-container">
                    <h3>WHY TSMHS ?</h3>
                    <p>Being a hospital-based institution, and an affiliate of the famous Thika Nursing Home (which is only two minutes away from the school) as well as the Ruiru Private Hospital, this medical training facility gives students a great opportunity to get hands-on experience and practice in the realm of their training. And unlike other medical training institutions, the students get to choose between two different hospital environments, namely Thika and Ruiru...
                    <a href="{{url('about-us')}}" style="color:blue;">Read more</a> 
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of About Area-->
<!--Course Area Start-->
<div class="course-area section-padding bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Our Departments</h3>
                        <p>There are many variations of passages of Lorem Ipsum</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($data['departments'])>0)
            @foreach($data['departments'] as $department)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-item">
                        <div class="single-item-image overlay-effect">
                            <a href="{{url('departments/'.$department->page_url)}}"><img src="{{url('public/images/departments/'.$department->image) }}" alt="" style="300px; height: 211px;"></a>
                        </div>
                        <div class="single-item-text">
                            <h4><a href="{{url('departments/'.$department->page_url)}}">{{$department->name}}</a></h4>
                            <p>{{$department->description}}</p>
                        </div>
                        <div class="button-bottom">
                            <a href="{{url('departments/'.$department->page_url)}}" class="button-default">Learn Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            <div class="col-md-12 col-sm-12 text-center">
                <a href="{{url('departments')}}" class="button-default button-large">Browse All Departments <i class="zmdi zmdi-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!--End of Course Area-->

<!--Latest News Area Start--> 
<div class="latest-area section-padding bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Latest News</h3>
                        <p>There are many variations of passages</p>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="row">
           @if(count($data['news'])>0)
           @foreach($data['news'] as $newss)
            <div class="col-lg-6 col-md-12 col-12">
                <div class="single-latest-item">
                    <div class="single-latest-image">
                        <a href="{{url('news-details/'.$newss->page_url)}}"><img src="{{ url('public/images/news/'.$newss->image) }}" alt="" style="width:236px; height: 212px;"></a>
                    </div>
                    <div class="single-latest-text">
                        <h3>
                            <a href="{{url('news-details/'.$newss->page_url)}}">
                            @php 
                            if(strlen($newss->title) > 22){
                             echo substr($newss->title,0,22)."...";
                            }
                            else{
                                echo $newss->title;
                            } 
                            @endphp
                            </a>
                        </h3>
                        <div class="single-item-comment-view">
                           <span><i class="zmdi zmdi-calendar-check"></i>{{date('d M Y',strtotime($newss->news_date))}}</span>
                       </div>
                       <p>@php
                            if(strlen(strip_tags($newss->description)) > 85){
                                echo substr(strip_tags($newss->description),0,85) . " ...";
                            }
                            else{
                                echo strip_tags($newss->description);
                            }
                        @endphp</p>
                       <a href="{{url('news-details/'.$newss->page_url)}}" class="button-default">LEARN Now</a>
                    </div>
                </div>
            </div>
           @endforeach
           @endif 

           <div class="col-md-12 col-sm-12 text-center">
                <a href="{{url('news')}}" class="button-default button-large">Browse All News <i class="zmdi zmdi-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!--End of Latest News Area--> 

<!--Event Area Start-->
<div class="event-area section-padding bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>OUR EVENTS</h3>
                        <p>There are many variations of passages</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 70px;">
            @if(count($data['events'])>0)
                @foreach($data['events'] as $event)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-event-item">
                            <div class="single-event-image">
                                <a href="{{url('event-details/'.$event->page_url)}}">
                                    <img src="{{ url('public/images/events/'.$event->image) }}" style="width:370px; height: 252px;" alt="">
                                     <span><span>{{date('d',strtotime($event->event_date))}}</span>{{date('M',strtotime($event->event_date))}}</span>
                                </a>
                            </div>
                            <div class="single-event-text">
                                <h3><a href="{{url('event-details/'.$event->page_url)}}">
                                    @php 
                                    if(strlen($event->title) > 20){
                                     echo substr($event->title,0,20)."...";
                                    }
                                    else{
                                        echo $event->title;
                                    } 
                                    @endphp
                                </a></h3>
                                <div class="single-item-comment-view">
                                   <span><i class="zmdi zmdi-time"></i>{{date('h:i A',strtotime($event->from_time))}} &nbsp; {{date('h:i A',strtotime($event->to_time))}}</span>
                                   <span><i class="zmdi zmdi-pin"></i>{{$event->address}}</span>
                               </div>
                               <p>
                                    @php
                                        if(strlen(strip_tags($event->description)) > 85){
                                            echo substr(strip_tags($event->description),0,85) . " ...";
                                        }
                                        else{
                                            echo strip_tags($event->description);
                                        }
                                    @endphp
                                </p>
                               <a class="button-default" href="{{url('event-details/'.$event->page_url)}}">LEARN Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif 

            <div class="col-md-12 col-sm-12 text-center">
                <a href="{{url('events')}}" class="button-default button-large">Browse All Event <i class="zmdi zmdi-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!--End of Event Area-->
@endsection
