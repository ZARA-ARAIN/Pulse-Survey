@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Question in: {{ $survey->title }}</h2>

    <form action="{{ route('questions.update', [$survey->id, $question->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Question Text</label>
            <textarea name="text" class="form-control" required>{{ old('text', $question->text) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category (optional)</label>
            <input type="text" name="category" class="form-control" value="{{ old('category', $question->category) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Question Type</label>
            <select name="question_type" class="form-control">
                <option value="likert" {{ $question->question_type == 'likert' ? 'selected' : '' }}>Likert Scale (1–5)</option>
                <option value="yesno" {{ $question->question_type == 'yesno' ? 'selected' : '' }}>Yes/No</option>
                <option value="text" {{ $question->question_type == 'text' ? 'selected' : '' }}>Text Answer</option>
                <option value="multiple" {{ $question->question_type == 'multiple' ? 'selected' : '' }}>Multiple Choice</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Order Index</label>
            <input type="number" name="order_index" class="form-control" value="{{ old('order_index', $question->order_index) }}">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_required" class="form-check-input" {{ $question->is_required ? 'checked' : '' }}>
            <label class="form-check-label">Required</label>
        </div>

        <button type="submit" class="btn btn-success">Update Question</button>
        <a href="{{ route('questions.index', $survey->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
