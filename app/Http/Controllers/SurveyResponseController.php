<?php

namespace App\Http\Controllers;

use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class SurveyResponseController extends Controller
{
    public function store(Request $request, $surveyId, $questionId)
    {
        $validated = $request->validate([
            'response' => 'required'
        ]);

        SurveyResponse::updateOrCreate(
            [
                'survey_id' => $surveyId,
                'question_id' => $questionId,
                'user_id' => auth()->id()
            ],
            ['response' => $validated['response']]
        );

        return response()->json(['success' => true]);
    }

    public function saveGrade(Request $r, Survey $survey, Question $question, SurveyResponse $response)
{
    $r->validate(['grade'=>'required|numeric|min:0|max:10']);
    $response->admin_grade = $r->grade;
    $response->save();
    return response()->json(['ok'=>true]);
}

}
