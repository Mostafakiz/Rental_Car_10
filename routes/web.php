<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {

    $cars = Car::all();
    return view('index', compact('cars'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// ##################### Cars ##############################
Route::get('index', [CarController::class, 'index']);
Route::get('index2', [CarController::class, 'index2']);

Route::get('show/{id}', [CarController::class, 'show'])->name('show');
Route::get('rental/{id}', [CarController::class, 'rental'])->name('rental')->middleware('auth');
Route::patch('/editPop/{id}', [CarController::class, 'editPop'])->name('editPop');



