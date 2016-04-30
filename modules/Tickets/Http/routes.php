<?php

Route::group(['prefix' => 'tickets', 'namespace' => 'Modules\Tickets\Http\Controllers'], function()
{
	Route::get('/', 'TicketsController@index');
});