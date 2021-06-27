@extends('layouts.adminTemplate')
@section('page-title','Download Files')
@section('content')

<style>

.rimg{ 
  height : 50px!important;
  width : 50px!important ;
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
                <div class="card-content">
                    <h4 class="card-title">Downloads</h4>
                    <div class="toolbar">
                    </div>
                    <div class="material-datatables">
                        <div class="add-more text-right">
                            <a class="btn btn-rose btn-fill" href="{{route('downloads.create')}}"  style="margin: -66px 15px 0;">Add<div class="ripple-container"></div></a>
                        </div>
                        <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Title</th>
                                    <th>Files</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(count($data['list'])>0)
                              @php
                                $i=0;
                              @endphp
                                @foreach($data['list'] as $row)
                                @php
                                  $i++;

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
                                <tr>
                                <td>{{$i}}</td>
                                <td>{{$row->title}}</td>
                                <td> 
                                    @if($row->pdf_file!="")
                                    <a href="{{ url('public/downloads/'.$row->pdf_file) }}" target="_blank">
                                        <img src="{{ url('public/download-file-dummy/'.$file_extension) }}" style="height: 80px; width: 100px; background:none !important;" alt="..." class="img"></a>
                                    @endif


                                </td>
                                <td class="td-actions">
                                        <a href="{{url('admin/downloads/edit/'.$row->id)}}"><button type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">edit</i>
                                        </button></a>
                                        <a href="javascript:void(0);" onclick="deleteMyData('{{$row->id}}');">
                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button></a>
                                    </td>
                                </tr>
                                @endforeach
								@else
								 <tr>
                                    <td colspan="9">
									   <h4 style="color:red;"><b>Result not found.</b> </h4>
									</td>
								</tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="text-center">{{$data['list']->links()}}</div>
                    </div>
                </div>
                <!-- end content-->
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">

function deleteMyData(id)
{
    swal({
    title: 'Are you sure?',
    text: "You want to delete this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonClass: 'btn btn-success',
    cancelButtonClass: 'btn btn-danger',
    confirmButtonText: 'Yes',
    buttonsStyling: false

    }).then(function() {

        $.ajax({
                url: base_url+'/admin/downloads-destroy/'+id,
                method:"get",
            success:function(data)
            {
                if(data=='success')
                {
                    var message = 'Detail has been deleted successfully.';
                    demo.showNotification('bottom','right','success', message );
                    $('#datatables').load(document.URL +  ' #datatables');
                }else{
                    var message = 'Please try again';
                    demo.showNotification('bottom','right','danger', message );
                    $('#datatables').load(document.URL +  ' #datatables');
                }                    
            },
            error:function(er){
                console.log(er); 
            }

        });           

    });

}

</script>

@endsection