<?php

use App\Http\Controllers\Company;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Inventory;
use App\Http\Controllers\Kategori;
use App\Http\Controllers\Mpass;
use App\Http\Controllers\Penyerahan;
use App\Http\Controllers\Pinjam;
use App\Http\Controllers\Service;
use App\Http\Controllers\Terima;

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
// dashboard route
Route::get('/dashboard', [Dashboard::class, 'index']);

// master route
Route::get('/master/inventory', [Inventory::class, 'index']);
Route::get('/master/kategori', [Kategori::class, 'index']);
Route::post('/master/kategori/simpan', [Kategori::class, 'saveKategori']);
Route::post('/master/kategori/update/{id}', [Kategori::class, 'updateKategori']);
Route::post('/master/kategori/delete/{id}', [Kategori::class, 'delete']);
Route::get('/master/company', [Company::class, 'index']);
Route::post('/master/company/simpan', [Company::class, 'saveCompany']);
Route::post('/master/company/delete/{id}', [Company::class, 'delete']);
Route::post('/master/company/update/{id}', [Company::class, 'updateCompany']);

// stp route
Route::get('/stp/pinjam', [Pinjam::class, 'index']);
Route::get('/stp/penyerahan', [Penyerahan::class, 'index']);
Route::get('/stp/terima', [Terima::class, 'index']);

// service route
Route::get('/service', [Service::class, 'index']);

// mpass route
Route::get('/mpass', [Mpass::class, 'index']);
