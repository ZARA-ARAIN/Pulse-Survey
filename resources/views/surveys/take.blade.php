@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-semibold mb-4">{{ $survey->title }}</h2>
    <p class="mb-6 text-gray-600">{{ $survey->description }}</p>

    <div id="survey-app" class="space-y-6">
        <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
            <div id="progress-bar" class="bg-blue-600 h-2 rounded-full transition-all" style="width: 0%"></div>
        </div>

        <div id="question-container" class="min-h-[100px]">
            <!-- Question text will appear here -->
        </div>

        <div class="flex justify-between">
            <button id="prev-btn" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-semibold py-2 px-4 rounded disabled:opacity-50" disabled>Previous</button>
            <button id="next-btn" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Next</button>
        </div>
    </div>
</div>

<script>
    const survey = @json($survey);
    let currentIndex = 0;
    const totalQuestions = survey.questions.length;
    const responses = {};

    const questionContainer = document.getElementById('question-container');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const progressBar = document.getElementById('progress-bar');

    function renderQuestion(index) {
        const question = survey.questions[index];
        questionContainer.innerHTML = `
            <p class="text-lg font-medium mb-2">Q${index + 1}. ${question.text}</p>
            <textarea id="response-input" class="w-full border rounded p-2" rows="4" placeholder="Your answer...">${responses[question.id] || ''}</textarea>
        `;

        // Update buttons
        prevBtn.disabled = index === 0;
        nextBtn.textContent = (index === totalQuestions - 1) ? 'Submit' : 'Next';

        // Update progress bar
        const progressPercent = ((index) / totalQuestions) * 100;
        progressBar.style.width = progressPercent + '%';
    }

    function saveResponse() {
        const question = survey.questions[currentIndex];
        const responseInput = document.getElementById('response-input');
        responses[question.id] = responseInput.value.trim();
    }

    prevBtn.addEventListener('click', () => {
        saveResponse();
        if (currentIndex > 0) {
            currentIndex--;
            renderQuestion(currentIndex);
        }
    });

    nextBtn.addEventListener('click', () => {
        saveResponse();

        // Validate response before moving forward or submitting
        if (!responses[survey.questions[currentIndex].id] || responses[survey.questions[currentIndex].id] === '') {
            alert('Please answer the question before proceeding.');
            return;
        }

        if (currentIndex < totalQuestions - 1) {
            currentIndex++;
            renderQuestion(currentIndex);
        } else {
            // Submit all responses
            submitResponses();
        }
    });

    function submitResponses() {
        nextBtn.disabled = true;
        nextBtn.textContent = 'Submitting...';

        // Prepare payload
        const payload = [];

        for (const [questionId, response] of Object.entries(responses)) {
            payload.push({
                question_id: questionId,
                response: response
            });
        }

        // Submit each response via AJAX (or batch endpoint if available)
        // Here, for demo, send them one by one with Promise.all

        const promises = payload.map(item => {
            return fetch(`{{ url('surveys') }}/${survey.id}/questions/${item.question_id}/response`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({response: item.response})
            }).then(res => {
                if (!res.ok) throw new Error('Failed to submit response');
                return res.json();
            });
        });

        Promise.all(promises)
            .then(() => {
                alert('Thank you for completing the survey!');
                window.location.href = '{{ route('dashboard') }}';
            })
            .catch(() => {
                alert('There was an error submitting your responses. Please try again.');
                nextBtn.disabled = false;
                nextBtn.textContent = 'Submit';
            });
    }

    // Initialize
    renderQuestion(currentIndex);
</script>
@endsection
