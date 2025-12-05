<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrivateFileController;

Route::get('/private-temp/{path}', [PrivateFileController::class, 'show'])
     ->where('path', '.*');


Route::middleware('api.key')->group(function () {
    // menerima path berapapun panjangnya
    Route::get('/private-file/{path}', 
        [PrivateFileController::class, 'show']
    )->where('path', '.*'); 

});
