@extends('layouts.frontTemplate')
@section('page-title', 'Videos Gallery')
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
                            <li>Video Gallery</li>
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
            @if(count($data['videos'])>0)
            @foreach($data['videos'] as $video)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="gallery-img">
                   <iframe width="100%" height="200" src="{{$video->video_link}}"frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
           @endforeach
           @endif
        </div>
    </div>
</div>
<!--End of Gallery Area-->
@endsection