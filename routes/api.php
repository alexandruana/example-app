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

// Get all trips
Route::get('/trips', [TripController::class, 'index']);
Route::get('/trips/{trip}', [TripController::class, 'show']);
Route::post('/trips', [TripController::class, 'store']);
Route::put('/trips/{trip}', [TripController::class, 'update']);
Route::delete('/trips/{trip}', [TripController::class, 'destroy']);

// API routes for Passengers
Route::get('/search-passengers', [PassengerController::class, 'search']);

// API routes for Companies
Route::get('/passengers/{passengerId}/companies', [CompanyController::class, 'index']);
Route::post('/passengers/{passengerId}/companies', [CompanyController::class, 'store']);
Route::put('/passengers/{passengerId}/companies/{companyId}', [CompanyController::class, 'update']);
Route::delete('/passengers/{passengerId}/companies/{company}', [CompanyController::class, 'destroy']);

// API routes for Travel Documents
Route::get('/passengers/{passengerId}/travelDocuments', [TravelDocumentController::class, 'index']);
Route::post('/passengers/{passengerId}/travelDocuments', [TravelDocumentController::class, 'store']);
Route::put('/passengers/{passengerId}/travelDocuments/{documentId}', [TravelDocumentController::class, 'update']);
Route::delete('/passengers/{passengerId}/travelDocuments/{documentId}', [TravelDocumentController::class, 'destroy']);