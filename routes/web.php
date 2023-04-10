<?php

use App\Http\Controllers\BlogImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AddAdmin;
use App\Http\Livewire\Admin\AddBlog;
use App\Http\Livewire\Admin\AddOrder;
use App\Http\Livewire\Admin\AddProduct;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\EditBlog;
use App\Http\Livewire\Admin\IndexAdmin;
use App\Http\Livewire\Admin\IndexBlog;
use App\Http\Livewire\Admin\IndexOrder;
use App\Http\Livewire\Admin\IndexProduct;
use App\Http\Livewire\Admin\IndexUser;
use App\Http\Livewire\Admin\OrderSummary;
use App\Http\Livewire\Admin\PaymentRequest;
use App\Http\Livewire\Admin\ShowPaymentRequest;
use App\Http\Livewire\Admin\ShowUser;
use App\Http\Livewire\Admin\ShowUserDropship;
use App\Http\Livewire\Admin\ShowUserReferral;
use App\Http\Livewire\Admin\UnvalidateUsers;
use App\Http\Livewire\Admin\UpdateProduct;
use App\Http\Livewire\Admin\UserBalance;
use App\Http\Livewire\Guest\Catalog;
use App\Http\Livewire\Guest\Checkout;
use App\Http\Livewire\Guest\ListBlog;
use App\Http\Livewire\Guest\Product as GuestProduct;
use App\Http\Livewire\Guest\ReadBlog;
use App\Http\Livewire\Reseller\Balance;
use App\Http\Livewire\Reseller\Referral;
use App\Http\Livewire\Reseller\ResellerDashboard;
use App\Http\Livewire\Reseller\Sales;
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
    return view('home');
});

Route::get('/list-blog', ListBlog::class)->name('list-blog');

Route::get('/blog/{blog:slug}', ReadBlog::class)->name('read-blog');

Route::get('/product', function () {
    return view('product');
});

Route::get('/join-reseller', function () {
    return view('join-reseller');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/catalog', function(){
    return redirect('/');
});
Route::group(['middleware' => 'validated'],function () {
    Route::get('/catalog/{reseller}', Catalog::class)->name('catalog-channel');
    Route::get('/catalog/{reseller}/checkout', Checkout::class)->name('catalog-checkout');
    Route::get('/catalog/{reseller}/{product}', GuestProduct::class)->name('catalog-product');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/products', IndexProduct::class)->name('products.index');
        Route::get('/create-product', AddProduct::class)->name('products.create');
        Route::get('/edit-product/{product:id}', UpdateProduct::class)->name('products.edit');

        Route::get('/users', IndexUser::class)->name('users.index');
        Route::get('/users/unvalidate', UnvalidateUsers::class)->name('users.unvalidate');
        Route::get('/users/{user}', ShowUser::class)->name('users.show');
        Route::get('/users/{user}/dropship', ShowUserDropship::class)->name('users.dropship');
        Route::get('/users/{user}/referral', ShowUserReferral::class)->name('users.referral');

        Route::get('/admin', IndexAdmin::class)->name('admin.index');
        Route::get('/admin/create', AddAdmin::class)->name('admin.create');

        Route::get('/orders', IndexOrder::class)->name('orders.index');
        Route::get('/create-order', AddOrder::class)->name('orders.create');
        Route::get('/orders/{order}/summary', OrderSummary::class)->name('orders.summary');

        Route::get('/balances', UserBalance::class)->name('balances.index');

        Route::get('/payments', PaymentRequest::class)->name('payments.index');
        Route::get('/payments/{payment:id}', ShowPaymentRequest::class)->name('payments.show');

        Route::get('/blogs', IndexBlog::class)->name('blogs.index');
        Route::get('/create-blog', AddBlog::class)->name('blogs.create');
        Route::get('/edit-blog/{blog:id}', EditBlog::class)->name('blogs.edit');
        Route::post('/blog-image', [BlogImageController::class, 'storeImage'])->name('blogs.upload');
    });
    Route::group(['middleware' => ['role:reseller']], function () {
        Route::get('/dashboard-reseller', ResellerDashboard::class)->name('dashboard-reseller');
        Route::group(['middleware' => 'is_validated'], function () {
            Route::get('/referral', Referral::class)->name('referral');
            Route::get('/sales', Sales::class)->name('sales');
            Route::get('/balance', Balance::class)->name('balance.index');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
