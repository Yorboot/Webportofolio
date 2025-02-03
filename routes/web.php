<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'home'])->name('home');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/skillset',[HomeController::class, 'skillset'])->name('skillset');
