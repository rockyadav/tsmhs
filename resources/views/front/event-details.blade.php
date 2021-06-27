@extends('layouts.frontTemplate')
@section('page-title', 'Event Details')
@section('content')
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-text">
					<div class="breadcrumb-bar">
						<ul class="breadcrumb text-center">
							<li><a href="{{url('/')}}">Home</a></li>
							<li>Event Details</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--News Details Area Start-->
<div class="news-details-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-12 col-12">
				<div class="news-details-content">
				   <div class="single-latest-item">
						<img src="{{url('public/images/events/'.$data['event']->image)}}" alt="" style="width: 870px; height: 439px">  
						<div class="single-latest-text">
							<h3>{{$data['event']->title}}</h3> 
							<div class="single-item-comment-view">
							   <span><i class="zmdi zmdi-calendar-check"></i>{{date('d M Y',strtotime($data['event']->event_date))}}</span>
							    <span><i class="zmdi zmdi-time"></i>{{date('h:i A',strtotime($data['event']->from_time))}} &nbsp; {{date('h:i A',strtotime($data['event']->to_time))}}</span>
							    <span><i class="zmdi zmdi-pin"></i>{{$data['event']->address}}</span>
							</div>
							<p>{!!$data['event']->description!!}</p>
						</div>
					</div>
				</div>    
			</div>
			<div class="col-lg-3 col-md-12 col-12">
				<div class="sidebar-widget">
					<div class="single-sidebar-widget">
						<h4 class="title">Recent Posts</h4>
						<div class="recent-content">
							@if(count($data['related_event'])>0)
                            @foreach($data['related_event'] as $event)
							<div class="recent-content-item">
								<a href="{{url('event-details/'.$event->page_url)}}"><img src="{{url('public/images/events/'.$event->image)}}" style="width: 70px; height: 67px;" alt=""></a>
								<div class="recent-text">
									<h4><a href="{{url('event-details/'.$event->page_url)}}">{{$event->title}}</a></h4>
										<p>@php
		                                    if(strlen($event->description) > 100){
		                                        echo substr($event->description,0,100) . " ...";
		                                    }
		                                    else{
		                                        echo $event->description;
		                                    }
		                                @endphp</p>
								</div>
							</div>
							@endforeach
                            @endif
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of News Details Area-->
@endsection