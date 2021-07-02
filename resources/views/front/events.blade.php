@extends('layouts.frontTemplate')
@section('page-title', 'Events')
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
							<li>Events</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Department Area Start-->
<div class="course-area section-padding course-page">
	<div class="container">
		<div class="row">
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
                                <h3>
                                    <a href="{{url('event-details/'.$event->page_url)}}">
                                    @php 
                                    if(strlen($event->title) > 20){
                                     echo substr($event->title,0,20)."...";
                                    }
                                    else{
                                        echo $event->title;
                                    } 
                                    @endphp
                                    </a>
                                </h3>
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
		</div>
        <div class="row">
            <div class="col-md-12">
                <div class="pagination-content">
                    <ul class="pagination">
                        <li><a href="{{ $data['events']->previousPageUrl()}}"><i class="zmdi zmdi-chevron-left"></i></a></li>
                        <li class="current"><a href="{{ $data['events']->nextPageUrl() }}"><i class="zmdi zmdi-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
       </div>
	</div>
</div>
<!--End of Department Area-->
@endsection