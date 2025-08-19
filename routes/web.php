<?php

use App\Http\Controllers\SurveyController;
use App\Http\Controllers\SurveyResponseController;
use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiPromptSystemController;

Route::get('/', function () {
    return redirect()->route('surveys.dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('surveys.dashboard');
    })->name('dashboard');

    Route::get('surveys/dashboard', [SurveyController::class, 'dashboard'])
        ->name('surveys.dashboard');

    // AI Prompt System (index page + classic POST)
    Route::get('/ai-prompt-system', [AiPromptSystemController::class, 'index'])
        ->name('ai-prompt-system.index');
    Route::post('/ai-prompt-system', [AiPromptSystemController::class, 'store'])
        ->name('ai-prompt-system.store');

    // NEW: AJAX endpoint (JSON)
    Route::post('/ai-prompt-system/send', [AiPromptSystemController::class, 'send'])
        ->name('ai-prompt-system.send');

    // Surveys et al
    Route::get('surveys/{survey}/take', [SurveyController::class, 'take'])->name('surveys.take');
    Route::get('surveys/manage', [SurveyController::class, 'manage'])->name('surveys.manage');
    Route::resource('destinations', DestinationController::class);
    Route::resource('surveys', SurveyController::class);

    Route::post(
        'surveys/{survey}/questions/{question}/response',
        [SurveyResponseController::class, 'store']
    )->name('survey.response.store');

    Route::view('/departments', 'departments.index')->name('departments.index');
    Route::view('/employees', 'employees.index')->name('employees.index');
    Route::view('/history', 'history.index')->name('history.index');
    Route::view('/insights', 'insights.index')->name('insights.index');
});

require __DIR__.'/auth.php';
