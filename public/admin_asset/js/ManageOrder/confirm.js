// create by namnh
// create table from data listDataTable 
var columnFormat = {
	"tr": {
			// "class": "col"
		},
		"td": [{
			// "class": "",
			"text": "#STT#"
		},{
			// "class": "",
			"text": "#CreateDate#"
		},{
			// "class": "",
			"text": "#custommer#"
		},{
			// "class": "",
			"text": "#Products#"
		},{
			// "class": "",
			"text": "#totalOrder# VNĐ"
		},{
			// "class": "",
			"text": "#Discount# VNĐ"
		},{
			// "class": "",
			"text": "#Action#"
		}
		]
	};
	function pageLoaded(){
		$('.deleteOrder').off('click').on('click',function(){
			if(confirm("Bạn muốn xóa hóa đơn đã chọn?")){
				var $idOrder = $(this).attr('data-delete');
				var _token = $('meta[name="_token"]').attr('content');
				// tạo ra đường dẫn route
				urlNew = url + '/admin/order/delete';
				// thực hiện lấy view về
				$.ajax({
					type:"POST",
					url: urlNew,
					cache:false,
					data:{'_token':_token,'idOrder':$idOrder},
					success:function($re){
						if($re != '1'){
							console.log($re);
						}else{
							inat.DeleteItemInListRowTable('id',$idOrder);
						}
					}
				});
			}
		});
		$('.doneOrder').off('click').on('click',function(){
			if(confirm("Bạn muốn xác nhận hóa đơn đã chọn?")){
				var $idOrder = $(this).attr('data-done');
				var _token = $('meta[name="_token"]').attr('content');
				// tạo ra đường dẫn route
				urlNew = url + '/admin/order/done';
				// thực hiện lấy view về
				$.ajax({
					type:"POST",
					url: urlNew,
					cache:false,
					data:{'_token':_token,'idOrder':$idOrder},
					success:function($re){
						if($re != '1'){
							console.log($re);
						}else{
							inat.DeleteItemInListRowTable('id',$idOrder);
						}
					}
				});
			}
		});
	}
	var inat = $("#table-content").PagingTable(columnFormat,listDataTable,pageLoaded);

	