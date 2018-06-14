	<?php

// Route::get('/', function () {
//     return view('admin.login');
// });

	Route::group(['prefix'=>'admin'],function(){
		Route::get('/','manageHomeController@index');
		Route::get('manageHome','manageHomeController@home');
		Route::get('order','manageOrderController@index');
		Route::get('customer','manageCustomerController@index');
		Route::get('product','manageProductController@index');
		Route::group(['prefix'=>'setting'],function(){
			Route::get('/','manageHomeController@home');
			Route::get('productCategory','manageProductCategoryController@index');
			Route::get('option','manageOptionController@index');
			Route::get('city','manageCityController@index');
			Route::get('shipper','manageShipperController@index');
			Route::get('payment','managePaymentController@index');
		});
	});