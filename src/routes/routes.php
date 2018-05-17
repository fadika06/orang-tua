<?php

Route::group(['prefix' => 'api/orang-tua', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@index',
        'create'    => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@create',
        'store'     => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@store',
        'show'      => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@show',
        'edit'      => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@edit',
        'update'    => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@update',
        'destroy'   => 'Bantenprov\OrangTua\Http\Controllers\OrangTuaController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('orang-tua.index')->middleware(['role:administrator|superadministrator']);
    Route::get('/create',       $controllers->create)->name('orang-tua.create')->middleware(['role:administrator|superadministrator']);
    Route::post('/',            $controllers->store)->name('orang-tua.store')->middleware(['role:administrator|superadministrator']);
    Route::get('/{id}',         $controllers->show)->name('orang-tua.show')->middleware(['role:administrator|superadministrator']);
    Route::get('/{id}/edit',    $controllers->edit)->name('orang-tua.edit')->middleware(['role:administrator|superadministrator']);
    Route::put('/{id}',         $controllers->update)->name('orang-tua.update')->middleware(['role:administrator|superadministrator']);
    Route::delete('/{id}',      $controllers->destroy)->name('orang-tua.destroy')->middleware(['role:superadministrator']);
});
