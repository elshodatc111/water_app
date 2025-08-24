<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Company\{AdminCompanyController,CompanyController};

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login_post');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('admin-company', [AdminCompanyController::class, 'index'])->name('admin_company');
    Route::get('admin-company-show/{id}', [AdminCompanyController::class, 'show'])->name('admin_company_show');
    Route::get('admin-company-create', [AdminCompanyController::class, 'create'])->name('admin_company_create');
    Route::post('admin-company-create-store', [AdminCompanyController::class, 'store'])->name('admin_company_create_store');

});
