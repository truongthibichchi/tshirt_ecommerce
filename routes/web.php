	<?php

// Route::get('/', function () {
//     return view('admin.login');
// });

Route::group(['prefix'=>'admin'],function(){
	Route::get('/','manageHomeController@Index');
});