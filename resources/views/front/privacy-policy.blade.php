@extends('layouts.frontTemplate')
@section('page-title', 'Privacy Policy')
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
							<li>Privacy Policy</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Privacy Policy Page Area Start-->
<div class="about-page-area section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title-wrapper">
					<div class="section-title">
						<h3>WELCOME TO THIKA SCHOOL OF MEDICAL AND HEALTH SCIENCES</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12">
				<div class="about-text-container">
					<p>Privacy Policy</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Privacy Policy Page Area-->
@endsection