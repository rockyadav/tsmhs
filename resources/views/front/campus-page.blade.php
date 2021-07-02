@extends('layouts.frontTemplate')
@section('page-title', $data['name'])
@section('content')
<style type="text/css">
    .pt-110 {
        padding-top: 50px !important;
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
    </div>
</div>
<!--End of Gallery Area-->
@endsection