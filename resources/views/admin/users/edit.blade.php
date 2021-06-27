<form method="post" action="{{url('admin/users/update')}}"  id="edit-form" enctype="multipart/form-data">
@csrf
<div class="row">
	<div class="form-group col-md-6">
		<label class="control-label">First Name</label>
		<input type="hidden" name="rowId" value="{{$data['detail']->id}}">
		<input type="text" name="first_name" class="form-control" required="" autocomplete="off" value="{{$data['detail']->first_name}}">
	</div>
	<div class="form-group col-md-6">
		<label class="control-label">Last Name</label>
		<input type="text" name="last_name" class="form-control" autocomplete="off" value="{{$data['detail']->last_name}}">
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label class="control-label">Email</label>
		<input type="email" name="email" class="form-control" required="" autocomplete="off" value="{{$data['detail']->email}}">
	</div>
	<div class="form-group col-md-6">
		<label class="control-label">Mobile</label>
		<input type="number" name="mobile" class="form-control" required="" autocomplete="off" value="{{$data['detail']->mobile}}">
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label class="control-label">Password</label>
		<input type="password" name="password" class="form-control" autocomplete="off">
	</div>
	<div class="form-group col-md-6">
		<label class="control-label">Confirm Password</label>
		<input type="password" name="password_confirmation" class="form-control" autocomplete="off">
	</div>
</div>
<div class="row">
	<div class="form-group col-md-6">
		<label class="control-label">Role</label>
		<select name="role" class="form-control" required="">
			<option value="">Select Role</option>
			<option value="3" @if($data['detail']->role==3) selected @endif>Finance</option>
			<option value="4" @if($data['detail']->role==4) selected @endif>Admission</option>
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