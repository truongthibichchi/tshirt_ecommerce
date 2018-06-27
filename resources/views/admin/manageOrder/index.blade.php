@extends('admin.layout.index')
@section('contentPages')


<!-- Modal Shipper -->
<div class="modal fade" id="modalShipper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Shipping Order Products?</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/order/shipper" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-xs-10">
							<label class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Order</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="shipper_id" name="shipper_id" readonly>
							</div>
						</div> 
					</div> 
					
					<div class="form-group"> 
						<div class="col-xs-10">		
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Shipper</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<select class="form-control input-width" name="edit_shipper">
									@foreach($shipperList as $sl)
									<option value="{{ $sl->id }}">{{ $sl->companyName }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div> 
					<div class="modal-footer">
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Confirm</button>    
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

<!-- Modal Payment -->
<div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Pay Order?</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/order/payment" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-xs-10">
							<label class="control-label"><i class="fa fa-star" aria-hidden="true"></i>Order</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="payment_id" name="payment_id" readonly>
							</div>
						</div> 
					</div> 
					
					<div class="form-group"> 
						<div class="col-xs-10">		
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Payment</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_paymnetType" name="edit_paymnetType" readonly>
							</div>
						</div>
					</div> 
					<div class="modal-footer">
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Confirm</button>    
					</div>

				</form>
			</div>

		</div>
	</div>
</div>
<!-- Modal delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel" style="color: red">Cancel order?</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/order/cancelOrder" method="POST">
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
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Confirm</button>    
					</div>

				</form>
			</div>

		</div>
	</div>
</div>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{!! url('admin/manageHome') !!}">Home</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="{!! url('admin/order') !!}">Sale Order</a>
	</li>
</ol>

<!-- Example DataTables Card-->
<div class="card mb-3">
	<div class="card-header">
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
		@if(session('warning'))
		<div class="alert alert-danger">
			<strong>{{ session('warning') }}</strong>
		</div>
		@endif
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr align="center">
							<th>ID</th>
							<th>Order Date</th>  
							<th>Customer</th>
							<th>City</th>
							<th>Status</th>
							<th>Products</th>
							<th>Shipper</th>
							<th>Payment</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orderList as $ol)
						<tr class="odd gradeX" align="center"> 
							<td> {{ $ol -> id }} </td>
							<td>{{ $ol -> orderedDate }}</td>
							<td> {{ $ol -> User['firstName'] }}<span> </span>{{ $ol -> User['lastName']}}</td>
							<td> {{ $ol -> City ->cityName}}</td> 
							<td> {{ $ol -> Stt_order->sttName }}</td> 
							<td style='cursor:pointer' class="center" id="products"  >
								<a href="admin/order/{{$ol->id}}">
									<label class="lable-detail" data-detail="1" style="color: #337AB7"><i><u>Details</u></i></label>
									<i class="fa fa-external-link fa-fw" style="color: #138496"></i>
							</td>
							<td style='cursor:pointer' class="center" id="payment">{{ $ol -> Payment_type['type']}}
								<i  class="fa fa-pencil fa-fw "  style="color: #34A853" ></i>
							</td>
							<td style='cursor:pointer' class="center" id="shipper"  > 
								<i class="fa fa-pencil fa-fw "  style="color: #E8910D" ></i>
							</td>
							
							
							<td style='cursor:pointer' class="center" id="delete" >
									<i  class="fa  fa-trash  fa-fw"   style="color: red"></i>
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

	@endsection

	<!-- script -->
	@section('script')
	{{csrf_field()}}
	<script>
		$(document).on('click','#shipper',function() {
			var id = $(this).closest('tr').find('td:eq(0)').text();
				$('#shipper_id').val(id);
				$('#modalShipper').modal('show');
		}); 
	</script>
	<script>
		$(document).on('click','#payment',function() {
			var id = $(this).closest('tr').find('td:eq(0)').text();
			var payment = $(this).closest('tr').find('td:eq(7)').text();
				$('#payment_id').val(id);
				$('#edit_paymnetType').val(payment);
				$('#modalPayment').modal('show');
		}); 
	</script>
	<script >
		$(document).on('click','#delete',function() {
			var id = $(this).closest('tr').find('td:eq(0)').text();
			$('#delete_id').val(id);
			$('#modalDelete').modal('show');
		});
	</script>
	@endsection
