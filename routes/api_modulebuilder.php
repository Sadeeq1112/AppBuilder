<?php
Route::post('/modulebuilder/saveMenuSorting', array('uses' => 'ModuleBuilderController@SaveMenuSorting'));
Route::post('/modulebuilder/menuscreateorupdate', array('uses' => 'ModuleBuilderController@MenusCreateOrUpdate'));
Route::get('/modulebuilder/menudelete/{id}', array('uses' => 'ModuleBuilderController@MenusDelete'));
Route::get('/modulebuilder/modulebuilderindex', array('uses' => 'ModuleBuilderController@Index'));
Route::get('/modulebuilder/builder', array('uses' => 'ModuleBuilderController@Builder'));
Route::get('/modules', array('uses' => 'ModuleBuilderController@Modules'));
Route::get('/modules/list', array('uses' => 'ModuleBuilderController@ModulesList'));
Route::get('/modules/edit/{id}', array('uses' => 'ModuleBuilderController@EditModule'));
Route::get('/modules/delete/{id}', array('uses' => 'ModuleBuilderController@DeleteModule'));
Route::post('/modules/CreateUpdate', array('uses' => 'ModuleBuilderController@CreateUpdateModule'));
Route::get('/modules/{id}', array('uses' => 'ModuleBuilderController@ConfigureModule'));
Route::get('/modules/fields/{module_id}', array('uses' => 'ModuleBuilderController@ModuleFields'));
Route::post('/modules/fields/CreateUpdate', array('uses' => 'ModuleBuilderController@CreateUpdateField'));
Route::get('/modules/fields/delete/{id}', array('uses' => 'ModuleBuilderController@DeleteField'));
Route::get('/modules/fields/edit/{id}', array('uses' => 'ModuleBuilderController@EditField'));
Route::get('/modulebuilder/generateview', array('uses' => 'ModuleBuilderController@GenerateView'));
Route::match(['get', 'post'], '/modulebuilder/generate/{id}', array('uses' => 'ModuleBuilderController@GenerateModule'));
Route::get('/modulebuilder/deletemodule', array('uses' => 'ModuleBuilderController@ModuleDelete'));
Route::get('/modulebuilder/getTableNames', array('uses' => 'ModuleBuilderController@GetTableNames'));
Route::delete('/modulebuilder/deletemultiplemodules', array('uses' => 'ModuleBuilderController@DeleteMultipleModules', 'as' => 'api_module_multiple_delete'));
Route::delete('/modules/fields/multipledelete', array('uses' => 'ModuleBuilderController@DeleteMultipleFields', 'as' => 'api_multiple_fields_delete'));