@extends('layouts.frontTemplate')
@section('page-title', 'Facility Details')
@section('content')
<style type="text/css">
.about-text-container
  {
  	text-align: justify;
    text-justify: inter-word;
}


</style>
<!--Breadcrumb Banner Area Start-->
<div class="breadcrumb-banner-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-text">
					<div class="breadcrumb-bar">
						<ul class="breadcrumb text-center">
							<li><a href="{{url('/')}}">Home</a></li>
							<li>Facility Details</li>
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
						<img src="{{url('public/images/facilities/'.$data['facility']->image)}}" alt="" style="width: 870px; height: 439px">  
						<div class="single-latest-text1 about-text-container">
							<h3>{{$data['facility']->title}}</h3> 
							<div class="single-item-comment-view">
							   <span><i class="zmdi zmdi-calendar-check"></i>{{date('d M Y',strtotime($data['facility']->created_at))}}</span>
							</div>
							<p>{!! $data['facility']->description !!}</p>
						</div>
					</div>
				</div>    
			</div>
			<div class="col-lg-3 col-md-12 col-12">
				<div class="sidebar-widget">
					<div class="single-sidebar-widget">
						<h4 class="title">Recent Posts</h4>
						<div class="recent-content">
							@if(count($data['related_facility'])>0)
                            @foreach($data['related_facility'] as $fac)
							<div class="recent-content-item">
								<a href="{{url('facility-details/'.$fac->page_url)}}"><img src="{{url('public/images/facilities/'.$fac->image)}}" style="width: 70px; height: 67px;" alt=""></a>
								<div class="recent-text">
									<h4><a href="{{url('facility-details/'.$fac->page_url)}}">{{$fac->title}}</a></h4>
									<p>@php
                      if(strlen($fac->description) > 60){
                          echo substr($fac->description,0,60) . " ...";
	                      }
	                      else{
	                          echo $fac->description;
	                      }
                     @endphp
                </p>
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