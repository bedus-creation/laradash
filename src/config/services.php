<?php

return [
    'facebook' => [
        'client_id'     => env('FB_ID'),
        'client_secret' => env('FB_SECRET'),
        'redirect'      => env('APP_URL') . '/oauth/facebook/callback',
    ],
    'google' => [
        'client_id'     => env('GL_ID'),
        'client_secret' => env('GL_SECRET'),
        'redirect'      => env('APP_URL') . '/oauth/google/callback',
    ],
];

?>