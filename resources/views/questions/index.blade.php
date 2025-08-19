@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Questions for: {{ $survey->title }}</h2>

    <a href="{{ route('questions.create', $survey->id) }}" class="btn btn-primary mb-3">Add New Question</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Order</th>
                <th>Category</th>
                <th>Text</th>
                <th>Type</th>
                <th>Required</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($questions as $q)
                <tr>
                    <td>{{ $q->order_index }}</td>
                    <td>{{ $q->category ?? '—' }}</td>
                    <td>{{ $q->text }}</td>
                    <td>{{ ucfirst($q->question_type) }}</td>
                    <td>{{ $q->is_required ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('questions.edit', [$survey->id, $q->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('questions.destroy', [$survey->id, $q->id]) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No questions yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
