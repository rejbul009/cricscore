@extends('layouts.app')

@section('title', 'Live & Upcoming Matches')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 fw-bold text-center">🏏 Live & Upcoming Matches</h2>

    @forelse ($matches as $match)
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <a href="{{ route('match.details', ['id' => $match['id']]) }}" class="text-white fw-semibold text-decoration-none fs-5">
                    {{ $match['name'] ?? 'Unknown Match' }}
                </a>
                <span class="badge bg-light text-dark">{{ strtoupper($match['matchType'] ?? '') }}</span>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Status:</strong>
                            <span class="text-{{ str_contains(strtolower($match['status']), 'live') ? 'danger' : 'secondary' }}">
                                {{ $match['status'] }}
                            </span>
                        </p>
                        <p class="mb-1"><strong>Teams:</strong>
                            <span class="fw-medium">
                                {{ implode(' vs ', $match['teams'] ?? []) }}
                            </span>
                        </p>
                        <p class="mb-1"><strong>Venue:</strong> {{ $match['venue'] ?? 'N/A' }}</p>
                        @if (!empty($match['dateTimeGMT']))
                            <p class="mb-1"><strong>Date:</strong>
                                {{ \Carbon\Carbon::parse($match['dateTimeGMT'])->setTimezone('Asia/Dhaka')->format('d M Y, h:i A') }}
                            </p>
                        @endif
                    </div>

                    @if (!empty($match['score']))
                        <div class="col-md-6">
                            <div class="border rounded p-2 bg-light">
                                <strong>📊 Scoreboard</strong>
                                <ul class="list-unstyled mb-0 mt-2">
                                    @foreach ($match['score'] as $inning)
                                        <li class="mb-1">
                                            <span class="fw-semibold">{{ $inning['inning'] ?? 'Inning' }}:</span>
                                            {{ $inning['r'] ?? 0 }}/{{ $inning['w'] ?? 0 }} in {{ $inning['o'] ?? 0 }} overs
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">
            🚫 No matches found at the moment.
        </div>
    @endforelse
</div>
@endsection
