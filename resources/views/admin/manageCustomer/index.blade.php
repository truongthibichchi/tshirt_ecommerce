@extends('admin.layout.index')
@section('contentPages')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{!! url('admin/manageHome') !!}">Home</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="{!! url('admin/setting/city') !!}">Customer</a>
	</li>
</ol>

<!-- Example DataTables Card-->
<div class="card mb-3">
	<div class="card-header">
		<button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#sizeModal">+ New</button>
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
							<th>Edit</th>
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
							<td> {{ $cl -> city }}</td> 
							<td> {{ $cl -> country }}</td> 
							
							<td class="center">
								<a href="" style="color: red">
									<i class="fa  fa-trash  fa-fw"></i>
								</a>
							</td>

						</tr> 
						@endforeach 
					</tbody>
				</table>
			</div>
		</div>
		<div class="card-footer small text-muted"></div>
	</div>
</div>
<!-- <script type="text/javascript" src="{!! url('public/admin_asset/js/ManageAddress/city/index.js') !!}"></script> -->
@endsection