<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


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

// Customer
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'products']);

Route::get('/detailProduct/{product}', [UserController::class, 'show']);
Route::get('/aboutus', [UserController::class, 'about']);
Route::get('/contactus', [UserController::class, 'contact']);

// Admin
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::middleware(['auth:sanctum', 'verified'])->get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/admin/products', [AdminController::class, 'products']);
Route::get('/admin/products/search', [AdminController::class, 'searchProducts']);
Route::get('/products/search', [UserController::class, 'searchProducts']);
Route::get('/admin/penjualan', [AdminController::class, 'penjualan']);
Route::get('/admin/penjualan/{bulan}/search', [AdminController::class, 'searchPenjualan']);
Route::get('/admin/products/tambah',[AdminController::class, 'create']);
Route::get('/admin/products/{product}', [AdminController::class, 'show']);
Route::post('/admin/products', [AdminController::class, 'store']);
Route::delete('/admin/products/{product}', [AdminController::class, 'destroy']);
Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit']);
Route::patch('/admin/products/{product}', [AdminController::class, 'update']);
Route::get('/order/{product}', [AdminController::class, 'sell']);
Route::post('/admin/feedback', [AdminController::class, 'feedback']);
Route::get('/feedbacks', [AdminController::class, 'showFeedback']);
Route::get('/feedbacks/search', [AdminController::class, 'searchFeedback']);
Route::get('/admin/penjualan/{bulan}', [AdminController::class, 'detailPenjualan']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
