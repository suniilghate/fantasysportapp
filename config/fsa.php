<?php

//echo Config::get('fsa.status.sports');
//echo Config::get('fsa.contests-percentage.1');
return [
    'status' => 
    [
        'sports' => [
            1 => 'Active', 2 => 'Pools Opened', 3 => 'Match-Inplay', 4 => 'Deactive' 
        ],
        'series' => [
            1 => 'Active', 2 => 'Pools Opened', 3 => 'Match-Inplay', 4 => 'Match Finish', 5 => 'Series Cancelled', 6 => 'Series Over', 7 => 'Deactive'
        ],
        'contest' => [
            1 => 'Active', 2 => 'Pools Opened', 3 => 'Match-Inplay', 4 => 'Ist Inning Finish', 5 => 'IInd Inning Finish', 6 => 'Calculation In-progress', 7 => 'Pools Closed', 8 => 'Deactive'
        ],
        'teams' => [
            1 => 'Active', 2 => 'Series Declared', 3 => 'Match-Inplay',4 => 'Deactive'
        ],
        'players' => [
            1 => 'Active', 2 => 'Series Declared', 3 => 'Playing 11', 4 => 'Substitute', 5 => 'Retired', 6 => 'Deactive'
        ],
        'matches' => [
            1 => 'Active', 2 => 'Pools Opened', 3 => 'Match-Inplay', 4 => 'Ist Inning finish', 5 => 'IInd Inning finish', 6 => 'Match Completed', 7 => 'Match Closed', 8 => 'Calculations starts', 9 => 'Match Results declared', 10 => 'Match Cancelled', 11 => 'Match Abondend', 12 => 'Match postponed', 13 => 'Match stopped' 
        ]
    ],
    'contests-type' => [
        1 => 'Paid', 2 => 'Free'
    ],
    'contests-percentage' => [
        1 => 0.60, 2 => 0.20, 3 => 0.10, 4 => 0.05, 5 => 0.035, 6 => 0.015   
    ],
    'combination-rules' => [
        'player-types' => [
            1 => ['min' => 3, 'max' => 6],
            2 => ['min' => 1, 'max' => 3],
            3 => ['min' => 1, 'max' => 3],
            4 => ['min' => 3, 'max' => 6]
        ],
        'teamwise-players' => [
            'team1' => ['min' => 4, 'max' => 7],
            'team2' => ['min' => 4, 'max' => 7],
        ]
    ]
];
