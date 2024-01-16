<?php

use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TravelDocumentController;
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

// Travel Documents Routes
Route::get('/travel-documents', [TravelDocumentController::class, 'index'])->name('travel-documents.index');
Route::post('/travel-documents', [TravelDocumentController::class, 'store'])->name('travel-documents.store');
Route::put('/travel-documents/{travelDocument}', [TravelDocumentController::class, 'update'])->name('travel-documents.update');
Route::delete('/travel-documents/{travelDocument}', [TravelDocumentController::class, 'destroy'])->name('travel-documents.destroy');
Route::get('/passengers', [PassengersController::class, 'index']);
Route::put('/passengers/{id}', [PassengerController::class, 'update']);
Route::delete('/passengers/{id}', [PassengerController::class, 'destroy'])->name('passengers.destroy');
Route::post('/post', [PassengerController::class, 'store']);

// Travel Documents Routes End

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [PassengerController::class, 'index'])
     ->middleware(['auth', 'verified'])
     ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
