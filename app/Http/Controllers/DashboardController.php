<?php

namespace App\Http\Controllers;

use App\Models\Atoll;
use App\Models\CaseReport;
use App\Models\Ecosystem;
use App\Models\Island;
use App\Models\IslandCategory;
use App\SL\CaseReportSL;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $stats = [
            'atolls' => Atoll::count(),
            'islands' => Island::count(),
            'island_categories' => IslandCategory::count(),
            'ecosystems' => Ecosystem::count(),
            'cases_count' => CaseReport::count(),
        ];

        $recent_cases = CaseReportSL::getRecentCases(7);

        return view('dashboard', compact(['stats', 'recent_cases']));
    }
}
