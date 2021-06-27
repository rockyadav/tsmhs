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
        
        @if(count($data['sliders'])>0)
        @php
          $i=0;
        @endphp
        @foreach($data['sliders'] as $slider)
        @php
          $i++;
        @endphp
        @if(!empty($slider->title))
        <div id="slider-1-caption{{$i}}" class="nivo-html-caption nivo-caption">
            <div class="banner-content slider-{{$i}}">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-content-wrapper">
                                <div class="text-content @if($i!=1) slider-{{$i}} @endif">
                                    <h1 class="title1">{{$slider->title}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endif
        @endforeach
     @endif
    </div>
   
</div>
<!--End of Slider Area-->
<!--About Area Start--> 
<div class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="about-container">
                    <h3>WHY TSMHS ?</h3>
                    <p>Being a hospital-based institution, and an affiliate of the famous Thika Nursing Home (which is only two minutes away from the school) as well as the Ruiru Private Hospital, this medical training facility gives students a great opportunity to get hands-on experience and practice in the realm of their training. And unlike other medical training institutions, the students get to choose between two different hospital environments, namely Thika and Ruiru.</p>      
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
                        <a href="{{url('news-details/'.$newss->page_url)}}"><img src="{{ url('public/images/news/'.$newss->image) }}" alt="" style="width:236px; height: 234px;"></a>
                    </div>
                    <div class="single-latest-text">
                        <h3><a href="{{url('news-details/'.$newss->page_url)}}">{{$newss->title}}</a></h3>
                        <div class="single-item-comment-view">
                           <span><i class="zmdi zmdi-calendar-check"></i>{{date('d M Y',strtotime($newss->news_date))}}</span>
                       </div>
                       <p>@php
                            if(strlen($newss->description) > 200){
                                echo substr($newss->description,0,200) . " ...";
                            }
                            else{
                                echo $newss->description;
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
                                    @php if(strlen($event->title) > 20){
                                     echo substr($event->title,0,20) . " ...";
                                    }
                                    else{
                                        echo $event->title;
                                    } @endphp
                                </a></h3>
                                <div class="single-item-comment-view">
                                   <span><i class="zmdi zmdi-time"></i>{{date('h:i A',strtotime($event->from_time))}} &nbsp; {{date('h:i A',strtotime($event->to_time))}}</span>
                                   <span><i class="zmdi zmdi-pin"></i>{{$event->address}}</span>
                               </div>
                               <p>@php
                                    if(strlen($event->description) > 95){
                                        echo substr($event->description,0,85) . " ...";
                                    }
                                    else{
                                        echo $event->description;
                                    }
                                @endphp</p>
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
