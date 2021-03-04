<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\FeedbackController;


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
Route::group(['middleware' => ['auth']],function(){
    Route::get('/home', [AdminController::class, 'pageAuth']);
    
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'listUser']);

    // Products
    Route::get('/admin/products', [AdminController::class, 'products']);
    Route::get('/admin/products/search', [AdminController::class, 'searchProducts']);
    Route::get('/products/search', [UserController::class, 'searchProducts']);
    Route::get('/admin/products/tambah',[AdminController::class, 'create']);
    Route::get('/admin/products/{product}', [AdminController::class, 'show']);
    Route::post('/admin/products', [AdminController::class, 'store']);
    Route::delete('/admin/products/{product}', [AdminController::class, 'destroy']);
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit']);
    Route::patch('/admin/products/{product}', [AdminController::class, 'update']);
    
    //Penjualan
    Route::post('/order/{product}', [PenjualanController::class, 'store']);
    Route::get('/admin/penjualan', [PenjualanController::class, 'index']);
    Route::get('/admin/penjualan/{bulan}', [PenjualanController::class, 'show']);
    Route::patch('/admin/updatepenjualan/{penjualan}', [PenjualanController::class, 'update']);
    Route::get('/admin/penjualan/{bulan}/search', [PenjualanController::class, 'searchPenjualan']);
    
    // Feedback
    Route::get('/feedbacks', [FeedbackController::class, 'index']);
    Route::post('/admin/feedback', [FeedbackController::class, 'store']);
    Route::post('/admin/feedbackProduct', [FeedbackController::class, 'storeProduct']);
    Route::delete('/admin/feedback/{comment}', [FeedbackController::class, 'destroy']);
    Route::patch('/admin/feedback/{comment}', [FeedbackController::class, 'update']);
    Route::get('/feedbacks/search', [FeedbackController::class, 'searchFeedback']);
});
// Route::middleware(['auth:sanctum', 'verified'])->get('/admin', [AdminController::class, 'index'])->name('admin');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
