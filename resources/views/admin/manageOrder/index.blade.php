@extends('admin.index')
@section('content')
<link rel="stylesheet" type="text/css" href="{!! url('public/admin_asset/css/table-sort/PagingTable.css') !!}">
<div class="card-body">
	<div class="table-responsive">
		<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4" >
			<div class="row" style="padding-left: 70%">
				<div class="col-sm-20 ">
					<div class="dataTables_length" id="dataTable_length">
						<select style="height: 38px" name="dataTable_length" aria-controls="dataTable" class="form-control form-control-sm">
							<option value="10">5</option>
							<option value="25">10</option>
							<option value="50">15</option>
							<option value="100">20</option>
						</select>
					</div>
				</div>
				<div class="col-sm-20 ">
					<div class="input-group">
						<input class="form-control" type="text" placeholder="Search for...">
						<span class="input-group-append">
							<button class="btn btn-primary" type="button">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</div>
			</div>
			<div class="row" style="padding-top: 2%">
				<div class="col-sm-12">
					
					<table class="table table-striped table-bordered table-hover" id="categoryList">
						<thead>
							<tr align="center">
								<th class="table-Sort" data-sort="no" style="width: 5%;">No.</th>
								<th class="table-Sort" data-sort="id" style="width: 10%;">ID</th>
								<th class="table-Sort" style="width: 10%;" data-sort="customer">Customer</th>
								<th class="table-Sort" style="width: 10%;"data-sort="orderDate">Order date</th>
								<th class="table-Sort" data-sort="status" style="width: 10%;">Status</th>
								<th class="table-Sort" data-sort="product" style="width: 10%;">Products</th>
								<th class="table-Sort" data-sort="total" style="width: 10%;">Total</th>
								<th class="table-Sort"  style="width: 10%;">Delete</th>
								<th class="table-Sort"  style="width: 10%;">Edit</th>

							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX" align="center">
								<td>1</td>
								<td>1</td>
								<td>Harry</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
								<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>

							</tr>
							<tr class="even gradeC" align="center">
								<td>2</td>
								<td>2</td>
								<td>Hermione</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
								<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
							</tr>
							<tr class="even gradeC" align="center">
								<td>3</td>
								<td>3</td>
								<td>Ron</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
								<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
							</tr>
						</tbody>
					</table>
					
				</div>
			</div>
			<div class="row" style="padding-left: 65%">
				<div class="col-sm-12 col-md-5">
					<div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
					</div>
				</div>
				<div class="col-sm-12 col-md-7">
					<div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
						<ul class="pagination">
							<li class="paginate_button page-item previous disabled" id="dataTable_previous">
								<a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
							</li>
							<li class="paginate_button page-item active">
								<a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
							</li>
							<li class="paginate_button page-item next disabled" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{!! url('public/admin_asset/js/table-sort/PagingTable.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/admin_asset/js/ManageOrder/confirm.js') !!}"></script>


@endsection