@extends('layouts.frontTemplate')
@section('page-title', 'Director Meassage')
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
							<li>Message From The Director</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--About Page Area Start-->
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
			<div class="col-lg-8 col-md-12 col-12">
				<div class="about-text-container">
					<p>It provides me an enormous pleasure to present Thika School of Medical and Health Sciences Colleges to all the hopeful students. Since the inauguration of this inordinate institution, we have an aim to deliver quality and valuable education and cultivate knowledgeable and skilled health professionals who are socially profound and devoted to excellence at global arena. In harmony with this target, we have a set of designated faculty members providing academic contribution for accomplishing excellence in teaching and research. The students of TSMHS are a cherry selected group and that indeed make us feel gratified.</p>
					
					<p>The college has a magnificent standing of more than 6 years now and remains to evolve as the most believed educational college in the field of Medical and Health Education in Kenya. The nature of experience provided here not only does it just train students for professional supremacy but also make them prepared to face universal challenges.</p>
					
					<p>It is my robust faith that given a chance, the scholars of this great institution of learning will demonstrate an asset to the employing establishments. We extend a warm invitation to the establishments/corporations looking for great graduates to visit our peaceful campus for a possible human resource equivalence to excellence.</p>
					
					<p>Thank you and God bless you.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-12 col-12">
				<div class="skill-image">
					<img src="{{url('public/images/management/principle.jpg')}}" alt="">
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of About Page Area-->
@endsection