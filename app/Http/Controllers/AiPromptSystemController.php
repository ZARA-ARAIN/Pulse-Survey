<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AiPrompt;

class AiPromptSystemController extends Controller
{
    public function index()
    {
        // Fetch latest prompts from DB
        $prompts = AiPrompt::latest()->get();

        // Pass data to view
        return view('AiPromptSystem.index', compact('prompts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'prompt' => 'required|string|max:5000'
        ]);

        // Example AI response — replace with actual API call if needed
        $aiResponse = "This is a sample AI response for: " . $validated['prompt'];

        AiPrompt::create([
            'prompt' => $validated['prompt'],
            'response' => $aiResponse
        ]);

        // Redirect back to index
        return redirect()->route('ai-prompt-system.index');
    }
}
