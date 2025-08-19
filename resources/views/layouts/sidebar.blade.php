<div class="sidebar p-3" style="width: 250px;">
    <h4>Pulse Survey</h4>
    <p><strong>{{ Auth::user()->name ?? 'Guest' }}</strong></p>
    <small>Dept: {{ Auth::user()->department->name ?? 'N/A' }}</small>

    <hr>
    <ul class="list-unstyled">
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('surveys.index') }}">Surveys</a></li>
        <li><a href="{{ route('insights.index') }}">Insights</a></li>
    </ul>
    <hr>
    <p>
        Submitted Today: <strong>{{ $todaySubmitted ? 'Yes' : 'No' }}</strong><br>
        Last Response: {{ $lastResponse ? $lastResponse->created_at->diffForHumans() : 'Never' }}
    </p>
</div>
