@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>
            <p class="card-text">
                Here’s your quick survey activity:
            </p>
            <ul>
                <li>Submitted today: <strong>{{ $todaySubmitted ? 'Yes' : 'No' }}</strong></li>
                <li>Last response:
                    {{ $lastResponse ? $lastResponse->created_at->format('d M Y, h:i A') : 'Never submitted' }}
                </li>
            </ul>
        </div>
    </div>

    <h4>Quick Links</h4>
    <div class="list-group">
        <a href="{{ route('surveys.index') }}" class="list-group-item list-group-item-action">
            Manage Surveys
        </a>
        <a href="{{ route('insights.index') }}" class="list-group-item list-group-item-action">
            View Insights
        </a>
    </div>
@endsection
