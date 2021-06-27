@extends('layouts.frontTemplate')
@section('page-title', 'Login')
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
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Login Register section start-->
<div class="login-register section-padding">
    <div class="container">
        <div class="row" >
            <!--Login Form Start-->
            <div class="offset-3 col-lg-6 col-md-12 login-mobile">
                <div class="customer-login-register">
                    <div class="form-register-title">
                        <h2>Login</h2>
                    </div>
                    <div class="login-form">
                        @include('layouts.error-sucess-messages')
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-fild">
                                <p><label>Email address <span class="required">*</span></label></p>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-fild">
                                <p><label>Password <span class="required">*</span></label></p>
                                <input type="password" class="form-control"name="password" value="{{ old('password') }}" required="">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="login-submit">
                                <button type="submit" class="button-default">Login</button>
                            </div>
                            <div class="lost-password">
                                <a href="{{url('registration')}}">New student click here?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Login Form End-->
        </div>
    </div>
</div>
<!--Login Register section end-->
@endsection