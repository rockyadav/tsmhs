@extends('layouts.frontTemplate')
@section('page-title', 'Principal Message')
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
							<li>Message From The Principal</li>
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
					<p>Welcome to Thika School of Medical and Health Sciences
					You have come to the right place in your search for quality higher education. In line with our motto ‘Nurturing Professional Excellence’ Thika school of Medical and Health Sciences efficiently equip students and our graduates to contribute in the health and medical sectors of Kenya and beyond. Guided by our Vision, Mission and core values, we endeavor to be the leading preferred medical training institution that offers internationally recognized high quality education.</p>
										
					<p>					
					Thika school of Medical and Health Sciences offers world class education to students of various nationalities drawn from Africa and beyond. The college has five campuses in Kenya, situated in Thika, Nairobi, Kitui, Kisumu and Mombasa. Our academic programmes are accredited, and our carefully developed curriculum equips students with a suitable combination of knowledge, skills and attitudes that enable them meet the challenges posed by globalization.
					</p>
					<p>
					At Thika school of Medical and Health Sciences, we understand that for us to nurture professional excellence, accompanying infrastructure has to be in place. Our administration plays a very crucial role in ensuring that our students have world class learning facilities that enable our them achieve academic excellence in our institution. These learning facilities include state-of-the-art lecture rooms, laboratories (skills laboratories, anatomy laboratories, food demonstration laboratories, Biology laboratory, Physics laboratory, Chemistry laboratory, ICT laboratories), enable students develop knowledge and practical skills.
					Our trainers have a passion to nurture the students in the quest for knowledge, skills and attitudes that enable them meet the challenges posed by globalization. Training in Thika school of Medical and Health Sciences involves lectures, laboratories’ demonstrations, clinical training, and class discussions. The college has MoUS with Maragua Level 4 Hospital, Gatundu Level 4 Hospital, Thika Level 5 Hospital, Kiambu Level 5, Thika Nursing Home, Munyu Health Center, Kiandutu Center, Githunguri Health Center, Ngoliba Health Center. All these health facilities provide important clinical skills to our students in the various academic programmes.
					Similarly, we have a great passion for molding individual students not just academically, but also physically, socially and academically.
					</p>
					<p>
					For prospecting parents, students and other stakeholders wishing to join us in the quest for nurturing professional excellence, I hope that you will find information provided in this website sufficient and that you will be joining us too.</p>
										
					<p>Muchule Akanga</p>
					<p>Principal</p>
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