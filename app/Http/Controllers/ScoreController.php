<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Cricscore;

class ScoreController extends Controller
{
    protected $cricscore;

    public function __construct(Cricscore $cricscore)
    {
        $this->cricscore = $cricscore;
    }

public function liveMatches()
{
    $data = $this->cricscore->fetch('matches', [
        'offset' => 0
    ]);

    if (isset($data['error']) && $data['error']) {
        return view('error', ['message' => $data['message']]);
    }

    return view('score', ['matches' => $data['data'] ?? []]);
}
public function matchDetails($matchId)
{
    $data = $this->cricscore->getMatchInfo($matchId);

    if (isset($data['status']) && $data['status'] !== 'success') {
        return view('score.error', ['message' => $data['message'] ?? 'Something went wrong']);
    }

    return view('details', ['match' => $data['data'] ?? []]);
}
public function currentMatches()
{
    $data = $this->cricscore->fetch('currentMatches');

    if (isset($data['status']) && $data['status'] !== 'success') {
        return view('score.error', ['message' => $data['message'] ?? 'Something went wrong']);
    }

    return view('current', ['matches' => $data['data'] ?? []]);
}



}
