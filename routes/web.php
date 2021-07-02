<?php

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/   
date_default_timezone_set("Asia/Calcutta");
ini_set('max_input_vars','6000' );
ini_set('max_execution_time', 1000);
ini_set('memory_limit', '1024M');
ini_set('post_max_size', '800M');

Route::get('phpinfo', function(){
	echo phpinfo();
});

Route::get('all-clear', function() {
   $exitCode = Artisan::call('cache:clear');
   $exitCode = Artisan::call('config:cache');
   $exitCode = Artisan::call('view:clear');
   echo 'done';
});

Auth::routes(); 

Route::get('home', 'Admin\HomeController@checkLogin')->name('home');
//check login
Route::get('checklogin', 'Admin\HomeController@checkLogin');
Route::get('registration', 'HomeController@registration'); //url change

Route::get('student-registration', 'HomeController@registration');
Route::post('registrationAction', 'HomeController@registrationAction');

//campus url
Route::get('campus/{url}', 'HomeController@showCampus');

//registration from home page
Route::post('student-registration', 'HomeController@studentRegistration');
Route::get('registration-form', 'HomeController@registrationForm');

//mail template
Route::get('mail-template', 'HomeController@mailTemplate');

Route::get('get_kcse_grade_list', 'HomeController@get_kcse_grade_list');
Route::get('get_state_list', 'HomeController@get_state_list');
Route::get('get_course_list', 'HomeController@get_course_list');
Route::get('get-courses/{id}/{grade}', 'HomeController@getCourses');
Route::post('set-eligibility', 'HomeController@setEligibility');
Route::get('set-eligibility', 'HomeController@setEligibility');
Route::get('get-courses/{id}', 'Admin\CoursesController@getCourses');

Route::get('registration-fee', 'PaymentController@index');

//front pages
Route::get('/', 'HomeController@index');
Route::get('director-message', 'HomeController@directorMessage');
Route::get('principal-message', 'HomeController@principalMessage');
Route::get('registrar-message', 'HomeController@registrarMessage');
Route::get('dean-message', 'HomeController@deanMessage');
Route::get('departments', 'HomeController@departments');
Route::get('departments/{page_url}', 'HomeController@departmentsCourse');
Route::get('departments/{dpage_url}/{cpage_url}', 'HomeController@courseDetail');
Route::get('news-details/{cpage_url}', 'HomeController@newsDetail');
Route::get('news', 'HomeController@news');
Route::get('events', 'HomeController@events');
Route::get('facility-details/{page_url}', 'HomeController@facilityDetails');

Route::get('event-details/{page_url}', 'HomeController@eventDetail');
Route::get('image-gallery', 'HomeController@imageGallery');
Route::get('video-gallery', 'HomeController@videoGallery');

Route::get('contact-us', 'HomeController@contactUs');
Route::post('contact-us-action', 'HomeController@contactUsAction');

Route::get('login-register', 'HomeController@loginRegister');
Route::get('download-links', 'HomeController@downloads');

Route::get('terms-conditions', 'HomeController@termsConditions');
Route::get('privacy-policy', 'HomeController@privacyPolicy');
Route::get('faqs', 'HomeController@faqs');
Route::get('about-us', 'HomeController@aboutUs');

Route::group([ 'prefix' => 'admin', 'middleware' => 'AdminMiddleware' ],function (){
	Route::get('dashboard', 'Admin\HomeController@index');
	Route::get('/profile', 'Admin\ProfileController@index');
	Route::post('profile-update', 'Admin\ProfileController@profile');
	Route::post('change-image', 'Admin\ProfileController@changeImage');

	//website image
	Route::get('website-image', 'Admin\ProfileController@websiteImage');
	Route::post('upload-image', 'Admin\ProfileController@uploadImage');

	//Course section 
    Route::resource('courses','Admin\CoursesController');
	Route::get('courses/edit/{id}','Admin\CoursesController@edit');
	Route::post('coursesUpdate','Admin\CoursesController@update');
	Route::get('courses-destroy/{id}', 'Admin\CoursesController@destroy');

	//Department section 
    Route::resource('department','Admin\DepartmentController');
	Route::get('department/edit/{id}','Admin\DepartmentController@edit');
	Route::post('department-update','Admin\DepartmentController@update');
	Route::get('department-destroy/{id}', 'Admin\DepartmentController@destroy');

	//cluster-requirement section 
    Route::resource('cluster-requirement','Admin\ClusterRequirementController');
	Route::get('cluster-requirement/edit/{id}','Admin\ClusterRequirementController@edit');
	Route::post('clusterRequirementUpdate','Admin\ClusterRequirementController@update');
	Route::get('cluster-requirement-destroy/{id}', 'Admin\ClusterRequirementController@destroy');

	Route::resource('student','Admin\RegistrationController');
	Route::get('student/edit/{id}','Admin\RegistrationController@edit');
	Route::get('student/details/{id}','Admin\RegistrationController@show');
	Route::post('studentUpdate','Admin\RegistrationController@update');
	Route::get('student-destroy/{id}', 'Admin\RegistrationController@destroy');

	//users
	Route::resource('users', 'Admin\UsersController');
	Route::get('users/destroy/{id}', 'Admin\UsersController@destroy');
	Route::get('edit-users/{id}', 'Admin\UsersController@edit');
	Route::post('users/update','Admin\UsersController@update');

	//Slider section 
    Route::resource('slider','Admin\SliderController');
	Route::get('slider/edit/{id}','Admin\SliderController@edit');
	Route::post('slider-update','Admin\SliderController@update');
	Route::get('slider-destroy/{id}', 'Admin\SliderController@destroy');

	//Facilities section 
    Route::resource('facilities','Admin\FacilitiesController');
	Route::get('facilities/edit/{id}','Admin\FacilitiesController@edit');
	Route::get('facilities/show/{id}','Admin\FacilitiesController@show');
	Route::post('facilities-update','Admin\FacilitiesController@update');
	Route::get('facilities-destroy/{id}', 'Admin\FacilitiesController@destroy');

	//Media Centre section 
    Route::resource('media-centre','Admin\MediaCentreController');
	Route::get('media-centre/edit/{id}','Admin\MediaCentreController@edit');
	Route::post('media-centre-update','Admin\MediaCentreController@update');
	Route::get('media-centre-destroy/{id}', 'Admin\MediaCentreController@destroy');

	//Downloads section 
    Route::resource('downloads','Admin\DownloadsController');
	Route::get('downloads/edit/{id}','Admin\DownloadsController@edit');
	Route::post('downloads-update','Admin\DownloadsController@update');
	Route::get('downloads-destroy/{id}', 'Admin\DownloadsController@destroy');

	//Events section 
    Route::resource('events','Admin\EventsController');
	Route::get('events/edit/{id}','Admin\EventsController@edit');
	Route::get('events/show/{id}','Admin\EventsController@show');
	Route::post('events-update','Admin\EventsController@update');
	Route::get('events-destroy/{id}', 'Admin\EventsController@destroy');

	//News section 
    Route::resource('news','Admin\NewsController');
	Route::get('news/edit/{id}','Admin\NewsController@edit');
	Route::get('news/show/{id}','Admin\NewsController@show');
	Route::post('news-update','Admin\NewsController@update');
	Route::get('news-destroy/{id}', 'Admin\NewsController@destroy');

	//Inquiries
	Route::resource('inquiries','Admin\InquiriesController');
	Route::get('inquiries/show/{id}','Admin\InquiriesController@show');
	Route::get('inquiries-destroy/{id}', 'Admin\InquiriesController@destroy');

    //Campus
	Route::resource('campus','Admin\CampusController');
	Route::get('campus/edit/{id}','Admin\CampusController@edit');
	Route::post('campus-update','Admin\CampusController@update');
	Route::get('campus/show/{id}','Admin\CampusControllerCampusController@show');
	Route::get('campus-destroy/{id}', 'Admin\CampusController@destroy');

	//logo  
    Route::resource('logo','Admin\LogoController');
	Route::get('logo/edit/{id}','Admin\LogoController@edit');
	Route::post('logo-update','Admin\LogoController@update');
	Route::get('logo-destroy/{id}', 'Admin\LogoController@destroy');

});

Route::group([ 'prefix' => 'student', 'middleware' => 'StudentMiddleware' ],function (){

});

Route::get('/404', function () {
    return view('errors.404');
});

Route::get('/500', function () {
    return view('errors.500');
});

Route::get('/403', function () {
    return view('errors.500');
});