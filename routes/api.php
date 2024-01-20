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


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\CompanyController;

// API routes for Companies
Route::get('/passengers/{passenger}/companies', [CompanyController::class, 'index']);
Route::post('/passengers/{passenger}/companies', [CompanyController::class, 'store']);
Route::put('/passengers/{passenger}/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/passengers/{passenger}/companies/{company}', [CompanyController::class, 'destroy']);

// API routes for Travel Documents
Route::get('/passengers/{passengerId}/travelDocuments', [TravelDocumentController::class, 'index']);
Route::post('/passengers/{passengerId}/travelDocuments', [TravelDocumentController::class, 'store']);
Route::put('/passengers/{passengerId}/travelDocuments/{documentId}', [TravelDocumentController::class, 'update']);
Route::delete('/passengers/{passengerId}/travelDocuments/{documentId}', [TravelDocumentController::class, 'destroy']);