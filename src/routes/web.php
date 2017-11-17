<?php

Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('admin', 'Jameron\Admin\Http\Controllers\Admin\AdminController@showAdminDashboard');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/settings', 'Jameron\Admin\Http\Controllers\Admin\SettingsController@edit');
    Route::post('/settings', 'Jameron\Admin\Http\Controllers\Admin\SettingsController@update');
});
