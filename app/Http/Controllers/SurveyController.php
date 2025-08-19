<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $surveys = Survey::withCount('questions')->paginate(10);
        return view('surveys.manage', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'frequency' => 'required|string',
            'questions' => 'required|array|min:1',
            'questions.*' => 'required|string|max:1000',
        ]);

        $survey = Survey::create($request->only('title', 'description', 'frequency'));

        foreach ($request->questions as $qText) {
            $survey->questions()->create(['text' => $qText]);
        }

        return redirect()->route('surveys.manage')->with('success', 'Survey created!');
    }

    public function show(Survey $survey)
    {
        $survey->load('questions');
        return view('surveys.show', compact('survey'));
    }

    public function take(Survey $survey)
    {
        $survey->load('questions');
        return view('surveys.take', compact('survey'));
    }

    public function dashboard()
    {
        // Example dummy data — replace with your real queries
        $sentToday = 120; 
        $respondedToday = 75;

        $recentResponses = \App\Models\SurveyResponse::with(['user', 'survey', 'question'])
            ->latest()->limit(10)->get();

        return view('surveys.dashboard', compact('sentToday', 'respondedToday', 'recentResponses'));
    }

public function manage()
{
    // Load questions + responses + user for each response
    $surveys = Survey::with([
        'questions' => function($q){
            $q->orderBy('id','desc');
        },
        'questions.responses' => function($r){
            $r->latest();
        },
        'questions.responses.user'
    ])->withCount('questions')->get();

    // pass to blade
    return view('surveys.manage', compact('surveys'));
}


}