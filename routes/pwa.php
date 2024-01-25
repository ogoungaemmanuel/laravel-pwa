<?php

Route::group(['middleware' => 'web'], function () {
    Route::get('/pwa/assets/{path?}', '\XslainPwa\PWA\Http\Controllers\PwaController@asset')
        ->where('path', '(.*)')
        ->name('pwa.asset');
    Route::get(
        'serviceworker',
        '\XslainPwa\PWA\Http\Controllers\PwaController@serviceWorker'
    )->name('pwa.serviceworker');
    Route::get(
        'register-serviceworker',
        '\XslainPwa\PWA\Http\Controllers\PwaController@serviceWorkerRegisterContent'
    )->name('pwa.serviceworker.register');
    Route::get(
        'offline',
        '\XslainPwa\PWA\Http\Controllers\PwaController@offline'
    )->name('pwa.offline');
    Route::group(['prefix' => 'pwa'], function () {
        Route::get(
            'manifest',
            '\XslainPwa\PWA\Http\Controllers\PwaController@manifest'
        )->name('pwa.manifest');
    });

    // PWA authorisez routes.
    Route::group(['prefix' => 'pwa', 'middleware' => 'auth'], function () {
        Route::get('', '\XslainPwa\PWA\Http\Controllers\PwaController@index')->name('pwa');
        Route::post('store', '\XslainPwa\PWA\Http\Controllers\PwaController@store')->name('pwa.store');
        Route::put('store', '\XslainPwa\PWA\Http\Controllers\PwaController@update')->name('pwa.update');
        Route::delete('store', '\XslainPwa\PWA\Http\Controllers\PwaController@destroy')->name('pwa.delete');
        Route::post('activate', '\XslainPwa\PWA\Http\Controllers\PwaController@activate')->name('pwa.activate');
        Route::post('deactivate', '\XslainPwa\PWA\Http\Controllers\PwaController@deactivate')->name('pwa.deactivate');
    });
});
