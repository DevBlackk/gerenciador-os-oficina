<?php

use Illuminate\Support\Facades\Route;

Route::prefix('customers')->group(function () {
    Route::get('/', \App\Http\Controller\Customers\List\Controller::class);
});
