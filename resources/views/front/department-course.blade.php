@extends('layouts.frontTemplate')
@section('page-title', 'Department Course')
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
							<li>Department Courses</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Department Area Start-->
<div class="shop-grid-area section-padding">
	<div class="container">
		<div class="row">
			 @if(count($data['cources'])>0)
             @foreach($data['cources'] as $cource)
			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-product-item">
					<div class="single-product-image">
						<a href="{{url('departments/'.$cource->dpage_url.'/'.$cource->page_url)}}"><img src="{{url('public/images/courses/'.$cource->image)}}" alt="" style="width: 270px; height: 252px;"></a>
					</div>
					<div class="single-product-text">
						<h4 class="course-h4"><a href="{{url('departments/'.$cource->dpage_url.'/'.$cource->page_url)}}">{{$cource->name}}</a></h4>
						<div class="product-buttons">
							<a href="{{url('departments/'.$cource->dpage_url.'/'.$cource->page_url)}}"><button type="button" class="button-default cart-btn">Learn Now</button></a>
						</div>
					</div>
				</div>
			</div>
           @endforeach
           @else
           <div class="col-lg-3 col-md-6 col-12">
				Result not found
			</div>
           @endif
		</div>
		<?php
		/*<div class="row">
			<div class="col-md-12">
				<div class="pagination-content number">
					<ul class="pagination">
						<li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li class="current"><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>*/
	?>
	</div>
</div>
<!--End of Department Area-->
@endsection