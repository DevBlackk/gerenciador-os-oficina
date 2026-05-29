<?php

use Illuminate\Support\Facades\Route;

Route::prefix('customers')->group(function () {
    Route::post('/', \App\Http\Controller\Customers\Create\Controller::class);
});
