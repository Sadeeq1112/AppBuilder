<?php
//Users Controller
Route::group(['middleware' => ['auth','permission:user_all']],function(){
    Route::get('/users/list', array('uses' => 'UsersController@All', 'as' => 'api_userslist'));
});
Route::group(['middleware' => ['auth','permission:user_edit']],function(){
    Route::get('/users/edit/{id}', array('uses' => 'UsersController@edit', 'as' => 'api_usersedit'));
});
Route::group(['middleware' => ['auth','permission:user_create_update']],function(){
    Route::post('/users/createorupdate', array('uses' => 'UsersController@CreateOrUpdate', 'as' => 'api_userscreateorupdate'));
});
Route::group(['middleware' => ['auth','permission:user_delete']],function(){
    Route::get('/users/delete/{id}', array('uses' => 'UsersController@Delete', 'as' => 'api_usersdelete'));
});
Route::group(['middleware' => ['auth','permission:user_delete_muliple']],function(){
    Route::delete('/users/delete_multiple', array('uses' => 'UsersController@DeleteMultiple', 'as' => 'api_usersdeletemultiple'));
});

//Profile
Route::group(['middleware' => ['permission:user_profile']],function(){
    Route::get('/users/profile', array('uses' => 'UsersController@Profile', 'as' => 'api_userprofile'));
});
Route::group(['middleware' => ['auth','permission:user_profile_update']],function(){
    Route::post('/users/profileUpdate', array('uses' => 'UsersController@ProfileUpdate', 'as' => 'api_userprofileupdate'));
});
?>
