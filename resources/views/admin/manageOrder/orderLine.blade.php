@extends('admin.layout.index')
@section('contentPages')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{!! url('admin/manageHome') !!}">Home</a>
	</li>
	<li class="breadcrumb-item active">
		<a href="{!! url('admin/order') !!}">Order</a>
	</li>
	<li class="breadcrumb-item active" style="color: #0056C0">{{$order->id}}
	</li>
</ol>

<!-- DataTables -->
<div class="card mb-3">
	<div class="card-header">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr align="center">
							<th>Skucode</th>
							<th>Image</th>  
							<th>Attribute</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orderLine as $ol)
						<tr class="odd gradeX" align="center"> 
							<td > {{ $ol -> skus }} </td>
							<td>
								@if(count($imageList)!=0)
								@foreach($imageList as $il)
								@if($il->skuCode==$ol->skus)
								<img style="width: 80px" src="storage/product/{{$il->url}}">
								@endif
								@endforeach
								@endif
							</td> 
							<!-- hiển thị atributte -->
							<td>
								@foreach($variantList as $vl)
								@if($vl->skuCode==$ol -> skus)
								{{$vl->Options->optionName.': '.$vl->Option_values->valueName}}<br>
								@endif
								@endforeach
							</td>
							<td id="quantity">{{$ol->quantity}}</td>

							<!-- Hiển thị giá -->
							<td id="price">
								@foreach ($skuList as $sl)
								<!-- lấy productID -->
								@if($sl->skuCode == $ol->skus)  
								@foreach($priceList as $pl)
								<!-- lấy price theo orderDate -->
								@if($sl->productID == $pl->productID)
								@if(($pl->startdate <= $order->orderedDate && 		$pl->enddate> $order->orderedDate) or 		($pl->startdate<= $order->orderedDate 			&& $pl->enddate==""))
								{{$pl->price}}
								@endif 		

								@endif
								@endforeach
								@endif
								@endforeach
							</td>
							<td id="total">
								@foreach ($skuList as $sl)
								<!-- lấy productID -->
								@if($sl->skuCode == $ol->skus)  
								@foreach($priceList as $pl)
								<!-- lấy price theo orderDate -->
								@if($sl->productID == $pl->productID)
								@if(($pl->startdate <= $order->orderedDate && 		$pl->enddate> $order->orderedDate) or 		($pl->startdate<= $order->orderedDate 			&& $pl->enddate==""))
								{{$pl->price*$ol->quantity}}
								@endif 		

								@endif
								@endforeach
								@endif
								@endforeach
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
@section('script')
{{csrf_field()}}
<script>
	// $(document).ready(function(){
	// 	for(var i=0;i<dataTable.length;i++){
			
	// 	}
	// });
</script>

@endsection


