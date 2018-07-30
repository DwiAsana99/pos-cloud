<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

#resource root
Route::resource('divisi','DivisiController', ['except' => ['destroy', 'show']]);
Route::resource('departemen','DepartemenController', ['except' => ['destroy', 'show']]);
Route::resource('kategori','KategoriController', ['except' => ['destroy', 'show']]);
Route::resource('subkategori','SubkategoriController', ['except' => ['destroy', 'show']]);
Route::resource('distributor','DistributorController', ['except' => ['destroy', 'show']]);
Route::resource('distributordivisi','DistributorDivisiController', ['except' => ['destroy', 'show']]);
Route::resource('metodepembayaran','MetodePembayaranController', ['except' => ['destroy', 'show']]);
Route::resource('pelanggan','PelangganController', ['except' => ['destroy', 'show']]);
Route::resource('operator','OperatorController', ['except' => ['destroy', 'show']]);
Route::resource('barang','BarangController', ['except' => ['destroy', 'show']]);

#datatables root
Route::prefix('dt')->group(function() {
    Route::get('/divisi','DivisiController@dt')->name('dt.divisi');
    Route::get('/departemen','DepartemenController@dt')->name('dt.departemen');
    Route::get('/kategori','KategoriController@dt')->name('dt.kategori');
    Route::get('/subkategori','SubkategoriController@dt')->name('dt.subkategori');
    Route::get('/distributor','DistributorController@dt')->name('dt.distributor');
    Route::get('/distributordivisi','DistributorDivisiController@dt')->name('dt.distributordivisi');
    Route::get('/metodepembayaran','MetodePembayaranController@dt')->name('dt.metodepembayaran');
    Route::get('/pelanggan','PelangganController@dt')->name('dt.pelanggan');
    Route::get('/operator','OperatorController@dt')->name('dt.operator');
    Route::get('/barang','BarangController@dt')->name('dt.barang');
});

#select2 root
Route::prefix('select2')->group(function() {
    Route::get('/divisi/departemen','DepartemenController@select2')->name('select2.divisi.departemen');
    Route::get('/departemen/kategori','KategoriController@select2')->name('select2.departemen.kategori');
    Route::get('/kategori/subkategori','SubkategoriController@select2')->name('select2.kategori.subkategori');
    Route::get('/distributor/distributordivisi','DistributorDivisiController@select2')->name('select2.distributor.distributorDivisi');
    Route::get('/metode/debet','MetodePembayaranController@select2')->name('select2.metode');
    Route::get('/operator/status','OperatorController@select2')->name('select2.operator.status');
    Route::get('/subkategori/barang','BarangController@select2Subkategori')->name('select2.subkategori.barang');
    Route::get('/distributordivisi/barang','BarangController@select2DistributorDivisi')->name('select2.distributor_divisi.barang');
});

#isAktif
Route::prefix('isAktif')->group(function() {
    Route::get('/distributor/{distributor}/isaktif','DistributorController@isAktif')->name('isAktif.distributor');
    Route::get('/distributordivisi/{distributordivisi}/isaktif','DistributorDivisiController@isAktif')->name('isAktif.distributordivisi');
});

