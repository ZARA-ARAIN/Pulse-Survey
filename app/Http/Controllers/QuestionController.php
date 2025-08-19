<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Show all questions for a survey
    public function index(Survey $survey)
    {
        $questions = $survey->questions()->orderBy('order_index')->get();
        return view('questions.index', compact('survey', 'questions'));
    }

    // Show form to add question
    public function create(Survey $survey)
    {
        return view('questions.create', compact('survey'));
    }

    // Store new question
    public function store(Request $request, Survey $survey)
    {
        $request->validate([
            'text' => 'required|string',
            'question_type' => 'required|in:likert,text,yesno,multiple',
            'order_index' => 'integer',
        ]);

        $survey->questions()->create([
            'text' => $request->text,
            'category' => $request->category,
            'question_type' => $request->question_type,
            'is_required' => $request->has('is_required'),
            'order_index' => $request->order_index ?? 0,
        ]);

        return redirect()->route('surveys.questions.index', $survey->id)
                         ->with('success', 'Question added successfully.');
    }

    // Edit question
    public function edit(Survey $survey, Question $question)
    {
        return view('questions.edit', compact('survey', 'question'));
    }

    // Update question
    public function update(Request $request, Survey $survey, Question $question)
    {
        $request->validate([
            'text' => 'required|string',
            'question_type' => 'required|in:likert,text,yesno,multiple',
        ]);

        $question->update($request->only(['text', 'category', 'question_type', 'is_required', 'order_index']));

        return redirect()->route('surveys.questions.index', $survey->id)
                         ->with('success', 'Question updated successfully.');
    }

    // Delete question
    public function destroy(Survey $survey, Question $question)
    {
        $question->delete();
        return redirect()->route('surveys.questions.index', $survey->id)
                         ->with('success', 'Question deleted successfully.');
    }
}
