@extends('layouts.adminTemplate')

@section('page-title','Admissions')

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
                    <h4 class="card-title">Student List</h4>
                    <div class="toolbar">
                    </div>
                    <div class="material-datatables">
                        <div class="add-more text-right">
                       <!--      <a class="btn btn-rose btn-fill" href="{{route('courses.create')}}">Add<div class="ripple-container"></div></a> -->
                        </div>
                        <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Mode Of Study</th>
                                    <th>KCSE Grade</th>
                                    <th>Intrested Course</th>
                                    <th>Date</th>
                                    <th>Fees Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(count($data)>0)
                                @php
                                    $i=0;
                                    if(isset($_GET['page']))
                                    {
                                        $i = (15*$_GET['page'])-15;
                                    }
                                @endphp
                                @foreach($data as $row)
                                <tr>
                                <td>{{++$i}}</td>
                                <td>{{$row->first_name.' '.$row->last_name}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->mode_of_study}}</td>
                                <td>{{$row->kcse_grade}}</td>
                                <td>{{$row->course_name}}</td>
                                <td>{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                <td>
                                   <span style="color:red;">Not Paid</span>
                                </td>
                                <td class="td-actions">
                                     <a href="{{url('admin/admission/details/'.$row->id)}}"><button type="button" rel="tooltip" class="btn btn-success">
                                            <i class="material-icons">visibility</i>
                                        </button></a>

                                         @if(Auth::user()->role==1 || Auth::user()->role==4)
                                        <a href="{{url('admin/admission/edit/'.$row->id)}}"><button type="button" rel="tooltip" class="btn btn-warning">
                                            <i class="material-icons">edit</i>
                                        </button></a>
                                        @endif
                                        @if(Auth::user()->role==1)
                                        <a href="javascript:void(0);" onclick="deleteMyData('{{$row->id}}');">
                                        <button type="button" rel="tooltip" class="btn btn-danger">
                                            <i class="material-icons">close</i>
                                        </button></a>
                                        @endif
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
                        <div class="text-center">{{$data->links()}}</div>
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

                url: base_url+'/admin/admission-destroy/'+id,
                method:"get",
            success:function(data)
            {
                if(data=='success')
                {
                    var message = 'Details has been deleted successfully.';
                    demo.showNotification('bottom','right','success', message );
                    $('#datatables').load(document.URL +  ' #datatables');
                }else{
                     alert('Please try again.');
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