<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::group(["middleware" => "role:admin"], function(){
        // Админка
    });
});