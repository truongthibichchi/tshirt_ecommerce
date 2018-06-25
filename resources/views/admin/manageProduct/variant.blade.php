@extends('admin.layout.index')
@section('contentPages')

<!-- Modal New -->
<div class="modal fade" id="modalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">New Variant</h4>
			</div>
			<div class="modal-body">
				<form >
					{{csrf_field()}}
					<table>
					<tr>
					@foreach ($optionList as $ol)
					<th width="50%">
					<div class="form-group" style="align-content: center;"> {{$ol->optionName}} 
						<div class="col-xs-6">
							<div class="well" style="max-height: 300px;overflow: auto;">
								<ul class="list-group checked-list-box">
									@foreach($valueList as $vl)
									@if($vl->optionID == $ol->id && $vl ->isActive==1)
									<li class="list-group-item" data-style="button"> <span>{{$vl->valueName}}</span></li>							
									@endif

									@endforeach
								</ul>
							</div>
						</div>
					</div> 
				</th>
					@endforeach
				</tr>
			</table>
					<div class="modal-footer">
						<button id="btnSubmitModel" type="submit" class="btn btn-info"><i class="fa fa-check"></i>Add</button>    
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
		<a href="{!! url('admin/product') !!}">Product</a>
	</li>
	<li class="breadcrumb-item active" style="color: #0056C0">{{$product->productName}}
	</li>
</ol>

<!-- DataTables -->
<div class="card mb-3">
	<div class="card-header">
		<button id="btnAdd" class="btn btn-info" data-toggle="modal" data-target="#modalNew">+ New</button>
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
							<th>Skucode</th>
							<th>Image</th>  
							<th>instock</th>
							<th>Delete</th>
							<th>Edit</th>

						</tr>
					</thead>
					<tbody>
						
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
<script type="text/javascript" src="admin_asset/js/checkboxes.js"></script>
{{csrf_field()}}
	<script>
		$('#btnSubmitModel').on('click', function(event) {

        // event.preventDefault(); 
        // var checkedItems = {}, counter = 0;
        // $("#check-list-box li.active").each(function(idx, li) {
        //     checkedItems[counter] = $(li).text();
        //     counter++;
        // });
        
    });
</script>
	
	@endsection
