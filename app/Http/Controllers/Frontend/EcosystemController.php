<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CaseReport;
use App\SL\EcosystemSL;
use Illuminate\Http\Request;

class EcosystemController extends Controller
{
    private EcosystemSL $ecosystemSL;

    public function __construct(EcosystemSL $ecosystemSL)
    {
        $this->ecosystemSL = $ecosystemSL;
    }

    public function index()
    {

        $cases = CaseReport::where('is_verified', true)->get();
        $markers = $this->ecosystemSL->getAllMarkers();
        $stats = $this->ecosystemSL->getStats();

        return view('frontend.ecosystems', [
            'cases' => $cases,
            'markers' => $markers,
            'stats' => $stats,
        ]);
    }
}
