<?php

return [
    'api_key' => env('CRICKET_API_KEY', '721a310f-366a-4012-ae37-cca38ddc5475'),
    'base_url' => env('CRICKET_API_BASE_URL', 'https://api.cricapi.com/v1/'),

    'endpoints' => [
        'matches' => 'matches',
        'currentMatches' => 'currentMatches',
        'players' => 'players',
        'teams' => 'teams',
        'series' => 'series',
    ],
];
