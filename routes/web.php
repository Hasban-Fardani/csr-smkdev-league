<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ROUTE FOR PUBLIC
Route::get('/', HomeController::class);
Route::get('/about', AboutController::class);

Route::get('/activity', [ActivityController::class, 'index']);
Route::get('/activity/{id}', [ActivityController::class, 'show']);

Route::get('/sector', SectorController::class);
