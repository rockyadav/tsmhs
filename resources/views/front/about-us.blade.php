@extends('layouts.frontTemplate')
@section('page-title', 'About Us')
@section('content')
<style type="text/css">
.about-text-container
 {
  	text-align: justify;
    text-justify: inter-word;
 }
b{
  font: unset;
  font-weight: bold;
}

ul{
  list-style: unset;
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
							<li>About Us</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--About Us Page Area Start-->
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
					<p><b>MISSION</b></p>
          
					<p>To provide high quality education to our students by developing a suitable combination of skills, knowledge and attitude to enable them meet the challenges posed by globalization.</p>

					<p><b>MANDATE</b></p>

					<p>To train competent medical professionals for Kenya, the East African community and beyond.</p>

					<p><b>VISION</b></p>

					<p>To be the leading preferred medical training institution that offers internationally recognized high quality education.</p>

					<p><b>MOTTO</b></p>

					<p>Nurturing professional excellence.</p>

					<p><b>CORE VALUES</b></p>

					<p>Excellence in all our endeavors<p>
					<p>Integrity</p>
					<p>Transparency</p>
					<p>Professionalism and quality service</p>
					<p>Social fairness and equity</p>
					<p>Respect</p>
					<p>Equality</p>
					<p>Thika School of Medical and Health Sciences(TSMHS) is a leading private technical training institution registered by Ministry of Education, and also registered and licensed by Technical and Vocational Education and Training Authority. TSMHS is an affiliate of Thika Nursing home and Ruiru Private Hospital. TSMHS has five campuses with its main campus in Thika, and has four satellite campuses in Kitui, Kisumu, Mombasa and Nairobi.</p>

					<p>TSMHS was started in 2008 by Dr. Barham Dev Vasisht to address challenges he had encountered as the director of Thika Nursing Home and other hospitals on shortage of staff in the health profession, as well as an attempt to give back to the community by making training of medical and health professionals accessible and affordable to Kenyans.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of About Us Page Area-->
@endsection