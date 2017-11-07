<?php

Route::group(['middleware' => ['web', 'auth', 'role:admin']], function () {
    Route::get('admin', 'Jameron\Admin\Http\Controllers\Admin\AdminController@showAdminDashboard');
    Route::get('admin/settings', 'Jameron\Admin\Http\Controllers\Admin\SettingsController@edit');
    Route::post('admin/settings', 'Jameron\Admin\Http\Controllers\Admin\SettingsController@update');
});
