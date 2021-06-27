@extends('layouts.frontTemplate')
@section('page-title', 'Downloads')
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
							<li>Downloads</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End of Breadcrumb Banner Area-->
<!--Downloads Area Start-->
<div class="course-area section-padding course-page">
	<div class="container">
		<div class="row">
			 @if(count($data['downloads'])>0)
             @foreach($data['downloads'] as $row)
             @php
               if($row->file_extension=='pdf'){
                   $file_extension ='pdf.png';
                       }else if($row->file_extension=='xlsx' || $row->file_extension=='xlsm' || $row->file_extension=='xls'){
                           $file_extension ='excel.png';
                       }else if($row->file_extension=='ppt' || $row->file_extension=='pptx' || $row->file_extension=='pptm'){
                           $file_extension ='powerpoint1.png';
                       }else if($row->file_extension=='doc' || $row->file_extension=='docx'){
                           $file_extension ='powerpoint1.png';
                       }else if($row->file_extension=='zip'){
                           $file_extension ='zip-format.png';
                       }else{
                           $file_extension ='url_image.png';
                       }
            @endphp
			<div class="col-lg-4 col-md-6 col-12">
				<div class="single-item">
					<div class="single-item-image overlay-effect">
						@if($row->pdf_file!="")
                        <a href="{{ url('public/downloads/'.$row->pdf_file) }}" target="_blank">
                            <img src="{{ url('public/download-file-dummy/'.$file_extension) }}" style="width:150px; height:150px;" alt="..." class="img"></a>
                        @endif
					</div>
					<div class="single-item-text">
						<h6><a href="{{url('departments/'.$row->page_url)}}">{{$row->title}}</a></h6>
					</div>
				</div>
			</div>
		   @endforeach
           @endif
		</div>
	</div>
</div>
<!--End of Download Area-->
@endsection