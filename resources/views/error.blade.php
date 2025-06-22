<div class="container mt-5 text-center">
    <h2 class="text-danger">⚠️ Error Occurred</h2>

    <div class="alert alert-warning mt-3 text-start" style="max-width: 700px; margin: auto;">
        {!! nl2br(e($message ?? 'No error message returned.')) !!}
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-primary mt-4">🔙 Go Back</a>
</div>
