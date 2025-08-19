<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Response;
use App\Models\Insight;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalSurveys'   => Survey::count(),
            'totalResponses' => Response::count(),
            'totalInsights'  => Insight::count(),
            'recentSurveys'  => Survey::latest()->take(5)->get(),
            'sentimentCounts' => [
                'positive' => Insight::where('sentiment_score', '>', 0.5)->count(),
                'neutral'  => Insight::whereBetween('sentiment_score', [0, 0.5])->count(),
                'negative' => Insight::where('sentiment_score', '<', 0)->count(),
            ]
        ]);
    }
}
