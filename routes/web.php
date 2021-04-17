<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\JenisBukuContorller;
use App\Http\Controllers\PenerbitContorller;
use App\Http\Controllers\PenulisContorller;
use App\Penerbit;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/buku','BukuController@index');
Route::post('/buku/create','BukuController@tambahbuku');
Route::get('/buku/{id}/edit','BukuController@editbuku');
Route::post('/buku/{id}/update','BukuController@updatebuku');
Route::get('/buku/{id}/delete','BukuController@deletebuku');
Route::post('/buku/{id}/delete','BukuController@deletedata');
Route::get('/buku/{id}/view','BukuController@viewbuku');


Route::get('/penerbit','PenerbitContorller@index');
Route::post('/penerbit/create','PenerbitContorller@tambahpenerbit');
Route::get('/penerbit/{id}/edit','PenerbitContorller@editpenerbit');
Route::post('/penerbit/{id}/update','PenerbitContorller@updatepenerbit');
Route::post('/penerbit/{id}/delete','PenerbitContorller@deletepenerbit');
Route::get('/penerbit/{id}/view','PenerbitContorller@viewpenerbit');


Route::get('/penulis','PenulisContorller@index');
Route::post('/penulis/create','PenulisContorller@tambahpenulis');
Route::get('/penulis/{id}/edit','PenulisContorller@editpenulis');
Route::post('/penulis/{id}/update','PenulisContorller@updatepenulis');
Route::post('/penulis/{id}/delete','PenulisContorller@deletepenulis');
Route::get('/penulis/{id}/view','PenulisContorller@viewpenulis');


Route::get('/jenisbuku','JenisBukuContorller@index');
Route::post('/jenisbuku/create','JenisBukuContorller@tambahjenis');
Route::get('/jenisbuku/{id}/edit','JenisBukuContorller@editjenis');
Route::post('/jenisbuku/{id}/update','JenisBukuContorller@updatejenis');
Route::post('/jenisbuku/{id}/delete','JenisBukuContorller@deletejenis');
Route::get('/jenisbuku/{id}/view','JenisBukuContorller@viewjenis');


Route::get('/rakbuku','RakBukuController@index');
Route::post('/rakbuku/create','RakBukuController@tambahrak');
Route::get('/rakbuku/{id}/edit','RakBukuController@editrak');
Route::post('/rakbuku/{id}/update','RakBukuController@updatrak');
Route::get('/rakbuku/{id}/view','RakBukuController@viewrak');
Route::post('/rakbuku/{id}/delete','RakBukuController@deleterak');


Route::get('/peminjam','PeminjamController@index');
Route::post('/peminjam/create','PeminjamController@tambahpeminjam');
Route::get('/peminjam/{id}/edit','PeminjamController@editpeminjam');
Route::post('/peminjam/{id}/update','PeminjamController@updatepeminjam');
Route::get('/peminjam/{id}/view','PeminjamController@viewpeminjam');
Route::post('/peminjam/{id}/delete','PeminjamController@deletepeminjam');



