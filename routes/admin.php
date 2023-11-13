<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FilmController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SessionController;

Route::middleware('auth')->group(function () {
    Route::group(["middleware" => "role:admin"], function(){
        // Админка
        Route::get("/", [AdminController::class, "index"]);
        Route::resource("films", FilmController::class);
        Route::resource("sessions", SessionController::class);
    });
});