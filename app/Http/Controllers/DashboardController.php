<?php

namespace App\Http\Controllers;

use App\Models\Umkm;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all UMKM records from the database
        $umkm = Umkm::all();
        
        // Return the dashboard view with the UMKM data
        return view('dashboard', compact('umkm'));
    }
}


