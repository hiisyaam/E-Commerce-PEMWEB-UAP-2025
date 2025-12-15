<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminVerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerBalanceController;
use App\Http\Controllers\Seller\SellerDashboardController;
use App\Http\Controllers\Seller\SellerOrderController;
use App\Http\Controllers\Seller\SellerProductImageController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerWithdrawalController;
use App\Http\Controllers\SellerCategoryController;
use App\Http\Controllers\SellerProductController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// CUSTOMER
use App\Http\Controllers\Customer\{
    CustomerHomeController,
    CustomerProductController,
    CustomerCheckoutController,
    CustomerHistoryController,
    CustomerWalletController
};

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/topup', function () {
    return view('customer.wallet.topup');
})->name('topup');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// CUSTOMER 
Route::middleware(['auth', 'member'])->group(function () {

    Route::get('/home', [CustomerHomeController::class, 'index'])->name('customer.home');
    Route::get('/product/{slug}', [CustomerProductController::class, 'show'])->name('product.detail');

    // Checkout
    Route::get('/checkout', [CustomerCheckoutController::class, 'index'])
        ->name('customer.checkout');
    Route::post('/checkout', [CustomerCheckoutController::class, 'process'])
        ->name('customer.checkout.process');

    // History
    Route::get('/history', [CustomerHistoryController::class, 'index'])
        ->name('customer.history');

    // Wallet
    Route::get('/wallet/topup', [CustomerWalletController::class, 'topup'])
        ->name('customer.wallet.topup');
    Route::post('/wallet/topup', [CustomerWalletController::class, 'submitTopup'])
        ->name('customer.wallet.submit');
    Route::get('/wallet/success/{id}', [CustomerWalletController::class, 'success'])
        ->name('customer.wallet.success');
});


// ===================================================
// ADMIN
// ===================================================
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/{id}', [AdminUserController::class, 'detail'])
            ->name('users.detail');

        Route::get('/verification', [AdminVerificationController::class, 'index'])
            ->name('verification.index');

        Route::post('/verification/{id}/approve', [AdminVerificationController::class, 'approve'])
            ->name('verification.approve');

        Route::post('/verification/{id}/reject', [AdminVerificationController::class, 'reject'])
            ->name('verification.reject');
    });

// ===================================================
// SELLER
// ===================================================
Route::middleware(['auth', 'seller'])
    ->prefix('seller')
    ->name('seller.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [SellerDashboardController::class, 'index'])
            ->name('dashboard');

   
        Route::get('/store/profile', [SellerStoreController::class, 'edit'])
            ->name('store.profile');
        Route::put('/store/profile', [SellerStoreController::class, 'update'])
        ->name('store.update');

        Route::resource('/categories', SellerCategoryController::class)
            ->names([
                'index' => 'categories.index',
                'create' => 'categories.create',
                'store' => 'categories.store',
                'edit' => 'categories.edit',
                'update' => 'categories.update',
                'destroy' => 'categories.destroy',
            ])
            ->except(['show']);

        Route::resource('/products', SellerProductController::class);

        Route::get('/products/{product}/images', [SellerProductImageController::class, 'index'])
            ->name('products.images');
        Route::post('/products/{product}/images', [SellerProductImageController::class, 'store'])
            ->name('products.images.store');
        Route::delete('/products/images/{image}', [SellerProductImageController::class, 'destroy'])
            ->name('products.images.destroy');


        Route::get('/orders', [SellerOrderController::class, 'index'])
            ->name('orders.index');

        Route::get('/orders/{order}', [SellerOrderController::class, 'detail'])
            ->name('orders.detail');

        Route::put('/orders/{order}/status', [SellerOrderController::class, 'updateStatus'])
            ->name('orders.updateStatus');


        Route::get('/balance', [SellerBalanceController::class, 'index'])
            ->name('balance.index');

        Route::get('/balance/history', [SellerBalanceController::class, 'history'])
            ->name('balance.history');

        Route::get('/withdrawals', [SellerWithdrawalController::class, 'index'])
            ->name('withdrawals.index');

        Route::get('/withdrawals/create', [SellerWithdrawalController::class, 'create'])
            ->name('withdrawals.create');

        Route::post('/withdrawals', [SellerWithdrawalController::class, 'store'])
            ->name('withdrawals.store');

    });

// ===================================================
// PAYMENT PAGES
// ===================================================
Route::get('/payment', fn()=>view('payment.index'));
Route::get('/payment/confirm', fn()=>view('payment.confirm'));
Route::get('/payment/result', fn()=>view('payment.result'));


// ===================================================
// CART
// ===================================================
Route::post('/cart/add', [CartController::class, 'add'])
    ->name('cart.add');
