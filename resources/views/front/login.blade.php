@extends('layouts.frontTemplate')
@section('page-title', 'Login')
@section('content') 
<!--Login Register section start-->
<div class="login-register section-padding">
    <div class="container">
        <div class="row" >
            <!--Login Form Start-->
            <div class="offset-3 col-lg-6 col-12">
                <div class="customer-login-register">
                    <div class="form-register-title">
                        <h2>Login</h2>
                    </div>
                    <div class="login-form">
                        <form action="#">
                            <div class="form-fild">
                                <p><label>Username or email address <span class="required">*</span></label></p>
                                <input name="username" value="" type="text">
                            </div>
                            <div class="form-fild">
                                <p><label>Password <span class="required">*</span></label></p>
                                <input name="password" value="" type="password">
                            </div>
                            <div class="login-submit">
                                <button type="submit" class="button-default">Login</button>
                                <label>
                                    <input class="checkbox" name="rememberme" value="" type="checkbox">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <div class="lost-password">
                                <a href="#">Lost your password?</a>
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