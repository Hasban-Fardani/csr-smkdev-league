<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\StatsController;
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

Route::get('/stats', StatsController::class);

Route::get('/sector', [SectorController::class, 'index']);
Route::get('/sector/{id}', [SectorController::class, 'show']);

Route::get('/project/{id}', [ProjectController::class, 'show']);

Route::get('/report', [ReportController::class, 'index']);
Route::get('/report/{id}', [ReportController::class, 'show']);

Route::get('/partner', [MitraController::class, 'index']);
Route::get('/partner/{id}', [MitraController::class, 'show']);