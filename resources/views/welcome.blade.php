@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 fw-bold">🏏 Welcome to CricketScore Live!</h1>
    <p class="lead mt-3 mb-4">
        Get real-time cricket scores, upcoming matches, and detailed match insights—all in one place.
    </p>

    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mb-5">
        <a href="{{ route('live.matches') }}" class="btn btn-primary btn-lg px-4">View Live Matches</a>
        <a href="{{ route('current.matches') }}" class="btn btn-outline-secondary btn-lg px-4">Current Matches</a>
    </div>

    <div class="mt-5">
        <img src="https://cdn.dribbble.com/users/252114/screenshots/5315444/media/458e5fba7e84fc0dc10c9e5e7d4a83a1.gif" class="img-fluid rounded shadow" alt="Cricket animation" style="max-width: 500px;">
    </div>
</div>
@endsection
