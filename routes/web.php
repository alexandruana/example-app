<?php

use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TravelDocumentController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\LegController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Trip Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
    Route::get('/trips/create', [TripController::class, 'create'])->name('trips.create');
    Route::get('/trips/{trip}/edit', [TripController::class, 'edit'])->name('trips.edit');
});

// Leg Routes
Route::get('/legs', [LegController::class, 'index'])->name('legs.index'); // If needed
Route::post('/legs', [LegController::class, 'store'])->name('legs.store');
Route::get('/legs/{leg}/edit', [LegController::class, 'edit'])->name('legs.edit'); // If needed
Route::put('/legs/{leg}', [LegController::class, 'update'])->name('legs.update');
Route::delete('/legs/{leg}', [LegController::class, 'destroy'])->name('legs.destroy');


// Passenger Routes
Route::get('/passengers', [PassengerController::class, 'index'])->name('passengers.index');
Route::get('/passengers/create', [PassengerController::class, 'create'])->name('passengers.create');
Route::post('/passengers', [PassengerController::class, 'store'])->name('passengers.store');
Route::get('/passengers/{id}', [PassengerController::class, 'show'])->name('passengers.show');
Route::get('/passengers/{id}/edit', [PassengerController::class, 'edit'])->name('passengers.edit');
Route::put('/passengers/{id}', [PassengerController::class, 'update'])->name('passengers.update');
Route::delete('/passengers/{id}', [PassengerController::class, 'destroy'])->name('passengers.destroy');
Route::get('/passengers/search', [PassengerController::class, 'search'])->name('passengers.search');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Dashboard Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard'); // Adjust as needed for your Dashboard component
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
