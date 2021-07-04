@extends('layouts.frontTemplate')
@section('page-title', $data['name'])
@section('content')
<style type="text/css">
    .pt-110 {
        padding-top: 50px !important;
    }
    .pb-130 {
    padding-bottom: unset !important;
}
</style>
<!--Slider Area Start-->
<div class="slider-area slider-two">
    <div class="preview-2">
        <div id="nivoslider" class="slides"> 
        @if(count($data['sliders'])>0)
        @php
          $i=0;
        @endphp
        @foreach($data['sliders'] as $slider)
        @php
          $i++;
        @endphp
             <img src="{{url('public/images/slider/'.$slider->image)}}" alt="responsive image" title="#slider-1-caption{{$i}}">
         @endforeach
         @endif
        </div> 
    </div>
</div>
<!--End of Slider Area-->

<!--Gallery Area Start-->
@if((count($data['gallery'])>0) || (count($data['videos'])>0))
<div class="gallery-area pt-110 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>Happenings</h3>
                    </div>
                </div>
            </div>
        </div>
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
        <div class="row">
            @if(count($data['videos'])>0)
            @foreach($data['videos'] as $video)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="gallery-img">
                   <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{$video->video_id}}?rel=0&wmode=Opaque&enablejsapi=1;showinfo=0;controls=0"frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
           @endforeach
           @endif
        </div>
    </div>
</div>
@endif
<!--End of Gallery Area-->
@if($data['campus']->about_principal!='')
<!--About Page Area Start-->
<div class="about-page-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-wrapper">
                    <div class="section-title">
                        <h3>WELCOME TO THIKA SCHOOL OF MEDICAL AND HEALTH SCIENCES</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="about-text-container text-justify ">{!! $data['campus']->about_principal !!}
                </div>
            </div>
            <div class="col-lg-3 col-md-12 col-12">
                <div class="skill-image">
                    <img src="{{url('public/images/management/'.$data['campus']->pimage)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of About Page Area-->
@endif
@endsection