@extends('layouts.frontTemplate')
@section('page-title', 'Images Gallery')
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
                            <li>Image Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Gallery Area Start-->
<div class="gallery-area pt-110 pb-130">
    <div class="container">
        <div class="row">
            @if(count($data['gallery'])>0)
            @foreach($data['gallery'] as $img)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="gallery-img">
                    <img src="{{url('public/images/media-centre/'.$img->image)}}" alt="" style="width: 380px; height:211px;">
                    <div class="hover-effect">
                        <div class="zoom-icon">
                            <a class="popup-image" href="{{url('public/images/media-centre/'.$img->image)}}"><i class="fa fa-search-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
           @endif
        </div>
    </div>
</div>
<!--End of Gallery Area-->
@endsection