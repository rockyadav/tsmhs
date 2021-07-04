@extends('layouts.frontTemplate')
@section('page-title', 'Contact Us')
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
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Contact Form Area Start-->
<div class="contact-form-area section-padding">
    <div class="container">
        <div class="row contact-address">
            @if(count($data['campus'])>0)
                @foreach($data['campus'] as $camp)
                <div class="col-lg-3 col-12 contact-address-sedow">
                    <h3>{{$camp->name}}</h3>
                    <p>{!!$camp->address!!}</p>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <h4 class="contact-title">contact info</h4>
                <div class="contact-text">
                    <p><span class="c-icon"><i class="zmdi zmdi-phone"></i></span><span class="c-text">0723 991 866/0708 241 019</span></p>
                    <p><span class="c-icon"><i class="zmdi zmdi-email"></i></span><span class="c-text">admissions@tsmhs.ac.ke</span></p>
                </div>
                <h4 class="contact-title">social media</h4>
                <div class="link-social">
                    <a href="https://web.facebook.com/tsmhs.ac.ke" target="_blank"><i class="zmdi zmdi-facebook"></i></a>
                    <a href="https://twitter.com/tsmhscollege" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                    <a href="https://instagram.com/tsmhs_college" target="_blank"><i class="zmdi zmdi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <h4 class="contact-title">Send your massage</h4>
                 @if(session()->has('success')) 
                 <div class="padding">
                    <div role="alert" class="alert alert-success alert-dismissible"> 
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button> <strong>Success!</strong>  {{ session()->get('success') }} 
                    </div>
                </div>
                @endif
              @if(session()->has('error'))
                 <div class="padding">
                    <div role="alert" class="alert alert-warning alert-dismissible"> 
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button> <strong>Error</strong>  {{ session()->get('error') }} 
                    </div>
                </div> 
                @endif
                <form method="post" action="{{url('contact-us-action')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="first_name" placeholder="First Name" required="">
                        </div>
                         <div class="col-md-6">
                            <input type="text" name="last_name" placeholder="Last Name" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="Email Address" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="country" placeholder="Country Of Residence" required="">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="mobile" placeholder="Phone" required="" onkeypress="return isNumber(event)" max="24">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="subject" placeholder="Nature of Enquiry" required="">
                        </div>
                        
                        <div class="col-md-12">
                            <textarea name="message" cols="30" rows="10" placeholder="Message" required=""></textarea>
                            <button type="submit" class="button-default">SUBMIT</button>
                        </div>
                    </div>
                </form>
                <!-- <p class="form-messege"></p> -->
            </div>
        </div>
    </div>
</div>
<!--End of Contact Form-->
@endsection