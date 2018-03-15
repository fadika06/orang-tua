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

    Route::get('/',             $controllers->index)->name('orang-tua.index');
    Route::get('/create',       $controllers->create)->name('orang-tua.create');
    Route::post('/',            $controllers->store)->name('orang-tua.store');
    Route::get('/{id}',         $controllers->show)->name('orang-tua.show');
    Route::get('/{id}/edit',    $controllers->edit)->name('orang-tua.edit');
    Route::put('/{id}',         $controllers->update)->name('orang-tua.update');
    Route::delete('/{id}',      $controllers->destroy)->name('orang-tua.destroy');
});
