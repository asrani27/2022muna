<?php

Route::post('/login', 'LoginController@login');
Route::get('/', 'LoginController@checkAuth');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/beranda', 'SuperadminController@beranda');

    Route::get('/m/kelompok', 'SuperadminController@kelompok');
    Route::get('/m/kelompok/create', 'SuperadminController@kelompokcreate');
    Route::post('/m/kelompok/create', 'SuperadminController@kelompokstore');
    Route::get('/m/kelompok/edit/{id}', 'SuperadminController@kelompokedit');
    Route::post('/m/kelompok/edit/{id}', 'SuperadminController@kelompokupdate');
    Route::get('/m/kelompok/delete/{id}', 'SuperadminController@kelompokdelete');

    Route::get('/m/penyuluh', 'SuperadminController@penyuluh');
    Route::get('/m/penyuluh/create', 'SuperadminController@penyuluhcreate');
    Route::post('/m/penyuluh/create', 'SuperadminController@penyuluhstore');
    Route::get('/m/penyuluh/edit/{id}', 'SuperadminController@penyuluhedit');
    Route::post('/m/penyuluh/edit/{id}', 'SuperadminController@penyuluhupdate');
    Route::get('/m/penyuluh/delete/{id}', 'SuperadminController@penyuluhdelete');

    Route::get('/m/bantuan', 'SuperadminController@bantuan');
    Route::get('/m/bantuan/create', 'SuperadminController@bantuancreate');
    Route::post('/m/bantuan/create', 'SuperadminController@bantuanstore');
    Route::get('/m/bantuan/edit/{id}', 'SuperadminController@bantuanedit');
    Route::post('/m/bantuan/edit/{id}', 'SuperadminController@bantuanupdate');
    Route::get('/m/bantuan/delete/{id}', 'SuperadminController@bantuandelete');

    Route::get('/m/permohonan', 'SuperadminController@permohonan');
    Route::get('/m/permohonan/create', 'SuperadminController@permohonancreate');
    Route::post('/m/permohonan/create', 'SuperadminController@permohonanstore');
    Route::get('/m/permohonan/edit/{id}', 'SuperadminController@permohonanedit');
    Route::post('/m/permohonan/edit/{id}', 'SuperadminController@permohonanupdate');
    Route::get('/m/permohonan/delete/{id}', 'SuperadminController@permohonandelete');

    Route::get('/m/keluhan', 'SuperadminController@keluhan');
    Route::get('/m/keluhan/create', 'SuperadminController@keluhancreate');
    Route::post('/m/keluhan/create', 'SuperadminController@keluhanstore');
    Route::get('/m/keluhan/edit/{id}', 'SuperadminController@keluhanedit');
    Route::post('/m/keluhan/edit/{id}', 'SuperadminController@keluhanupdate');
    Route::get('/m/keluhan/delete/{id}', 'SuperadminController@keluhandelete');


    Route::get('/m/tanggapan', 'SuperadminController@tanggapan');
    Route::get('/m/tanggapan/create', 'SuperadminController@tanggapancreate');
    Route::post('/m/tanggapan/create', 'SuperadminController@tanggapanstore');
    Route::get('/m/tanggapan/edit/{id}', 'SuperadminController@tanggapanedit');
    Route::post('/m/tanggapan/edit/{id}', 'SuperadminController@tanggapanupdate');
    Route::get('/m/tanggapan/delete/{id}', 'SuperadminController@tanggapandelete');



    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporan/permohonan', 'LaporanController@permohonan');
    Route::get('/laporan/kelompok', 'LaporanController@kelompok');
    Route::get('/laporan/penyuluh', 'LaporanController@penyuluh');
    
});
