@extends('layouts.frontTemplate')
@section('page-title', 'Dean Message')
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
							<li>Message From The Dean of Students</li>
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
					<p>Welcome to the Dean of Students Office where we prepare empowered global citizens who are ready to make a positive impact in the world. We accomplish our vision by engaging students in opportunities that foster student development for campus involvement, acquisition of personal values which create a respect for individual difference, cultural diversity and equal opportunity. We strive to meet the varied needs of all students through advocacy program support, advising, and general counseling. The students are also assisted in developing a comprehensive action plan for academic and personal success.</p>
					<p>Student’s discipline is of paramount importance in the college thus, we see to it that disciplinary procedures are adhered to in accordance with the college’s rules and regulation, ministry policies and national law.</p>

					<p>Provision of accommodation is a critical component of Student Welfare. In this regard therefore the college has been quite focused in increasing the number of accommodation facilities to allow as many students as possible to have an opportunity to stay in the college. Construction of apartment style room with a set-up for four is ongoing. This will not only curb accommodation crisis but also encourage responsibility and discipline in students.</p>
					<p>
					The office also deals with the general welfare of the students in conjunction with counseling office. The college, through the office of the Dean of Students is in the process of establishing fully fledged Christian and Muslim chaplaincies to take care of students’ spiritual needs. Meanwhile, vibrant Christian and Muslim groups led by the students exist.
					We pride in our sporting activities as well as clubs and societies in the college, the dean of student’s office facilitates these activities. The sports played include athletics, soccer, badminton, net ball and volleyball. Chess, Table tennis and Rugby are upcoming.</p>
					The clubs and societies include;
					• Drama and Dance Troupe
					• Young Catholic Association
					• Christian Union Association
					• Seventh day Adventist Association
					• Muslim Association
					• Peer Counseling Club among others.
					We recognizes the important role that parents play in their student’s lives and thus upon contact, students and families will have an answer to their question, a solution to their problem, or an effective referral to the office or professional who can be of assistance to them.</p>
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