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

    Route::get('orders', [BuyurtmalarController::class, 'index'])->name('d_order');

    Route::get('balance', [BalansController::class, 'index'])->name('d_balans');

    Route::get('charts', [DStatistikaController::class, 'index'])->name('d_chart');

    Route::get('setting', [SettingController::class, 'index'])->name('d_setting');

    Route::get('drektor-profile', [DProfileController::class, 'index'])->name('drektor_profile');

});
