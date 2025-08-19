@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Add Question to: {{ $survey->title }}</h2>

    <form action="{{ route('questions.store', $survey->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Question Text</label>
            <textarea name="text" class="form-control" required>{{ old('text') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category (optional)</label>
            <input type="text" name="category" class="form-control" value="{{ old('category') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Question Type</label>
            <select name="question_type" class="form-control">
                <option value="likert">Likert Scale (1–5)</option>
                <option value="yesno">Yes/No</option>
                <option value="text">Text Answer</option>
                <option value="multiple">Multiple Choice</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Order Index</label>
            <input type="number" name="order_index" class="form-control" value="0">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="is_required" class="form-check-input" checked>
            <label class="form-check-label">Required</label>
        </div>

        <button type="submit" class="btn btn-success">Add Question</button>
        <a href="{{ route('questions.index', $survey->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
