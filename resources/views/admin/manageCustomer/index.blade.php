@extends('admin.layout.index')
@section('contentPages')
<!-- Modal New -->
<!-- <div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">New Customer</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/customer/newCustomer" method="POST">
					{{csrf_field()}}
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>First Name</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="new_firstName" name="new_firstName" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Last Name</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="new_lastName" name="new_lastName" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Email</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="new_email" name="new_email" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Phone</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="new_phone" name="new_phone" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>City</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="new_city" name="new_city" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Country</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="new_country" name="new_country" required="">
							</div>
						</div>
					</div> 

					<div class="modal-footer">
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Add</button>    
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

modal Delete
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel" style="color: red">Do you want to delete?</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/customer/deleteCustomer" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>ID</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="delete_id" name="delete_id" readonly>
							</div>
						</div> 
					</div> 
					<div class="modal-footer">
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Delete</button>    
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

Modal Edit
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Edit Customer</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/customer/editCustomer" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-xs-10">
							<label class="control-label"><i class="fa fa-star" aria-hidden="true"></i>ID</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_id" name="edit_id" readonly>
							</div>
						</div> 
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>First Name</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_firstName" name="edit_firstName" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Last Name</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_lastName" name="edit_lastName" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Email</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_email" name="edit_email" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Phone</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_phone" name="edit_phone" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>City</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_city" name="edit_city" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Country</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_country" name="edit_country" required="">
							</div>
						</div>
					</div> 
					<div class="modal-footer">
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Save</button>    
					</div>

				</form>
			</div>

		</div>
	</div>
</div> -->

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{!! url('admin/manageHome') !!}">Home</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="{!! url('admin/customer') !!}">Customer</a>
	</li>
</ol>

<!-- Example DataTables Card-->
<div class="card mb-3">
	<div class="card-header">
		<!-- <button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#modalNew">+ New</button> -->
		@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $err)
			<strong>{{$err}}</strong><br/>
			@endforeach
		</div>
		@endif
		@if(session('message'))
		<div class="alert alert-success">
			<strong>{{ session('message') }}</strong>
		</div>
		@endif
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr align="center">
							<th>ID</th>
							<th>First Name</th>  
							<th>Last Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>City</th>
							<th>Country</th>
<!-- 							<th>Delete</th>
							<th>Edit</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach ($customerList as $cl)
						<tr class="odd gradeX" align="center"> 
							<td> {{ $cl -> id }} </td>
							<td> {{ $cl -> firstName }}</td> 
							<td> {{ $cl -> lastName }} </td>
							<td> {{ $cl -> email }}</td> 
							<td> {{ $cl -> phone }}</td> 
							<td> {{ $cl ->City['cityName'] }}</td> 
							<td> {{ $cl -> country }}</td> 
						<!-- 	<td class="center" id="delete" >
								<i class="fa  fa-trash  fa-fw"   style="color: red"></i>
							</td>
							<td class="center" id="edit"  > 
								<i class="fa fa-pencil fa-fw "  style="color: #E8910D" ></i>
							</td> -->
						</tr> 
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted"></div>
	</div>
</div>

@endsection

<!-- script -->
@section('script')
{{csrf_field()}}
<!-- <script>
	$(document).on('click','#edit',function() {
		var id = $(this).closest('tr').find('td:eq(0)').text();
		var firstName =$(this).closest('tr').find('td:eq(1)').text();
		var lastName =$(this).closest('tr').find('td:eq(2)').text();
		var email =$(this).closest('tr').find('td:eq(3)').text();
		var phone =$(this).closest('tr').find('td:eq(4)').text();
		var city =$(this).closest('tr').find('td:eq(5)').text();
		var country =$(this).closest('tr').find('td:eq(6)').text();
		$('#edit_id').val(id);
		$('#edit_firstName').val(firstName);
		$('#edit_lastName').val(lastName);
		$('#edit_email').val(email);
		$('#edit_phone').val(phone);
		$('#edit_city').val(city);
		$('#edit_country').val(country);
		$('#modalEdit').modal('show');
	}); 
</script>
<script >
	$(document).on('click','#delete',function() {
		var id = $(this).closest('tr').find('td:eq(0)').text();
		var firstName =$(this).closest('tr').find('td:eq(1)').text();
		var lastName =$(this).closest('tr').find('td:eq(2)').text();
		var email =$(this).closest('tr').find('td:eq(3)').text();
		var phone =$(this).closest('tr').find('td:eq(4)').text();
		var city =$(this).closest('tr').find('td:eq(5)').text();
		var country =$(this).closest('tr').find('td:eq(6)').text();
		$('#delete_id').val(id);
		$('#delete_firstName').val(firstName);
		$('#delete_lastName').val(lastName);
		$('#delete_email').val(email);
		$('#delete_phone').val(phone);
		$('#delete_city').val(city);
		$('#delete_country').val(country);
		$('#modalDelete').modal('show');
	});
</script> -->
@endsection
