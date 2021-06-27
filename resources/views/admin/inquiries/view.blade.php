@extends('layouts.adminTemplate')
@section('page-title','Inquiries details')
@section('content')

<div class="content">
@include('layouts.error-sucess-messages')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">account_circle</i>
            </div>
             <ul class="nav nav-pills nav-pills-warning">
                 <h4 class="card-title">Inquiries Details</h4>
				<div class="text-right">
                <a href="{{url('admin/inquiries')}}"> <button type="button" class="btn btn-rose" style="margin: -120px 15px 0;">Back<div class="ripple-container"></div></button></a>
                </div>
                <div class="card-content">
                <div class="tab-content">
                    <div class="tab-pane active" id="pill1">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Date</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                       {{date('d-m-Y h:i A' ,strtotime($data['detail']->created_at))}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-4 label-on-right">First Name</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                        {{$data['detail']->first_name}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div> 
                             <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Last Name</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                        {{$data['detail']->last_name}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div> 
                             <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Country</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                       {{$data['detail']->country}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Mobile</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                       {{$data['detail']->mobile}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Email</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                       {{$data['detail']->email}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Subject</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                       {{$data['detail']->subject}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-md-4 label-on-right">Message</label>
                                <div class="col-md-8">
                                    <div class="form-group label-floating is-empty">
                                       {{$data['detail']->message}}
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>
</div>
@endsection