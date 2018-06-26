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
				<form action="admin/product/{{$product->id}}/new" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<table>
						<tr>
							@foreach ($optionList as $ol)
							<th>
								<div class="form-group" style="align-content: center;">{{$ol->optionName}} 

									<div class="col-xs-6">
										<div class="well" style="max-height: 300px;overflow: auto;">

											<select name="{{$ol->id}}"style="width: 100px" size="4">
										@foreach($valueList as $vl)
										@if($vl->optionID == $ol->id && $vl ->isActive==1)
												<option name="{{$vl->id}}"value="{{$vl->id}}">{{$vl->valueName}}</option> 					
										@endif
										@endforeach
											</select>
										</div>
									</div>
								</div> 
							</th>
							@endforeach
						</tr>
					</table>
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>In Stock</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="number" class="form-control" id="new_inStock" name="new_inStock" value="0" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Image</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="file" class="form-control" id="new_imageSku" name="new_imageSku" required="">
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Edit Variant</h4>
			</div>
			<div class="modal-body">
				<form action="admin/product/{{$product->id}}/edit" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-xs-10">
							<label class="control-label"><i class="fa fa-star" aria-hidden="true"></i>SkuCode</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="text" class="form-control" id="edit_skuCode" name="edit_skuCode" readonly>
							</div>
						</div> 
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>In Stock</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="number" class="form-control" id="edit_inStock" name="edit_inStock" required="">
							</div>
						</div>
					</div> 
					<div class="form-group"> 
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>Image</label>
							<div class="input-group col-sm-12">
								<span class="input-group-addon"></span>
								<input type="file" class="form-control" id="edit_imageSku" name="edit_imageSku">
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
</div>

<!-- Modal delete -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel" style="color: red">Do you want to delete?</h4>
			</div>
			<div class="modal-body">
				<form  action="admin/product/{{$product -> id}}/delete" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-xs-10">
							<label class="control-label" ><i class="fa fa-star" aria-hidden="true"></i>SkuCode</label>
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
							<th>Attribute</th>
							<th>Delete</th>
							<th>Edit</th>

						</tr>
					</thead>
					<tbody>
						 @foreach ($skuList as $sl)
     						 <tr class="odd gradeX" align="center"> 
      						    <td> {{ $sl -> skuCode }} </td>
       							<td>
       								@if(count($imageList)!=0)
       								@foreach($imageList as $il)
       									@if($il->skuCode==$sl->skuCode)
       										<img style="width: 80px" src="storage/product/{{$il->url}}">
       									@endif
       								@endforeach
       								@endif
       							</td> 
       							<td> {{ $sl -> inStock }} </td>
       							<!-- hiển thị atributte -->
       							<td>
       							@foreach($variantList as $vl)
									@if($vl->skuCode==$sl -> skuCode)
										{{$vl->Options->optionName.': '.$vl->Option_values->valueName}}<br>
									@endif
       							@endforeach
       							</td>
       							<td class="center" id="delete">
        							<i class="fa  fa-trash  fa-fw"   style="color: red"></i>
      							</td>
      							<td class="center" id="edit"  > 
        							<i class="fa fa-pencil fa-fw "  style="color: #E8910D" ></i>
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

<script >
	$(document).on('click','#delete',function() {
		var id = $(this).closest('tr').find('td:eq(0)').text();
		$('#delete_id').val(id);
		$('#modalDelete').modal('show');
	});
</script>
<script >
			$(document).on('click','#edit',function() {
			var skuCode = $(this).closest('tr').find('td:eq(0)').text();
			var inStock =$(this).closest('tr').find('td:eq(2)').text();
			$('#edit_skuCode').val(skuCode);
			$('#edit_inStock').val(inStock);
			$('#modalEdit').modal('show');
		}); 
</script>


@endsection
