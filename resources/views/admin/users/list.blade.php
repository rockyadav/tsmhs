@extends('layouts.adminTemplate')
@section('page-title', 'User List')
@section('content') 

<style type="text/css">
.form-group input[type=file] {
    opacity: 1 !important;
    position: relative !important;
}
td {
    padding: 5px;
}
</style>
<div class="content">
<div class="container-fluid">

<div class="row">
 @include('layouts.error-sucess-messages')
<div class="col-md-12">
<div class="card">
    <div class="card-header card-header-icon" data-background-color="green">
    	<i class="material-icons">account_circle</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">User List</h4>
         <div class="add-more text-right">
                <a class="btn btn-rose btn-fill" href="javascript:;" data-toggle="modal" data-target="#add-modal" style="margin: -66px 15px 0;">Add<div class="ripple-container"></div></a>
            </div>
        <div class="row">
          <div class="col-md-12">
            <div class="material-datatables table-responsive">
           
             <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th> S.No </th>
                      <th> Role </th>
                      <th> First Name </th>
                      <th> Last Name </th>
                      <th> Email </th>
                      <th> Mobile </th>
                      <th> Actions </th>
                    </tr>
                </thead>
                
                <tbody>
                  @if(count($data['list'])>0)
                      @php
                      $i=0;
                      if(isset($_GET['page']))
                      {
                          if($_GET['page']>1)
                          {
                              $i = ($_GET['page']*25)-25;
                          }
                      }
                      @endphp
                    @foreach($data['list'] as $row)
                        <tr>
                            <td class="center">{{++$i}}</td>
                            <td class="center">
                            @if($row->role==3)
                            Finance
                            @else
                            Admission
                            @endif
                            </td>
                            <td class="center">{{$row->first_name}}</td>
                            <td class="center">{{$row->last_name}}</td>
                            <td class="center">{{$row->email}}</td>
                            <td class="center">{{$row->mobile}}</td>
                            <td class="td-actions">
                            	<a href="javascript:;" onclick="editPop('{{$row->id}}')">
	                            	<button type="button" rel="tooltip" class="btn btn-success">
	                                    <i class="material-icons">edit</i>
	                                </button>
	                            </a>
	                            @php 
                                  $url = '/admin/users/destroy/'.$row->id;
                                @endphp
                                <a href="javascript:void(0);" onclick="confirmPopup('You want to delete this user?','{{$url}}')">
                                    <button type="button" rel="tooltip" class="btn btn-danger">
                                    <i class="material-icons">close</i>
                                    </button>
                                </a>
                          </td>
                        </tr>
                    @endforeach
                @endif                
                </tbody>
            </table>
            <div class="text-center">
              {{$data['list']->links()}}
            </div>
        </div>
          </div>
        </div>
    </div>
    <!-- end content-->
</div>
<!--  end card  -->
</div>
<!-- end col-md-12 -->
</div>
<!-- end row -->
</div>
</div>

<div id="add-modal" class="modal fade edit-address" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New</h4>
			</div>
			<div class="modal-body">
				<div class="address_inner">
					<form method="post" action="{{route('users.store')}}" id="save-form" enctype="multipart/form-data">
						@csrf

					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label">First Name</label>
							<input type="text" name="first_name" class="form-control" required="" autocomplete="off">
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Last Name</label>
							<input type="text" name="last_name" class="form-control" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label">Email</label>
							<input type="email" name="email" class="form-control" required="" autocomplete="off">
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Mobile</label>
							<input type="number" name="mobile" class="form-control" required="" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label">Password</label>
							<input type="password" name="password" class="form-control" required="" autocomplete="off">
						</div>
						<div class="form-group col-md-6">
							<label class="control-label">Confirm Password</label>
							<input type="password" name="password_confirmation" class="form-control" required="" autocomplete="off">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="control-label">Role</label>
							<select name="role" class="form-control" required="">
								<option value="">Select Role</option>
								<option value="3">Finance</option>
								<option value="4">Admission</option>
							</select>
						</div>
					</div>
					<div class="progress" style="display: none;">
					    <div class="progress-bar"></div>
					</div>
					<div class="uploadStatus"></div>
					<div class="margin-top-10">
						<button type="submit" class="btn green">Save</button>
					</div>
					</form>
				</div>
			</div> 
		</div>
	</div>
</div>

<div id="edit-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit</h4>
			</div>
			<div class="modal-body">
				<div class="append-form">
				</div>
			</div> 
		</div>
	</div>
</div>
<script type="text/javascript">
function editPop(id){
	if(id!=''){
		$('.loader').show();
		$.ajax({
	                url:base_url+'/admin/edit-users/'+id,
	                method:"GET",
	                success:function(response) {
	                	$('.append-form').html(response);
	                    $('.loader').hide();
	                    $('#edit-modal').modal('show');
	                },
	                error:function(response){
	                    console.log('error');
	                },
	                complete: function () {
	                    //console.log('complete');
	                }
	            });
	}
}
</script>
@endsection
