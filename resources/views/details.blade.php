@extends('layouts.app')

@section('title', $match['name'] ?? 'Match Details')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">{{ $match['name'] ?? 'Match Details' }}</h4>
            <span class="badge bg-warning text-dark">{{ strtoupper($match['matchType'] ?? 'N/A') }}</span>
        </div>
        <div class="card-body">
            <p><strong>Status:</strong>
                <span class="badge bg-{{ $match['status'] === 'Completed' ? 'success' : 'info' }}">
                    {{ $match['status'] ?? 'N/A' }}
                </span>
            </p>
            <p><strong>Toss:</strong> {{ $match['toss'] ?? 'N/A' }}</p>
            <p><strong>Venue:</strong> {{ $match['venue'] ?? 'N/A' }}</p>

            @if (!empty($match['dateTimeGMT']))
                <p><strong>Date:</strong>
                    {{ \Carbon\Carbon::parse($match['dateTimeGMT'])->setTimezone('Asia/Dhaka')->format('d M Y, h:i A') }}
                </p>
            @endif

            @if (!empty($match['teams']))
                <p><strong>Teams:</strong>
                    <span class="fw-semibold">{{ implode(' vs ', $match['teams']) }}</span>
                </p>
            @endif

            @if (!empty($match['score']))
                <hr>
                <h5 class="mt-4 mb-3">Scoreboard</h5>
                <ul class="list-group">
                    @foreach ($match['score'] as $inning)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="fw-semibold">
                                {{ $inning['inning'] ?? '' }}
                            </span>
                            <span>
                                {{ $inning['r'] ?? 0 }}/{{ $inning['w'] ?? 0 }} in {{ $inning['o'] ?? 0 }} overs
                            </span>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="alert alert-info mt-3">No score data available.</div>
            @endif

            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-4">🔙 Go Back</a>
        </div>
    </div>
</div>
@endsection
