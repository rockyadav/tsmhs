@extends('layouts.frontTemplate')
@section('page-title', 'News Details')
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
							<li>News Details</li>
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
						<img src="{{url('public/images/news/'.$data['news']->image)}}" alt="" style="width: 870px; height: 439px">  
						<div class="single-latest-text">
							<h3>{{$data['news']->title}}</h3> 
							<div class="single-item-comment-view">
							   <span><i class="zmdi zmdi-calendar-check"></i>{{date('d M Y',strtotime($data['news']->news_date))}}</span>
							</div>
							<p>{!!$data['news']->description!!}</p>
							@if($data['news']->link_title!='' && $data['news']->link_file!='')
								<h6 style="margin-bottom: 20px;"><a href="{{url('public/images/news/'.$data['news']->link_file)}}" target="_blank" style="color: #E67E22;">{{$data['news']->link_title}}</a></h6>
							@endif
						</div>
					</div>
				</div>    
			</div>
			<div class="col-lg-3 col-md-12 col-12">
				<div class="sidebar-widget">
					<div class="single-sidebar-widget">
						<h4 class="title">Recent News</h4>
						<div class="recent-content">
							@if(count($data['related_news'])>0)
                            @foreach($data['related_news'] as $rnews)
							<div class="recent-content-item">
								<a href="{{url('news-details/'.$rnews->page_url)}}"><img src="{{url('public/images/news/'.$rnews->image)}}" style="width: 70px; height: 67px;" alt=""></a>
								<div class="recent-text">
									<h4><a href="{{url('news-details/'.$rnews->page_url)}}">{{$rnews->title}}</a></h4>
									<p>@php
                                    if(strlen($rnews->description) > 100){
                                        echo substr($rnews->description,0,100) . " ...";
                                    }
                                    else{
                                        echo $rnews->description;
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