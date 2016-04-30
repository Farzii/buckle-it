<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Requirements\Http\Controllers'], function() {
    Route::resource('requirement', 'RequirementsController');

    Route::post('upload-requirement-image/{id}', [
        'as' => 'upload-requirement-image',
        'uses' => 'RequirementsController@uplodImage'
    ]);

    Route::post('upload-requirement-file/{id}', [
        'as' => 'upload-requirement-file',
        'uses' => 'RequirementsController@uplodFile'
    ]);
    
    Route::delete('file-delete/{id}', [
        'as' => 'file-delete',
        'uses' => 'RequirementsController@fileDelete'
    ]);
    Route::get('get-comments/{item_id}/{type}', [
        'as' => 'admin.requirement.getcomments',
        'uses' => 'CommentsController@index'
    ]);
    Route::post('store-comments', [
        'as' => 'admin.requirement.addcomment',
        'uses' => 'CommentsController@store'
    ]);
    Route::get('change-requirement-status', [
        'as' => 'change-requirement-status',
        'uses' => 'RequirementsController@changeStatus'
    ]);
});
