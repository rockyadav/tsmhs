@extends('layouts.frontTemplate')
@section('page-title', 'News')
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
							<li>News</li>
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

		</div>

       <div class="row">
	        <div class="col-md-12">
	            <div class="pagination-content">
	                <ul class="pagination">
	                    <li><a href="{{ $data['news']->previousPageUrl()}}"><i class="zmdi zmdi-chevron-left"></i></a></li>
	                    <li class="current"><a href="{{ $data['news']->nextPageUrl() }}"><i class="zmdi zmdi-chevron-right"></i></a></li>
	                </ul>
	            </div>
	        </div>
       </div>
	</div>

</div>
<!--End of Department Area-->
@endsection