@extends('layouts.adminTemplate')
@section('page-title','Facilities details')
@section('content')

<style type="text/css">
.rimg{ 
      height : 120px!important;
      width  : 200px!important ;
   }

    .my-modal{
        width: 28%;
    }

    @media only screen and (max-width: 600px) {
      .my-modal{
            width: 90%;
        }
      img{
            height: 180px !important;
            width: 260px !important;
      }
    }
</style>
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
                     <h4 class="card-title">Facilities Details</h4>
					<div class="text-right">
                    <a href="{{url('admin/facilities')}}"> <button type="button" class="btn btn-rose" style="margin: -120px 15px 0;">Back<div class="ripple-container"></div></button></a>
                    </div>
                    <div class="card-content">
                       
                        <div class="tab-content">
                            <div class="tab-pane active" id="pill1">
                                <div class="row">
                                     <div class="col-md-12">
                                        <label class="col-md-2 label-on-right">Image</label>
                                        <div class="col-md-10">
                                            <div class="form-group label-floating is-empty">
                                                @if($data['detail']->image!='')
                                                <img src="{{ url('public/images/facilities/'.$data['detail']->image) }}" class="rimg" />
                                                @else 
                                                <img src="{{url('public/images/user-placeholder.png')}}" class="rimg"  />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-4 label-on-right">Title</label>
                                        <div class="col-md-8">
                                            <div class="form-group label-floating is-empty">
                                                {{$data['detail']->title}}
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                     <div class="col-md-12">
                                        <label class="col-md-2 label-on-right">Description</label>
                                        <div class="col-md-10">
                                            <div class="form-group label-floating is-empty">
                                               {!! $data['detail']->description !!}
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