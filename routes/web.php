<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('jurusan' ,'JurusanController');
Route::resource('perusahaan' ,'PerusahaanController');
Route::post('cari/perusahaan', 'PerusahaanController@sortPerusahaan')->name('sort.perusahaan');
Route::resource('pengajuan' ,'PengajuanController');
Route::get('ajukan' ,'PengajuanController@create');
Route::post('/lakukan/ajuan' ,'PengajuanController@store');
Route::get('setujui/{id}', 'PengajuanController@setujui');
Route::post('daftarkan/siswa', 'SiswaController@daftarkanSiswa');
Route::resource('laporan' ,'LaporanController');
Route::resource('sidang' ,'SidangController');
Route::resource('kelas' ,'KelasController');
Route::resource('siswa' ,'SiswaController');
