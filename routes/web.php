	<?php

	Route::group(['prefix'=>'admin'],function(){
		Route::get('/','manageHomeController@index');
		Route::get('manageHome','manageHomeController@home');
		Route::get('order','manageOrderController@index');
		Route::group(['prefix'=>'customer'],function(){
					Route::get('/','manageCustomerController@index');
					Route::post('newCustomer', 'manageCustomerController@addCustomer');
					Route::post('editCustomer','manageCustomerController@editCustomer');
					Route::post('deleteCustomer', 'manageCustomerController@deleteCustomer');
			});
		Route::get('product','manageProductController@index');
		Route::group(['prefix'=>'setting'],function(){
			Route::get('/','manageHomeController@home');
			Route::group(['prefix'=>'productCategory'],function(){
					Route::get('/','manageProductCategoryController@index');
					Route::post('newCategory', 'manageProductCategoryController@addCategory');
					Route::post('editCategory','manageProductCategoryController@editCategory');
					Route::post('deleteCategory', 'manageProductCategoryController@deleteCategory');
			});
			Route::group(['prefix'=>'option'],function(){
					Route::get('/','manageOptionController@index');
					Route::post('newOption', 'manageOptionController@addOption');
					Route::post('editOption','manageOptionController@editOption');
					Route::post('deleteOption', 'manageOptionController@deleteOption');
			});
			Route::group(['prefix'=>'city'],function(){
					Route::get('/','manageCityController@index');
					Route::post('newCity', 'manageCityController@addCity');
					Route::post('editCity','manageCityController@editCity');
					Route::post('deleteCity', 'manageCityController@deleteCity');
			});
			Route::group(['prefix'=>'shipper'],function(){
					Route::get('/','manageShipperController@index');
					Route::post('newShipper', 'manageShipperController@addShipper');
					Route::post('editShipper','manageShipperController@editShipper');
					Route::post('deleteShipper', 'manageShipperController@deleteShipper');
			});
			Route::group(['prefix'=>'payment'],function(){
					Route::get('/','managePaymentController@index');
					Route::post('newPayment', 'managePaymentController@addPayment');
					Route::post('editPayment','managePaymentController@editPayment');
					Route::post('deletePayment', 'managePaymentController@deletePayment');
			});
		});
	});