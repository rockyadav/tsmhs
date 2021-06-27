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
            <div class="col-lg-3 col-12 contact-address-sedow">
                <h3>Kitui Campus</h3>
                <p>Physical location: Located at site estate opposite Kitui District Hospital 0708241018,0723991866<br> Post Address: 429-01000 Thika, Kenya <br>Email Address: kituicampus@tsmhs.ac.ke</p>
            </div>
            <div class="col-lg-3 col-12 contact-address-sedow">
                <h3>Nairobi Campus</h3>
                <p>Physical location: 12th Floor Bazaar Building Moi Avenue Nairobi CBD <br>Postal address : 429-01000 Thika <br>Phone number : 0708241019, 0723991866 <br>Email address : nairobicampus@tsmhs.ac.ke</p>
            </div>
            <div class="col-lg-3 col-12 contact-address-sedow">
                <h3>Kisumu Campus</h3>
                <p>Physical location: Telephone house 2nd & 3rd floor, Oginga Odinga street opp. Jomo Kenyatta Sports ground.<br>Phone Number: 0704521359, 0723991866 <br>Postal Address: 429-01000 Thika, Kenya <br>Email Address: kisumucampus@tsmhs.ac.ke</p>
            </div>
            <div class="col-lg-3 col-12 contact-address-sedow">
                <h3>Mombasa Campus</h3>
                <p>Physical location: Located at Bamburi Mwisho <br>Postal address : 429-01000 Thika <br>Phone Number :0717310141 , 0723991866 <br>Email address : mombasacampus@tsmhs.ac.ke</p>
            </div>
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
                    <a href="https://www.addtoany.com/add_to/facebook?linkurl=https%3A%2F%2Ftsmhs.ac.ke%2Fcategory%2Fnews%2F&amp;linkname=News%20%7C%20THIKA%20SCHOOL%20OF%20MEDICAL%20AND%20HEALTH%20SCIENCES&amp;linknote=" target="_blank"><i class="zmdi zmdi-facebook" target="_blank"></i></a>
                    <a href="https://www.addtoany.com/add_to/linkedin?linkurl=https%3A%2F%2Ftsmhs.ac.ke%2F&linkname=THIKA%20SCHOOL%20OF%20MEDICAL%20AND%20HEALTH%20SCIENCES%20%7C%20%22Nurturing%20Professional%20Excellence%22&linknote=0723%20991%20866%2F0708%20241%20019" target="_blank"><i class="zmdi zmdi-linkedin"></i></a>
                    <a href="https://www.addtoany.com/add_to/twitter?linkurl=https%3A%2F%2Ftsmhs.ac.ke%2F&linkname=THIKA%20SCHOOL%20OF%20MEDICAL%20AND%20HEALTH%20SCIENCES%20%7C%20%22Nurturing%20Professional%20Excellence%22&linknote=0723%20991%20866%2F0708%20241%20019" target="_blank"><i class="zmdi zmdi-twitter"></i></a>
                    <a href="https://instagram.com/tsmhs_college/" target="_blank"><i class="zmdi zmdi-instagram"></i></a>
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
                            <input type="text" name="mobile" placeholder="Phone" required="">
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