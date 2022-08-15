<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
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



// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('',[MainController::class,'index'])->name('dashboard');
    Route::get('category/{id}',[CategoryController::class,'destroy'])->whereNumber('id')->name('category.destroy');
    Route::get('category/{category_id}/menu/olustur', [MenuController::class, 'create'])->name('menu.olustur');
    Route::get('category/{category_id}/menu/{menu_id}',[MenuController::class,'silme'])->whereNumber('category_id','menu_id')->name('menu.silme');
    Route::resource('category', CategoryController::class);
    Route::resource('category/{category_id}/menu', MenuController::class);

    // Route::resource('categories', CategoryController::class);
});



require __DIR__.'/auth.php';
