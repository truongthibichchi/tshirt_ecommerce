// function ajax get view for admin
$('#btnSearch').on('click',function(){
	var _token = $('meta[name="_token"]').attr('content');
	$valueSearch = $('#inputSearch').val();
	// tạo ra đường dẫn route
	urlNew = url + '/admin/address/search/district';
	// thực hiện lấy view về
	$.ajax({
		type:"POST",
		url: urlNew,
		cache:false,
		data:{'_token':_token,'valueSearch':$valueSearch},
		success:function($re){
			$('#contentBodySearch').html($re);
		}
	});
});
$("#inputSearch").keyup(function(event)
{
	var code = event.keyCode || event.which;
	if (code === 13)
	{
		$('#btnSearch').click();
	}
});
$('#btnAdd').off('click').on('click',function(){
	$('.messModel').remove();
	$('#btnSubmitModel').attr('data-style','add');
	$('#city').val('');
	$('#idCity').val('');
	$('#district').val('');
	$('#inputDescriotion').val('');
});
$('#district').focusout(function(){
	if($.trim($(this).val())==""){
		$(this).css('border','1px solid red');
	}else{
		$(this).css('border','1px solid #d2d6de');
	}
});
$('#city').focusout(function(){
	if($.trim($('#idCity').val())==""){
		$(this).css('border','1px solid red');
	}else{
		$(this).css('border','1px solid #d2d6de');
	}
});
// autocomplete city
$('#city').autocomplete({
	minLenght:3,
	autoFocus:true,
	source: url+'/admin/address/getallcity',
	select: function(event,ui){
		$('#idCity').val(ui.item.id);
	},
});
// thêm hoặc sửa
$('#btnSubmitModel').off('click').on('click',function(){
	if($.trim($('#district').val())=="" || $.trim($('#idCity').val())==""){
		alert('Vui lòng nhập đủ thông tin');
		return;
	}
	$styleSubmit = $(this).attr('data-style');
	if($styleSubmit != 'undefined' && $styleSubmit != null){
		var _token = $('meta[name="_token"]').attr('content');
		$valueName =$('#district').val();
		$valueDescription = $('#inputDescriotion').val();
		$idCity = $('#idCity').val();
		switch($styleSubmit){
			// chỉnh sửa
			case 'edit':
			// tạo ra đường dẫn route
			urlNew = url + '/admin/address/add/district';
			$idItem = $('#btnSubmitModel').attr('data-iditem');
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'idCity':$idCity,'idSend':$idItem,'valueName':$valueName,'valueDescription':$valueDescription},
				success:function($re){
					if($re=='0'){
						console.log($re);
					}else{
						$('#sizeModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Cập nhật thành công</span>');
						if(typeof inat !== 'undefined'){

							inat.UpdateItemInListRowTable('id',$idItem,{
								'data':{'id':$re['id'],
								'Name':$re['Name'],
								"nameCity":$re['nameCity'],
								"idCity":$re['idCity'],
								'Description':$re['Description'],
								"Action":"<i data-edit='"+$re['id']+"' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+$re['id']+"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
								'STT':inat.getItem('id',$idItem)['data']['STT'],
							},
							'flag':0
						});
						}
					}
				}
			});
			break;
			// thêm
			default:
			// tạo ra đường dẫn route
			urlNew = url + '/admin/address/add/district';
			// thực hiện lấy view về
			$.ajax({
				type:"POST",
				url: urlNew,
				cache:false,
				data:{'_token':_token,'idCity':$idCity,'valueName':$valueName,'valueDescription':$valueDescription},
				success:function($re){
					if($re=='0'){
						console.log($re);
					}else{
						$('#sizeModal').find('.modal-footer').before('<span class="messModel" style="background:#D9EDC8;text-align:center;display:block;color:#0AA598;">Thêm thành công</span>');
						if(typeof inat !== 'undefined'){
							inat.AddRowTable({
								'data':{'id':$re['id'],
								'Name':$re['Name'],
								"nameCity":$re['nameCity'],
								"idCity":$re['idCity'],
								'Description':$re['Description'],
								"Action":"<i data-edit='"+$re['id']+"' class='editItem fa fa-pencil-square-o fa-2x' aria-hidden='true'></i><i data-delete='"+$re['id']+"' class='deleteItem fa fa-trash-o fa-2x' aria-hidden='true'></i>",
								'STT':inat.getCountItem()+1,
							},
							'flag':0
						});
						}
					}
				}
			});
			break;
		}
	}
});