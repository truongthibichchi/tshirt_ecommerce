@extends('admin.layout.index')
@section('contentPages')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{!! url('admin/manageHome') !!}">Home</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="{!! url('admin/setting/city') !!}">Option</a>
	</li>
</ol>

<!-- New category -->
<!-- <ol class="breadcrumb">
	<button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#sizeModal">+ New</button>
</ol> -->

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
							<th>Option Name</th>  
							<th>Value</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($optionList as $ol)
						<tr class="odd gradeX" align="center"> 
							<td> {{ $ol -> id }} </td>
							<td> {{ $ol -> optionName }}</td> 
							<td class="center">
								<a href="">
									<i class="fa fa-pencil fa-fw" style="color: #E8910D"></i>
								</a>
							</td>
							<td class="center">
								<a href="" style="color: red">
									<i class="fa  fa-trash  fa-fw"></i>
								</a>
							</td>
							<td class="center">
								<a href="">
									<i class="fa fa-pencil fa-fw" style="color: #E8910D"></i>
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