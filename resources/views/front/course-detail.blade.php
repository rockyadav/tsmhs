@extends('layouts.frontTemplate')
@section('page-title', 'Courses Detail')
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
							<li>Course Details</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Course Details Area Start-->
<div class="course-details-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div class="course-details-content">
					<div class="single-course-details">
						<div class="row">
							<div class="col-md-4">
								<div class="overlay-effect">
									<a href="javascript:;"><img alt="" src="{{url('public/images/courses/'.$data['cources']->image) }}" style="width: 410px; height: 376px;"></a>
								</div>
							</div>  
							<div class="col-md-8">
								<div class="single-item-text">
									<h4>{{$data['cources']->name}}</h4>
									<div class="course-text-content">
										<p>{!!$data['cources']->description!!}</p>
									</div>    
								</div>
							</div> 
						</div>     
					</div>
					<div class="course-duration">
						<div class="duration-title">
							<div class="text"></div>
						</div>
						<div class="duration-text">
							<div class="text"><span>Department</span> <span class="text-right">{{$data['cources']->exam_board}}</span></div>
							<div class="text"><span>Category</span> <span class="text-right">@if($data['cources']->category_id==1) Certificate @elseif($data['cources']->category_id==2) Diploma @endif</span></div>
							<div class="text"><span>Exam Board</span> <span class="text-right">{{$data['cources']->exam_board}}</span></div>
							<div class="text"><span>Duration</span> <span class="text-right">{{$data['cources']->duration}}</span></div>
							<div class="text"><span>Mean Grade</span> <span class="text-right">{{$data['cources']->grade}}</span></div>
						</div>
						
					</div>
				</div>    
			</div>
		</div>
	</div>
</div>
<!--End of Course Details Area-->
@endsection