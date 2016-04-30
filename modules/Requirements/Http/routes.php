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
});
