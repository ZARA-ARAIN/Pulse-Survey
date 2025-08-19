<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Survey;
use App\Models\Question;
use App\Models\User;

class SurveyAndQuestionsSeeder extends Seeder {
    public function run()
{
    $survey = Survey::create([
        'title' => 'Employee Pulse Survey',
        'description' => 'Help us improve your work experience',
        'active' => true
    ]);

    $questions = [
        [
            'text' => 'How satisfied are you with your current role?',
            'type' => 'scale',
            'order' => 1
        ],
        [
            'text' => 'How would you rate your work-life balance?',
            'type' => 'scale',
            'order' => 2
        ],
        [
            'text' => 'What do you enjoy most about working here?',
            'type' => 'text',
            'order' => 3
        ],
        [
            'text' => 'Which area do you think needs improvement?',
            'type' => 'multiple_choice',
            'options' => json_encode(['Communication', 'Workload', 'Team collaboration', 'Management']),
            'order' => 4
        ]
    ];

    foreach ($questions as $question) {
        $survey->questions()->create($question);
    }
}
}