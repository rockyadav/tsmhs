@extends('layouts.adminTemplate')
@section('page-title','Logo')
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
                    $campus ='';
                    if(isset($_GET['campus']))
                    {
                        $campus = $_GET['campus'];
                    }
                ?>
                <div class="card-content">
                    <h4 class="card-title">Logo</h4>
                    <div class="toolbar">
                        <form>
                            <div class="text-center">
                                <label>Filter</label>
                                <select name="campus" id="campus">
                                    <option value=""> Select Campus</option>
                                      @if(count($data['campuses'])>0)
                                        @foreach($data['campuses'] as $camp)
                                            <option value="{{$camp->id}}"  @if($campus==$camp->id) selected @endif>{{$camp->name}}</option>
                                        @endforeach
                                      @endif
                                </select>
                                <button type="submit" class="btn btn-fill btn-sm">Search</button>
                                <a href="{{url('admin/logo')}}"><button type="button" class="btn btn-fill btn-sm">Clear</button></a>
                            </div>
                        </form>
                    </div>
                    <div class="material-datatables">
                        <div class="add-more text-right">
                            <a class="btn btn-rose btn-fill" href="{{route('logo.create')}}" style="margin: -66px 15px 0;">Add<div class="ripple-container"></div></a>
                        </div>
                        <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SNO</th>
                                    <th>Logo</th>
                                    <th>Campus</th>
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
                                <td style="width:150px;"> @if($row->logo != '')
                                    <img class="tem-img"  src="{{ url('public/images/logos/'.$row->logo) }}"  alt="logo" class="img" style="width:80px; height: 80px;">
                                    @endif
                                </td>
                                <td>{{$row->name}}</td>
                                <td class="td-actions">
                                        <a href="{{url('admin/logo/edit/'.$row->id)}}"><button type="button" rel="tooltip" class="btn btn-success">
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
                url: base_url+'/admin/logo-destroy/'+id,
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