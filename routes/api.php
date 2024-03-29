<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\TravelDocumentController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TripController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API routes for Trips
Route::post('/trips', [TripController::class, 'store'])->name('api.trips.store');
Route::put('/trips/{trip}', [TripController::class, 'update'])->name('api.trips.update');
Route::delete('/trips/{trip}', [TripController::class, 'destroy'])->name('api.trips.destroy');

// API routes for Passengers
Route::get('/search-passengers', [PassengerController::class, 'search']);
Route::get('/passengers', [PassengerController::class, 'index']);
Route::post('/passengers', [PassengerController::class, 'store']);
Route::put('/passengers/{id}', [PassengerController::class, 'update']);
Route::delete('/passengers/{id}', [PassengerController::class, 'destroy']);
Route::get('/passengers/{id}', [PassengerController::class, 'show']);
Route::get('/passengers/search', [PassengerController::class, 'search']);

// API routes for Companies
Route::get('/passengers/{passengerId}/companies', [CompanyController::class, 'index']);
Route::post('/passengers/{passengerId}/companies', [CompanyController::class, 'store']);
Route::put('/passengers/{passengerId}/companies/{companyId}', [CompanyController::class, 'update']);
Route::delete('/passengers/{passengerId}/companies/{company}', [CompanyController::class, 'destroy']);

// API Routes for Travel Documents
Route::get('/passengers/{passenger}/documents', [TravelDocumentController::class, 'index']);
Route::post('/passengers/{passenger}/documents', [TravelDocumentController::class, 'store']);
Route::put('/passengers/{passenger}/documents/{document}', [TravelDocumentController::class, 'update']);
Route::delete('/passengers/{passenger}/documents/{document}', [TravelDocumentController::class, 'destroy']);
