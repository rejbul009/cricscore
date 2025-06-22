<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class Cricscore {
    protected $apiKey;
    protected $baseUrl;

    public function __construct() {
        $this->apiKey = config('cricscore.api_key');
        $this->baseUrl = config('cricscore.base_url');
    }

    public function fetch($endpoint, $params = [])
{
    $params['apikey'] = $this->apiKey;

    $url = rtrim($this->baseUrl, '/') . '/' . ltrim($endpoint, '/');

    $response = Http::timeout(60)->get($url, $params);

    if ($response->successful()) {
        return $response->json();
    }

    return [
        'error' => true,
        'message' => $response->body(),
    ];
}

public function getMatchInfo($matchId)
{
    return $this->fetch('match_info', ['id' => $matchId]);
}
}
