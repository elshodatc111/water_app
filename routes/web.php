<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Company\{
    AdminCompanyController,
    AdminCompanyItemController,
    CompanyController,
    AdminProfileController,
};

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('admin-profile', [AdminProfileController::class, 'index'])->name('admin_profile');

    Route::get('admin-company', [AdminCompanyController::class, 'index'])->name('admin_company');
    Route::get('admin-company-show/{id}', [AdminCompanyController::class, 'show'])->name('admin_company_show');
    Route::get('admin-company-create', [AdminCompanyController::class, 'create'])->name('admin_company_create');
    Route::post('admin-company-create-store', [AdminCompanyController::class, 'store'])->name('admin_company_create_store');
    Route::post('admin-company-update-image', [AdminCompanyController::class, 'updateImage'])->name('admin_company_update_image');
    Route::post('admin-company-update', [AdminCompanyController::class, 'update'])->name('admin_company_update');
    Route::post('admin-company-status-update', [AdminCompanyController::class, 'toggleStatus'])->name('admin_company_status_update');
    Route::post('admin-company-paymart', [AdminCompanyController::class, 'paymart_store'])->name('admin_company_paymart_post');

    Route::get('admin-company-items/{id}', [AdminCompanyItemController::class, 'company_item'])->name('admin_company_item');
    Route::post('admin-company-item-create', [AdminCompanyItemController::class, 'company_item_create'])->name('admin_company_item_create');
    Route::post('admin-company-item-setstade', [AdminCompanyItemController::class, 'company_item_setstade'])->name('admin_company_item_setstade');
    Route::get('admin-company-users/{id}', [AdminCompanyItemController::class, 'company_hodim'])->name('admin_company_hodim');
    Route::post('admin-company-hodim-setstade', [AdminCompanyItemController::class, 'company_hodim_setstade'])->name('admin_company_hodim_setstade');
    Route::post('admin-company-hodim-creates', [AdminCompanyItemController::class, 'company_hodim_creates'])->name('admin_company_hodim_creates');
    Route::get('admin-company-paymarts/{id}', [AdminCompanyItemController::class, 'company_paymarts'])->name('admin_company_paymarts');
    Route::get('admin-company-balans-history/{id}', [AdminCompanyItemController::class, 'company_balans'])->name('admin_company_balans');
    Route::get('admin-company-item-orders/{id}', [AdminCompanyItemController::class, 'company_orders'])->name('admin_company_orders');
    Route::get('admin-company-item-comments/{id}', [AdminCompanyItemController::class, 'company_comments'])->name('admin_company_comments');
});

require __DIR__.'/web/auth.php';
require __DIR__.'/web/drektor.php';
