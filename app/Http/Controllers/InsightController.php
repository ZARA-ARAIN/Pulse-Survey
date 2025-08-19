<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Response;
use App\Models\Survey;
use OpenAI\Laravel\Facades\OpenAI;

class InsightController extends Controller
{
    public function generate(Request $request)
    {
        $responses = Response::with('question')
            ->whereBetween('created_at', [now()->subWeek(), now()])
            ->get()
            ->groupBy('question.category');
        
        $analysisPrompt = "Analyze these survey responses and provide insights:\n\n";
        
        foreach ($responses as $category => $items) {
            $analysisPrompt .= "Category: $category\n";
            foreach ($items as $response) {
                $analysisPrompt .= "- {$response->question->text}: {$response->answer}\n";
            }
            $analysisPrompt .= "\n";
        }
        
        $analysisPrompt .= $request->insight_prompt;
        
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $analysisPrompt]
            ]
        ]);
        
        return view('admin.insights.show', [
            'insights' => $result['choices'][0]['message']['content']
        ]);
    }
}