	<?php

	Route::group(['prefix'=>'admin'],function(){
		Route::get('/','manageHomeController@index');
		Route::get('manageHome','manageHomeController@home');
		Route::get('order','manageOrderController@index');
		Route::get('customer','manageCustomerController@index');
		Route::get('product','manageProductController@index');
		Route::group(['prefix'=>'setting'],function(){
			Route::get('/','manageHomeController@home');
			Route::group(['prefix'=>'productCategory'],function(){
					Route::get('/','manageProductCategoryController@index');
					Route::post('newCategory', 'manageProductCategoryController@addCategory');
					Route::post('editCategory','manageProductCategoryController@editCategory');
					Route::post('deleteCategory', 'manageProductCategoryController@deleteCategory');
			});
		
			Route::get('option','manageOptionController@index');
			Route::get('city','manageCityController@index');
			Route::get('shipper','manageShipperController@index');
			Route::get('payment','managePaymentController@index');
		});
	});