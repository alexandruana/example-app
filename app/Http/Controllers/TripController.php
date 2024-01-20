<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class TripController extends Controller
{
    public function index()
    {
        // Optionally fetch data to pass to the page
        // $flights = Flight::all();

        return Inertia::render('Trips', [
            // 'flights' => $flights,
        ]);
    }
}
