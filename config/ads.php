<?php

return [
    'client' => env('ADSENSE_CLIENT', 'ca-pub-3559167457847068'),
    'slots' => [
        'leaderboard' => env('ADSENSE_SLOT_LEADERBOARD', '1618140218'),
        'inline' => env('ADSENSE_SLOT_INLINE', '8078361229'),
        'sidebar' => env('ADSENSE_SLOT_SIDEBAR', '2483989858'),
        'grid' => env('ADSENSE_SLOT_GRID', '6455880372'),
        'article_sidebar' => env('ADSENSE_SLOT_ARTICLE_SIDEBAR', '6337186251'),
    ],
];
