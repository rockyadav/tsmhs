@extends('layouts.frontTemplate')
@section('page-title', 'Departments')
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
							<li>Departments</li>
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
			 @if(count($data['departments'])>0)
             @foreach($data['departments'] as $department)
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-item">
					<div class="single-item-image overlay-effect">
						<a href="{{url('departments/'.$department->page_url)}}"><img src="{{url('public/images/departments/'.$department->image) }}" alt="" style="width:300px; height:211px;"></a>
					</div>
					<div class="single-item-text">
						<h4><a href="{{url('departments/'.$department->page_url)}}">{{$department->name}}</a></h4>
						<p>{{$department->description}}</p> 
					</div>
					<div class="button-bottom">
						<a href="{{url('departments/'.$department->page_url)}}" class="button-default">Explore More</a>
					</div>
				</div>
			</div>
		   @endforeach
           @endif
		</div>
	</div>
</div>
<!--End of Department Area-->
@endsection