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
    return redirect()->route('orders.index');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//Route::post('/posts/{post}/comments/store', [\App\Http\Controllers\PostController::class, 'storeComment'])
//    ->name('posts.comments.store');
//
//Route::resource('/posts', \App\Http\Controllers\PostController::class);
//
//Route::resource('/tags', \App\Http\Controllers\TagController::class);

//Route::get('/customers', \App\Http\Controllers\CustomerController::class);

Route::resource('/customers', \App\Http\Controllers\CustomerController::class);
Route::resource('/materials', \App\Http\Controllers\MaterialController::class);
Route::resource('/reports', \App\Http\Controllers\ReportController::class);
Route::resource('/problems', \App\Http\Controllers\ProblemController::class);

Route::get('/search', [\App\Http\Controllers\CustomerController::class, 'searchPhoneNumber'])->name('search');
//Route::get('/orders/report', [\App\Http\Controllers\OrderController::class, 'reportOrder'])->name('orders.report');
Route::resource('/orders', \App\Http\Controllers\OrderController::class);
Route::post('/orders/{order}/products/store', [\App\Http\Controllers\OrderController::class, 'storeProduct'])
    ->name('orders.products.store');

Route::post('/orders/{order}/delivery/note/store', [\App\Http\Controllers\OrderController::class, 'storeDeliveryNote'])
    ->name('orders.delivery.note.store');

Route::post('/orders/{order}/updatestatus', [\App\Http\Controllers\OrderController::class, 'updateStatus'])
    ->name('orders.updatestatus');

