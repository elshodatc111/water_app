<?php

use App\Http\Controllers\Drektor\{
    BalansController,
    BuyurtmalarController,
    DStatistikaController,
    HodimlarController,
    MaxsulotController,
    DProfileController,
    SettingController,
};


Route::middleware('auth')->group(function () {

    Route::get('maxsulot', [MaxsulotController::class, 'index'])->name('d_maxsulot');
    Route::post('maxsulot-create', [MaxsulotController::class, 'store'])->name('d_maxsulot_create');
    Route::post('maxsulot-delete', [MaxsulotController::class, 'delete'])->name('d_maxsulot_delete');
    Route::get('maxsulot-show/{id}', [MaxsulotController::class, 'show'])->name('d_maxsulot_show');
    Route::post('maxsulot-update', [MaxsulotController::class, 'update'])->name('d_maxsulot_update');
    Route::post('maxsulot-update-image', [MaxsulotController::class, 'updateImage'])->name('d_maxsulot_update_image');

    Route::get('hodim', [HodimlarController::class, 'index'])->name('d_hodim');
    Route::post('hodim-create', [HodimlarController::class, 'create'])->name('d_hodim_create');
    Route::get('hodim-show/{id}', [HodimlarController::class, 'show'])->name('d_hodim_show');
    Route::post('hodim-password-update', [HodimlarController::class, 'emploes_password_update'])->name('d_hodim_password_update');
    Route::post('hodim-emploes-update', [HodimlarController::class, 'emploes_update'])->name('d_hodim_emploes_update');

    Route::get('orders', [BuyurtmalarController::class, 'index'])->name('d_order');

    Route::get('balance', [BalansController::class, 'index'])->name('d_balans');

    Route::get('charts', [DStatistikaController::class, 'index'])->name('d_chart');

    Route::get('setting', [SettingController::class, 'index'])->name('d_setting');
    Route::post('setting-update', [SettingController::class, 'update'])->name('d_setting_update');
    Route::post('setting-image-update', [SettingController::class, 'updateImage'])->name('d_setting_image_update');

    Route::get('drektor-profile', [DProfileController::class, 'index'])->name('drektor_profile');

});
