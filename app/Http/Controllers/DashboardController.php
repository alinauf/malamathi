<?php

namespace App\Http\Controllers;

use App\Models\PopulationEntry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $populationEntries = PopulationEntry::all()->sortBy('logged_date');
        return view('dashboard');
    }
}
