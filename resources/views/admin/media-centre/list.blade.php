@extends('layouts.adminTemplate')
@section('page-title','Media Centre')
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
                 <?php
                        $type ='3';
                        if(isset($_GET['type']))
                        {
                            $type = $_GET['type'];
                        }
                    ?>
                <div class="card-content">
                    <h4 class="card-title">Media Centre</h4>
                    <div class="toolbar">
                         <form>
                        <div class="text-center">
                            <label>Filter</label>
                            <select name="type" id="type" onchange="form.submit()">
                                <option value=""> Choose Type</option>
                                  <option value="1"  @if($type==1) selected @endif>Image</option>
                                  <option value="2" @if($type==2) selected @endif>Video Link</option>
                                  <option value="3" @if($type==3) selected @endif>All</option>
                                  
                            </select>

                        </div>
                        </form>
                    </div>
                    <div class="material-datatables">
                        <div class="add-more text-right">
                            <a class="btn btn-rose btn-fill" href="{{route('media-centre.create')}}" style="margin: -66px 15px 0;">Add<div class="ripple-container"></div></a>
                        </div>
                        <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Media</th>
                                    <th>Title</th>
                                    <th>Type</th>
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
                                @endphp
                                <tr>
                                <td>{{$i}}</td>
                               @if($row->type=='image')
                                <td> 
                                    @if($row->image != '')
                                    <img class="tem-img"  src="{{ url('public/images/media-centre/'.$row->image) }}"  alt="image" class="img" style="width: 250px; height:150px;">
                                    @endif
                                </td>
                                @else
                                <td>
                                    <iframe width="250px" height="150px" src="{{$row->video_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </td>
                                @endif
                                <td>{{$row->title}}</td>
                                <td>{{$row->type}}</td>
                                <td class="td-actions">
                                        <a href="{{url('admin/media-centre/edit/'.$row->id)}}"><button type="button" rel="tooltip" class="btn btn-success">
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
                url: base_url+'/admin/media-centre-destroy/'+id,
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