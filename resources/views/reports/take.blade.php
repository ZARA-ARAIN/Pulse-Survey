@extends('layouts.app')

@section('content')
    <h2 class="mb-4">{{ $survey->title }}</h2>

    <form action="{{ route('survey.submit', $survey->id) }}" method="POST">
        @csrf

        @foreach($questions as $q)
            <div class="mb-4">
                <label class="form-label">
                    {{ $q->order_index + 1 }}. {{ $q->text }}
                    @if($q->is_required) <span class="text-danger">*</span> @endif
                </label>

                @if($q->question_type == 'likert')
                    <div>
                        @for($i=1; $i<=5; $i++)
                            <label class="me-3">
                                <input type="radio" name="responses[{{ $q->id }}]" value="{{ $i }}" required> {{ $i }}
                            </label>
                        @endfor
                    </div>
                @elseif($q->question_type == 'yesno')
                    <div>
                        <label class="me-3">
                            <input type="radio" name="responses[{{ $q->id }}]" value="1" required> Yes
                        </label>
                        <label>
                            <input type="radio" name="responses[{{ $q->id }}]" value="0" required> No
                        </label>
                    </div>
                @elseif($q->question_type == 'text')
                    <textarea name="responses[{{ $q->id }}]" class="form-control" {{ $q->is_required ? 'required' : '' }}></textarea>
                @elseif($q->question_type == 'multiple')
                    <input type="text" name="responses[{{ $q->id }}]" class="form-control" placeholder="Separate choices with commas">
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Submit Survey</button>
    </form>
@endsection
