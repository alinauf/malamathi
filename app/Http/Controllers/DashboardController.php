<?php

namespace App\Http\Controllers;

use App\Models\Atoll;
use App\Models\Island;
use App\Models\IslandCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $stats = [
            'atolls' => Atoll::count(),
            'islands' => Island::count(),
            'island_categories' => IslandCategory::count(),
        ];
        return view('dashboard',compact('stats'));
    }
}
