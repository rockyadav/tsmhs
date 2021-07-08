@extends('layouts.adminTemplate')
@section('page-title','Dashboard')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            @if(Auth::user()->role==1)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Departments</p>
                        <h3 class="card-title">{{$data['departments']}}</h3>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/department') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Courses</p>
                        <h3 class="card-title">{{$data['courses']}}</h3>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/courses') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total News</p>
                        <h3 class="card-title">{{$data['news']}}</h3>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/news') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Today Inquiries</p>
                        <h3 class="card-title">{{$data['inquiries']}}</h3>

                    </div>
                    @php
                        $c_date = date('Y-m-d');
                    @endphp
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/inquiries?f_date='.$c_date.'&t_date='.$c_date) }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Registrations</p>
                        <h3 class="card-title">{{$data['register']}}</h3>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/student') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->role==1 || Auth::user()->role==4)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Today Leads</p>
                        <h3 class="card-title">{{$data['leads']}}</h3>

                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/leads') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>  
            @endif
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="card-content">
                        <p class="category">Total Admissions</p>
                        <h3 class="card-title">{{$data['admission']}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">info</i>
                            <a style="color:#663333;font-weight: 600;" href="{{ url('admin/admissions') }}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection