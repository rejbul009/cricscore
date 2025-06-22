@extends('layouts.app')

@section('title', 'Current Matches')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">🏏 Current Matches</h2>

    @forelse ($matches as $match)
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                <a href="{{ route('match.details', ['id' => $match['id']]) }}" class="text-white text-decoration-none fs-5">
                    {{ $match['name'] ?? 'Unknown Match' }}
                </a>
                <span class="badge bg-light text-dark">{{ strtoupper($match['matchType'] ?? '') }}</span>
            </div>

            <div class="card-body">
                <p><strong>Status:</strong> {{ $match['status'] ?? 'N/A' }}</p>
                <p><strong>Venue:</strong> {{ $match['venue'] ?? 'N/A' }}</p>
                <p><strong>Teams:</strong> {{ isset($match['teams']) ? implode(' vs ', $match['teams']) : 'N/A' }}</p>

                @if (!empty($match['dateTimeGMT']))
                    <p><strong>Date:</strong>
                        {{ \Carbon\Carbon::parse($match['dateTimeGMT'])->setTimezone('Asia/Dhaka')->format('d M Y, h:i A') }}
                    </p>
                @endif

                {{-- ✅ Show result if match is completed --}}
                @php
                    $statusText = strtolower($match['status'] ?? '');
                    $keywords = ['won', 'draw', 'tie', 'abandoned', 'ended', 'no result'];
                    $isResultShown = false;

                    foreach ($keywords as $keyword) {
                        if (str_contains($statusText, $keyword)) {
                            $isResultShown = true;
                            break;
                        }
                    }
                @endphp

                @if ($isResultShown)
                    <p class="mt-2">
                        <strong class="text-success">Result:</strong> {{ $match['status'] }}
                    </p>
                @endif
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">🚫 No current matches found.</div>
    @endforelse
</div>
@endsection
