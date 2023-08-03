<?php

Route::group(['prefix' => 'projects'], function() {
    Route::get('/', 'ProjectController@all');
    Route::get('/{project}', 'ProjectController@single');
    Route::post('/', 'ProjectController@create');
});

Route::group(['prefix' => 'pages'], function() {
    Route::get('/{page}', 'PageController@single');
    Route::post('/', 'PageController@create');
    Route::post('/{page}', 'PageController@createComponent');
    Route::put('/{page}/order', 'PageController@updateOrder');
    Route::delete('/{page}', 'PageController@delete');
});

Route::group(['prefix' => 'categories'], function() {
    Route::get('/', 'CategoryController@all');
});

Route::group(['prefix' => 'components'], function() {
    Route::get('/', 'ComponentController@all');
});

Route::group(['prefix' => 'page_components'], function() {
    Route::put('/{component}', 'PageComponentController@update');
    Route::delete('/{component}', 'PageComponentController@delete');
});