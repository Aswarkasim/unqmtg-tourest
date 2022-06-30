<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminCategoryPostController;
use App\Http\Controllers\AdminConfigurationController;
use App\Http\Controllers\AdminKecamatanController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSaranController;
use App\Http\Controllers\AdminUmkmController;
use App\Http\Controllers\AdminWisataController;
use App\Http\Controllers\HomeUmkmController;
use App\Http\Controllers\HomeWisataController;

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

Route::get('/', [HomeController::class, 'index']);



Route::prefix('/admin/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest');
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/doRegister', [AdminAuthController::class, 'doRegsiter']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    });

    Route::get('/saran', [AdminSaranController::class, 'index']);
    Route::get('/saran/show/{id}', [AdminSaranController::class, 'detail']);
    Route::get('/saran/delete/{id}', [AdminSaranController::class, 'delete']);

    Route::resource('/wisata', AdminWisataController::class);
    Route::resource('/kecamatan', AdminKecamatanController::class);
    Route::resource('/umkm', AdminUmkmController::class);

    Route::resource('/umkm/produk', AdminProductController::class);

    Route::resource('/user', AdminUserController::class);

    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::resource('/banner', AdminBannerController::class);


    Route::prefix('/posts')->group(function () {
        Route::resource('/kategori', AdminCategoryPostController::class);
        Route::resource('/post', AdminPostController::class);
    });
});


Route::get('/wisata', [HomeWisataController::class, 'index']);
Route::get('/wisata/detail/{id}', [HomeWisataController::class, 'detail']);

Route::get('/penginapan', [HomeUmkmController::class, 'penginapan']);
Route::get('/rental', [HomeUmkmController::class, 'rental']);
Route::get('/jajanan', [HomeUmkmController::class, 'jajanan']);
Route::get('/kuliner', [HomeUmkmController::class, 'kuliner']);
Route::get('/umkm/detail/{id}', [HomeUmkmController::class, 'detail']);

Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact/send', [HomeController::class, 'sendSaran']);
