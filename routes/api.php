<?php

use Illuminate\Support\Facades\Route;

Route::prefix('customers')->group(function () {
    Route::post('/', \App\Http\Controller\Customers\Create\Controller::class);
    Route::get('/', \App\Http\Controller\Customers\List\Controller::class);
    Route::put('/{id}', \App\Http\Controller\Customers\Update\Controller::class);
    Route::delete('/{id}', \App\Http\Controller\Customers\Delete\Controller::class);
});
