<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Guest\Catalog;
use App\Http\Livewire\Guest\Checkout;
use App\Http\Livewire\Guest\Product as GuestProduct;
use App\Models\User;
use Illuminate\Http\Client\Request;
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
Route::get('/catalog', function(){
    return redirect('/');
});
Route::get('/catalog/{reseller}', Catalog::class)->name('catalog-channel');
Route::get('/catalog/{reseller}/checkout', Checkout::class)->name('catalog-checkout');
Route::get('/catalog/{reseller}/{product}', GuestProduct::class)->name('catalog-product');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::group(['middleware' => ['role:reseller']], function () {
        Route::get('/dashboard-reseller', function () {
            return view('dashboard');
        })->name('dashboard-reseller');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
