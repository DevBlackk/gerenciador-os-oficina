<?php

use Illuminate\Support\Facades\Route;

Route::prefix('customers')->group(function () {
    Route::post('/', \App\Http\Controllers\Customers\Create\Controller::class);
    Route::get('/', \App\Http\Controllers\Customers\List\Controller::class);
//    Route::get('/{customer}', \App\Http\Controllers\Customers\Show\Controller::class);
//    Route::put('/{customer}', \App\Http\Controllers\Customers\Update\Controller::class);
    Route::delete('/{id}', \App\Http\Controllers\Customers\Delete\Controller::class);
});
